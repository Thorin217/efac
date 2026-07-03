<?php

namespace Exactum\Efac\Services\External;

use Exactum\Efac\Actions\SignDocumentAction;
use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Enums\StatusEnum;
use Exactum\Efac\Exceptions\FailedSendException;
use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\External\City;
use Exactum\Efac\Models\External\State;
use Exactum\Efac\Models\External\TributesType;
use Exactum\Efac\Models\Token\DteToken;
use Exactum\Efac\Services\Events\ContingencyService;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

/**
 * ExternalService class
 */
final class ExternalService
{

    /**
     * getDataExternalModels function summary
     *
     * getDataExternalModels function long description
     *
     * @param String $tableName Description
     * @param array<string> $data Description
     * @return array<Object>
     **/
    public function getDataExternalModels(string $tableName, array $data)
    {
        $query = DB::table($tableName);

        if (isset($data['filter'])) {
            $query->where("name", "LIKE", "%{$data['filter']}%")
                ->orWhere("goes_id", "LIKE", "%{$data['filter']}%");
        }

        return $query->get();
    }

    /**
     * getDataExternalModelsWithClassification function summary
     *
     * getDataExternalModelsWithClassification function long description
     *
     * @param String $tableName Description
     * @param array<string> $data Description
     * @return array<Object>
     **/
    public function getDataExternalModelsWithClassification(string $tableName, array $data)
    {
        $query = DB::table($tableName);

        if (isset($data['filter'])) {
            $query->where("name", "LIKE", "%{$data['filter']}%")
                ->orWhere("goes_id", "LIKE", "%{$data['filter']}%");
        }

        if (isset($data['classification'])) {
            $query->where('classification', $data['classification']);
        }

        return $query->get();
    }

    /**
     * getDataCity function summary
     *
     * getDataCity function long description
     *
     * @param array<string>  $data Description
     * @return array<Object>
     **/
    public function getDataCity(array $data)
    {
        $query = City::query();

        if (isset($data['filter'])) {
            $query->where("name", "LIKE", "%{$data['filter']}%")
                ->orWhere("goes_id", "LIKE", "%{$data['filter']}%");
        }

        if (isset($data['department_id'])) {
            $query->where("department_id", $data['department_id']);
        }

        return $query->get();
    }

    /**
     * getNameByGoesId function summary
     *
     * getNameByGoesId function long description
     *
     * @param string $tableName Description
     * @param string $goesId Description
     * @return string
     **/
    ///*
    public static function getNameByGoesId(string $tableName, $goesId)
    {
        return DB::table($tableName)->where('goes_id', $goesId)->first()->name ?? null;
    }
    //*/

    /**
     * getCityNameByGoesId function summary
     *
     * getCityNameByGoesId function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public static function getCityNameByGoesId($departmentId, $cityId)
    {
        return State::where('goes_id', $cityId)->whereHas('department', function ($query) use ($departmentId) {
            $query->where('goes_id', $departmentId);
        })->first()->name ?? null;
    }

    /**
     * getDefaultIdByExternalModel function summary
     *
     * getDefaultIdByExternalModel function long description
     *
     * @param string $tableName Description
     * @return int
     **/
    public static function getDefaultIdByExternalModel(string $tableName)
    {
        return DB::table($tableName)->where('default', true)->value('id');
    }

    /**
     * getDefaultTributeTypeIds function summary
     *
     * getDefaultTributeTypeIds function long description
     *
     * @return array
     **/
    public static function getDefaultTributeTypeIds()
    {
        return TributesType::where('default', true)->pluck('id')->toArray();
    }

    /**
     * getDefaultGoesIdByExternalModel function summary
     *
     * getDefaultGoesIdByExternalModel function long description
     *
     * @param string $tableName Description
     * @return object
     **/
    public static function getDefaultGoesIdByExternalModel(string $tableName)
    {
        return DB::table($tableName)->where('default', true)->first()->goes_id;
    }

    /**
     * getDependenciesContingency function summary
     *
     * getDependenciesContingency function long description
     *
     * @return [2, 2]
     **/
    public static function getDependenciesContingency(): array
    {
        $modelTypeId = DB::table('model_types')
            ->where('default', null)
            ->first()->id;

        $operationTypeId = DB::table('operation_types')
            ->where('default', null)
            ->first()->id;

        return [$modelTypeId, $operationTypeId];
    }

    private static function generateBearerToken($body, $objectToken)
    {
        $response = Http::loginapi()->asForm()->post('auth', $body);

        if ($response['status'] !== 'OK') {
            throw new FailedSendException(
                $objectToken,
                json_encode($response['body'])
            );
        }

        return $response['body']['token'];
    }

    public static function getBearerToken(
        $nitEmitter,
        $passwordSigner,
        $passwordApi,
        $dteJson,
        &$registerToken,
    ) {
        $signerDocumentAction = new SignDocumentAction();
        try {
            $registerToken->token = $signerDocumentAction->handler(
                $nitEmitter,
                Crypt::decryptString($passwordSigner),
                json_decode($dteJson)
            );
        } catch (Exception $exception) {
            $registerToken->token = DefaultsEnum::MessageErrorSigner->value;

            throw new FailedSendException(
                $registerToken,
                $exception->getMessage(),
            );
        }

        $bearerToken = Cache::get($nitEmitter);

        if (!$bearerToken) {
            $requestLogin = [
                'user' => $nitEmitter,
                'pwd' =>  Crypt::decryptString($passwordApi),
            ];

            $bearerToken = self::generateBearerToken($requestLogin, $registerToken);
            Cache::put($nitEmitter, $bearerToken, 72000);
        }

        return $bearerToken;
    }

    public static function sendOneToOneDocument($token, $body, DteToken $dteToken, Dte $dte)
    {
        try {
            $response = Http::api($token)->post('/fesv/recepciondte/', $body);
        } catch (\Throwable $th) {
            ContingencyService::manageContigencyFromSpecificDte($dte);
        }

        if ($response->failed()) {
            $dataReponse = json_decode($response->body());

            if (in_array($dataReponse->descripcionMsg, [
                'NO SE HA PROPORCIONADO DATOS PARA VALIDAR',
                'ERROR NO CATALOGADO',
                'PARAMETROS NO SON VALIDOS',
            ])) {
                ContingencyService::manageContigencyFromSpecificDte($dte);
            }

            $dteToken->load(['dte']);
            $dteToken->dte->status = StatusEnum::Rejected->value;
            $dteToken->dte->save();

            throw new FailedSendException(
                $dteToken,
                $response->body()
            );
        }

        return $response->body();
    }

    public static function sendCancellationDocument($token, $body, $cancellationToken)
    {
        $response = Http::api($token)->post('/fesv/anulardte', $body);

        if ($response->failed()) {
            $cancellationToken->load(['cancellation']);
            $cancellationToken->cancellation->status = StatusEnum::Rejected->value;
            $cancellationToken->cancellation->save();

            throw new FailedSendException(
                $cancellationToken,
                $response->body()
            );
        }

        return $response->body();
    }

    public static function getAddressDte($generateCode)
    {
        $dte = Dte::where('generate_code', $generateCode)->first();

        return $dte->only_address;
    }

    public static function sendContingencyDocument($token, $body, $contingencyToken)
    {
        $response = Http::api($token)->post('/fesv/contingencia', $body);

        if ($response->failed() || $response['estado'] == 'RECHAZADO') {
            $contingencyToken->load(['contingency']);
            $contingencyToken->contingency->status = StatusEnum::Rejected->value;
            $contingencyToken->contingency->save();

            throw new FailedSendException(
                $contingencyToken,
                $response->body()
            );
        }

        return $response->body();
    }

    public static function getDocumentCondition($token, $body)
    {
        try {
            $response = Http::api($token)->post('/fesv/recepcion/consultadte/', $body);
        } catch (\Throwable $th) {
            return false;
        }

        if (!isset(json_decode($response->body())->selloRecibido)) {
            return false;
        }

        return $response->body();
    }
}
