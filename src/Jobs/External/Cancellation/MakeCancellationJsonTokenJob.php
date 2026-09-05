<?php

namespace Exactum\Efac\Jobs\External\Cancellation;

use Exactum\Efac\Enums\JsonSchemaFileNameEnum;
use Exactum\Efac\Enums\StatusEnum;
use Exactum\Efac\Http\Resources\External\Token\Cancellation\MainCancellationResource;
use Exactum\Efac\Jobs\External\Request\SendCancellationToExternalApi;
use Exactum\Efac\Models\Event\Cancellation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MakeCancellationJsonTokenJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $cancellation;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Cancellation $cancellation)
    {
        $this->cancellation = $cancellation;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->cancellation->load([
            'dte' => function ($query) {
                $query->with([
                    'dteType',
                    'tokens',
                    # Emmitter Relationships
                    'salePoint.subsidiary' => function ($query) {
                        $query->with([
                            'establishmentType',
                            'emitterEntity.entity' => function ($query) {
                                $query->with([
                                    'docClientTypes',
                                    'phones',
                                ]);
                            },
                        ]);
                    },
                    # Receiver Relantionships
                    'receiverEntity.entity' => function ($query) {
                        $query->with([
                            'docClientTypes',
                            'phones',
                        ]);
                    },
                ]);
            },
            'newDte',
            'cancellationType',
            'user',
        ]);

        $objectForToken = json_encode(MainCancellationResource::make($this->cancellation));

        // Una nota de anulacion sigue el mismo ambiente del DTE que anula --
        // no tendria sentido anular en produccion un DTE que se emitio en
        // pruebas, o viceversa.
        $emitter = $this->cancellation->dte->salePoint->subsidiary->emitterEntity;
        $ambiente = $this->cancellation->dte->ambiente;

        SendCancellationToExternalApi::dispatchSync(
            $this->cancellation,
            $emitter->entity->docClientTypes()->where('default', true)->first()->pivot->value,
            $emitter->signerPasswordFor($ambiente),
            $emitter->apiPasswordFor($ambiente),
            $objectForToken,
            JsonSchemaFileNameEnum::CANCELLATION,
            $ambiente,
        );

        $this->cancellation->dte->status = StatusEnum::Invalid->value;
        $this->cancellation->dte->save();

        /* SendInvalidationToBooster::dispatchSync(
            $this->cancellation
        ); */
    }
}
