<?php

namespace Exactum\Efac\Services\Events;

use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Enums\StatusEnum;
use Exactum\Efac\Models\Event\Cancellation;

/**
 * CancellationService class
 **/
final class CancellationService
{
    /**
     * createCancellation function summary
     *
     * createCancellation function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function createCancellation(array $data)
    {
        if (isset($data['cancellation_type_id']) && $data['cancellation_type_id'] == 2) {
            $data['new_dte_id'] = null;
        }

        $data['status'] = StatusEnum::Processing->value;

        return Cancellation::create($data);
    }

    /**
     * getAllCancellations function summary
     *
     * getAllCancellations function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function getAllCancellations(array $data)
    {
        $query = Cancellation::query()
            ->whereUserId(authUserId())
            ->orderBy('created_at', 'desc');
        $perPage = isset($data['per_page']) ? $data['per_page'] : DefaultsEnum::PerPage->value;

        if (isset($data['filter'])) {
            $query->whereHas('dte', function ($query) use ($data) {
                $query->where('number_control', 'LIKE', '%' . $data['filter'] . '%');
            });
        }

        return $query->paginate($perPage);
    }
}
