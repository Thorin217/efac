<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\DteType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NreTypeStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nre = DteType::whereName('Nota de remisión')->first();

        $nre->steps()->attach([
            1,
            3,
            5,
            6,
            7,
            8,
            11,
        ]);
    }
}
