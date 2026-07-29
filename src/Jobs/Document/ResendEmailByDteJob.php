<?php

namespace Exactum\Efac\Jobs\Document;

use Exactum\Efac\Jobs\External\SendEmailJob;
use Exactum\Efac\Models\Document\Dte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ResendEmailByDteJob implements ShouldQueue
{
    private $dte;

    private $tokenSuccessInfo;

    private $overrideEmail;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private function getSuccessDteJson($token)
    {
        $partsToken = explode('.', $token);

        return base64_decode($partsToken[1]);
    }

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Dte $dte, ?string $overrideEmail = null)
    {
        $this->dte = $dte->load([
            'receiverEntity.entity'
        ]);
        $this->tokenSuccessInfo = $dte->tokens()
            ->whereNotNull('seal_reception')
            ->first();
        $this->overrideEmail = $overrideEmail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $date = explode('-', $this->dte->getGenerateDate());
        $entityInfo = $this->dte->getEmitterEntity()->load(['entity']);
        $nitEmitter = $entityInfo->entity->docClientTypes()->where('default', true)->first()->pivot->value;
        $pdfPath = base_path("storage/invoices/" . $nitEmitter . "/" . $date[0] . "/" . $date[1] . "/" . $date[2] . '/' . $this->dte->generate_code . '.pdf');

        if (!File::exists($pdfPath)) {
            RemakePdfInfo::dispatchSync(
                $this->dte,
                $date,
            );
        }

        ///*
        SendEmailJob::dispatch(
            $date,
            $this->dte->generate_code,
            $entityInfo->entity->email,
            $entityInfo->entity->name,
            $this->overrideEmail ?: $this->dte->receiverEntity->entity->email,
            $this->dte->receiverEntity->entity->name,
            $this->getSuccessDteJson($this->tokenSuccessInfo->token),
            $this->tokenSuccessInfo->seal_reception,
            $entityInfo->entity->address_complement . " ," .
                $entityInfo->entity->city->name . "," .
                $entityInfo->entity->city->department->name,
            Storage::url($entityInfo->entity->photo),
            $nitEmitter,
        );
        //*/
    }
}
