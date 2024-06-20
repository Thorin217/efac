<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::create([
            'goes_id' => '01',
            'name' => 'Billetes y monedas'
        ]);

        PaymentType::create([
            'goes_id' => '02',
            'name' => 'Tarjeta Débito'
        ]);

        PaymentType::create([
            'goes_id' => '03',
            'name' => 'Tarjeta Crédito'
        ]);

        PaymentType::create([
            'goes_id' => '04',
            'name' => 'Cheque'
        ]);

        PaymentType::create([
            'goes_id' => '05',
            'name' => 'Transferencia/Depósito Bancario '
        ]);

        PaymentType::create([
            'goes_id' => '06',
            'name' => 'Vales o Cupones'
        ]);

        PaymentType::create([
            'goes_id' => '08',
            'name' => 'Dinero electrónico'
        ]);

        PaymentType::create([
            'goes_id' => '09',
            'name' => 'Monedero electrónico'
        ]);

        PaymentType::create([
            'goes_id' => '10',
            'name' => 'Certificado o tarjeta de regalo'
        ]);

        PaymentType::create([
            'goes_id' => '11',
            'name' => 'Bitcoin'
        ]);

        PaymentType::create([
            'goes_id' => '12',
            'name' => 'Otras Criptomonedas'
        ]);

        PaymentType::create([
            'goes_id' => '13',
            'name' => 'Cuentas por pagar del receptor'
        ]);

        PaymentType::create([
            'goes_id' => '14',
            'name' => 'Giro bancario'
        ]);

        PaymentType::create([
            'goes_id' => '99',
            'name' => 'Otros'
        ]);
    }
}
