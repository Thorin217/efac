<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\TransportMode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransportMode::create([
            'goes_id' => 1,
            'name' => 'Terrestre'
        ]);

        TransportMode::create([
            'goes_id' => 2,
            'name' => 'Marítimo'
        ]);

        TransportMode::create([
            'goes_id' => 3,
            'name' => 'Aéreo'
        ]);

        TransportMode::create([
            'goes_id' => 4,
            'name' => 'Multimodal, Terrestre-marítimo'
        ]);

        TransportMode::create([
            'goes_id' => 5,
            'name' => 'Multimodal, Terrestre-aéreo'
        ]);

        TransportMode::create([
            'goes_id' => 6,
            'name' => 'Multimodal, Marítimo- aéreo'
        ]);

        TransportMode::create([
            'goes_id' => 7,
            'name' => 'Multimodal, Terrestre-Marítimo- aéreo'
        ]);
    }
}
