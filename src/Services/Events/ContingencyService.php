<?php

namespace Exactum\Efac\Services\Events;

use Exactum\Efac\Exceptions\CustomHttpException;
use Exactum\Efac\Jobs\External\Contingency\MakeContingencyJsonTokenJob;
use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\Event\Contingency;
use Exactum\Efac\Models\External\ContingencyType;
use Exactum\Efac\Models\External\DteType;
use Exactum\Efac\Services\External\ExternalService;
use Carbon\Carbon;

/**
 * ContingencyService class
 **/
final class ContingencyService
{
    /**
     * createAndSendContingency function summary
     *
     * createAndSendContingency function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function createAndSendContingency(array $data)
    {
        if (Contingency::externalApiAccepted()->exists()) {
            throw new CustomHttpException('Ya existe un evento de contigencia activo.', 409);
        }

        if (!isset($data['description'])) {
            $data['description'] = ContingencyType::find($data['contingency_type_id'])->name;
        }

        $dteTypes = isset($data['dte_types']) ? $data['dte_types'] : [];

        if (count($dteTypes) > 0) {
            DteType::whereIn('id', $dteTypes)->update(['has_contingency' => 1]);
        }

        return Contingency::create($data);
    }

    /**
     * sendCompleteContingency function summary
     *
     * sendCompleteContingency function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function sendCompleteContingency(Contingency $contingency)
    {
        $contingency->update(['end_date' => Carbon::now()]);

        MakeContingencyJsonTokenJob::dispatch($contingency);
    }

    /**
     * manageContigencyFromSpecificDte function summary
     *
     * manageContigencyFromSpecificDte function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public static function manageContigencyFromSpecificDte(Dte $dte)
    {
        $contingencyId = null;
        [$modelType, $operationType] = ExternalService::getDependenciesContingency();

        if (Contingency::externalApiAccepted()->exists()) {
            $contingencyId = Contingency::externalApiAccepted()->first()->id;
            DteType::find($dte->dte_type_id)->update(['has_contingency' => 1]);
        } else {
            $contingencyService = new ContingencyService();
            $contingencyId = $contingencyService->createAndSendContingency([
                'contingency_type_id' => 1,
                'description' => null,
                'user_id' => $dte->user_id,
                'sale_point_id' => $dte->sale_point_id,
                'start_date' => Carbon::make($dte->date)->setTime(7, 0, 0),
                'dte_types' => [$dte->dte_type_id],
            ])->id;
        }

        $dte->update([
            'contingency_id' => $contingencyId,
            'model_type_id' => $modelType,
            'operation_type_id' => $operationType,
        ]);
        $dte->dispatchJobToMakeToken();
        throw new CustomHttpException('Internal message error (X0001).');
    }
}
