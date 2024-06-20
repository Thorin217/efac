<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\Term;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Term::create([
            'goes_id' => '01',
            'name' => 'Días'
        ]);

        Term::create([
            'goes_id' => '02',
            'name' => 'Meses'
        ]);

        Term::create([
            'goes_id' => '03',
            'name' => 'Años'
        ]);
    }
}
