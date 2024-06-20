<?php

namespace Exactum\Efac\Services\Outlet\Subsidiary;

use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Models\Enterprise\EmitterEntity;
use Exactum\Efac\Models\Enterprise\Subsidiary;
use Exactum\Efac\Services\External\ExternalService;
use Exactum\Efac\Services\Outlet\SalePoint\SalePointService;

/**
 * SubsidiaryService class
 */
final class SubsidiaryService
{
    /**
     * generateSubsidiaryCode function summary
     *
     * generateSubsidiaryCode function long description
     *
     * @return string
     **/
    private static function generateSubsidiaryCode(): string
    {
        do {
            $helperCode = strtoupper(bin2hex(random_bytes(2)));
        } while (Subsidiary::whereCode($helperCode)->count() !== 0);

        return $helperCode;
    }

    /**
     * createDefaultSubsidiary function summary
     *
     * createDefaultSubsidiary function long description
     *
     * @param Type $var Description
     * @return Subsidiary
     **/
    public static function createDefaultSubsidiary(int $entityId, string $name)
    {
        $emitterInfo = EmitterEntity::find($entityId)->load(['entity']); #TODO: working in improve

        $subsidiary = Subsidiary::create([
            'establishment_type_id' => ExternalService::getDefaultIdByExternalModel('establishment_types'),
            'emitter_entity_id' => $entityId,
            'name' => DefaultsEnum::NameSubsidiary->value . $name,
            'code' => Self::generateSubsidiaryCode(),
            'default' => true,
            'city_id' => $emitterInfo->entity->city_id,
            'address_complement' => $emitterInfo->entity->address_complement,
        ]);

        SalePointService::createDefaultSalePoint($subsidiary->id, $name);
    }
}
