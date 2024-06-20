<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\SaleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SaleType::create([
            'name' => 'No sujeta',
        ]);

        SaleType::create([
            'name' => 'Exenta',
        ]);

        SaleType::create([
            'name' => 'Gravada',
            'default' => true,
        ]);

        SaleType::create([
            'name' => 'No gravada',
        ]);
    }
}
