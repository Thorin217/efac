<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\Incoterm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncotermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incoterm::create([
            'goes_id' => '01',
            'name' => 'EXW-En fabrica'
        ]);

        Incoterm::create([
            'goes_id' => '02',
            'name' => 'FCA-Libre transportista'
        ]);

        Incoterm::create([
            'goes_id' => '03',
            'name' => 'CPT-Transporte pagado hasta'
        ]);

        Incoterm::create([
            'goes_id' => '04',
            'name' => 'CIP-Transporte y seguro pagado hasta'
        ]);

        Incoterm::create([
            'goes_id' => '05',
            'name' => 'DAP-Entrega en el lugar'
        ]);

        Incoterm::create([
            'goes_id' => '06',
            'name' => 'DPU-Entregado en el lugar descargado'
        ]);

        Incoterm::create([
            'goes_id' => '07',
            'name' => 'DDP-Entrega con impuestos pagados'
        ]);

        Incoterm::create([
            'goes_id' => '08',
            'name' => 'FAS-Libre al costado del buque'
        ]);

        Incoterm::create([
            'goes_id' => '09',
            'name' => 'FOB-Libre a bordo'
        ]);

        Incoterm::create([
            'goes_id' => '10',
            'name' => 'CFR-Costo y flete'
        ]);

        Incoterm::create([
            'goes_id' => '11',
            'name' => 'CIF- Costo seguro y flete'
        ]);

        Incoterm::create([
            'goes_id' => '12',
            'name' => 'DAT-Entregado en terminal'
        ]);

        Incoterm::create([
            'goes_id' => '13',
            'name' => 'DAF-Entregada en frontera'
        ]);

        Incoterm::create([
            'goes_id' => '14',
            'name' => 'DES-Entregada sobre duque'
        ]);

        Incoterm::create([
            'goes_id' => '15',
            'name' => 'DEQ-Entregada en muelle'
        ]);

        Incoterm::create([
            'goes_id' => '16',
            'name' => 'DDU- Entregada derechos no pagados'
        ]);
    }
}
