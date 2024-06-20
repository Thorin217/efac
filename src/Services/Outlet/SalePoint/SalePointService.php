<?php

namespace Exactum\Efac\Services\Outlet\SalePoint;

use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Models\Enterprise\SalePoint;

/**
 * SalePointService class
 **/
final class SalePointService
{
    /**
     * generateSalePointCode function summary
     *
     * generateSalePointCode function long description
     *
     * @return string
     **/
    private static function generateSalePointCode(): string
    {
        do {
            $helperCode = strtoupper(bin2hex(random_bytes(2)));
        } while (SalePoint::whereCode($helperCode)->count() !== 0);

        return $helperCode;
    }

    /**
     * createDefaultSalePoint function summary
     *
     * createDefaultSalePoint function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public static function createDefaultSalePoint(int $subsidiaryId, string $name)
    {
        SalePoint::create([
            'subsidiary_id' => $subsidiaryId,
            'name' => DefaultsEnum::NameSalePoint->value . $name,
            'code' => self::generateSalePointCode(),
        ]);
    }
}
