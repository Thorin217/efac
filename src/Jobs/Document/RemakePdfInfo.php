<?php

namespace Exactum\Efac\Jobs\Document;

use Exactum\Efac\Enums\BladeTemplateEnum;
use Exactum\Efac\Models\Document\Dte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class RemakePdfInfo implements ShouldQueue
{
    private $dte;

    private $partsDate;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private function getSuccessDteJson($token)
    {
        $partsToken = explode('.', $token);

        return base64_decode($partsToken[1]);
    }

    private function getBladeTemplate($dteTypeId)
    {
        switch ($dteTypeId) {
            case 6:
                return BladeTemplateEnum::CRETemplate->value;
                break;

            case 9:
                return BladeTemplateEnum::FEXETemplate->value;
                break;

            case 10:
                return BladeTemplateEnum::FSEETemplate->value;
                break;

            default:
                return BladeTemplateEnum::StandarTemplate->value;
        }
    }

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        Dte $dte,
        $partsDate
    ) {
        $this->dte = $dte;
        $this->partsDate = $partsDate;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $entityInfo = $this->dte->getEmitterEntity()->load(['entity']);
        $tokenSuccessInfo = $this->dte
            ->tokens()
            ->whereNotNull('seal_reception')
            ->first();

        $nitEmitter = $entityInfo->entity->docClientTypes()->where('default', true)->first()->pivot->value;

        ///*
        MakePdfJob::dispatchSync(
            $nitEmitter,
            $this->partsDate,
            $this->dte->generate_code,
            $entityInfo->entity->photo,
            $this->getSuccessDteJson($tokenSuccessInfo->token),
            $this->getBladeTemplate($this->dte->dte_type_id),
            $tokenSuccessInfo->seal_reception,
        );
        //*/
    }
}
