<?php

namespace Exactum\Efac\Jobs\External\Request;

use Exactum\Efac\Enums\StatusEnum;
use Exactum\Efac\Exceptions\FailedSendException;
use Exactum\Efac\Jobs\External\SendCancellationEmailJob;
use Exactum\Efac\Models\Token\CancellationToken;
use Exactum\Efac\Services\External\ExternalService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class SendCancellationToExternalApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $cancellation;
    private $nitEmitter;
    private $passwordSigner;
    private $passwordApi;
    private $dteJson;
    private $nameJsonSchema;
    private $ambiente;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $cancellation,
        $nitEmitter,
        $passwordSigner,
        $passwordApi,
        $dteJson,
        $jsonSchema,
        string $ambiente = '01',
    ) {
        $this->cancellation = $cancellation;
        $this->nitEmitter = $nitEmitter;
        $this->passwordSigner = $passwordSigner;
        $this->passwordApi = $passwordApi;
        $this->dteJson = $dteJson;
        $this->nameJsonSchema = $jsonSchema->value;
        $this->ambiente = $ambiente;

        $this->cancellation->status =  StatusEnum::Rejected->value;
        $this->cancellation->save();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $registerToken = CancellationToken::make(['cancellation_id' => $this->cancellation->id]);

        try {
            validateWithJsonSchema($this->dteJson, $this->nameJsonSchema, $registerToken);
        } catch (FailedSendException $th) {
            $this->cancellation->update(['status' => StatusEnum::Rejected->value]);
        }

        $bearerToken = ExternalService::getBearerToken(
            $this->nitEmitter,
            $this->passwordSigner,
            $this->passwordApi,
            $this->dteJson,
            $registerToken,
            $this->ambiente,
        );

        $cancellationRequest = [
            'ambiente' => $this->ambiente,
            'idEnvio' => rand(0, 999999999),
            'version' => config('efac.cancellation_version'),
            'documento' => $registerToken->token,
        ];

        $externalSealReception = ExternalService::sendCancellationDocument($bearerToken, $cancellationRequest, $registerToken, $this->ambiente);

        $registerToken->seal_reception = $externalSealReception;
        $registerToken->save();
        $this->cancellation->status = StatusEnum::Success->value;
        $this->cancellation->save();

        SendCancellationEmailJob::dispatch(
            $this->cancellation->dte->generate_code,
            $this->cancellation->dte->salePoint->subsidiary->emitterEntity->entity->address_complement . ", " .
                $this->cancellation->dte->salePoint->subsidiary->emitterEntity->entity->city->name . ", " .
                $this->cancellation->dte->salePoint->subsidiary->emitterEntity->entity->city->department->name,
            $this->cancellation->dte->salePoint->subsidiary->emitterEntity->entity->name,
            $this->cancellation->dte->salePoint->subsidiary->emitterEntity->entity->email,
            $this->cancellation->dte->receiverEntity->entity->name,
            $this->cancellation->dte->receiverEntity->entity->email,
            $this->cancellation->dte->salePoint->subsidiary->emitterEntity->entity->photo,
            $this->cancellation->dte->dteType->name,
            $this->cancellation->dte->date,
        );
    }
}
