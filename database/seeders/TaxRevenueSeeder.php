<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\TaxRevenue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaxRevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaxRevenue::create([
            'goes_id' => '01',
            'name' => 'Terrestre San Bartolo'
        ]);

        TaxRevenue::create([
            'goes_id' => '02',
            'name' => 'Marítima de Acajutla'
        ]);

        TaxRevenue::create([
            'goes_id' => '03',
            'name' => 'Aérea Monseñor Óscar Arnulfo Romero'
        ]);

        TaxRevenue::create([
            'goes_id' => '04',
            'name' => 'Terrestre Las Chinamas'
        ]);

        TaxRevenue::create([
            'goes_id' => '05',
            'name' => 'Terrestre La Hachadura'
        ]);

        TaxRevenue::create([
            'goes_id' => '06',
            'name' => 'Terrestre Santa Ana'
        ]);

        TaxRevenue::create([
            'goes_id' => '07',
            'name' => 'Terrestre San Cristóbal'
        ]);

        TaxRevenue::create([
            'goes_id' => '08',
            'name' => 'Terrestre Anguiatú'
        ]);

        TaxRevenue::create([
            'goes_id' => '09',
            'name' => 'Terrestre El Amatillo'
        ]);

        TaxRevenue::create([
            'goes_id' => '10',
            'name' => 'Marítima La Unión (Puerto Cutuco)'
        ]);

        TaxRevenue::create([
            'goes_id' => '11',
            'name' => 'Terrestre El Poy'
        ]);

        TaxRevenue::create([
            'goes_id' => '12',
            'name' => 'Aduana Terrestre Metalío'
        ]);

        TaxRevenue::create([
            'goes_id' => '15',
            'name' => 'Fardos Postales'
        ]);

        TaxRevenue::create([
            'goes_id' => '16',
            'name' => 'Z.F. San Marcos'
        ]);

        TaxRevenue::create([
            'goes_id' => '17',
            'name' => 'Z.F. El Pedregal'
        ]);

        TaxRevenue::create([
            'goes_id' => '18',
            'name' => 'Z.F. San Bartolo'
        ]);

        TaxRevenue::create([
            'goes_id' => '20',
            'name' => 'Z.F. Exportsalva'
        ]);

        TaxRevenue::create([
            'goes_id' => '21',
            'name' => 'Z.F. American Park'
        ]);

        TaxRevenue::create([
            'goes_id' => '23',
            'name' => 'Z.F. Internacional'
        ]);

        TaxRevenue::create([
            'goes_id' => '24',
            'name' => 'Z.F. Diez'
        ]);

        TaxRevenue::create([
            'goes_id' => '26',
            'name' => 'Z.F. Miramar'
        ]);

        TaxRevenue::create([
            'goes_id' => '27',
            'name' => 'Z.F. Santo Tomas'
        ]);

        TaxRevenue::create([
            'goes_id' => '28',
            'name' => 'Z.F. Santa Tecla'
        ]);

        TaxRevenue::create([
            'goes_id' => '29',
            'name' => 'Z.F. Santa Ana'
        ]);

        TaxRevenue::create([
            'goes_id' => '30',
            'name' => 'Z.F. La Concordia'
        ]);

        TaxRevenue::create([
            'goes_id' => '31',
            'name' => 'Aérea Ilopango'
        ]);

        TaxRevenue::create([
            'goes_id' => '32',
            'name' => 'Z.F. Pipil'
        ]);

        TaxRevenue::create([
            'goes_id' => '33',
            'name' => 'Puerto Barillas'
        ]);

        TaxRevenue::create([
            'goes_id' => '34',
            'name' => 'Z.F. Calvo Conservas'
        ]);

        TaxRevenue::create([
            'goes_id' => '35',
            'name' => 'Feria Internacional'
        ]);

        TaxRevenue::create([
            'goes_id' => '36',
            'name' => 'Delg. Aduana El Papalón'
        ]);

        TaxRevenue::create([
            'goes_id' => '37',
            'name' => 'Z.F. Parque Industrial Sam-Li'
        ]);

        TaxRevenue::create([
            'goes_id' => '38',
            'name' => 'Z.F. San José'
        ]);

        TaxRevenue::create([
            'goes_id' => '39',
            'name' => 'Z.F. Las Mercedes'
        ]);

        TaxRevenue::create([
            'goes_id' => '71',
            'name' => 'Almacenes De Desarrollo (Aldesa)'
        ]);

        TaxRevenue::create([
            'goes_id' => '72',
            'name' => 'Almac. Gral. Dep. Occidente (Agdosa)'
        ]);

        TaxRevenue::create([
            'goes_id' => '73',
            'name' => 'Bodega General De Depósito (Bodesa)'
        ]);

        TaxRevenue::create([
            'goes_id' => '76',
            'name' => 'DHL'
        ]);

        TaxRevenue::create([
            'goes_id' => '77',
            'name' => 'Transauto (Santa Elena)'
        ]);

        TaxRevenue::create([
            'goes_id' => '80',
            'name' => 'Almacenadora Nejapa, S.a. de C.V.'
        ]);

        TaxRevenue::create([
            'goes_id' => '81',
            'name' => 'Almacenadora Almaconsa S.A. De C.V.'
        ]);

        TaxRevenue::create([
            'goes_id' => '83',
            'name' => 'Alm.Gral. Depósito Occidente (Apopa)'
        ]);

        TaxRevenue::create([
            'goes_id' => '99',
            'name' => 'San Bartolo Envío Hn/Gt'
        ]);
    }
}
