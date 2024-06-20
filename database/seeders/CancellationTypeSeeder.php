<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\CancellationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CancellationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CancellationType::create([
            'goes_id' => 1,
            'name' => 'Error en la Información del Documento Tributario Electrónico a invalidar.'
        ]);

        CancellationType::create([
            'goes_id' => 2,
            'name' => 'Rescindir de la operación realizada'
        ]);

        CancellationType::create([
            'goes_id' => 3,
            'name' => 'Otro'
        ]);
    }
}
