<?php

namespace Exactum\Efac\Jobs\External\Request;

use Exactum\Efac\Enums\StatusEnum;
use Exactum\Efac\Exceptions\FailedSendException;
use Exactum\Efac\Models\Token\ContingencyToken;
use Exactum\Efac\Services\External\ExternalService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendContingencyToExternalApi implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $contingency;
    private $nitEmitter;
    private $passwordSigner;
    private $passwordApi;
    private $dteJson;
    private $nameJsonSchema;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $contingency,
        $nitEmitter,
        $passwordSigner,
        $passwordApi,
        $dteJson,
        $jsonSchema
    ) {
        $this->contingency = $contingency;
        $this->nitEmitter = $nitEmitter;
        $this->passwordSigner = $passwordSigner;
        $this->passwordApi = $passwordApi;
        $this->dteJson = $dteJson;
        $this->nameJsonSchema = $jsonSchema->value;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $registerToken = ContingencyToken::make(['contingency_id' => $this->contingency->id]);

        try {
            validateWithJsonSchema($this->dteJson, $this->nameJsonSchema, $registerToken);
        } catch (FailedSendException $th) {
            $this->contingency->update(['status' => StatusEnum::Rejected->value]);
        }

        $bearerToken = ExternalService::getBearerToken(
            $this->nitEmitter,
            $this->passwordSigner,
            $this->passwordApi,
            $this->dteJson,
            $registerToken
        );

        $cancellationRequest = [
            'nit' => $this->nitEmitter,
            'documento' => $registerToken->token,
        ];

        $externalSealReception = ExternalService::sendContingencyDocument($bearerToken, $cancellationRequest, $registerToken);

        $registerToken->seal_reception = $externalSealReception;
        $registerToken->save();
        $this->contingency->status = StatusEnum::Success->value;
        $this->contingency->save();
    }
}
