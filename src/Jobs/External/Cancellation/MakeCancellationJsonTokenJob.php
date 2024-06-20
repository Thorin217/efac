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

        SendCancellationToExternalApi::dispatchSync(
            $this->cancellation,
            $this->cancellation->dte->salePoint->subsidiary->emitterEntity->entity->docClientTypes()->where('default', true)->first()->pivot->value,
            $this->cancellation->dte->salePoint->subsidiary->emitterEntity->signer_password,
            $this->cancellation->dte->salePoint->subsidiary->emitterEntity->api_password,
            $objectForToken,
            JsonSchemaFileNameEnum::CANCELLATION
        );

        $this->cancellation->dte->status = StatusEnum::Invalid->value;
        $this->cancellation->dte->save();

        /* SendInvalidationToBooster::dispatchSync(
            $this->cancellation
        ); */
    }
}
