<?php

namespace Exactum\Efac\Jobs\Document;

use Exactum\Efac\Enums\BladeTemplateEnum;
use Illuminate\Bus\Queueable;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MakePdfJob implements ShouldQueue
{
    private $nitEmitter;

    private $bladeTemplate;

    private $photoEntity;

    private $dteJson;

    private $sealReception;

    private $generateCode;

    private $folderPath;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        $nitEmitter,
        $partsDate,
        $generateCode,
        $photoEntity,
        $dteJson,
        $bladeTemplate,
        $sealReception = false,
    ) {
        $this->nitEmitter = $nitEmitter;
        $this->generateCode = $generateCode;
        $this->sealReception = $sealReception;
        $this->dteJson = $dteJson;
        $this->photoEntity = $photoEntity;
        $this->bladeTemplate = $bladeTemplate ?? BladeTemplateEnum::StandarTemplate->value;

        $this->folderPath = base_path('storage/invoices/' . $nitEmitter . '/' . $partsDate[0] . '/' . $partsDate[1] . '/' . $partsDate[2]);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $oldmask = umask(0);

        if (!File::exists($this->folderPath)) {
            File::makeDirectory($this->folderPath, 0777, true);
        }

        $pdfPath = "{$this->folderPath}/{$this->generateCode}.pdf";

        if (File::exists($pdfPath)) {
            File::delete($pdfPath);
        }

        $stringSealReception = $this->sealReception ? json_decode($this->sealReception)->selloRecibido : false;
        Pdf::loadView('efac::' . $this->bladeTemplate, [
            'dte' => json_decode($this->dteJson),
            'sealReception' => $stringSealReception,
            'photoEntity' => Storage::url($this->photoEntity),
        ])->setPaper('letter', 'portrait')
            ->save($pdfPath);

        umask($oldmask);
    }
}
