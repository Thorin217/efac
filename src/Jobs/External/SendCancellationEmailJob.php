<?php

namespace Exactum\Efac\Jobs\External;

use Exactum\Efac\Mail\CancellationEventEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SendCancellationEmailJob implements ShouldQueue
{
    private $generateCode;

    private $completeAddress;

    private $emitterName;

    private $emitterEmail;

    private $receiverName;

    private $receiverEmail;

    private $photoEntity;

    private $dteType;

    private $dteDate;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $generateCode,
        $completeAddress,
        $emitterName,
        $emitterEmail,
        $receiverName,
        $receiverEmail,
        $photoEntity,
        $dteType,
        $dteDate,
    ) {
        $this->generateCode = $generateCode;
        $this->completeAddress = $completeAddress;
        $this->emitterName = $emitterName;
        $this->emitterEmail = $emitterEmail;
        $this->receiverName = $receiverName;
        $this->receiverEmail = $receiverEmail;
        $this->photoEntity = $photoEntity;
        $this->dteType = $dteType;
        $this->dteDate = $dteDate;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->receiverEmail)->send(new CancellationEventEmail(
            $this->generateCode,
            $this->emitterName,
            $this->emitterEmail,
            $this->receiverName,
            $this->completeAddress,
            Storage::url($this->photoEntity),
            $this->dteType,
            $this->dteDate,
        ));
    }
}
