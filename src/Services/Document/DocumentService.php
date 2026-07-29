<?php

namespace Exactum\Efac\Services\Document;

use Exactum\Efac\Enums\StatusEnum;
use Exactum\Efac\Exceptions\CustomHttpException;
use Exactum\Efac\Jobs\Document\MakeExportSummaryJob;
use Exactum\Efac\Jobs\Document\MakeSummaryJob;
use Exactum\Efac\Jobs\Document\RemakePdfInfo;
use Exactum\Efac\Jobs\Document\ResendEmailByDteJob;
use Exactum\Efac\Jobs\Document\ResendExternalMinistryTokenJob;
use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\Enterprise\SalePoint;
use Illuminate\Support\Facades\File;

/**
 * DocumentService class
 */
final class DocumentService
{
    /**
     * createDocument function summary
     *
     * createDocument function long description
     *
     * @param Array $data Description
     * @return Dte
     * @throws conditon
     **/
    public function createDocument(array $data): Dte
    {
        return Dte::create($data);
    }

    /**
     * generateSummary function summary
     *
     * generateSummary function long description
     *
     * @param Dte $dte Description
     * @return type
     **/
    public function generateSummary(Dte $dte, array $data)
    {
        $completeStepsQuery = $dte->steps()->whereRequerid(true)->wherePivot('complete', false);

        ///*
        if ($completeStepsQuery->count() !== 1) {
            throw new CustomHttpException('Falta los siguientes pasos requeridos: ' . $completeStepsQuery->pluck('slug_es')->implode(','), 400);
        }

        if ($dte->steps()->whereSlug('excluded-summary')->exists()) {
            $dte->updateCompleteStep('excluded-summary');
        } else {
            $dte->updateCompleteStep('summary');
        }
        //*/

        $dte->status = StatusEnum::Processing->value;
        $dte->save();

        MakeSummaryJob::dispatch($dte, $data);
    }

    /**
     * addRelatedDocument function summary
     *
     * addRelatedDocument function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function addRelatedDocument(Dte $dte, array $data)
    {
        if (isset($data['relating_dte_id'])) {
            $dte->createRelatedDteBySelfDte($data['relating_dte_id']);
            $dte->updateCompleteStep('body');
        } else {
            $dte->relatedDocuments()->create(
                array_intersect_key($data, array_flip(['dte_type_id', 'generation_type_id', 'identificator_document', 'date'])),
            );
        }

        return $dte;
    }

    /**
     * generateExportSummary function summary
     *
     * generateExportSummary function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function generateExportSummary(Dte $dte, array $data)
    {
        $completeStepsQuery = $dte->steps()->whereRequerid(true)->wherePivot('complete', false);

        ///*
        if ($completeStepsQuery->count() !== 1) {
            throw new CustomHttpException('Falta los siguientes pasos requeridos: ' . $completeStepsQuery->pluck('slug_es')->implode(','), 400);
        }

        $dte->updateCompleteStep('export-summary');
        //*/

        $dte->status = StatusEnum::Processing->value;
        $dte->save();

        MakeExportSummaryJob::dispatch($dte, $data);
    }

    /**
     * getSummaryByDte function summary
     *
     * getSummaryByDte function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function getSummaryByDte(Dte $dte)
    {
        return $dte->summary()->firstOrFail();
    }

    /**
     * getAllDocumentTokens function summary
     *
     * getAllDocumentTokens function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function getAllDocumentTokens(Dte $dte, array $data)
    {
        return $dte->tokens()->orderBy('created_at', 'desc')->paginate(1);
    }

    /**
     * getExportSummaryByDte function summary
     *
     * getExportSummaryByDte function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getExportSummaryByDte(Dte $dte)
    {
        return array_merge(
            $dte->summary()->firstOrFail()->toArray(),
            $dte->exportation()->firstOrFail()->toArray()
        );
    }

    /**
     * getOneDocument function summary
     *
     * getOneDocument function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getOneDocument(Dte $dte)
    {
        $dte->loadBaseRelations([
            'propertyObject',
            'steps',
        ]);

        if (in_array($dte->dte_type_id, [4, 5])) { #phamtonsIds
            $dte->load([
                'relatedDocuments' => function ($query) {
                    $query->with([
                        'dteType',
                        'generationType',
                    ]);
                },
            ]);
        }

        if (in_array($dte->dte_type_id, [9])) { #phamtonsIds
            $dte->load([
                'exportation' => function ($query) {
                    $query->with([
                        'regimen',
                        'taxRevenue',
                        'incoterm'
                    ]);
                },
            ]);
        }

        return $dte;
    }

    /**
     * updateSummaryByDte function summary
     *
     * updateSummaryByDte function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function updateSummaryByDte(Dte $dte, array $data)
    {
        /*
        $completeStepsQuery = $dte->steps()->whereRequerid(true)->wherePivot('complete', false);

        if ($completeStepsQuery->exists()) {
            throw new CustomHttpException('Falta los siguientes pasos requeridos: ' . $completeStepsQuery->pluck('slug')->implode(','), 400);
        }
        //*/

        if ($dte->steps()->whereSlug('excluded-summary')->exists()) {
            $dte->updateCompleteStep('excluded-summary');
        } else {
            $dte->updateCompleteStep('summary');
        }

        MakeSummaryJob::dispatch($dte, $data);
    }

    /**
     * updateExportSummaryByDte function summary
     *
     * updateExportSummaryByDte function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function updateExportSummaryByDte(Dte $dte, array $data)
    {
        /*
        $completeStepsQuery = $dte->steps()->whereRequerid(true)->wherePivot('complete', false);

        if ($completeStepsQuery->exists()) {
            throw new CustomHttpException('Falta los siguientes pasos requeridos: ' . $completeStepsQuery->pluck('slug')->implode(','), 400);
        }
        //*/

        $dte->updateCompleteStep('export-summary');

        MakeExportSummaryJob::dispatch($dte, $data);
    }

    /**
     * getPdfPathByDte function summary
     *
     * getPdfPathByDte function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function getPdfPathByDte(Dte $dte)
    {
        $firstDocument = $dte->entity->docClientTypesEntity()->first();
        $date = explode('-', $dte->getGenerateDate());
        $pdfPath = base_path('storage/invoices/' . $firstDocument->value . '/' . $date[0] . '/' . $date[1] . '/' . $date[2] . '/' . $dte->generate_code . '.pdf');

        if (!File::exists($pdfPath)) {
            if (
                $dte->tokens()
                ->whereNotNull('seal_reception')
                ->exists()
            ) {
                RemakePdfInfo::dispatchSync(
                    $dte,
                    $date,
                );
            } else {
                throw new CustomHttpException('No existe el documento que se quiere recuperar', 404);
            }
        }

        return $pdfPath;
    }

    /**
     * resendEmailByDte function summary
     *
     * resendEmailByDte function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function resendEmailByDte(Dte $dte, ?string $overrideEmail = null)
    {
        if (!$dte->tokens()->whereNotNull('seal_reception')->exists())
            throw new CustomHttpException('El documento no ha sido aprobado por el ministerio');

        ResendEmailByDteJob::dispatch(
            $dte,
            $overrideEmail,
        );
    }

    /**
     * updateGenralDteInfo function summary
     *
     * updateGenralDteInfo function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function updateGenralDteInfo(Dte $dte, array $data): Dte
    {
        $dte->update($data);

        return $dte;
    }

    /**
     * resendDteToken function summary
     *
     * resendDteToken function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function resendDteToken(Dte $dte)
    {
        $completeStepsQuery = $dte->steps()->whereRequerid(true)->wherePivot('complete', false);

        ///*
        if ($completeStepsQuery->exists()) {
            throw new CustomHttpException('Falta los siguientes pasos requeridos: ' . $completeStepsQuery->pluck('slug_es')->implode(','), 400);
        }
        //*/

        ResendExternalMinistryTokenJob::dispatchSync($dte);
    }

    /**
     * manageAppendices function summary
     *
     * manageAppendices function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function manageAppendices(Dte $dte, array $data)
    {
        $dte->appendices()->delete();

        foreach ($data as $appendix) {
            $dte->appendices()->create($appendix);
            $dte->updateCompleteStep('appendice');
        }
    }

    /**
     * getAllInformationForOneGenerateCode function summary
     *
     * getAllInformationForOneGenerateCode function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getAllInformationForOneGenerateCode(string $generateCode)
    {
        return Dte::whereGenerateCode($generateCode)->firstOrFail();
    }
}
