<?php

namespace Exactum\Efac\Jobs\External\Request;

use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Enums\StatusEnum;
use Exactum\Efac\Exceptions\CustomHttpException;
use Exactum\Efac\Exceptions\FailedSendException;
use Exactum\Efac\Jobs\Document\MakePdfJob;
use Exactum\Efac\Jobs\External\SendEmailJob;
use Exactum\Efac\Models\Token\DteToken;
use Exactum\Efac\Services\External\ExternalService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendDocumentToExternalApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $dte;
    private $nitEmitter;
    private $passwordSigner;
    private $passwordApi;
    private $dteJson;
    private $nameJsonSchema;
    private $bladeTemplate;
    private $ambiente;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $dte,
        $nitEmitter,
        $passwordSigner,
        $passwordApi,
        $dteJson,
        $jsonSchema,
        $bladeTemplate = null,
        string $ambiente = '01',
    ) {
        $this->dte = $dte;
        $this->nitEmitter = $nitEmitter;
        $this->passwordSigner = $passwordSigner;
        $this->passwordApi = $passwordApi;
        $this->dteJson = $dteJson;
        $this->nameJsonSchema = $jsonSchema->value;
        $this->bladeTemplate = $bladeTemplate->value ?? null;
        $this->ambiente = $ambiente;

        $this->dte->status = StatusEnum::Sent->value;
        $this->dte->save();
    }

    private function getStandarStatus($completeSealReception)
    {
        switch (json_decode($completeSealReception)->descripcionMsg) {
            case 'RECIBIDO CON OBSERVACIONES':
                return StatusEnum::SuccessObservations;
                break;

            default:
                return StatusEnum::Success;
                break;
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->dte->tokens()->whereNotNull('seal_reception')->exists()) {
            return;
        }

        $registerToken = DteToken::make(['dte_id' => $this->dte->id]);

        try {
            validateWithJsonSchema($this->dteJson, $this->nameJsonSchema, $registerToken);
        } catch (FailedSendException $th) {
            $this->dte->update(['status' => StatusEnum::Rejected->value]);
        }

        if (
            $this->dte->contingency_id &&
            (!$this->dte->contingency->tokens()->exists() || !$this->dte->contingency->tokens()->whereNotNull('seal_reception')->exists())
        ) {
            $arrayDate = explode('-', $this->dte->getGenerateDate());
            $photoEntity = $this->dte->salePoint->subsidiary->emitterEntity->entity->photo;

            MakePdfJob::dispatchSync(
                $this->nitEmitter,
                $arrayDate,
                $this->dte->generate_code,
                $photoEntity,
                $this->dteJson,
                $this->bladeTemplate,
            );

            $registerToken->token = DefaultsEnum::MessageContigency->value;
            $registerToken->save();

            $this->dte->update(['status' => StatusEnum::SuccesContingency->value]);
            return;
        }

        ///*
        $bearerToken = ExternalService::getBearerToken(
            $this->nitEmitter,
            $this->passwordSigner,
            $this->passwordApi,
            $this->dteJson,
            $registerToken,
            $this->ambiente,
        );

        $checkDocumentBefore = [
            'nitEmisor' => $this->nitEmitter,
            'tdte' => $this->dte->dteType->goes_id,
            'codigoGeneracion' => $this->dte->generate_code,
        ];

        $externalSealReception = ExternalService::getDocumentCondition($bearerToken, $checkDocumentBefore, $this->ambiente);

        if (!$externalSealReception) {
            $oneToOneRequest = [
                'version' => $this->dte->dteType->last_version,
                'idEnvio' => rand(0, 999999999),
                'ambiente' => $this->ambiente,
                'tipoDte' => $this->dte->dteType->goes_id,
                'documento' => $registerToken->token,
                'codigoGeneracion' => $this->dte->generate_code,
            ];

            $externalSealReception = ExternalService::sendOneToOneDocument($bearerToken, $oneToOneRequest, $registerToken, $this->dte, $this->ambiente);
        }

        $registerToken->seal_reception = $externalSealReception;
        $registerToken->save();
        $this->dte->status = $this->getStandarStatus($externalSealReception)->value;
        $this->dte->save();

        $arrayDate = explode('-', $this->dte->getGenerateDate());
        $photoEntity = $this->dte->salePoint->subsidiary->emitterEntity->entity->photo;

        MakePdfJob::dispatchSync(
            $this->nitEmitter,
            $arrayDate,
            $this->dte->generate_code,
            $photoEntity,
            $this->dteJson,
            $this->bladeTemplate,
            $registerToken->seal_reception,
        );

        SendEmailJob::dispatch(
            $arrayDate,
            $this->dte->generate_code,
            $this->dte->salePoint->subsidiary->emitterEntity->entity->email,
            $this->dte->salePoint->subsidiary->emitterEntity->entity->name,
            $this->dte->receiverEntity->entity->email,
            $this->dte->receiverEntity->entity->name,
            $this->dteJson,
            $registerToken->seal_reception,
            $this->dte->salePoint->subsidiary->emitterEntity->entity->address_complement . ", " .
                $this->dte->salePoint->subsidiary->emitterEntity->entity->city->name . ", " .
                $this->dte->salePoint->subsidiary->emitterEntity->entity->city->state->name . ", " .
                $this->dte->salePoint->subsidiary->emitterEntity->entity->city->department->name,
            Storage::url($photoEntity),
            $this->nitEmitter
        );
        //*/
    }
}
