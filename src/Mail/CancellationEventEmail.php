<?php

namespace Exactum\Efac\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CancellationEventEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $generateCode;

    public $receiverName;

    public $completeAddress;

    public $photoEntity;

    public $dteType;

    public $dteDate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        $generateCode,
        $emitterName,
        $emitterEmail,
        $receiverName,
        $completeAddress,
        $photoEntity,
        $dteType,
        $dteDate,
    ) {
        $this->generateCode = $generateCode;
        $this->receiverName = $receiverName;
        $this->completeAddress = $completeAddress;
        $this->photoEntity = $photoEntity;
        $this->dteType = $dteType;
        $this->dteDate = $dteDate;

        $this->from(config('mail.from.address'), $emitterName);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: "Invalidacion de Documento Tributario Electrónico {$this->generateCode}",
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'efac::emails.cancellation_event'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
