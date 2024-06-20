<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\PropertyObject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PropertyObject::create([
            'goes_id' => '01',
            'name' => 'Depósito',
        ]);

        PropertyObject::create([
            'goes_id' => '02',
            'name' => 'Propiedad',
        ]);

        PropertyObject::create([
            'goes_id' => '03',
            'name' => 'Consignación',
        ]);

        PropertyObject::create([
            'goes_id' => '04',
            'name' => 'Traslado',
        ]);

        PropertyObject::create([
            'goes_id' => '05',
            'name' => 'Otros',
        ]);
    }
}
