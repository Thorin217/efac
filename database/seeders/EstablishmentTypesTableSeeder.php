<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\EstablishmentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstablishmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstablishmentType::create([
            'goes_id' => '01',
            'name' => 'Sucursal / Agencia',
            'default' => true,
        ]);

        EstablishmentType::create([
            'goes_id' => '02',
            'name' => 'Casa matriz',
        ]);

        EstablishmentType::create([
            'goes_id' => '04',
            'name' => 'Bodega',
        ]);

        EstablishmentType::create([
            'goes_id' => '07',
            'name' => 'Predio y/o patio',
        ]);

        EstablishmentType::create([
            'goes_id' => '20',
            'name' => 'Otro',
        ]);
    }
}
