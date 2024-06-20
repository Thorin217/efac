<?php

namespace Exactum\Efac\Services\Entity;

use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Exceptions\CustomHttpException;
use Exactum\Efac\Http\Resources\External\Booster\EntityBoosterResource;
use Exactum\Efac\Models\Enterprise\Entity;
use Exactum\Efac\Models\Enterprise\ReceiverEntity;
use Exactum\Efac\Services\External\ExternalService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

/**
 * ReceiverEntityService class
 **/
final class ReceiverEntityService
{
    /**
     * createReceiver function summary
     *
     * createReceiver function long description
     *
     * @param array<object> $data Description
     * @return ReceiverEntity
     * @throws conditon
     **/
    public function createReceiver(Entity $entity, array $data)
    {
        $data['entity_id'] = $entity->id;

        if (!isset($data['country_id'])) {
            $data['country_id'] = ExternalService::getDefaultIdByExternalModel('countries');
        }

        ReceiverEntity::create($data);
    }

    /**
     * index function summary
     *
     * index function long description
     *
     * @param array $request Description
     * @return Object
     **/
    public function getAllReceiverEntities(array $request)
    {
        $perPage = $request['per_page'] ?? DefaultsEnum::PerPage->value;

        $query = ReceiverEntity::query();

        $query->whereHas('entity', function ($subquery) use ($request) {
            $subquery->where('entity_id', authCurrentMainEntity()->id);

            if (!empty($request['filter'])) {
                $subquery->where('name', 'LIKE', '%' . $request['filter'] . '%');
            }
        });


        return $query->paginate($perPage);
    }

    /**
     * createOrUpdateReceiverEntity function summary
     *
     * createOrUpdateReceiverEntity function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function createOrUpdateReceiverEntity(Entity $entity, array $data)
    {
        $receiverEntityId = $entity->getEntityTypes()['receiver'];

        if ($receiverEntityId) {
            ReceiverEntity::find($receiverEntityId)->update($data);
        } else {
            if (isset($data['sale_type_id']))
                $this->createReceiver($entity, $data);
        }
    }
}
