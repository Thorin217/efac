<?php

namespace Exactum\Efac;

class Efac
{
    public static $countryModel = 'App\\Models\\Country';

    public static $productServiceModel = 'App\\Models\\Product';

    public static $productServicesTable = 'product_services';

    public static $measurementUnitTable = 'measurement_units';

    public static $userModel = 'App\\Models\\User';

    public static $userTable = 'users';

    public static function useUserModel(string $model)
    {
        static::$userModel = $model;

        return new static;
    }

    public static function useUserTable(string $table)
    {
        static::$userTable = $table;

        return new static;
    }

    public static function useMeasurementUnitTable(string $table)
    {
        static::$measurementUnitTable = $table;

        return new static;
    }

    public static function useProductServiceTable(string $table)
    {
        static::$productServicesTable = $table;

        return new static;
    }

    public static function useProductServiceModel(string $model)
    {
        static::$productServiceModel = $model;

        return new static;
    }

    public static function measurementUnitTable()
    {
        return static::$measurementUnitTable;
    }

    public static function productServiceModel()
    {
        return static::$productServiceModel;
    }

    public static function newProductServiceModel()
    {
        $model = static::productServiceModel();

        return new $model;
    }
}