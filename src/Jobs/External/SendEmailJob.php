<?php

namespace Exactum\Efac\Jobs\External;

use Exactum\Efac\Mail\GenericDocumentEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $generateCode;

    private $emitterEmail;

    private $emitterName;

    private $receiverEmail;

    private $receiverName;

    private $completeAddress;

    private $dteJson;

    private $sealReception;

    private $pdfPath;

    private $photoEntity;

    private $nitEmitter;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $partsDate,
        $generateCode,
        $emitterEmail,
        $emitterName,
        $receiverEmail,
        $receiverName,
        $dteJson,
        $sealReception,
        $completeAddress,
        $photoEntity,
        $nitEmitter
    ) {
        $this->generateCode = $generateCode;
        $this->emitterEmail = $emitterEmail;
        $this->emitterName = $emitterName;
        $this->receiverEmail = $receiverEmail;
        $this->receiverName = $receiverName;
        $this->completeAddress = $completeAddress;
        $this->dteJson = $dteJson;
        $this->sealReception = $sealReception;
        $this->photoEntity = $photoEntity;

        $this->pdfPath = base_path('storage/invoices/' . $nitEmitter . '/' . $partsDate[0] . '/' . $partsDate[1] . '/' . $partsDate[2] . '/' . $generateCode . '.pdf');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->receiverEmail)->send(new GenericDocumentEmail(
            $this->generateCode,
            $this->emitterName,
            $this->emitterEmail,
            $this->receiverName,
            $this->completeAddress,
            $this->dteJson,
            $this->sealReception,
            $this->pdfPath,
            $this->photoEntity,
        ));
    }
}
