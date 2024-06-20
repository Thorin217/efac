<?php

namespace Exactum\Efac\Services\Entity;

use Exactum\Efac\Models\Enterprise\Phone;

/**
 * PhoneService class
 **/
final class PhoneService
{
    /**
     * updatePhone function summary
     *
     * updatePhone function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function updatePhone(Phone $phone, array $data)
    {
        $phone->update($data);
    }

    /**
     * deletePhone function summary
     *
     * deletePhone function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function deletePhone(Phone $phone)
    {
        $phone->delete();
    }
}
