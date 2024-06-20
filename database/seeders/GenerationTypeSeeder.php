<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\GenerationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenerationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GenerationType::create([
            'goes_id' => 1,
            'name' => 'Físico'
        ]);

        GenerationType::create([
            'goes_id' => 2,
            'name' => 'Electrónico',
            'default' => true,
        ]);
    }
}
