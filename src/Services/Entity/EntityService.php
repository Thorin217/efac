<?php

namespace Exactum\Efac\Services\Entity;

use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Exceptions\CustomHttpException;
use Exactum\Efac\Models\Enterprise\DocClientTypeEntity;
use Exactum\Efac\Models\Enterprise\Entity;
use Carbon\Carbon;

/**
 * EntityService class
 */
final class EntityService
{
    /**
     * createEntity function summary
     *
     * createEntity function long description
     *
     * @param array<object> $data Description
     * @return Entity
     **/
    public function createEntity(array $data)
    {
        return Entity::create($data);
    }

    /**
     * addEntityPhones function summary
     *
     * addEntityPhones function long description
     *
     * @param Entity $entity Description
     * @param array<string> $data Description
     * @return Entity
     * @throws phones.length >= 3
     * #TODO: validate not repeat numbers in same entity
     **/
    public function addEntityPhones(Entity $entity, array $data)
    {
        if ($entity->phones->count() >= 3) {
            throw new CustomHttpException("Superaste el numero maximo de numeros telefonicos", 400);
        }

        $entity->phones()->create([
            'value' => $data['phone'] ?? null,
            'extension' => $data['extension'] ?? null,
        ]);
    }

    /**
     * addEntityDocs function summary
     *
     * addEntityDocs function long description
     *
     * @param Entity $entity Description
     * @param array<string> $data Description
     * @return Entity
     * @throws conditon
     *
     **/
    public function addEntityDocs(Entity $entity, array $data)
    {
        $entity->docClientTypes()->attach($data['doc_client_type_id'], ['value' => $data['value']]);
    }

    /**
     * updateGeneralEntityInfo function summary
     *
     * updateGeneralEntityInfo function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function updateGeneralEntityInfo(Entity $entity, array $data)
    {
        $entity->update($data);
    }

    /**
     * getAllEntities function summary
     *
     * getAllEntities function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function getAllEntities(array $data)
    {
        $perPage = isset($data['per_page']) ? $data['per_page'] : DefaultsEnum::PerPage->value;
        $query = Entity::query();

        if (isset($data['filter'])) {
            $query->where('name', 'LIKE', '%' . $data['filter'] . '%');
        }

        return $query->paginate($perPage);
    }

    /**
     * getDocClientEntity function summary
     *
     * getDocClientEntity function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function getDocClientEntity(Entity $entity)
    {
        return $entity->docClientTypes()->withPivot('id')->get();
    }

    /**
     * updateDocClientEntity function summary
     *
     * updateDocClientEntity function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function  updateDocClientEntity(DocClientTypeEntity $docClientTypeEntity, array $data)
    {
        $docClientTypeEntity->update($data);

        return $docClientTypeEntity;
    }

    /**
     * deleteEntityDocEntity function summary
     *
     * deleteEntityDocEntity function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function deleteDocClientEntity(DocClientTypeEntity $docClientTypeEntity)
    {
        if (
            !DocClientTypeEntity::where('entity_id', $docClientTypeEntity->entity_id)
                ->where('id', '!=', $docClientTypeEntity->id)
                ->exists()
        ) {
            throw new CustomHttpException('No se puede eliminar solamente existe un documento');
        }

        $docClientTypeEntity->delete();
    }

    /**
     * getPhoneEntity function summary
     *
     * getPhoneEntity function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getPhoneEntity(Entity $entity)
    {
        return $entity->phones()->get();
    }

    /**
     * updateEntityPhone function summary
     *
     * updateEntityPhone function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function updateEntityPhone(Entity $entity, array $data)
    {
        $phone = $entity->phones()->first();
        $phone->value = $data['phone'] ?? $phone->value;
        $phone->extension = $data['extension'] ?? $phone->extension;
        $phone->save();
    }

    /**
     * updatePhotoEntity function summary
     *
     * updatePhotoEntity function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function updatePhotoEntity(Entity $entity, $request)
    {
        $fileDelete = public_path('img/pdf/' . $entity->photo);

        // Save image
        $file = $request->file('photo');
        $fileName = Carbon::now()->timestamp . '_' . $file->getClientOriginalName();
        $file->move(public_path('img/pdf'), $fileName);

        // Save info
        if (file_exists($fileDelete))
            unlink($fileDelete);

        $entity->photo = $fileName;
        $entity->save();
    }
}
