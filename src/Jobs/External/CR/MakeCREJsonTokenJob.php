<?php

namespace Exactum\Efac\Jobs\External\CR;

use Exactum\Efac\Enums\BladeTemplateEnum;
use Exactum\Efac\Enums\JsonSchemaFileNameEnum;
use Exactum\Efac\Http\Resources\External\Token\CRE\MainCREResource;
use Exactum\Efac\Jobs\External\Request\SendDocumentToExternalApi;
use Exactum\Efac\Models\Document\Dte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MakeCREJsonTokenJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $dte;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Dte $dte)
    {
        $this->dte = $dte;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->dte->load([
            # Identification relantionship
            'dteType',
            'modelType',
            'operationType',
            'contingency.contingencyType',
            # Emmitter Relationships
            # Emmitter Relationships
            'salePoint.subsidiary' => function ($query) {
                $query->with([
                    'establishmentType',
                    'emitterEntity.entity' => function ($query) {
                        $query->with([
                            'city.department',
                            'economicActivity',
                            'docClientTypes',
                            'phones',
                            //'establishmentType'
                        ]);
                    },
                ]);
            },
            # Receiver Relantionships
            'receiverEntity.entity' => function ($query) {
                $query->with([
                    'city.department',
                    'economicActivity',
                    'docClientTypes',
                    'phones',
                ]);
            },
            # Body Relantionships
            'creItems' => function ($query) {
                $query->with([
                    'ivaRetention',
                    'relatedDocument' => function ($query) {
                        $query->with([
                            'dteType',
                            'generationType',
                        ]);
                    },
                ]);
            },
            #Summary relantionship
            'creSummary',
            'operationCondition',
        ]);

        $objectForToken = json_encode(MainCREResource::make($this->dte));

        $emitter = $this->dte->salePoint->subsidiary->emitterEntity;
        $ambiente = $this->dte->ambiente;

        SendDocumentToExternalApi::dispatchSync(
            $this->dte,
            $emitter->entity->docClientTypes()->where('default', true)->first()->pivot->value,
            $emitter->signerPasswordFor($ambiente),
            $emitter->apiPasswordFor($ambiente),
            $objectForToken,
            JsonSchemaFileNameEnum::resolve($this->dte->dteType->goes_id, $this->dte->dteType->last_version),
            BladeTemplateEnum::CRETemplate,
            $ambiente,
        );
    }
}
