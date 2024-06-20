<?php

namespace Exactum\Efac\Jobs\External\CD;

use Exactum\Efac\Enums\JsonSchemaFileNameEnum;
use Exactum\Efac\Http\Resources\External\Token\CDE\MainCDEResource;
use Exactum\Efac\Models\Document\Dte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MakeCDEJsonTokenJob implements ShouldQueue
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
                            'itemType' => function ($query) {
                                $query->with([
                                    'donationType'
                                ]);
                            },
                        ]);
                    },
                ]);
            },
        ]);

        $objectForToken = json_encode(MainCDEResource::make($this->dte));

        Logger('NO PODEMOS EMITIR DE ESTOS TnT');

        validateWithJsonSchema($objectForToken, JsonSchemaFileNameEnum::CDE, $this->dte);
    }
}
