<?php

namespace Exactum\Efac\Services\Entity;

use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Models\Enterprise\EmitterEntity;
use Exactum\Efac\Models\Enterprise\Entity;
use Exactum\Efac\Models\Enterprise\ProductService;
use Exactum\Efac\Models\Enterprise\SalePoint;
use Exactum\Efac\Models\Enterprise\Subsidiary;
use Exactum\Efac\Services\External\ExternalService;
use Exactum\Efac\Services\Outlet\Subsidiary\SubsidiaryService;
use Illuminate\Support\Facades\Crypt;

/**
 * EmitterEntityService class
 **/
final class EmitterEntityService
{
    /**
     * createDefaultDocument function summary
     *
     * createDefaultDocument function long description
     *
     * @param Entity $entity Description
     * @return void
     * @throws conditon
     **/
    private function createDefaultDocument(Entity $entity, string $value)
    {
        $entity->docClientTypes()->attach(ExternalService::getDefaultIdByExternalModel('doc_client_types'), ['value' => $value]);
    }

    /**
     * createEmitter function summary
     *
     * createEmitter function long description
     *
     * @param array<object> $data Description
     * @return EmitterEntity
     * @throws conditon
     **/
    public function createEmitter(Entity $entity, array $data)
    {
        $emitter = EmitterEntity::create([
            'entity_id' => $entity->id,
            'api_password' => Crypt::encryptString($data['api_password']),
            'signer_password' => Crypt::encryptString($data['signer_password']),
        ]);

        $this->createDefaultDocument($entity, (string) $data['nit']);

        SubsidiaryService::createDefaultSubsidiary($emitter->id, (string) $data['name']);
    }

    /**
     * addProductService function summary
     *
     * addProductService function long description
     *
     * @param Entity $entity Description
     * @param array<string> $data Description
     * @return ProductService
     * @throws conditon
     **/
    public function addProductService(Entity $entity, array $data): ProductService
    {
        $data['emitter_entity_id'] =  EmitterEntity::findOrFail($entity->getEntityTypes()['emitter'])->id;

        if (!isset($data['measurement_unit_id'])) {
            $data['measurement_unit_id'] = ExternalService::getDefaultIdByExternalModel('measurement_units');
        }

        $productService = ProductService::create($data);
        $productService->tributesTypes()->attach(ExternalService::getDefaultTributeTypeIds());

        return $productService;
    }

    /**
     * addSpecialTributes function summary`
     *
     * addSpecialTributes function long description
     *
     * @param ProductService $productService Description
     * @param array $tributesTypeIds Description
     * @return void
     **/
    public function addSpecialTributes(ProductService $productService, array $tributesTypeIds)
    {
        $productService->tributesTypes()->attach($tributesTypeIds);
    }

    public function getAllEmitterEntities(array $request)
    {
        $perPage = $request['per_page'] ?? DefaultsEnum::PerPage->value;
        //$user = authUserObject();

        $query = EmitterEntity::query();

        if (!empty($request['filter'])) {
            $query->whereHas('entity', function ($subquery) use ($request) {
                $subquery->where('name', 'LIKE', '%' . $request['filter'] . '%');
            });
        }

        /*
        if (!$user->hasRole('admin')) {
            $entityIds = $user->entities->pluck('id')->toArray();
            $query->whereIn('entity_id', $entityIds);
        }
        */

        return $query->with('entity')->paginate($perPage);
    }

    /**
     * getProductServicesByDte function summary
     *
     * getProductServicesByDte function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function getProductServicesByDte(EmitterEntity $emitterEntity, array $data)
    {
        $perPage = $data['per_page'] ?? DefaultsEnum::PerPage->value;
        $queryProductServices = $emitterEntity->productServices();

        if (isset($data['filter'])) {
            $queryProductServices->where('name', 'LIKE', '%' . $data['filter'] . '%')
                ->orWhere('code', 'LIKE', '%' . $data['filter'] . '%');
        }

        return $queryProductServices->paginate($perPage);
    }

    /**
     * getProductServicesByEntity function summary
     *
     * getProductServicesByEntity function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getProductServicesByEntity(Entity $entity, array $data)
    {
        $queryProductServices =  EmitterEntity::findOrFail($entity->getEntityTypes()['emitter'])->productServices();
        $perPage = $data['per_page'] ?? DefaultsEnum::PerPage->value;

        if (isset($data['filter'])) {
            $queryProductServices->where('name', 'LIKE', '%' . $data['filter'] . '%')
                ->orWhere('code', 'LIKE', '%' . $data['filter'] . '%');
        }

        return $queryProductServices->paginate($perPage);
    }

    /**
     * updateProductService function summary
     *
     * updateProductService function long description
     *
     * @param Type $var Description
     * @return ProductService
     **/
    public function updateProductService(ProductService $productService, array $data)
    {
        if (!isset($data['measurement_unit_id'])) {
            $data['measurement_unit_id'] = ExternalService::getDefaultIdByExternalModel('measurement_units');
        }

        $productService->update($data);
    }

    /**
     * syncSpecialTributes function summary
     *
     * syncSpecialTributes function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function syncSpecialTributes(ProductService $productService, array $tributesTypeIds)
    {
        $productService->tributesTypes()->sync(array_merge($tributesTypeIds, [1, 2])); #phantomIds
    }

    /**
     * createOrUpdateEmitterEntity function summary
     *
     * createOrUpdateEmitterEntity function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function createOrUpdateEmitterEntity(Entity $entity, array $data)
    {
        if (isset($data['api_password']) || isset($data['signer_password'])) {
            $emitterEntityId = $entity->getEntityTypes()['emitter'];

            if ($emitterEntityId) {
                $emitterEntity = EmitterEntity::find($emitterEntityId);

                if (array_key_exists('api_password', $data) && $data['api_password'] !== null)
                    $emitterEntity->update(['api_password' => Crypt::encryptString($data['api_password'])]);

                if (array_key_exists('signer_password', $data) && $data['signer_password'] !== null)
                    $emitterEntity->update(['signer_password' => Crypt::encryptString($data['signer_password'])]);
            } else {
                if (isset($data['api_password']) && isset($data['signer_password'])) {
                    $data['api_password'] = Crypt::encryptString($data['api_password']);
                    $data['signer_password'] = Crypt::encryptString($data['signer_password']);

                    $emitter = $entity->emitterEntities()->create($data);
                    SubsidiaryService::createDefaultSubsidiary($emitter->id, $entity->name);
                }
            }
        }
    }

    /**
     * createSubsidiaryEntity function summary
     *
     * createSubsidiaryEntity function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function createSubsidiaryEntity(Entity $entity, array $data)
    {
        $emitterEntity =  EmitterEntity::findOrFail($entity->getEntityTypes()['emitter']);

        return $emitterEntity->subsidiaries()->create($data);
    }

    /**
     * getAllSubsidiariesByEntity function summary
     *
     * getAllSubsidiariesByEntity function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function getAllSubsidiariesByEntity(Entity $entity, array $data)
    {
        $emitterEntity =  EmitterEntity::findOrFail($entity->getEntityTypes()['emitter']);
        $perPage = isset($data['per_page']) ? $data['per_page'] : DefaultsEnum::PerPage->value;
        $query = $emitterEntity->subsidiaries();

        if (isset($data['filter'])) {
            $query->where('name', 'LIKE', '%' . $data['filter'] . '%');
        }

        return $query->paginate($perPage);
    }

    /**
     * updateSubsidiary function summary
     *
     * updateSubsidiary function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function updateSubsidiary(Subsidiary $subsidiary, array $data)
    {
        $subsidiary->update($data);
    }

    /**
     * createSalePoint function summary
     *
     * createSalePoint function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function createSalePoint(Subsidiary $subsidiary, array $data)
    {
        return $subsidiary->salePoints()->create($data);
    }

    /**
     * getSalePointsBySubsidiary function summary
     *
     * getSalePointsBySubsidiary function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getSalePointsBySubsidiary(Subsidiary $subsidiary, array $data)
    {
        $query = $subsidiary->salePoints();
        $perPage = isset($data['per_page']) ? $data['per_page'] : DefaultsEnum::PerPage->value;

        if (isset($data['filter'])) {
            $query->where('name', 'LIKE', '%' . $data['filter'] . '%');
        }

        return $query->paginate($perPage);
    }

    /**
     * updateSalePoint function summary
     *
     * updateSalePoint function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function updateSalePoint(SalePoint $salePoint, array $data)
    {
        $salePoint->update($data);
    }

    /**
     * createUpdateProductServiceForBooster function summary
     *
     * createUpdateProductServiceForBooster function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public static function createUpdateProductServiceForBooster(Entity $entity, array $data)
    {
        $data['emitter_entity_id'] =  EmitterEntity::findOrFail($entity->getEntityTypes()['emitter'])->id;

        if (!isset($data['measurement_unit_id'])) {
            $data['measurement_unit_id'] = ExternalService::getDefaultIdByExternalModel('measurement_units');
        }

        $productService = ProductService::updateOrCreate(
            ['code' => $data['code']],
            $data
        );

        if ($productService->wasRecentlyCreated) {
            $productService->tributesTypes()->attach(ExternalService::getDefaultTributeTypeIds());
        }
    }
}
