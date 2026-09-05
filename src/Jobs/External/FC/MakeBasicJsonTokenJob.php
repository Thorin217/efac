<?php

namespace Exactum\Efac\Jobs\External\FC;

use Exactum\Efac\Enums\JsonSchemaFileNameEnum;
use Exactum\Efac\Http\Resources\External\Token\FCE\MainFCEResource;
use Exactum\Efac\Jobs\External\Request\SendDocumentToExternalApi;
use Exactum\Efac\Models\Document\Dte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MakeBasicJsonTokenJob implements ShouldQueue
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
        $this->dte->loadBaseRelations([
            'dteItems' => function ($query) {
                $query->with([
                    'productService' => function ($query) {
                        $query->with([
                            'tributesTypes'  => function ($query) {
                                $query->where('tributes_types.id', '!=', 2);
                            },
                        ]);
                    },
                ]);
            },
        ]);

        $objectForToken = json_encode(MainFCEResource::make($this->dte));

        $emitter = $this->dte->salePoint->subsidiary->emitterEntity;
        $ambiente = $this->dte->ambiente;

        SendDocumentToExternalApi::dispatchSync(
            $this->dte,
            $emitter->entity->docClientTypes()->where('default', true)->first()->pivot->value,
            $emitter->signerPasswordFor($ambiente),
            $emitter->apiPasswordFor($ambiente),
            $objectForToken,
            JsonSchemaFileNameEnum::resolve($this->dte->dteType->goes_id, $this->dte->dteType->last_version),
            null,
            $ambiente,
        );
    }
}
