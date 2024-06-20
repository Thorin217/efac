<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\City;
use Exactum\Efac\Models\External\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /**
     * Debido a la proxima reestructuracion de los municipios los dejare con la cantidad que en teoria van a tener a posterior
     * con la esperanza de que no reestructuren y pidan tambien los distritos (ahora conocidos como municipios)
     */
    public function run()
    {
        # AHUACHAPAN
        $department = Department::create([
            'goes_id' => '01',
            'name' => 'Ahuachapán'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'AHUACHAPÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'APANECA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'ATIQUIZAYA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'CONCEPCIÓN DE ATACO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'EL REFUGIO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'GUAYMANGO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'JUJUTLA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'SAN FRANCISCO MENÉNDEZ',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'SAN LORENZO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'SAN PEDRO PUXTLA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'TACUBA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'TURÍN',
            'department_id' => $department->id,
        ]);

        #SANTA ANA
        $department = Department::create([
            'goes_id' => '02',
            'name' => 'Santa Ana'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'CANDELARIA DE LA FRONTERA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'COATEPEQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'CHALCHUAPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'EL CONGO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'EL PORVENIR',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'MASAHUAT',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'METAPÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'SAN ANTONIO PAJONAL',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'SAN SEBASTIÁN SALITRILLO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'SANTA ANA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'STA ROSA GUACHI',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'STGO D LA FRONT',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '13',
            'name' => 'TEXISTEPEQUE',
            'department_id' => $department->id,
        ]);

        #SONSONATE
        $department = Department::create([
            'goes_id' => '03',
            'name' => 'Sonsonate'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'ACAJUTLA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'ARMENIA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'CALUCO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'CUISNAHUAT',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'STA I ISHUATAN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'IZALCO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'JUAYÚA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'NAHUIZALCO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'NAHULINGO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'SALCOATITÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'SAN ANTONIO DEL MONTE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'SAN JULIÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '13',
            'name' => 'STA C MASAHUAT',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '14',
            'name' => 'SANTO DOMINGO GUZMÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '15',
            'name' => 'SONSONATE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '16',
            'name' => 'SONZACATE',
            'department_id' => $department->id,
        ]);

        #CHALATENANGO
        $department = Department::create([
            'goes_id' => '04',
            'name' => 'Chalatenango'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'AGUA CALIENTE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'ARCATAO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'AZACUALPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'CITALÁ',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'COMALAPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'CONCEPCIÓN QUEZALTEPEQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'CHALATENANGO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'ARCATAO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'DULCE NOM MARÍA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'EL PARAÍSO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'LA LAGUNA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'LA PALMA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '13',
            'name' => 'LA REINA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '14',
            'name' => 'LAS VUELTAS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '15',
            'name' => 'NOMBRE DE JESUS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '16',
            'name' => 'NVA CONCEPCIÓN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '17',
            'name' => 'NUEVA TRINIDAD',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '18',
            'name' => 'OJOS DE AGUA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '19',
            'name' => 'POTONICO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '20',
            'name' => 'SAN ANT LA CRUZ',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '21',
            'name' => 'SAN ANT RANCHOS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '22',
            'name' => 'SAN FERNANDO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '23',
            'name' => 'SAN FRANCISCO LEMPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '24',
            'name' => 'SAN FRANCISCO MORAZÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '25',
            'name' => 'SAN IGNACIO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '26',
            'name' => 'SAN I LABRADOR',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '27',
            'name' => 'SAN J CANCASQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '28',
            'name' => 'SAN JOSE FLORES',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '29',
            'name' => 'SAN LUIS CARMEN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '30',
            'name' => 'SN MIG MERCEDES',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '31',
            'name' => 'SAN RAFAEL',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '32',
            'name' => 'SANTA RITA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '33',
            'name' => 'TEJUTLA',
            'department_id' => $department->id,
        ]);

        #LA LIBERTAD
        $department = Department::create([
            'goes_id' => '05',
            'name' => 'La Libertad'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'ANTGO CUSCATLÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'CIUDAD ARCE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'COLON',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'COMASAGUA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'CHILTIUPAN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'HUIZÚCAR',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'JAYAQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'JICALAPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'LA LIBERTAD',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'NUEVO CUSCATLÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'SANTA TECLA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'QUEZALTEPEQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '13',
            'name' => 'SACACOYO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '14',
            'name' => 'SN J VILLANUEVA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '15',
            'name' => 'SAN JUAN OPICO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '16',
            'name' => 'SAN MATÍAS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '17',
            'name' => 'SAN P TACACHICO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '18',
            'name' => 'TAMANIQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '19',
            'name' => 'TALNIQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '20',
            'name' => 'TEOTEPEQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '21',
            'name' => 'TEPECOYO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '22',
            'name' => 'ZARAGOZA',
            'department_id' => $department->id,
        ]);

        #SAN SALVADOR
        $department = Department::create([
            'goes_id' => '06',
            'name' => 'San Salvador'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'AGUILARES',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'APOPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'AYUTUXTEPEQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'CUSCATANCINGO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'EL PAISNAL',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'GUAZAPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'ILOPANGO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'MEJICANOS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'NEJAPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'PANCHIMALCO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'ROSARIO DE MORA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'SAN MARCOS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '13',
            'name' => 'SAN MARTIN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '14',
            'name' => 'SAN SALVADOR',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '15',
            'name' => 'STG TEXACUANGOS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '16',
            'name' => 'SANTO TOMAS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '17',
            'name' => 'SOYAPANGO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '18',
            'name' => 'TONACATEPEQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '19',
            'name' => 'CIUDAD DELGADO',
            'department_id' => $department->id,
        ]);

        # CUSCATLAN
        $department = Department::create([
            'goes_id' => '07',
            'name' => 'Cuscatlán'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'CANDELARIA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'COJUTEPEQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'EL CARMEN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'EL ROSARIO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'MONTE SAN JUAN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'ORAT CONCEPCIÓN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'SAN B PERULAPIA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'SAN CRISTÓBAL',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'SAN J GUAYABAL',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'SAN P PERULAPÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'SAN RAF CEDROS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'SAN RAMON',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '13',
            'name' => 'STA C ANALQUITO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '14',
            'name' => 'STA C MICHAPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '15',
            'name' => 'SUCHITOTO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '16',
            'name' => 'TENANCINGO',
            'department_id' => $department->id,
        ]);

        #LA PAZ
        $department = Department::create([
            'goes_id' => '08',
            'name' => 'La Paz'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'CUYULTITÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'EL ROSARIO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'JERUSALÉN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'MERCED LA CEIBA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'OLOCUILTA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'PARAÍSO OSORIO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'SN ANT MASAHUAT',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'SAN EMIGDIO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'SN FCO CHINAMEC',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'SAN J NONUALCO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'SAN JUAN TALPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'SAN JUAN TEPEZONTES',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '13',
            'name' => 'SAN LUIS TALPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '14',
            'name' => 'SAN MIGUEL TEPEZONTES',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '15',
            'name' => 'SAN PEDRO MASAHUAT',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '16',
            'name' => 'SAN PEDRO NONUALCO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '17',
            'name' => 'SAN R OBRAJUELO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '18',
            'name' => 'STA MA OSTUMA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '19',
            'name' => 'STGO NONUALCO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '20',
            'name' => 'TAPALHUACA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '21',
            'name' => 'ZACATECOLUCA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '22',
            'name' => 'SN LUIS LA HERR',
            'department_id' => $department->id,
        ]);

        #CABAÑAS
        $department = Department::create([
            'goes_id' => '09',
            'name' => 'Cabañas'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'CINQUERA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'GUACOTECTI',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'ILOBASCO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'JUTIAPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'SAN ISIDRO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'SENSUNTEPEQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'TEJUTEPEQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'VICTORIA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'DOLORES',
            'department_id' => $department->id,
        ]);

        #SAN VICENTE
        $department = Department::create([
            'goes_id' => '10',
            'name' => 'San Vicente'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'APASTEPEQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'GUADALUPE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'SAN CAY ISTEPEQ',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'SANTA CLARA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'SANTO DOMINGO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'SN EST CATARINA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'SAN ILDEFONSO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'SAN LORENZO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'SAN SEBASTIÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'SAN VICENTE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'TECOLUCA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'TEPETITÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '13',
            'name' => 'VERAPAZ',
            'department_id' => $department->id,
        ]);

        #USULUTAN
        $department = Department::create([
            'goes_id' => '11',
            'name' => 'Usulután'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'ALEGRÍA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'BERLÍN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'CALIFORNIA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'CONCEP BATRES',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'EL TRIUNFO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'EREGUAYQUÍN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'ESTANZUELAS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'JIQUILISCO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'JUCUAPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'JUCUARÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'MERCEDES UMAÑA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'NUEVA GRANADA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '13',
            'name' => 'OZATLÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '14',
            'name' => 'PTO EL TRIUNFO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '15',
            'name' => 'SAN AGUSTÍN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '16',
            'name' => 'SN BUENAVENTURA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '17',
            'name' => 'SAN DIONISIO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '18',
            'name' => 'SANTA ELENA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '19',
            'name' => 'SAN FCO JAVIER',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '20',
            'name' => 'SANTA MARÍA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '21',
            'name' => 'STGO DE MARÍA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '22',
            'name' => 'TECAPÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '23',
            'name' => 'USULUTÁN',
            'department_id' => $department->id,
        ]);

        #SAN MIGUEL
        $department = Department::create([
            'goes_id' => '12',
            'name' => 'San Miguel'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'CAROLINA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'CIUDAD BARRIOS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'COMACARÁN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'CHAPELTIQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'CHINAMECA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'CHIRILAGUA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'EL TRANSITO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'LOLOTIQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'MONCAGUA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'NUEVA GUADALUPE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'NVO EDÉN S JUAN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'QUELEPA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '13',
            'name' => 'SAN ANT D MOSCO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '14',
            'name' => 'SAN GERARDO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '15',
            'name' => 'SAN JORGE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '16',
            'name' => 'SAN LUIS REINA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '17',
            'name' => 'SAN MIGUEL',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '18',
            'name' => 'SAN RAF ORIENTE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '19',
            'name' => 'SESORI',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '20',
            'name' => 'ULUAZAPA',
            'department_id' => $department->id,
        ]);

        #MORAZAN
        $department = Department::create([
            'goes_id' => '13',
            'name' => 'Morazán'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'ARAMBALA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'CACAOPERA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'CORINTO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'CHILANGA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'DELIC DE CONCEP',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'EL DIVISADERO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'EL ROSARIO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'GUALOCOCTI',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'GUATAJIAGUA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'JOATECA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'JOCOAITIQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'JOCORO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '13',
            'name' => 'LOLOTIQUILLO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '14',
            'name' => 'MEANGUERA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '15',
            'name' => 'OSICALA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '16',
            'name' => 'PERQUÍN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '17',
            'name' => 'SAN CARLOS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '18',
            'name' => 'SAN FERNANDO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '19',
            'name' => 'SAN FCO GOTERA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '20',
            'name' => 'SAN ISIDRO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '21',
            'name' => 'SAN SIMÓN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '22',
            'name' => 'SENSEMBRA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '23',
            'name' => 'SOCIEDAD',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '24',
            'name' => 'TOROLA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '25',
            'name' => 'YAMABAL',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '26',
            'name' => 'YOLOAIQUÍN',
            'department_id' => $department->id,
        ]);

        #LA UNION
        $department = Department::create([
            'goes_id' => '14',
            'name' => 'La Unión'
        ]);

        City::create([
            'goes_id' => '01',
            'name' => 'ANAMOROS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '02',
            'name' => 'BOLÍVAR',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '03',
            'name' => 'CONCEP DE OTE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '04',
            'name' => 'CONCHAGUA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '05',
            'name' => 'EL CARMEN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '06',
            'name' => 'EL SAUCE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '07',
            'name' => 'INTIPUCÁ',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '08',
            'name' => 'LA UNIÓN',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '09',
            'name' => 'LISLIQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '10',
            'name' => 'MEANG DEL GOLFO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '11',
            'name' => 'NUEVA ESPARTA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '12',
            'name' => 'PASAQUINA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '13',
            'name' => 'POLORÓS',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '14',
            'name' => 'SAN ALEJO',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '15',
            'name' => 'SAN JOSE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '16',
            'name' => 'SANTA ROSA LIMA',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '17',
            'name' => 'YAYANTIQUE',
            'department_id' => $department->id,
        ]);
        City::create([
            'goes_id' => '18',
            'name' => 'YUCUAIQUÍN',
            'department_id' => $department->id,
        ]);
    }
}
