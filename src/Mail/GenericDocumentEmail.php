<?php

namespace Exactum\Efac\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

#Mail::to('test@example.com')->send(new GenericDocumentEmail());
#$pdf = Pdf::loadView('pdfs.fcetemplate', ['dte' => json_decode($dteJson)])->setPaper('letter', 'portrait');
#return $pdf->stream("{$this->generateCode}.pdf");
class GenericDocumentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $generateCode;

    public $receiverName;

    public $completeAddress;

    public $dteJson;

    public $sealReception;

    public $pdfPath;

    public $photoEntity;

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
        $dteJson,
        $sealReception,
        $pdfPath,
        $photoEntity,
    ) {
        $this->generateCode = $generateCode;
        $this->receiverName = $receiverName;
        $this->dteJson = $dteJson;
        $this->completeAddress = $completeAddress;
        $this->sealReception = $sealReception;
        $this->pdfPath = $pdfPath;
        $this->photoEntity = $photoEntity;

        $this->from($emitterEmail, $emitterName);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: "Documento Tributario Electrónico {$this->generateCode}-{$this->receiverName}",
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
            view: 'efac::emails.generic_document'
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [
            Attachment::fromPath($this->pdfPath)->as("DTE_{$this->generateCode}.pdf"),

            Attachment::fromData(function () {
                return $this->dteJson;
            }, "dte-{$this->generateCode}.json"),

            Attachment::fromData(function () {
                return $this->sealReception;
            }, "recepcion-{$this->generateCode}.json"),
        ];
    }
}
