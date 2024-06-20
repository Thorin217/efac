<?php

namespace Exactum\Efac\Jobs\External\Contingency;

use Exactum\Efac\Enums\JsonSchemaFileNameEnum;
use Exactum\Efac\Http\Resources\External\Token\Contingency\MainContingencyResource;
use Exactum\Efac\Jobs\External\Request\SendContingencyToExternalApi;
use Exactum\Efac\Models\Event\Contingency;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MakeContingencyJsonTokenJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $contingency;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Contingency $contingency)
    {
        $this->contingency = $contingency;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->contingency->load([
            'contingencyType',
            'dtes.dteType',
            'salePoint.subsidiary' => function ($query) {
                $query->with([
                    'emitterEntity.entity' => function ($query) {
                        $query->with([
                            'docClientTypes',
                            'phones'
                        ]);
                    },
                    'establishmentType',
                ]);
            },
            'user',
        ]);

        $objectForToken = json_encode(MainContingencyResource::make($this->contingency));

        SendContingencyToExternalApi::dispatchSync(
            $this->contingency,
            $this->contingency->salePoint->subsidiary->emitterEntity->entity->docClientTypes()->where('default', true)->first()->pivot->value,
            $this->contingency->salePoint->subsidiary->emitterEntity->signer_password,
            $this->contingency->salePoint->subsidiary->emitterEntity->api_password,
            $objectForToken,
            JsonSchemaFileNameEnum::CONTINGENCY,
        );

        SendDteInContingency::dispatch(
            $this->contingency,
        );
    }
}
