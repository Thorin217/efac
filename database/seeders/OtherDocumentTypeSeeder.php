<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\OtherDocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OtherDocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OtherDocumentType::create([
            'goes_id' => 1,
            'name' => 'Emisor'
        ]);

        OtherDocumentType::create([
            'goes_id' => 2,
            'name' => 'Receptor'
        ]);

        /* Disable no apply
        OtherDocumentType::create([
            'goes_id' => 3,
            'name' => 'Médico'
        ]);
        */

        OtherDocumentType::create([
            'goes_id' => 4,
            'name' => 'Transporte'
        ]);
    }
}
