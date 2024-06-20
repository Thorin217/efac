<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\DocClientType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocClientTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocClientType::create([
            'goes_id' => '36',
            'name' => 'NIT',
            'weight' => 1,
            'default' => true
        ]);

        DocClientType::create([
            'goes_id' => '13',
            'name' => 'DUI',
            'weight' => 2
        ]);

        DocClientType::create([
            'goes_id' => '37',
            'name' => 'Otro',
            'weight' => 5
        ]);

        DocClientType::create([
            'goes_id' => '03',
            'name' => 'Pasaporte',
            'weight' => 3
        ]);

        DocClientType::create([
            'goes_id' => '02',
            'name' => 'Carnet de Residente',
            'weight' => 4
        ]);
    }
}
