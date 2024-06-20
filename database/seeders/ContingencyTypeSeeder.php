<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\ContingencyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContingencyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContingencyType::create([
            'goes_id' => 1,
            'name' => 'No disponibilidad de sistema del MH'
        ]);

        ContingencyType::create([
            'goes_id' => 2,
            'name' => 'No disponibilidad de sistema del emisor',
            'default' => true
        ]);

        ContingencyType::create([
            'goes_id' => 3,
            'name' => 'Falla en el suministro de servicio de Internet del Emisor'
        ]);

        ContingencyType::create([
            'goes_id' => 4,
            'name' => 'Falla en el suministro de servicio de energía eléctrica del emisor que impida la transmisión de los DTE'
        ]);

        ContingencyType::create([
            'goes_id' => 5,
            'name' => 'Otro'
        ]);
    }
}
