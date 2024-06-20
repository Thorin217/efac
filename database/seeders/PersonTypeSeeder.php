<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\PersonType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonType::create([
            'goes_id' => 1,
            'name' => 'Persona Natural'
        ]);

        PersonType::create([
            'goes_id' => 2,
            'name' => 'Persona Jurídica'
        ]);
    }
}
