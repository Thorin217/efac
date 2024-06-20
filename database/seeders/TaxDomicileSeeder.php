<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\TaxDomicile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxDomicileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaxDomicile::create([
            'goes_id' => 1,
            'name' => 'Domiciliado'
        ]);

        TaxDomicile::create([
            'goes_id' => 2,
            'name' => 'No Domiciliado',
            'default' => true,
        ]);
    }
}
