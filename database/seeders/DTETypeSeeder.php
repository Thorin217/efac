<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\DteType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DTETypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DteType::create([
            'goes_id' => '01',
            'name' => 'Factura',
            'last_version' => 1,
        ]);

        DteType::create([
            'goes_id' => '03',
            'name' => 'Comprobante de crédito fiscal',
            'last_version' => 3
        ]);

        DteType::create([
            'goes_id' => '04',
            'name' => 'Nota de remisión',
            'last_version' => 3
        ]);

        DteType::create([
            'goes_id' => '05',
            'name' => 'Nota de crédito',
            'last_version' => 3
        ]);

        DteType::create([
            'goes_id' => '06',
            'name' => 'Nota de débito',
            'last_version' => 3
        ]);

        DteType::create([
            'goes_id' => '07',
            'name' => 'Comprobante de retención',
            'last_version' => 1
        ]);

        DteType::create([
            'goes_id' => '08',
            'name' => 'Comprobante de liquidación',
            'last_version' => 1
        ]);

        DteType::create([
            'goes_id' => '09',
            'name' => 'Documento contable de liquidación',
            'last_version' => 1
        ]);

        DteType::create([
            'goes_id' => '11',
            'name' => 'Facturas de exportación',
            'last_version' => 1
        ]);

        DteType::create([
            'goes_id' => '14',
            'name' => 'Factura de sujeto excluido',
            'last_version' => 1
        ]);

        DteType::create([
            'goes_id' => '15',
            'name' => 'Comprobante de donación',
            'last_version' => 1
        ]);
    }
}
