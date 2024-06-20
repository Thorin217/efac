<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\ModelType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelType::create([
            'goes_id' => 1,
            'name' => 'Modelo Facturación previo',
            'default' => true
        ]);

        ModelType::create([
            'goes_id' => 2,
            'name' => 'Modelo Facturación diferido'
        ]);
    }
}
