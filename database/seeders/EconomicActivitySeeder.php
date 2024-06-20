<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\EconomicActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EconomicActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EconomicActivity::create([
            'goes_id' => '01111',
            'name' => 'Cultivo de cereales excepto arroz y para forrajes',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01112',
            'name' => 'Cultivo de legumbres',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01113',
            'name' => 'Cultivo de semillas oleaginosas',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01114',
            'name' => 'Cultivo de plantas para la preparación de semillas',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01119',
            'name' => 'Cultivo de otros cereales excepto arroz y forrajeros n.c.p.',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01120',
            'name' => 'Cultivo de arroz',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01131',
            'name' => 'Cultivo de raíces y tubérculos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01132',
            'name' => 'Cultivo de brotes, bulbos, vegetales tubérculos y cultivos similares',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01133',
            'name' => 'Cultivo hortícola de fruto',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01134',
            'name' => 'Cultivo de hortalizas de hoja y otras hortalizas ncp',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01140',
            'name' => 'Cultivo de caña de azúcar',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01150',
            'name' => 'Cultivo de tabaco',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01161',
            'name' => 'Cultivo de algodón',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01162',
            'name' => 'Cultivo de fibras vegetales excepto algodón',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01191',
            'name' => 'Cultivo de plantas no perennes para la producción de semillas y flores',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01192',
            'name' => 'Cultivo de cereales y pastos para la alimentación animal',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01199',
            'name' => 'Producción de cultivos no estacionales ncp',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01220',
            'name' => 'Cultivo de frutas tropicales',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01230',
            'name' => 'Cultivo de cítricos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01240',
            'name' => 'Cultivo de frutas de pepita y hueso',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01251',
            'name' => 'Cultivo de frutas ncp',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01252',
            'name' => 'Cultivo de otros frutos y nueces de árboles y arbustos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01260',
            'name' => 'Cultivo de frutos oleaginosos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01271',
            'name' => 'Cultivo de café',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01272',
            'name' => 'Cultivo de plantas para la elaboración de bebidas excepto café',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01281',
            'name' => 'Cultivo de especias y aromáticas',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01282',
            'name' => 'Cultivo de plantas para la obtención de productos medicinales y farmacéuticos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01291',
            'name' => 'Cultivo de árboles de hule (caucho) para la obtención de látex',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01292',
            'name' => 'Cultivo de plantas para la obtención de productos químicos y colorantes',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01299',
            'name' => 'Producción de cultivos perennes ncp',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01300',
            'name' => 'Propagación de plantas',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01301',
            'name' => 'Cultivo de plantas y flores ornamentales',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01410',
            'name' => 'Cría y engorde de ganado bovino',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01420',
            'name' => 'Cría de caballos y otros equinos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01440',
            'name' => 'Cría de ovejas y cabras',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01450',
            'name' => 'Cría de cerdos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01460',
            'name' => 'Cría de aves de corral y producción de huevos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01491',
            'name' => 'Cría de abejas apicultura para la obtención de miel y otros productos apícolas',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01492',
            'name' => 'Cría de conejos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01493',
            'name' => 'Cría de iguanas y garrobos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01494',
            'name' => 'Cría de mariposas y otros insectos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01499',
            'name' => 'Cría y obtención de productos animales n.c.p.',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01500',
            'name' => 'Cultivo de productos agrícolas en combinación con la cría de animales',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01611',
            'name' => 'Servicios de maquinaria agrícola',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01612',
            'name' => 'Control de plagas',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01613',
            'name' => 'Servicios de riego',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01614',
            'name' => 'Servicios de contratación de mano de obra para la agricultura',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01619',
            'name' => 'Servicios agrícolas ncp',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01621',
            'name' => 'Actividades para mejorar la reproducción, el crecimiento y el rendimiento de los animales y sus productos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01622',
            'name' => 'Servicios de mano de obra pecuaria',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01629',
            'name' => 'Servicios pecuarios ncp',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01631',
            'name' => 'Labores post cosecha de preparación de los productos agrícolas para su comercialización o para la industria',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01632',
            'name' => 'Servicio de beneficio de café',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01633',
            'name' => 'Servicio de beneficiado de plantas textiles (incluye el beneficiado cuando este es realizado en la misma explotación agropecuaria)',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01640',
            'name' => 'Tratamiento de semillas para la propagación',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '01700',
            'name' => 'Caza ordinaria y mediante trampas, repoblación de animales de caza y servicios conexos',
            'classification' => 1,
        ]);

        EconomicActivity::create([
            'goes_id' => '02100',
            'name' => 'Silvicultura y otras actividades forestales',
            'classification' => 2,
        ]);

        EconomicActivity::create([
            'goes_id' => '02200',
            'name' => 'Extracción de madera',
            'classification' => 2,
        ]);

        EconomicActivity::create([
            'goes_id' => '02300',
            'name' => 'Recolección de productos diferentes a la madera',
            'classification' => 2,
        ]);

        EconomicActivity::create([
            'goes_id' => '02400',
            'name' => 'Servicios de apoyo a la silvicultura',
            'classification' => 2,
        ]);

        EconomicActivity::create([
            'goes_id' => '03110',
            'name' => 'Pesca marítima de altura y costera',
            'classification' => 3,
        ]);

        EconomicActivity::create([
            'goes_id' => '03120',
            'name' => 'Pesca de agua dulce',
            'classification' => 3,
        ]);

        EconomicActivity::create([
            'goes_id' => '03210',
            'name' => 'Acuicultura marítima',
            'classification' => 3,
        ]);

        EconomicActivity::create([
            'goes_id' => '03220',
            'name' => 'Acuicultura de agua dulce',
            'classification' => 3,
        ]);

        EconomicActivity::create([
            'goes_id' => '03300',
            'name' => 'Servicios de apoyo a la pesca y acuicultura',
            'classification' => 3,
        ]);

        EconomicActivity::create([
            'goes_id' => '05100',
            'name' => 'Extracción de hulla',
            'classification' => 4,
        ]);

        EconomicActivity::create([
            'goes_id' => '05200',
            'name' => 'Extracción y aglomeración de lignito',
            'classification' => 4,
        ]);

        EconomicActivity::create([
            'goes_id' => '06100',
            'name' => 'Extracción de petróleo crudo',
            'classification' => 5,
        ]);

        EconomicActivity::create([
            'goes_id' => '06200',
            'name' => 'Extracción de gas natural',
            'classification' => 5,
        ]);

        EconomicActivity::create([
            'goes_id' => '07100',
            'name' => 'Extracción de minerales de hierro',
            'classification' => 6,
        ]);

        EconomicActivity::create([
            'goes_id' => '07210',
            'name' => 'Extracción de minerales de uranio y torio',
            'classification' => 6,
        ]);

        EconomicActivity::create([
            'goes_id' => '07290',
            'name' => 'Extracción de minerales metalíferos no ferrosos',
            'classification' => 6,
        ]);

        EconomicActivity::create([
            'goes_id' => '08100',
            'name' => 'Extracción de piedra, arena y arcilla',
            'classification' => 7,
        ]);

        EconomicActivity::create([
            'goes_id' => '08910',
            'name' => 'Extracción de minerales para la fabricación de abonos y productos químicos',
            'classification' => 7,
        ]);

        EconomicActivity::create([
            'goes_id' => '08920',
            'name' => 'Extracción y aglomeración de turba',
            'classification' => 7,
        ]);

        EconomicActivity::create([
            'goes_id' => '08930',
            'name' => 'Extracción de sal',
            'classification' => 7,
        ]);

        EconomicActivity::create([
            'goes_id' => '08990',
            'name' => 'Explotación de otras minas y canteras ncp',
            'classification' => 7,
        ]);

        EconomicActivity::create([
            'goes_id' => '09100',
            'name' => 'Actividades de apoyo a la extracción de petróleo y gas natural',
            'classification' => 8,
        ]);

        EconomicActivity::create([
            'goes_id' => '09900',
            'name' => 'Actividades de apoyo a la explotación de minas y canteras',
            'classification' => 8,
        ]);

        EconomicActivity::create([
            'goes_id' => '10101',
            'name' => 'Servicio de rastros y mataderos de bovinos y porcinos',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10102',
            'name' => 'Matanza y procesamiento de bovinos y porcinos',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10103',
            'name' => 'Matanza y procesamientos de aves de corral',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10104',
            'name' => 'Elaboración y conservación de embutidos y tripas naturales',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10105',
            'name' => 'Servicios de conservación y empaque de carnes',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10106',
            'name' => 'Elaboración y conservación de grasas y aceites animales',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10107',
            'name' => 'Servicios de molienda de carne',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10108',
            'name' => 'Elaboración de productos de carne ncp',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10201',
            'name' => 'Procesamiento y conservación de pescado, crustáceos y moluscos',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10209',
            'name' => 'Fabricación de productos de pescado ncp',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10301',
            'name' => 'Elaboración de jugos de frutas y hortalizasv',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10302',
            'name' => 'Elaboración y envase de jaleas, mermeladas y frutas deshidratadas',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10309',
            'name' => 'Elaboración de productos de frutas y hortalizas n.c.p.',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10401',
            'name' => 'Fabricación de aceites y grasas vegetales y animales comestibles',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10402',
            'name' => 'Fabricación de aceites y grasas vegetales y animales no comestibles',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10409',
            'name' => 'Servicio de maquilado de aceites',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10501',
            'name' => 'Fabricación de productos lácteos excepto sorbetes y quesos sustitutos',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10502',
            'name' => 'Fabricación de sorbetes y helados',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10503',
            'name' => 'Fabricación de quesos',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10611',
            'name' => 'Molienda de cereales',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10612',
            'name' => 'Elaboración de cereales para el desayuno y similares',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10613',
            'name' => 'Servicios de beneficiado de productos agrícolas ncp (excluye Beneficio de azúcar rama 1072 y beneficio de café rama 0163)',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10621',
            'name' => 'Fabricación de almidón',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10628',
            'name' => 'Servicio de molienda de maíz húmedo molino para nixtamal',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10711',
            'name' => 'Elaboración de tortillas',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10712',
            'name' => 'Fabricación de pan, galletas y barquillos',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10713',
            'name' => 'Fabricación de repostería',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10721',
            'name' => 'Ingenios azucareros',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10722',
            'name' => 'Molienda de caña de azúcar para la elaboración de dulces',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10723',
            'name' => 'Elaboración de jarabes de azúcar y otros similares',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10724',
            'name' => 'Maquilado de azúcar de caña',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10730',
            'name' => 'Fabricación de cacao, chocolates y productos de confitería',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10740',
            'name' => 'Elaboración de macarrones, fideos, y productos farináceos similares',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10750',
            'name' => 'Elaboración de comidas y platos preparados para la reventa en locales y/o para exportación',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10791',
            'name' => 'Elaboración de productos de café',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10792',
            'name' => 'Elaboración de especies, sazonadores y condimentos',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10793',
            'name' => 'Elaboración de sopas, cremas y consomé',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10794',
            'name' => 'Fabricación de bocadillos tostados y/o fritos',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10799',
            'name' => 'Elaboración de productos alimenticios ncp',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '10800',
            'name' => 'Elaboración de alimentos preparados para animales',
            'classification' => 9,
        ]);

        EconomicActivity::create([
            'goes_id' => '11012',
            'name' => 'Fabricación de aguardiente y licores',
            'classification' => 10,
        ]);

        EconomicActivity::create([
            'goes_id' => '11020',
            'name' => 'Elaboración de vinos',
            'classification' => 10,
        ]);

        EconomicActivity::create([
            'goes_id' => '11030',
            'name' => 'Fabricación de cerveza',
            'classification' => 10,
        ]);

        EconomicActivity::create([
            'goes_id' => '11041',
            'name' => 'Fabricación de aguas gaseosas',
            'classification' => 10,
        ]);

        EconomicActivity::create([
            'goes_id' => '11042',
            'name' => 'Fabricación y envasado de agua',
            'classification' => 10,
        ]);

        EconomicActivity::create([
            'goes_id' => '11043',
            'name' => 'Elaboración de refrescos',
            'classification' => 10,
        ]);

        EconomicActivity::create([
            'goes_id' => '11048',
            'name' => 'Maquilado de aguas gaseosas',
            'classification' => 10,
        ]);

        EconomicActivity::create([
            'goes_id' => '11049',
            'name' => 'Elaboración de bebidas no alcohólicas',
            'classification' => 10,
        ]);

        EconomicActivity::create([
            'goes_id' => '12000',
            'name' => 'Elaboración de productos de tabaco',
            'classification' => 11,
        ]);

        EconomicActivity::create([
            'goes_id' => '13111',
            'name' => 'Preparación de fibras textiles',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13112',
            'name' => 'Fabricación de hilados',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13120',
            'name' => 'Fabricación de telas',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13130',
            'name' => 'Acabado de productos textiles',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13910',
            'name' => 'Fabricación de tejidos de punto y ganchillo',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13921',
            'name' => 'Fabricación de productos textiles para el hogar',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13922',
            'name' => 'Sacos, bolsas y otros artículos textiles',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13929',
            'name' => 'Fabricación de artículos confeccionados con materiales textiles, excepto prendas de vestir ncp',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13930',
            'name' => 'Fabricación de tapices y alfombras',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13941',
            'name' => 'Fabricación de cuerdas de henequén y otras fibras naturales (lazos, pitas)',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13942',
            'name' => 'Fabricación de redes de diversos materiales',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13948',
            'name' => 'Maquilado de productos trenzables de cualquier material (petates, sillas, etc.)',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13991',
            'name' => 'Fabricación de adornos, etiquetas y otros artículos para prendas de vestir',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13992',
            'name' => 'Servicio de bordados en artículos y prendas de tela',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '13999',
            'name' => 'Fabricación de productos textiles ncp',
            'classification' => 12,
        ]);

        EconomicActivity::create([
            'goes_id' => '14101',
            'name' => 'Fabricación de ropa interior, para dormir y similares',
            'classification' => 13,
        ]);

        EconomicActivity::create([
            'goes_id' => '14102',
            'name' => 'Fabricación de ropa para niños',
            'classification' => 13,
        ]);

        EconomicActivity::create([
            'goes_id' => '14103',
            'name' => 'Fabricación de prendas de vestir para ambos sexos',
            'classification' => 13,
        ]);

        EconomicActivity::create([
            'goes_id' => '14104',
            'name' => 'Confección de prendas a medida',
            'classification' => 13,
        ]);

        EconomicActivity::create([
            'goes_id' => '14105',
            'name' => 'Fabricación de prendas de vestir para deportes',
            'classification' => 13,
        ]);

        EconomicActivity::create([
            'goes_id' => '14106',
            'name' => 'Elaboración de artesanías de uso personal confeccionadas especialmente de materiales textiles',
            'classification' => 13,
        ]);

        EconomicActivity::create([
            'goes_id' => '14108',
            'name' => 'Maquilado de prendas de vestir, accesorios y otros',
            'classification' => 13,
        ]);

        EconomicActivity::create([
            'goes_id' => '14109',
            'name' => 'Fabricación de prendas y accesorios de vestir n.c.p.',
            'classification' => 13,
        ]);

        EconomicActivity::create([
            'goes_id' => '14200',
            'name' => 'Fabricación de artículos de piel',
            'classification' => 13,
        ]);

        EconomicActivity::create([
            'goes_id' => '14301',
            'name' => 'Fabricación de calcetines, calcetas, medias (panty house) y otros similares',
            'classification' => 13,
        ]);

        EconomicActivity::create([
            'goes_id' => '14302',
            'name' => 'Fabricación de ropa interior de tejido de punto',
            'classification' => 13,
        ]);

        EconomicActivity::create([
            'goes_id' => '14309',
            'name' => 'Fabricación de prendas de vestir de tejido de punto ncp',
            'classification' => 13,
        ]);

        EconomicActivity::create([
            'goes_id' => '15110',
            'name' => 'Curtido y adobo de cueros; adobo y teñido de pieles',
            'classification' => 14,
        ]);

        EconomicActivity::create([
            'goes_id' => '15121',
            'name' => 'Fabricación de maletas, bolsos de mano y otros artículos de marroquinería',
            'classification' => 14,
        ]);

        EconomicActivity::create([
            'goes_id' => '15122',
            'name' => 'Fabricación de monturas, accesorios y vainas talabartería',
            'classification' => 14,
        ]);

        EconomicActivity::create([
            'goes_id' => '15123',
            'name' => 'Fabricación de artesanías principalmente de cuero natural y sintético',
            'classification' => 14,
        ]);

        EconomicActivity::create([
            'goes_id' => '15128',
            'name' => 'Maquilado de artículos de cuero natural, sintético y de otros materiales',
            'classification' => 14,
        ]);

        EconomicActivity::create([
            'goes_id' => '15201',
            'name' => 'Fabricación de calzado',
            'classification' => 14,
        ]);

        EconomicActivity::create([
            'goes_id' => '15202',
            'name' => 'Fabricación de partes y accesorios de calzado',
            'classification' => 14,
        ]);

        EconomicActivity::create([
            'goes_id' => '15208',
            'name' => 'Maquilado de partes y accesorios de calzado',
            'classification' => 14,
        ]);

        EconomicActivity::create([
            'goes_id' => '16100',
            'name' => 'Aserradero y acepilladura de madera',
            'classification' => 15,
        ]);

        EconomicActivity::create([
            'goes_id' => '16210',
            'name' => 'Fabricación de madera laminada, terciada, enchapada y contrachapada, paneles para la construcción',
            'classification' => 15,
        ]);

        EconomicActivity::create([
            'goes_id' => '16220',
            'name' => 'Fabricación de partes y piezas de carpintería para edificios y construcciones',
            'classification' => 15,
        ]);

        EconomicActivity::create([
            'goes_id' => '16230',
            'name' => 'Fabricación de envases y recipientes de madera',
            'classification' => 15,
        ]);

        EconomicActivity::create([
            'goes_id' => '16292',
            'name' => 'Fabricación de artesanías de madera, semillas, materiales trenzables',
            'classification' => 15,
        ]);

        EconomicActivity::create([
            'goes_id' => '16299',
            'name' => 'Fabricación de productos de madera, corcho, paja y materiales trenzables nc',
            'classification' => 15,
        ]);

        EconomicActivity::create([
            'goes_id' => '17010',
            'name' => 'Fabricación de pasta de madera, papel y cartón',
            'classification' => 16,
        ]);

        EconomicActivity::create([
            'goes_id' => '17020',
            'name' => 'Fabricación de papel y cartón ondulado y envases de papel y cartón',
            'classification' => 16,
        ]);

        EconomicActivity::create([
            'goes_id' => '17091',
            'name' => 'Fabricación de artículos de papel y cartón de uso personal y doméstico',
            'classification' => 16,
        ]);

        EconomicActivity::create([
            'goes_id' => '17092',
            'name' => 'Fabricación de productos de papel ncp',
            'classification' => 16,
        ]);

        EconomicActivity::create([
            'goes_id' => '18110',
            'name' => 'Impresión',
            'classification' => 17,
        ]);

        EconomicActivity::create([
            'goes_id' => '18120',
            'name' => 'Servicios relacionados con la impresión',
            'classification' => 17,
        ]);

        EconomicActivity::create([
            'goes_id' => '18200',
            'name' => 'Reproducción de grabaciones',
            'classification' => 17,
        ]);

        EconomicActivity::create([
            'goes_id' => '19100',
            'name' => 'Fabricación de productos de hornos de coque',
            'classification' => 18,
        ]);

        EconomicActivity::create([
            'goes_id' => '19201',
            'name' => 'Fabricación de combustible',
            'classification' => 18,
        ]);

        EconomicActivity::create([
            'goes_id' => '19202',
            'name' => 'Fabricación de aceites y lubricantes',
            'classification' => 18,
        ]);

        EconomicActivity::create([
            'goes_id' => '20111',
            'name' => 'Fabricación de materias primas para la fabricación de colorantes',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20112',
            'name' => 'Fabricación de materiales curtientes',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20113',
            'name' => 'Fabricación de gases industriales',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20114',
            'name' => 'Fabricación de alcohol etílico',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20119',
            'name' => 'Fabricación de sustancias químicas básicas',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20120',
            'name' => 'Fabricación de abonos y fertilizantes',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20130',
            'name' => 'Fabricación de plástico y caucho en formas primarias',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20210',
            'name' => 'Fabricación de plaguicidas y otros productos químicos de uso agropecuario',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20220',
            'name' => 'Fabricación de pinturas, barnices y productos de revestimiento similares; tintas de imprenta y masillas',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20231',
            'name' => 'Fabricación de jabones, detergentes y similares para limpieza',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20232',
            'name' => 'Fabricación de perfumes, cosméticos y productos de higiene y cuidado personal, incluyendo tintes, champú, etc.',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20291',
            'name' => 'Fabricación de tintas y colores para escribir y pintar; fabricación de cintas para impresoras',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20292',
            'name' => 'Fabricación de productos pirotécnicos, explosivos y municiones',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20299',
            'name' => 'Fabricación de productos químicos n.c.p.',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '20300',
            'name' => 'Fabricación de fibras artificiales',
            'classification' => 19,
        ]);

        EconomicActivity::create([
            'goes_id' => '21001',
            'name' => 'Manufactura de productos farmacéuticos, sustancias químicas y productos botánicos',
            'classification' => 20,
        ]);

        EconomicActivity::create([
            'goes_id' => '21008',
            'name' => 'Maquilado de medicamentos',
            'classification' => 20,
        ]);

        EconomicActivity::create([
            'goes_id' => '22110',
            'name' => 'Fabricación de cubiertas y cámaras; renovación y recauchutado de cubiertas',
            'classification' => 21,
        ]);

        EconomicActivity::create([
            'goes_id' => '22190',
            'name' => 'Fabricación de otros productos de caucho',
            'classification' => 21,
        ]);

        EconomicActivity::create([
            'goes_id' => '22201',
            'name' => 'Fabricación de envases plásticos',
            'classification' => 21,
        ]);

        EconomicActivity::create([
            'goes_id' => '22202',
            'name' => 'Fabricación de productos plásticos para uso personal o doméstico',
            'classification' => 21,
        ]);

        EconomicActivity::create([
            'goes_id' => '22208',
            'name' => 'Maquila de plásticos',
            'classification' => 21,
        ]);

        EconomicActivity::create([
            'goes_id' => '22209',
            'name' => 'Fabricación de productos plásticos n.c.p.',
            'classification' => 21,
        ]);

        EconomicActivity::create([
            'goes_id' => '23101',
            'name' => 'Fabricación de vidrio',
            'classification' => 22,
        ]);

        EconomicActivity::create([
            'goes_id' => '23102',
            'name' => 'Fabricación de recipientes y envases de vidrio',
            'classification' => 22,
        ]);

        EconomicActivity::create([
            'goes_id' => '23108',
            'name' => 'Servicio de maquilado',
            'classification' => 22,
        ]);

        EconomicActivity::create([
            'goes_id' => '23109',
            'name' => 'Fabricación de productos de vidrio ncp',
            'classification' => 22,
        ]);

        EconomicActivity::create([
            'goes_id' => '23910',
            'name' => 'Fabricación de productos refractarios',
            'classification' => 22,
        ]);

        EconomicActivity::create([
            'goes_id' => '23920',
            'name' => 'Fabricación de productos de arcilla para la construcción',
            'classification' => 22,
        ]);

        EconomicActivity::create([
            'goes_id' => '23931',
            'name' => 'Fabricación de productos de cerámica y porcelana no refractaria',
            'classification' => 22,
        ]);

        EconomicActivity::create([
            'goes_id' => '23932',
            'name' => 'Fabricación de productos de cerámica y porcelana ncp',
            'classification' => 22,
        ]);

        EconomicActivity::create([
            'goes_id' => '23940',
            'name' => 'Fabricación de cemento, cal y yeso',
            'classification' => 22,
        ]);

        EconomicActivity::create([
            'goes_id' => '23950',
            'name' => 'Fabricación de artículos de hormigón, cemento y yeso',
            'classification' => 22,
        ]);

        EconomicActivity::create([
            'goes_id' => '23960',
            'name' => 'Corte, tallado y acabado de la piedra',
            'classification' => 22,
        ]);

        EconomicActivity::create([
            'goes_id' => '23990',
            'name' => 'Fabricación de productos minerales no metálicos ncp',
            'classification' => 22,
        ]);

        EconomicActivity::create([
            'goes_id' => '24100',
            'name' => 'Industrias básicas de hierro y acero',
            'classification' => 23,
        ]);

        EconomicActivity::create([
            'goes_id' => '24200',
            'name' => 'Fabricación de productos primarios de metales preciosos y metales no ferrosos',
            'classification' => 23,
        ]);

        EconomicActivity::create([
            'goes_id' => '24310',
            'name' => 'Fundición de hierro y acero',
            'classification' => 23,
        ]);

        EconomicActivity::create([
            'goes_id' => '24320',
            'name' => 'Fundición de metales no ferrosos',
            'classification' => 23,
        ]);

        EconomicActivity::create([
            'goes_id' => '25111',
            'name' => 'Fabricación de productos metálicos para uso estructural',
            'classification' => 24,
        ]);

        EconomicActivity::create([
            'goes_id' => '25118',
            'name' => 'Servicio de maquila para la fabricación de estructuras metálicas',
            'classification' => 24,
        ]);

        EconomicActivity::create([
            'goes_id' => '25120',
            'name' => 'Fabricación de tanques, depósitos y recipientes de metal',
            'classification' => 24,
        ]);

        EconomicActivity::create([
            'goes_id' => '25130',
            'name' => 'Fabricación de generadores de vapor, excepto calderas de agua caliente para calefacción central',
            'classification' => 24,
        ]);

        EconomicActivity::create([
            'goes_id' => '25200',
            'name' => 'Fabricación de armas y municiones',
            'classification' => 24,
        ]);

        EconomicActivity::create([
            'goes_id' => '25910',
            'name' => 'Forjado, prensado, estampado y laminado de metales; pulvimetalurgia',
            'classification' => 24,
        ]);

        EconomicActivity::create([
            'goes_id' => '25920',
            'name' => 'Tratamiento y revestimiento de metales',
            'classification' => 24,
        ]);

        EconomicActivity::create([
            'goes_id' => '25930',
            'name' => 'Fabricación de artículos de cuchillería, herramientas de mano y artículos de ferretería',
            'classification' => 24,
        ]);

        EconomicActivity::create([
            'goes_id' => '25991',
            'name' => 'Fabricación de envases y artículos conexos de metal',
            'classification' => 24,
        ]);

        EconomicActivity::create([
            'goes_id' => '25992',
            'name' => 'Fabricación de artículos metálicos de uso personal y/o doméstico',
            'classification' => 24,
        ]);

        EconomicActivity::create([
            'goes_id' => '25999',
            'name' => 'Fabricación de productos elaborados de metal ncp',
            'classification' => 24,
        ]);

        EconomicActivity::create([
            'goes_id' => '26100',
            'name' => 'Fabricación de componentes electrónicos',
            'classification' => 25,
        ]);

        EconomicActivity::create([
            'goes_id' => '26200',
            'name' => 'Fabricación de computadoras y equipo conexo',
            'classification' => 25,
        ]);

        EconomicActivity::create([
            'goes_id' => '26300',
            'name' => 'Fabricación de equipo de comunicaciones',
            'classification' => 25,
        ]);

        EconomicActivity::create([
            'goes_id' => '26400',
            'name' => 'Fabricación de aparatos electrónicos de consumo para audio, video radio y televisión',
            'classification' => 25,
        ]);

        EconomicActivity::create([
            'goes_id' => '26510',
            'name' => 'Fabricación de instrumentos y aparatos para medir, verificar, ensayar, navegar y de control de procesos industriales',
            'classification' => 25,
        ]);

        EconomicActivity::create([
            'goes_id' => '26520',
            'name' => 'Fabricación de relojes y piezas de relojes',
            'classification' => 25,
        ]);

        EconomicActivity::create([
            'goes_id' => '26600',
            'name' => 'Fabricación de equipo médico de irradiación y equipo electrónico de uso médico y terapéutico',
            'classification' => 25,
        ]);

        EconomicActivity::create([
            'goes_id' => '26700',
            'name' => 'Fabricación de instrumentos de óptica y equipo fotográfico',
            'classification' => 25,
        ]);

        EconomicActivity::create([
            'goes_id' => '26800',
            'name' => 'Fabricación de medios magnéticos y ópticos',
            'classification' => 25,
        ]);

        EconomicActivity::create([
            'goes_id' => '27100',
            'name' => 'Fabricación de motores, generadores, transformadores eléctricos, aparatos de distribución y control de electricidad',
            'classification' => 26,
        ]);

        EconomicActivity::create([
            'goes_id' => '27200',
            'name' => 'Fabricación de pilas, baterías y acumuladores',
            'classification' => 26,
        ]);

        EconomicActivity::create([
            'goes_id' => '27310',
            'name' => 'Fabricación de cables de fibra óptica',
            'classification' => 26,
        ]);

        EconomicActivity::create([
            'goes_id' => '27320',
            'name' => 'Fabricación de otros hilos y cables eléctricos',
            'classification' => 26,
        ]);

        EconomicActivity::create([
            'goes_id' => '27330',
            'name' => 'Fabricación de dispositivos de cableados',
            'classification' => 26,
        ]);

        EconomicActivity::create([
            'goes_id' => '27400',
            'name' => 'Fabricación de equipo eléctrico de iluminación',
            'classification' => 26,
        ]);

        EconomicActivity::create([
            'goes_id' => '27500',
            'name' => 'Fabricación de aparatos de uso doméstico',
            'classification' => 26,
        ]);

        EconomicActivity::create([
            'goes_id' => '27900',
            'name' => 'Fabricación de otros tipos de equipo eléctrico',
            'classification' => 26,
        ]);

        EconomicActivity::create([
            'goes_id' => '28110',
            'name' => 'Fabricación de motores y turbinas, excepto motores para aeronaves, vehículos automotores y motocicletas',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28120',
            'name' => 'Fabricación de equipo hidráulico',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28130',
            'name' => 'Fabricación de otras bombas, compresores, grifos y válvulas',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28140',
            'name' => 'Fabricación de cojinetes, engranajes, trenes de engranajes y piezas de transmisión',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28150',
            'name' => 'Fabricación de hornos y quemadores',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28160',
            'name' => 'Fabricación de equipo de elevación y manipulación',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28170',
            'name' => 'Fabricación de maquinaria y equipo de oficina',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28180',
            'name' => 'Fabricación de herramientas manuales',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28190',
            'name' => 'Fabricación de otros tipos de maquinaria de uso general',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28210',
            'name' => 'Fabricación de maquinaria agropecuaria y forestal',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28220',
            'name' => 'Fabricación de máquinas para conformar metales y maquinaria herramienta',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28230',
            'name' => 'Fabricación de maquinaria metalúrgica',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28240',
            'name' => 'Fabricación de maquinaria para la explotación de minas y canteras y para obras de construcción',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28250',
            'name' => 'Fabricación de maquinaria para la elaboración de alimentos, bebidas y tabaco',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28260',
            'name' => 'Fabricación de maquinaria para la elaboración de productos textiles, prendas de vestir y cueros',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28291',
            'name' => 'Fabricación de máquinas para imprenta',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '28299',
            'name' => 'Fabricación de maquinaria de uso especial ncp',
            'classification' => 27,
        ]);

        EconomicActivity::create([
            'goes_id' => '29100',
            'name' => 'Fabricación vehículos automotores',
            'classification' => 28,
        ]);

        EconomicActivity::create([
            'goes_id' => '29200',
            'name' => 'Fabricación de carrocerías para vehículos automotores; fabricación de remolques y semiremolques',
            'classification' => 28,
        ]);

        EconomicActivity::create([
            'goes_id' => '29300',
            'name' => 'Fabricación de partes, piezas y accesorios para vehículos automotores',
            'classification' => 28,
        ]);

        EconomicActivity::create([
            'goes_id' => '30110',
            'name' => 'Fabricación de buques',
            'classification' => 29,
        ]);

        EconomicActivity::create([
            'goes_id' => '30120',
            'name' => 'Construcción y reparación de embarcaciones de recreo',
            'classification' => 29,
        ]);

        EconomicActivity::create([
            'goes_id' => '30200',
            'name' => 'Fabricación de locomotoras y de material rodante',
            'classification' => 29,
        ]);

        EconomicActivity::create([
            'goes_id' => '30300',
            'name' => 'Fabricación de aeronaves y naves espaciales',
            'classification' => 29,
        ]);

        EconomicActivity::create([
            'goes_id' => '30400',
            'name' => 'Fabricación de vehículos militares de combate',
            'classification' => 29,
        ]);

        EconomicActivity::create([
            'goes_id' => '30910',
            'name' => 'Fabricación de motocicletas',
            'classification' => 29,
        ]);

        EconomicActivity::create([
            'goes_id' => '30920',
            'name' => 'Fabricación de bicicletas y sillones de ruedas para inválidos',
            'classification' => 29,
        ]);

        EconomicActivity::create([
            'goes_id' => '30990',
            'name' => 'Fabricación de equipo de transporte ncp',
            'classification' => 29,
        ]);

        EconomicActivity::create([
            'goes_id' => '31001',
            'name' => 'Fabricación de colchones y somier',
            'classification' => 30,
        ]);

        EconomicActivity::create([
            'goes_id' => '31002',
            'name' => 'Fabricación de muebles y otros productos de madera a medida',
            'classification' => 30
        ]);

        EconomicActivity::create([
            'goes_id' => '31008',
            'name' => 'Servicios de maquilado de muebles',
            'classification' => 30,
        ]);

        EconomicActivity::create([
            'goes_id' => '31009',
            'name' => 'Fabricación de muebles ncp',
            'classification' => 30,
        ]);

        EconomicActivity::create([
            'goes_id' => '32110',
            'name' => 'Fabricación de joyas platerías y joyerías',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32120',
            'name' => 'Fabricación de joyas de imitación (fantasía) y artículos conexos',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32200',
            'name' => 'Fabricación de instrumentos musicales',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32301',
            'name' => 'Fabricación de artículos de deporte',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32308',
            'name' => 'Servicio de maquila de productos deportivos',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32401',
            'name' => 'Fabricación de juegos de mesa y de salón',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32402',
            'name' => 'Servicio de maquilado de juguetes y juegos',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32409',
            'name' => 'Fabricación de juegos y juguetes n.c.p.',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32500',
            'name' => 'Fabricación de instrumentos y materiales médicos y odontológicos',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32901',
            'name' => 'Fabricación de lápices, bolígrafos, sellos y artículos de librería en general',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32902',
            'name' => 'Fabricación de escobas, cepillos, pinceles y similares',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32903',
            'name' => 'Fabricación de artesanías de materiales diversos',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32904',
            'name' => 'Fabricación de artículos de uso personal y domésticos n.c.p.',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32905',
            'name' => 'Fabricación de accesorios para las confecciones y la marroquinería n.c.p.',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32908',
            'name' => 'Servicios de maquila ncp',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '32909',
            'name' => 'Fabricación de productos manufacturados n.c.p.',
            'classification' => 31,
        ]);

        EconomicActivity::create([
            'goes_id' => '33110',
            'name' => 'Reparación y mantenimiento de productos elaborados de metal',
            'classification' => 32,
        ]);

        EconomicActivity::create([
            'goes_id' => '33120',
            'name' => 'Reparación y mantenimiento de maquinaria',
            'classification' => 32,
        ]);

        EconomicActivity::create([
            'goes_id' => '33130',
            'name' => 'Reparación y mantenimiento de equipo electrónico y óptico',
            'classification' => 32,
        ]);

        EconomicActivity::create([
            'goes_id' => '33140',
            'name' => 'Reparación y mantenimiento de equipo eléctrico',
            'classification' => 32,
        ]);

        EconomicActivity::create([
            'goes_id' => '33150',
            'name' => 'Reparación y mantenimiento de equipo de transporte, excepto vehículos automotores',
            'classification' => 32,
        ]);

        EconomicActivity::create([
            'goes_id' => '33190',
            'name' => 'Reparación y mantenimiento de equipos n.c.p.',
            'classification' => 32,
        ]);

        EconomicActivity::create([
            'goes_id' => '33200',
            'name' => 'Instalación de maquinaria y equipo industrial',
            'classification' => 32,
        ]);

        EconomicActivity::create([
            'goes_id' => '35101',
            'name' => 'Generación de energía eléctrica',
            'classification' => 33,
        ]);

        EconomicActivity::create([
            'goes_id' => '35102',
            'name' => 'Transmisión de energía eléctrica',
            'classification' => 33,
        ]);

        EconomicActivity::create([
            'goes_id' => '35103',
            'name' => 'Distribución de energía eléctrica',
            'classification' => 33,
        ]);

        EconomicActivity::create([
            'goes_id' => '35200',
            'name' => 'Fabricación de gas, distribución de combustibles gaseosos por tuberías',
            'classification' => 33,
        ]);

        EconomicActivity::create([
            'goes_id' => '35300',
            'name' => 'Suministro de vapor y agua caliente',
            'classification' => 33,
        ]);

        EconomicActivity::create([
            'goes_id' => '36000',
            'name' => 'Captación, tratamiento y suministro de agua',
            'classification' => 34,
        ]);

        EconomicActivity::create([
            'goes_id' => '37000',
            'name' => 'Evacuación de aguas residuales (alcantarillado)',
            'classification' => 35,
        ]);

        EconomicActivity::create([
            'goes_id' => '38110',
            'name' => 'Recolección y transporte de desechos sólidos proveniente de hogares y sector urbano',
            'classification' => 36,
        ]);

        EconomicActivity::create([
            'goes_id' => '38120',
            'name' => 'Recolección de desechos peligrosos',
            'classification' => 36,
        ]);

        EconomicActivity::create([
            'goes_id' => '38210',
            'name' => 'Tratamiento y eliminación de desechos inicuos',
            'classification' => 36,
        ]);

        EconomicActivity::create([
            'goes_id' => '38220',
            'name' => 'Tratamiento y eliminación de desechos peligrosos',
            'classification' => 36,
        ]);

        EconomicActivity::create([
            'goes_id' => '38301',
            'name' => 'Reciclaje de desperdicios y desechos textiles',
            'classification' => 36,
        ]);

        EconomicActivity::create([
            'goes_id' => '38302',
            'name' => 'Reciclaje de desperdicios y desechos de plástico y caucho',
            'classification' => 36,
        ]);

        EconomicActivity::create([
            'goes_id' => '38303',
            'name' => 'Reciclaje de desperdicios y desechos de vidrio',
            'classification' => 36,
        ]);

        EconomicActivity::create([
            'goes_id' => '38304',
            'name' => 'Reciclaje de desperdicios y desechos de papel y cartón',
            'classification' => 36,
        ]);

        EconomicActivity::create([
            'goes_id' => '38305',
            'name' => 'Reciclaje de desperdicios y desechos metálicos',
            'classification' => 36,
        ]);

        EconomicActivity::create([
            'goes_id' => '38309',
            'name' => 'Reciclaje de desperdicios y desechos no metálicos n.c.p.',
            'classification' => 36,
        ]);

        EconomicActivity::create([
            'goes_id' => '39000',
            'name' => 'Actividades de Saneamiento y otros Servicios de Gestión de Desechos',
            'classification' => 37,
        ]);

        EconomicActivity::create([
            'goes_id' => '41001',
            'name' => 'Construcción de edificios residenciales',
            'classification' => 38,
        ]);

        EconomicActivity::create([
            'goes_id' => '41002',
            'name' => 'Construcción de edificios no residenciales',
            'classification' => 38,
        ]);

        EconomicActivity::create([
            'goes_id' => '42100',
            'name' => 'Construcción de carreteras, calles y caminos',
            'classification' => 39,
        ]);

        EconomicActivity::create([
            'goes_id' => '42200',
            'name' => 'Construcción de proyectos de servicio público',
            'classification' => 39,
        ]);

        EconomicActivity::create([
            'goes_id' => '42900',
            'name' => 'Construcción de obras de ingeniería civil n.c.p.',
            'classification' => 39,
        ]);

        EconomicActivity::create([
            'goes_id' => '43110',
            'name' => 'Demolición',
            'classification' => 40,
        ]);

        EconomicActivity::create([
            'goes_id' => '43120',
            'name' => 'Preparación de terreno',
            'classification' => 40,
        ]);

        EconomicActivity::create([
            'goes_id' => '43210',
            'name' => 'Instalaciones eléctricas',
            'classification' => 40,
        ]);

        EconomicActivity::create([
            'goes_id' => '43220',
            'name' => 'Instalación de fontanería, calefacción y aire acondicionado',
            'classification' => 40,
        ]);

        EconomicActivity::create([
            'goes_id' => '43290',
            'name' => 'Otras instalaciones para obras de construcción',
            'classification' => 40,
        ]);

        EconomicActivity::create([
            'goes_id' => '43300',
            'name' => 'Terminación y acabado de edificios',
            'classification' => 40,
        ]);

        EconomicActivity::create([
            'goes_id' => '43900',
            'name' => 'Otras actividades especializadas de construcción',
            'classification' => 40,
        ]);

        EconomicActivity::create([
            'goes_id' => '43901',
            'name' => 'Fabricación de techos y materiales diversos',
            'classification' => 40,
        ]);

        EconomicActivity::create([
            'goes_id' => '45100',
            'name' => 'Venta de vehículos automotores',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45201',
            'name' => 'Reparación mecánica de vehículos automotores',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45202',
            'name' => 'Reparaciones eléctricas del automotor y recarga de baterías',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45203',
            'name' => 'Enderezado y pintura de vehículos automotores',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45204',
            'name' => 'Reparaciones de radiadores, escapes y silenciadores',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45205',
            'name' => 'Reparación y reconstrucción de vías, stop y otros artículos de fibra de vidrio',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45206',
            'name' => 'Reparación de llantas de vehículos automotores',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45207',
            'name' => 'Polarizado de vehículos (mediante la adhesión de papel especial a los vidrios)',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45208',
            'name' => 'Lavado y pasteado de vehículos (carwash)',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45209',
            'name' => 'Reparaciones de vehículos n.c.p.',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45211',
            'name' => 'Remolque de vehículos automotores',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45301',
            'name' => 'Venta de partes, piezas y accesorios nuevos para vehículos automotores',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45302',
            'name' => 'Venta de partes, piezas y accesorios usados para vehículos automotores',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45401',
            'name' => 'Venta de motocicletas',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45402',
            'name' => 'Venta de repuestos, piezas y accesorios de motocicletas',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '45403',
            'name' => 'Mantenimiento y reparación de motocicletas',
            'classification' => 41,
        ]);

        EconomicActivity::create([
            'goes_id' => '46100',
            'name' => 'Venta al por mayor a cambio de retribución o por contrata',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46201',
            'name' => 'Venta al por mayor de materias primas agrícolas',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46202',
            'name' => 'Venta al por mayor de productos de la silvicultura',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46203',
            'name' => 'Venta al por mayor de productos pecuarios y de granja',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46211',
            'name' => 'Venta de productos para uso agropecuario',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46291',
            'name' => 'Venta al por mayor de granos básicos (cereales, leguminosas)',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46292',
            'name' => 'Venta al por mayor de semillas mejoradas para cultivo',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46293',
            'name' => 'Venta al por mayor de café oro y uva',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46294',
            'name' => 'Venta al por mayor de caña de azúcar',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46295',
            'name' => 'Venta al por mayor de flores, plantas y otros productos naturales',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46296',
            'name' => 'Venta al por mayor de productos agrícolas',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46297',
            'name' => 'Venta al por mayor de ganado bovino (vivo)',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46298',
            'name' => 'Venta al por mayor de animales porcinos, ovinos, caprino, canículas, apícolas, avícolas vivos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46299',
            'name' => 'Venta de otras especies vivas del reino animal',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46301',
            'name' => 'Venta al por mayor de alimentos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46302',
            'name' => 'Venta al por mayor de bebidas',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46303',
            'name' => 'Venta al por mayor de tabaco',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46371',
            'name' => 'Venta al por mayor de frutas, hortalizas (verduras), legumbres y tubérculos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46372',
            'name' => 'Venta al por mayor de pollos, gallinas destazadas, pavos y otras aves',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46373',
            'name' => 'Venta al por mayor de carne bovina y porcina, productos de carne y embutidos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46374',
            'name' => 'Venta al por mayor de huevos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46375',
            'name' => 'Venta al por mayor de productos lácteos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46376',
            'name' => 'Venta al por mayor de productos farináceos de panadería (pan dulce, cakes, repostería, etc.)',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46377',
            'name' => 'Venta al por mayor de pastas alimenticias, aceites y grasas comestibles vegetal y animal',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46378',
            'name' => 'Venta al por mayor de sal comestible',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46379',
            'name' => 'Venta al por mayor de azúcar',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46391',
            'name' => 'Venta al por mayor de abarrotes (vinos, licores, productos alimenticios envasados, etc.)',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46392',
            'name' => 'Venta al por mayor de aguas gaseosas',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46393',
            'name' => 'Venta al por mayor de agua purificada',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46394',
            'name' => 'Venta al por mayor de refrescos y otras bebidas, líquidas o en polvo',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46395',
            'name' => 'Venta al por mayor de cerveza y licores',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46396',
            'name' => 'Venta al por mayor de hielo',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46411',
            'name' => 'Venta al por mayor de hilados, tejidos y productos textiles de mercería',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46412',
            'name' => 'Venta al por mayor de artículos textiles excepto confecciones para el hogar',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46413',
            'name' => 'Venta al por mayor de confecciones textiles para el hogar',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46414',
            'name' => 'Venta al por mayor de prendas de vestir y accesorios de vestir',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46415',
            'name' => 'Venta al por mayor de ropa usada',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46416',
            'name' => 'Venta al por mayor de calzado',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46417',
            'name' => 'Venta al por mayor de artículos de marroquinería y talabartería',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46418',
            'name' => 'Venta al por mayor de artículos de peletería',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46419',
            'name' => 'Venta al por mayor de otros artículos textiles n.c.p.',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46471',
            'name' => 'Venta al por mayor de instrumentos musicales',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46472',
            'name' => 'Venta al por mayor de colchones, almohadas, cojines, etc.',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46473',
            'name' => 'Venta al por mayor de artículos de aluminio para el hogar y para otros usos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46474',
            'name' => 'Venta al por mayor de depósitos y otros artículos plásticos para el hogar y otros usos, incluyendo los desechables de durapax y no desechables',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46475',
            'name' => 'Venta al por mayor de cámaras fotográficas, accesorios y materiales',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46482',
            'name' => 'Venta al por mayor de medicamentos, artículos y otros productos de uso veterinario',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46483',
            'name' => 'Venta al por mayor de productos y artículos de belleza y de uso personal',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46484',
            'name' => 'Venta de productos farmacéuticos y medicinales',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46491',
            'name' => 'Venta al por mayor de productos medicinales, cosméticos, perfumería y productos de limpieza',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46492',
            'name' => 'Venta al por mayor de relojes y artículos de joyería',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46493',
            'name' => 'Venta al por mayor de electrodomésticos y artículos del hogar excepto bazar; artículos de iluminación',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46494',
            'name' => 'Venta al por mayor de artículos de bazar y similares',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46495',
            'name' => 'Venta al por mayor de artículos de óptica',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46496',
            'name' => 'Venta al por mayor de revistas, periódicos, libros, artículos de librería y artículos de papel y cartón en general',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46497',
            'name' => 'Venta de artículos deportivos, juguetes y rodados',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46498',
            'name' => 'Venta al por mayor de productos usados para el hogar o el uso personal',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46499',
            'name' => 'Venta al por mayor de enseres domésticos y de uso personal n.c.p.',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46500',
            'name' => 'Venta al por mayor de bicicletas, partes, accesorios y otros',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46510',
            'name' => 'Venta al por mayor de computadoras, equipo periférico y programas informáticos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46520',
            'name' => 'Venta al por mayor de equipos de comunicación',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46530',
            'name' => 'Venta al por mayor de maquinaria y equipo agropecuario, accesorios, partes y suministros',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46590',
            'name' => 'Venta de equipos e instrumentos de uso profesional y científico y aparatos de medida y control',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46591',
            'name' => 'Venta al por mayor de maquinaria equipo, accesorios y materiales para la industria de la madera y sus productos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46592',
            'name' => 'Venta al por mayor de maquinaria, equipo, accesorios y materiales para la industria gráfica y del papel, cartón y productos de papel y cartón',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46593',
            'name' => 'Venta al por mayor de maquinaria, equipo, accesorios y materiales para la industria de productos químicos, plástico y caucho',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46594',
            'name' => 'Venta al por mayor de maquinaria, equipo, accesorios y materiales para la industria metálica y de sus productos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46595',
            'name' => 'Venta al por mayor de equipamiento para uso médico, odontológico, veterinario y servicios conexos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46596',
            'name' => 'Venta al por mayor de maquinaria, equipo, accesorios y partes para la industria de la alimentación',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46597',
            'name' => 'Venta al por mayor de maquinaria, equipo, accesorios y partes para la industria textil, confecciones y cuero',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46598',
            'name' => 'Venta al por mayor de maquinaria, equipo y accesorios para la construcción y explotación de minas y canteras',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46599',
            'name' => 'Venta al por mayor de otro tipo de maquinaria y equipo con sus accesorios y partes',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46610',
            'name' => 'Venta al por mayor de otros combustibles sólidos, líquidos, gaseosos y de productos conexos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46612',
            'name' => 'Venta al por mayor de combustibles para automotores, aviones, barcos, maquinaria y otros',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46613',
            'name' => 'Venta al por mayor de lubricantes, grasas y otros aceites para automotores, maquinaria industrial, etc.',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46614',
            'name' => 'Venta al por mayor de gas propano',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46615',
            'name' => 'Venta al por mayor de leña y carbón',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46620',
            'name' => 'Venta al por mayor de metales y minerales metalíferos',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46631',
            'name' => 'Venta al por mayor de puertas, ventanas, vitrinas y similares',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46632',
            'name' => 'Venta al por mayor de artículos de ferretería y pinturerías',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46633',
            'name' => 'Vidrierías',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46634',
            'name' => 'Venta al por mayor de maderas',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46639',
            'name' => 'Venta al por mayor de materiales para la construcción n.c.p.',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46691',
            'name' => 'Venta al por mayor de sal industrial sin yodar',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46692',
            'name' => 'Venta al por mayor de productos intermedios y desechos de origen textil',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46693',
            'name' => 'Venta al por mayor de productos intermedios y desechos de origen metálico',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46694',
            'name' => 'Venta al por mayor de productos intermedios y desechos de papel y cartón',
            'classification' => 42,
        ]);

        EconomicActivity::create([
            'goes_id' => '46695',
            'name' => 'Venta al por mayor fertilizantes, abonos, agroquímicos y productos similares',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '46696',
            'name' => 'Venta al por mayor de productos intermedios y desechos de origen plástico',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '46697',
            'name' => 'Venta al por mayor de tintas para imprenta, productos curtientes y materias y productos colorantes',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '46698',
            'name' => 'Venta de productos intermedios y desechos de origen químico y de caucho',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '46699',
            'name' => 'Venta al por mayor de productos intermedios y desechos ncp',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '46701',
            'name' => 'Venta de algodón en oro',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '46900',
            'name' => 'Venta al por mayor de otros productos',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '46901',
            'name' => 'Venta al por mayor de cohetes y otros productos pirotécnicos',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '46902',
            'name' => 'Venta al por mayor de artículos diversos para consumo humano',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '46903',
            'name' => 'Venta al por mayor de armas de fuego, municiones y accesorios',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '46904',
            'name' => 'Venta al por mayor de toldos y tiendas de campaña de cualquier material',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '46905',
            'name' => 'Venta al por mayor de exhibidores publicitarios y rótulos',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '46906',
            'name' => 'Venta al por mayor de artículos promocionales diversos',
            'classification' => 43,
        ]);

        EconomicActivity::create([
            'goes_id' => '47111',
            'name' => 'Venta en supermercados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47112',
            'name' => 'Venta en tiendas de artículos de primera necesidad',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47119',
            'name' => 'Almacenes (venta de diversos artículos)',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47190',
            'name' => 'Venta al por menor de otros productos en comercios no especializados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47199',
            'name' => 'Venta de establecimientos no especializados con surtido compuesto principalmente de alimentos, bebidas y tabaco',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47211',
            'name' => 'Venta al por menor de frutas y hortalizas',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47212',
            'name' => 'Venta al por menor de carnes, embutidos y productos de granja',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47213',
            'name' => 'Venta al por menor de pescado y mariscos',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47214',
            'name' => 'Venta al por menor de productos lácteos',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47215',
            'name' => 'Venta al por menor de productos de panadería, repostería y galletas',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47216',
            'name' => 'Venta al por menor de huevos',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47217',
            'name' => 'Venta al por menor de carnes y productos cárnicos',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47218',
            'name' => 'Venta al por menor de granos básicos y otros',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47219',
            'name' => 'Venta al por menor de alimentos n.c.p.',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47221',
            'name' => 'Venta al por menor de hielo',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47223',
            'name' => 'Venta de bebidas no alcohólicas, para su consumo fuera del establecimiento',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47224',
            'name' => 'Venta de bebidas alcohólicas, para su consumo fuera del establecimiento',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47225',
            'name' => 'Venta de bebidas alcohólicas para su consumo dentro del establecimiento',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47230',
            'name' => 'Venta al por menor de tabaco',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47300',
            'name' => 'Venta de combustibles, lubricantes y otros (gasolineras)',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47411',
            'name' => 'Venta al por menor de computadoras y equipo periférico',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47412',
            'name' => 'Venta de equipo y accesorios de telecomunicación',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47420',
            'name' => 'Venta al por menor de equipo de audio y video',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47510',
            'name' => 'Venta al por menor de hilados, tejidos y productos textiles de mercería; confecciones para el hogar y textiles n.c.p.',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47521',
            'name' => 'Venta al por menor de productos de madera',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47522',
            'name' => 'Venta al por menor de artículos de ferretería',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47523',
            'name' => 'Venta al por menor de productos de pinturerías',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47524',
            'name' => 'Venta al por menor en vidrierías',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47529',
            'name' => 'Venta al por menor de materiales de construcción y artículos conexos',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47530',
            'name' => 'Venta al por menor de tapices, alfombras y revestimientos de paredes y pisos en comercios especializados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47591',
            'name' => 'Venta al por menor de muebles',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47592',
            'name' => 'Venta al por menor de artículos de bazar',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47593',
            'name' => 'Venta al por menor de aparatos electrodomésticos, repuestos y accesorios',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47594',
            'name' => 'Venta al por menor de artículos eléctricos y de iluminación',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47598',
            'name' => 'Venta al por menor de instrumentos musicales',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47610',
            'name' => 'Venta al por menor de libros, periódicos y artículos de papelería en comercios especializados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47620',
            'name' => 'Venta al por menor de discos láser, cassettes, cintas de video y otros',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47630',
            'name' => 'Venta al por menor de productos y equipos de deporte',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47631',
            'name' => 'Venta al por menor de bicicletas, accesorios y repuestos',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47640',
            'name' => 'Venta al por menor de juegos y juguetes en comercios especializados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47711',
            'name' => 'Venta al por menor de prendas de vestir y accesorios de vestir',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47712',
            'name' => 'Venta al por menor de calzado',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47713',
            'name' => 'Venta al por menor de artículos de peletería, marroquinería y talabartería',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47721',
            'name' => 'Venta al por menor de medicamentos farmacéuticos y otros materiales y artículos de uso médico, odontológico y veterinario',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47722',
            'name' => 'Venta al por menor de productos cosméticos y de tocador',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47731',
            'name' => 'Venta al por menor de productos de joyería, bisutería, óptica, relojería',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47732',
            'name' => 'Venta al por menor de plantas, semillas, animales y artículos conexos',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47733',
            'name' => 'Venta al por menor de combustibles de uso doméstico (gas propano y gas licuado)',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47734',
            'name' => 'Venta al por menor de artesanías, artículos cerámicos y recuerdos en general',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47735',
            'name' => 'Venta al por menor de ataúdes, lápidas y cruces, trofeos, artículos religiosos en general',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47736',
            'name' => 'Venta al por menor de armas de fuego, municiones y accesorios',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47737',
            'name' => 'Venta al por menor de artículos de cohetería y pirotécnicos',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47738',
            'name' => 'Venta al por menor de artículos desechables de uso personal y doméstico (servilletas, papel higiénico, pañales, toallas sanitarias, etc.)',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47739',
            'name' => 'Venta al por menor de otros productos n.c.p.',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47741',
            'name' => 'Venta al por menor de artículos usados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47742',
            'name' => 'Venta al por menor de textiles y confecciones usados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47743',
            'name' => 'Venta al por menor de libros, revistas, papel y cartón usados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47749',
            'name' => 'Venta al por menor de productos usados n.c.p.',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47811',
            'name' => 'Venta al por menor de frutas, verduras y hortalizas',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47814',
            'name' => 'Venta al por menor de productos lácteos',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47815',
            'name' => 'Venta al por menor de productos de panadería, galletas y similares',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47816',
            'name' => 'Venta al por menor de bebidas',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47818',
            'name' => 'Venta al por menor en tiendas de mercado y puestos',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47821',
            'name' => 'Venta al por menor de hilados, tejidos y productos textiles de mercería en puestos de mercados y ferias',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47822',
            'name' => 'Venta al por menor de artículos textiles excepto confecciones para el hogar en puestos de mercados y ferias',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47823',
            'name' => 'Venta al por menor de confecciones textiles para el hogar en puestos de mercados y ferias',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47824',
            'name' => 'Venta al por menor de prendas de vestir, accesorios de vestir y similares en puestos de mercados y ferias',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47825',
            'name' => 'Venta al por menor de ropa usada',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47826',
            'name' => 'Venta al por menor de calzado, artículos de marroquinería y talabartería en puestos de mercados y ferias',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47827',
            'name' => 'Venta al por menor de artículos de marroquinería y talabartería en puestos de mercados y ferias',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47829',
            'name' => 'Venta al por menor de artículos textiles ncp en puestos de mercados y ferias',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47891',
            'name' => 'Venta al por menor de animales, flores y productos conexos en puestos de feria y mercados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47892',
            'name' => 'Venta al por menor de productos medicinales, cosméticos, de tocador y de limpieza en puestos de ferias y mercados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47893',
            'name' => 'Venta al por menor de artículos de bazar en puestos de ferias y mercados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47894',
            'name' => 'Venta al por menor de artículos de papel, envases, libros, revistas y conexos en puestos de feria y mercados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47895',
            'name' => 'Venta al por menor de materiales de construcción,',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47896',
            'name' => 'Venta al por menor de equipos accesorios para las comunicaciones en puestos de feria y mercados',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47899',
            'name' => 'Venta al por menor en puestos de ferias y mercados n.c.p.',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47910',
            'name' => 'Venta al por menor por correo o Internet',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '47990',
            'name' => 'Otros tipos de venta al por menor no realizada, en almacenes, puestos de venta o mercado',
            'classification' => 44,
        ]);

        EconomicActivity::create([
            'goes_id' => '49110',
            'name' => 'Transporte interurbano de pasajeros por ferrocarril',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49120',
            'name' => 'Transporte de carga por ferrocarril',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49211',
            'name' => 'Transporte de pasajeros urbanos e interurbano mediante buses',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49212',
            'name' => 'Transporte de pasajeros interdepartamental mediante microbuses',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49213',
            'name' => 'Transporte de pasajeros urbanos e interurbano mediante microbuses',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49214',
            'name' => 'Transporte de pasajeros interdepartamental mediante buses',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49221',
            'name' => 'Transporte internacional de pasajeros',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49222',
            'name' => 'Transporte de pasajeros mediante taxis y autos con chofer',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49223',
            'name' => 'Transporte escolar',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49225',
            'name' => 'Transporte de pasajeros para excursiones',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49226',
            'name' => 'Servicios de transporte de personal',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49229',
            'name' => 'Transporte de pasajeros por vía terrestre ncp',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49231',
            'name' => 'Transporte de carga urbano',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49232',
            'name' => 'Transporte nacional de carga',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49233',
            'name' => 'Transporte de carga internacional',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49234',
            'name' => 'Servicios de mudanza',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49235',
            'name' => 'Alquiler de vehículos de carga con conductor',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '49300',
            'name' => 'Transporte por oleoducto o gasoducto',
            'classification' => 45,
        ]);

        EconomicActivity::create([
            'goes_id' => '50110',
            'name' => 'Transporte de pasajeros marítimo y de cabotaje',
            'classification' => 46,
        ]);

        EconomicActivity::create([
            'goes_id' => '50120',
            'name' => 'Transporte de carga marítimo y de cabotaje',
            'classification' => 46,
        ]);

        EconomicActivity::create([
            'goes_id' => '50211',
            'name' => 'Transporte de pasajeros por vías de navegación interiores',
            'classification' => 46,
        ]);

        EconomicActivity::create([
            'goes_id' => '50212',
            'name' => 'Alquiler de equipo de transporte de pasajeros por vías de navegación interior con conductor',
            'classification' => 46,
        ]);

        EconomicActivity::create([
            'goes_id' => '50220',
            'name' => 'Transporte de carga por vías de navegación interiores',
            'classification' => 46,
        ]);

        EconomicActivity::create([
            'goes_id' => '51100',
            'name' => 'Transporte aéreo de pasajeros',
            'classification' => 47,
        ]);

        EconomicActivity::create([
            'goes_id' => '51201',
            'name' => 'Transporte de carga por vía aérea',
            'classification' => 47,
        ]);

        EconomicActivity::create([
            'goes_id' => '51202',
            'name' => 'Alquiler de equipo de aerotransporte con operadores para el propósito de transportar carga',
            'classification' => 47,
        ]);

        EconomicActivity::create([
            'goes_id' => '52101',
            'name' => 'Alquiler de instalaciones de almacenamiento en zonas francas',
            'classification' => 48,
        ]);

        EconomicActivity::create([
            'goes_id' => '52102',
            'name' => 'Alquiler de silos para conservación y almacenamiento de granos',
            'classification' => 48,
        ]);

        EconomicActivity::create([
            'goes_id' => '52103',
            'name' => 'Alquiler de instalaciones con refrigeración para almacenamiento y conservación de alimentos y otros productos',
            'classification' => 48,
        ]);

        EconomicActivity::create([
            'goes_id' => '52109',
            'name' => 'Alquiler de bodegas para almacenamiento y depósito n.c.p.',
            'classification' => 48,
        ]);

        EconomicActivity::create([
            'goes_id' => '52211',
            'name' => 'Servicio de garaje y estacionamiento',
            'classification' => 48,
        ]);

        EconomicActivity::create([
            'goes_id' => '52212',
            'name' => 'Servicios de terminales para el transporte por vía terrestre',
            'classification' => 48,
        ]);

        EconomicActivity::create([
            'goes_id' => '52219',
            'name' => 'Servicios para el transporte por vía terrestre n.c.p.',
            'classification' => 48,
        ]);

        EconomicActivity::create([
            'goes_id' => '52220',
            'name' => 'Servicios para el transporte acuático',
            'classification' => 48,
        ]);

        EconomicActivity::create([
            'goes_id' => '52230',
            'name' => 'Servicios para el transporte aéreo',
            'classification' => 48,
        ]);

        EconomicActivity::create([
            'goes_id' => '52240',
            'name' => 'Manipulación de carga',
            'classification' => 48,
        ]);

        EconomicActivity::create([
            'goes_id' => '52290',
            'name' => 'Servicios para el transporte ncp',
            'classification' => 48,
        ]);

        EconomicActivity::create([
            'goes_id' => '52291',
            'name' => 'Agencias de tramitaciones aduanales',
            'classification' => 48,
        ]);

        EconomicActivity::create([
            'goes_id' => '53100',
            'name' => 'Servicios de correo nacional',
            'classification' => 49,
        ]);

        EconomicActivity::create([
            'goes_id' => '53200',
            'name' => 'Actividades de correo distintas a las actividades postales nacionales',
            'classification' => 49,
        ]);

        EconomicActivity::create([
            'goes_id' => '55101',
            'name' => 'Actividades de alojamiento para estancias cortas',
            'classification' => 50,
        ]);

        EconomicActivity::create([
            'goes_id' => '55102',
            'name' => 'Hoteles',
            'classification' => 50,
        ]);

        EconomicActivity::create([
            'goes_id' => '55200',
            'name' => 'Actividades de campamentos, parques de vehículos de recreo y parques de caravanas',
            'classification' => 50,
        ]);

        EconomicActivity::create([
            'goes_id' => '55900',
            'name' => 'Alojamiento n.c.p.',
            'classification' => 50,
        ]);

        EconomicActivity::create([
            'goes_id' => '56101',
            'name' => 'Restaurantes',
            'classification' => 51,
        ]);

        EconomicActivity::create([
            'goes_id' => '56106',
            'name' => 'Pupusería',
            'classification' => 51,
        ]);

        EconomicActivity::create([
            'goes_id' => '56107',
            'name' => 'Actividades varias de restaurantes',
            'classification' => 51,
        ]);

        EconomicActivity::create([
            'goes_id' => '56108',
            'name' => 'Comedores',
            'classification' => 51,
        ]);

        EconomicActivity::create([
            'goes_id' => '56109',
            'name' => 'Merenderos ambulantes',
            'classification' => 51,
        ]);

        EconomicActivity::create([
            'goes_id' => '56210',
            'name' => 'Preparación de comida para eventos especiales',
            'classification' => 51,
        ]);

        EconomicActivity::create([
            'goes_id' => '56291',
            'name' => 'Servicios de provisión de comidas por contrato',
            'classification' => 51,
        ]);

        EconomicActivity::create([
            'goes_id' => '56292',
            'name' => 'Servicios de concesión de cafetines y chalet en empresas e instituciones',
            'classification' => 51,
        ]);

        EconomicActivity::create([
            'goes_id' => '56299',
            'name' => 'Servicios de preparación de comidas ncp',
            'classification' => 51,
        ]);

        EconomicActivity::create([
            'goes_id' => '56301',
            'name' => 'Servicio de expendio de bebidas en salones y bares',
            'classification' => 51,
        ]);

        EconomicActivity::create([
            'goes_id' => '56302',
            'name' => 'Servicio de expendio de bebidas en puestos callejeros, mercados y ferias',
            'classification' => 51,
        ]);

        EconomicActivity::create([
            'goes_id' => '58110',
            'name' => 'Edición de libros, folletos, partituras y otras ediciones distintas a estas',
            'classification' => 52,
        ]);

        EconomicActivity::create([
            'goes_id' => '58120',
            'name' => 'Edición de directorios y listas de correos',
            'classification' => 52,
        ]);

        EconomicActivity::create([
            'goes_id' => '58130',
            'name' => 'Edición de periódicos, revistas y otras publicaciones periódicas',
            'classification' => 52,
        ]);

        EconomicActivity::create([
            'goes_id' => '58190',
            'name' => 'Otras actividades de edición',
            'classification' => 52,
        ]);

        EconomicActivity::create([
            'goes_id' => '58200',
            'name' => 'Edición de programas informáticos (software)',
            'classification' => 52,
        ]);

        EconomicActivity::create([
            'goes_id' => '59110',
            'name' => 'Actividades de producción cinematográfica',
            'classification' => 53,
        ]);

        EconomicActivity::create([
            'goes_id' => '59120',
            'name' => 'Actividades de post producción de películas, videos y programas de televisión',
            'classification' => 53,
        ]);

        EconomicActivity::create([
            'goes_id' => '59130',
            'name' => 'Actividades de distribución de películas cinematográficas, videos y programas de televisión',
            'classification' => 53,
        ]);

        EconomicActivity::create([
            'goes_id' => '59140',
            'name' => 'Actividades de exhibición de películas cinematográficas y cintas de vídeo',
            'classification' => 53,
        ]);

        EconomicActivity::create([
            'goes_id' => '59200',
            'name' => 'Actividades de edición y grabación de música',
            'classification' => 53,
        ]);

        EconomicActivity::create([
            'goes_id' => '60100',
            'name' => 'Servicios de difusiones de radio',
            'classification' => 54,
        ]);

        EconomicActivity::create([
            'goes_id' => '60201',
            'name' => 'Actividades de programación y difusión de televisión abierta',
            'classification' => 54,
        ]);

        EconomicActivity::create([
            'goes_id' => '60202',
            'name' => 'Actividades de suscripción y difusión de televisión por cable y/o suscripción',
            'classification' => 54,
        ]);

        EconomicActivity::create([
            'goes_id' => '60299',
            'name' => 'Servicios de televisión, incluye televisión por cable',
            'classification' => 54,
        ]);

        EconomicActivity::create([
            'goes_id' => '60900',
            'name' => 'Programación y transmisión de radio y televisión',
            'classification' => 54,
        ]);

        EconomicActivity::create([
            'goes_id' => '61101',
            'name' => 'Servicio de telefonía',
            'classification' => 55,
        ]);

        EconomicActivity::create([
            'goes_id' => '61102',
            'name' => 'Servicio de Internet ',
            'classification' => 55,
        ]);

        EconomicActivity::create([
            'goes_id' => '61103',
            'name' => 'Servicio de telefonía fija',
            'classification' => 55,
        ]);

        EconomicActivity::create([
            'goes_id' => '61109',
            'name' => 'Servicio de Internet n.c.p.',
            'classification' => 55,
        ]);

        EconomicActivity::create([
            'goes_id' => '61201',
            'name' => 'Servicios de telefonía celular',
            'classification' => 55,
        ]);

        EconomicActivity::create([
            'goes_id' => '61202',
            'name' => 'Servicios de Internet inalámbrico',
            'classification' => 55,
        ]);

        EconomicActivity::create([
            'goes_id' => '61209',
            'name' => 'Servicios de telecomunicaciones inalámbrico n.c.p.',
            'classification' => 55,
        ]);

        EconomicActivity::create([
            'goes_id' => '61301',
            'name' => 'Telecomunicaciones satelitales',
            'classification' => 55,
        ]);

        EconomicActivity::create([
            'goes_id' => '61309',
            'name' => 'Comunicación vía satélite n.c.p.',
            'classification' => 55,
        ]);

        EconomicActivity::create([
            'goes_id' => '61900',
            'name' => 'Actividades de telecomunicación n.c.p.',
            'classification' => 55,
        ]);

        EconomicActivity::create([
            'goes_id' => '62010',
            'name' => 'Programación informática',
            'classification' => 56,
        ]);

        EconomicActivity::create([
            'goes_id' => '62020',
            'name' => 'Consultorías y gestión de servicios informáticos',
            'classification' => 56,
        ]);

        EconomicActivity::create([
            'goes_id' => '62090',
            'name' => 'Otras actividades de tecnología de información y servicios de computadora',
            'classification' => 56,
        ]);

        EconomicActivity::create([
            'goes_id' => '63110',
            'name' => 'Procesamiento de datos y actividades relacionadas',
            'classification' => 57,
        ]);

        EconomicActivity::create([
            'goes_id' => '63120',
            'name' => 'Portales WEB',
            'classification' => 57,
        ]);

        EconomicActivity::create([
            'goes_id' => '63910',
            'name' => 'Servicios de Agencias de Noticias',
            'classification' => 57,
        ]);

        EconomicActivity::create([
            'goes_id' => '63990',
            'name' => 'Otros servicios de información n.c.p.',
            'classification' => 57,
        ]);

        EconomicActivity::create([
            'goes_id' => '64110',
            'name' => 'Servicios provistos por el Banco Central de El salvador',
            'classification' => 58,
        ]);

        EconomicActivity::create([
            'goes_id' => '64190',
            'name' => 'Bancos',
            'classification' => 58,
        ]);

        EconomicActivity::create([
            'goes_id' => '64192',
            'name' => 'Entidades dedicadas al envío de remesas',
            'classification' => 58,
        ]);

        EconomicActivity::create([
            'goes_id' => '64199',
            'name' => 'Otras entidades financieras',
            'classification' => 58,
        ]);

        EconomicActivity::create([
            'goes_id' => '64200',
            'name' => 'Actividades de sociedades de cartera',
            'classification' => 58,
        ]);

        EconomicActivity::create([
            'goes_id' => '64300',
            'name' => 'Fideicomisos, fondos y otras fuentes de financiamiento',
            'classification' => 58,
        ]);

        EconomicActivity::create([
            'goes_id' => '64910',
            'name' => 'Arrendamientos financieros',
            'classification' => 58,
        ]);

        EconomicActivity::create([
            'goes_id' => '64920',
            'name' => 'Asociaciones cooperativas de ahorro y crédito dedicadas a la intermediación financiera',
            'classification' => 58,
        ]);

        EconomicActivity::create([
            'goes_id' => '64921',
            'name' => 'Instituciones emisoras de tarjetas de crédito y otros',
            'classification' => 58,
        ]);

        EconomicActivity::create([
            'goes_id' => '64922',
            'name' => 'Tipos de crédito ncp',
            'classification' => 58,
        ]);

        EconomicActivity::create([
            'goes_id' => '64928',
            'name' => 'Prestamistas y casas de empeño',
            'classification' => 58,
        ]);

        EconomicActivity::create([
            'goes_id' => '64990',
            'name' => 'Actividades de servicios financieros, excepto la financiación de planes de seguros y de pensiones n.c.p.',
            'classification' => 58,
        ]);

        EconomicActivity::create([
            'goes_id' => '65110',
            'name' => 'Planes de seguros de vida',
            'classification' => 59,
        ]);

        EconomicActivity::create([
            'goes_id' => '65120',
            'name' => 'Planes de seguro excepto de vida',
            'classification' => 59,
        ]);

        EconomicActivity::create([
            'goes_id' => '65199',
            'name' => 'Seguros generales de todo tipo',
            'classification' => 59,
        ]);

        EconomicActivity::create([
            'goes_id' => '65200',
            'name' => 'Planes se seguro',
            'classification' => 59,
        ]);

        EconomicActivity::create([
            'goes_id' => '65300',
            'name' => 'Planes de pensiones',
            'classification' => 59,
        ]);

        EconomicActivity::create([
            'goes_id' => '66110',
            'name' => 'Administración de mercados financieros (Bolsa de Valores)',
            'classification' => 60,
        ]);

        EconomicActivity::create([
            'goes_id' => '66120',
            'name' => 'Actividades bursátiles (Corredores de Bolsa)',
            'classification' => 60,
        ]);

        EconomicActivity::create([
            'goes_id' => '66190',
            'name' => 'Actividades auxiliares de la intermediación financiera ncp',
            'classification' => 60,
        ]);

        EconomicActivity::create([
            'goes_id' => '66210',
            'name' => 'Evaluación de riesgos y daños',
            'classification' => 60,
        ]);

        EconomicActivity::create([
            'goes_id' => '66220',
            'name' => 'Actividades de agentes y corredores de seguros',
            'classification' => 60,
        ]);

        EconomicActivity::create([
            'goes_id' => '66290',
            'name' => 'Otras actividades auxiliares de seguros y fondos de pensiones',
            'classification' => 60,
        ]);

        EconomicActivity::create([
            'goes_id' => '66300',
            'name' => 'Actividades de administración de fondos',
            'classification' => 60,
        ]);

        EconomicActivity::create([
            'goes_id' => '68101',
            'name' => 'Servicio de alquiler y venta de lotes en cementerios',
            'classification' => 61,
        ]);

        EconomicActivity::create([
            'goes_id' => '68109',
            'name' => 'Actividades inmobiliarias realizadas con bienes propios o arrendados n.c.p.',
            'classification' => 61,
        ]);

        EconomicActivity::create([
            'goes_id' => '68200',
            'name' => 'Actividades Inmobiliarias Realizadas a Cambio de una Retribución o por Contrata',
            'classification' => 61,
        ]);

        EconomicActivity::create([
            'goes_id' => '69100',
            'name' => 'Actividades jurídicas',
            'classification' => 62,
        ]);

        EconomicActivity::create([
            'goes_id' => '69200',
            'name' => 'Actividades de contabilidad, teneduría de libros y auditoría; asesoramiento en materia de impuestos',
            'classification' => 62,
        ]);

        EconomicActivity::create([
            'goes_id' => '70100',
            'name' => 'Actividades de oficinas centrales de sociedades de cartera',
            'classification' => 63,
        ]);

        EconomicActivity::create([
            'goes_id' => '70200',
            'name' => 'Actividades de consultoría en gestión empresarial',
            'classification' => 63,
        ]);

        EconomicActivity::create([
            'goes_id' => '71101',
            'name' => 'Servicios de arquitectura y planificación urbana y servicios conexos',
            'classification' => 64,
        ]);

        EconomicActivity::create([
            'goes_id' => '71102',
            'name' => 'Servicios de ingeniería',
            'classification' => 64,
        ]);

        EconomicActivity::create([
            'goes_id' => '71103',
            'name' => 'Servicios de agrimensura, topografía, cartografía, prospección y geofísica y servicios conexos',
            'classification' => 64,
        ]);

        EconomicActivity::create([
            'goes_id' => '71200',
            'name' => 'Ensayos y análisis técnicos',
            'classification' => 64,
        ]);

        EconomicActivity::create([
            'goes_id' => '72100',
            'name' => 'Investigaciones y desarrollo experimental en el campo de las ciencias naturales y la ingeniería',
            'classification' => 65,
        ]);

        EconomicActivity::create([
            'goes_id' => '72199',
            'name' => 'Investigaciones científicas',
            'classification' => 65,
        ]);

        EconomicActivity::create([
            'goes_id' => '72200',
            'name' => 'Investigaciones y desarrollo experimental en el campo de las ciencias sociales y las humanidades científica y desarrollo',
            'classification' => 65,
        ]);

        EconomicActivity::create([
            'goes_id' => '73100',
            'name' => 'Publicidad',
            'classification' => 66,
        ]);

        EconomicActivity::create([
            'goes_id' => '73200',
            'name' => 'Investigación de mercados y realización de encuestas de opinión pública',
            'classification' => 66,
        ]);

        EconomicActivity::create([
            'goes_id' => '74100',
            'name' => 'Actividades de diseño especializado',
            'classification' => 67,
        ]);

        EconomicActivity::create([
            'goes_id' => '74200',
            'name' => 'Actividades de fotografía',
            'classification' => 67,
        ]);

        EconomicActivity::create([
            'goes_id' => '74900',
            'name' => 'Servicios profesionales y científicos ncp',
            'classification' => 67,
        ]);

        EconomicActivity::create([
            'goes_id' => '75000',
            'name' => 'Actividades veterinarias',
            'classification' => 68,
        ]);

        EconomicActivity::create([
            'goes_id' => '77101',
            'name' => 'Alquiler de equipo de transporte terrestre',
            'classification' => 69,
        ]);

        EconomicActivity::create([
            'goes_id' => '77102',
            'name' => 'Alquiler de equipo de transporte acuático',
            'classification' => 69,
        ]);

        EconomicActivity::create([
            'goes_id' => '77103',
            'name' => 'Alquiler de equipo de transporte por vía aérea',
            'classification' => 69,
        ]);

        EconomicActivity::create([
            'goes_id' => '77210',
            'name' => 'Alquiler y arrendamiento de equipo de recreo y deportivo',
            'classification' => 69,
        ]);

        EconomicActivity::create([
            'goes_id' => '77220',
            'name' => 'Alquiler de cintas de video y discos',
            'classification' => 69,
        ]);

        EconomicActivity::create([
            'goes_id' => '77290',
            'name' => 'Alquiler de otros efectos personales y enseres domésticos',
            'classification' => 69,
        ]);

        EconomicActivity::create([
            'goes_id' => '77300',
            'name' => 'Alquiler de maquinaria y equipo',
            'classification' => 69,
        ]);

        EconomicActivity::create([
            'goes_id' => '77400',
            'name' => 'Arrendamiento de productos de propiedad intelectual',
            'classification' => 69,
        ]);

        EconomicActivity::create([
            'goes_id' => '78100',
            'name' => 'Obtención y dotación de personal',
            'classification' => 70,
        ]);

        EconomicActivity::create([
            'goes_id' => '78200',
            'name' => 'Actividades de las agencias de trabajo temporal',
            'classification' => 70,
        ]);

        EconomicActivity::create([
            'goes_id' => '78300',
            'name' => 'Dotación de recursos humanos y gestión; gestión de las funciones de recursos humanos',
            'classification' => 70,
        ]);

        EconomicActivity::create([
            'goes_id' => '79110',
            'name' => 'Actividades de agencias de viajes y organizadores de viajes; actividades de asistencia a turistas',
            'classification' => 71,
        ]);

        EconomicActivity::create([
            'goes_id' => '79120',
            'name' => 'Actividades de los operadores turísticos',
            'classification' => 71,
        ]);

        EconomicActivity::create([
            'goes_id' => '79900',
            'name' => 'Otros servicios de reservas y actividades relacionadas',
            'classification' => 71,
        ]);

        EconomicActivity::create([
            'goes_id' => '80100',
            'name' => 'Servicios de seguridad privados',
            'classification' => 72,
        ]);

        EconomicActivity::create([
            'goes_id' => '80201',
            'name' => 'Actividades de servicios de sistemas de seguridad',
            'classification' => 72,
        ]);

        EconomicActivity::create([
            'goes_id' => '80202',
            'name' => 'Actividades para la prestación de sistemas de seguridad',
            'classification' => 72,
        ]);

        EconomicActivity::create([
            'goes_id' => '80300',
            'name' => 'Actividades de investigación',
            'classification' => 72,
        ]);

        EconomicActivity::create([
            'goes_id' => '81100',
            'name' => 'Actividades combinadas de mantenimiento de edificios e instalaciones',
            'classification' => 73,
        ]);

        EconomicActivity::create([
            'goes_id' => '81210',
            'name' => 'Limpieza general de edificios',
            'classification' => 73,
        ]);

        EconomicActivity::create([
            'goes_id' => '81290',
            'name' => 'Otras actividades combinadas de mantenimiento de edificios e instalaciones ncp',
            'classification' => 73,
        ]);

        EconomicActivity::create([
            'goes_id' => '81300',
            'name' => 'Servicio de jardinería',
            'classification' => 73,
        ]);

        EconomicActivity::create([
            'goes_id' => '82110',
            'name' => 'Servicios administrativos de oficinas',
            'classification' => 74,
        ]);

        EconomicActivity::create([
            'goes_id' => '82190',
            'name' => 'Servicio de fotocopiado y similares, excepto en imprentas',
            'classification' => 74,
        ]);

        EconomicActivity::create([
            'goes_id' => '82200',
            'name' => 'Actividades de las centrales de llamadas (call center)',
            'classification' => 74,
        ]);

        EconomicActivity::create([
            'goes_id' => '82300',
            'name' => 'Organización de convenciones y ferias de negocios',
            'classification' => 74,
        ]);

        EconomicActivity::create([
            'goes_id' => '82910',
            'name' => 'Actividades de agencias de cobro y oficinas de crédito',
            'classification' => 74,
        ]);

        EconomicActivity::create([
            'goes_id' => '82921',
            'name' => 'Servicios de envase y empaque de productos alimenticios',
            'classification' => 74,
        ]);

        EconomicActivity::create([
            'goes_id' => '82922',
            'name' => 'Servicios de envase y empaque de productos medicinales',
            'classification' => 74,
        ]);

        EconomicActivity::create([
            'goes_id' => '82929',
            'name' => 'Servicio de envase y empaque ncp',
            'classification' => 74,
        ]);

        EconomicActivity::create([
            'goes_id' => '82990',
            'name' => 'Actividades de apoyo empresariales ncp',
            'classification' => 74,
        ]);

        EconomicActivity::create([
            'goes_id' => '84110',
            'name' => 'Actividades de la Administración Pública en general',
            'classification' => 75,
        ]);

        EconomicActivity::create([
            'goes_id' => '84111',
            'name' => 'Alcaldías municipales',
            'classification' => 75,
        ]);

        EconomicActivity::create([
            'goes_id' => '84120',
            'name' => 'Regulación de las actividades de prestación de servicios sanitarios, educativos, culturales y otros servicios sociales, excepto seguridad social',
            'classification' => 75,
        ]);

        EconomicActivity::create([
            'goes_id' => '84130',
            'name' => 'Regulación y facilitación de la actividad económica',
            'classification' => 75,
        ]);

        EconomicActivity::create([
            'goes_id' => '84210',
            'name' => 'Actividades de administración y funcionamiento del Ministerio de Relaciones Exteriores',
            'classification' => 75,
        ]);

        EconomicActivity::create([
            'goes_id' => '84220',
            'name' => 'Actividades de defensa',
            'classification' => 75,
        ]);

        EconomicActivity::create([
            'goes_id' => '84230',
            'name' => 'Actividades de mantenimiento del orden público y de seguridad',
            'classification' => 75,
        ]);

        EconomicActivity::create([
            'goes_id' => '84300',
            'name' => 'Actividades de planes de seguridad social de afiliación obligatoria',
            'classification' => 75,
        ]);

        EconomicActivity::create([
            'goes_id' => '85101',
            'name' => 'Guardería educativa',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85102',
            'name' => 'Enseñanza preescolar o parvularia',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85103',
            'name' => 'Enseñanza primaria',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85104',
            'name' => 'Servicio de educación preescolar y primaria integrada',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85211',
            'name' => 'Enseñanza secundaria tercer ciclo (7°, 8° y 9°)',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85212',
            'name' => 'Enseñanza secundaria de formación general bachillerato',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85221',
            'name' => 'Enseñanza secundaria de formación técnica y profesional',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85222',
            'name' => 'Enseñanza secundaria de formación técnica y profesional integrada con enseñanza primaria',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85301',
            'name' => 'Enseñanza superior universitaria',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85302',
            'name' => 'Enseñanza superior no universitaria',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85303',
            'name' => 'Enseñanza superior integrada a educación secundaria y/o primaria',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85410',
            'name' => 'Educación deportiva y recreativa',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85420',
            'name' => 'Educación cultural',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85490',
            'name' => 'Otros tipos de enseñanza n.c.p.',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85499',
            'name' => 'Enseñanza formal',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '85500',
            'name' => 'Servicios de apoyo a la enseñanza',
            'classification' => 76,
        ]);

        EconomicActivity::create([
            'goes_id' => '86100',
            'name' => 'Actividades de hospitales',
            'classification' => 77,
        ]);

        EconomicActivity::create([
            'goes_id' => '86201',
            'name' => 'Clínicas médicas',
            'classification' => 77,
        ]);

        EconomicActivity::create([
            'goes_id' => '86202',
            'name' => 'Servicios de Odontología',
            'classification' => 77,
        ]);

        EconomicActivity::create([
            'goes_id' => '86203',
            'name' => 'Servicios médicos',
            'classification' => 77,
        ]);

        EconomicActivity::create([
            'goes_id' => '86901',
            'name' => 'Servicios de análisis y estudios de diagnóstico',
            'classification' => 77,
        ]);

        EconomicActivity::create([
            'goes_id' => '86902',
            'name' => 'Actividades de atención de la salud humana',
            'classification' => 77,
        ]);

        EconomicActivity::create([
            'goes_id' => '86909',
            'name' => 'Otros Servicio relacionados con la salud ncp',
            'classification' => 77,
        ]);

        EconomicActivity::create([
            'goes_id' => '87100',
            'name' => 'Residencias de ancianos con atención de enfermería',
            'classification' => 78,
        ]);

        EconomicActivity::create([
            'goes_id' => '87200',
            'name' => 'Instituciones dedicadas al tratamiento del retraso mental, problemas de salud mental y el uso indebido de sustancias nocivas',
            'classification' => 78,
        ]);

        EconomicActivity::create([
            'goes_id' => '87300',
            'name' => 'Instituciones dedicadas al cuidado de ancianos y discapacitados',
            'classification' => 78,
        ]);

        EconomicActivity::create([
            'goes_id' => '87900',
            'name' => 'Actividades de asistencia a niños y jóvenes',
            'classification' => 78,
        ]);

        EconomicActivity::create([
            'goes_id' => '87901',
            'name' => 'Otras actividades de atención en instituciones',
            'classification' => 78,
        ]);

        EconomicActivity::create([
            'goes_id' => '88100',
            'name' => 'Actividades de asistencia sociales sin alojamiento para ancianos y discapacitados',
            'classification' => 79,
        ]);

        EconomicActivity::create([
            'goes_id' => '88900',
            'name' => 'Servicios sociales sin alojamiento ncp',
            'classification' => 79,
        ]);

        EconomicActivity::create([
            'goes_id' => '90000',
            'name' => 'Actividades creativas artísticas y de esparcimiento',
            'classification' => 80,
        ]);

        EconomicActivity::create([
            'goes_id' => '91010',
            'name' => 'Actividades de bibliotecas y archivos',
            'classification' => 81,
        ]);

        EconomicActivity::create([
            'goes_id' => '91020',
            'name' => 'Actividades de museos y preservación de lugares y edificios históricos',
            'classification' => 81,
        ]);

        EconomicActivity::create([
            'goes_id' => '91030',
            'name' => 'Actividades de jardines botánicos, zoológicos y de reservas naturales',
            'classification' => 81,
        ]);

        EconomicActivity::create([
            'goes_id' => '92000',
            'name' => 'Actividades de juegos y apuestas',
            'classification' => 82,
        ]);

        EconomicActivity::create([
            'goes_id' => '93110',
            'name' => 'Gestión de instalaciones deportivas',
            'classification' => 83,
        ]);

        EconomicActivity::create([
            'goes_id' => '93120',
            'name' => 'Actividades de clubes deportivos',
            'classification' => 83,
        ]);

        EconomicActivity::create([
            'goes_id' => '93190',
            'name' => 'Otras actividades deportivas',
            'classification' => 83,
        ]);

        EconomicActivity::create([
            'goes_id' => '93210',
            'name' => 'Actividades de parques de atracciones y parques temáticos',
            'classification' => 83,
        ]);

        EconomicActivity::create([
            'goes_id' => '93291',
            'name' => 'Discotecas y salas de baile',
            'classification' => 83,
        ]);

        EconomicActivity::create([
            'goes_id' => '93298',
            'name' => 'Centros vacacionales',
            'classification' => 83,
        ]);

        EconomicActivity::create([
            'goes_id' => '93299',
            'name' => 'Actividades de esparcimiento ncp',
            'classification' => 83,
        ]);

        EconomicActivity::create([
            'goes_id' => '94110',
            'name' => 'Actividades de organizaciones empresariales y de empleadores',
            'classification' => 84,
        ]);

        EconomicActivity::create([
            'goes_id' => '94120',
            'name' => 'Actividades de organizaciones profesionales',
            'classification' => 84,
        ]);

        EconomicActivity::create([
            'goes_id' => '94200',
            'name' => 'Actividades de sindicatos',
            'classification' => 84,
        ]);

        EconomicActivity::create([
            'goes_id' => '94910',
            'name' => 'Actividades de organizaciones religiosas',
            'classification' => 84,
        ]);

        EconomicActivity::create([
            'goes_id' => '94920',
            'name' => 'Actividades de organizaciones políticas',
            'classification' => 84,
        ]);

        EconomicActivity::create([
            'goes_id' => '94990',
            'name' => 'Actividades de asociaciones n.c.p.',
            'classification' => 84,
        ]);

        EconomicActivity::create([
            'goes_id' => '95110',
            'name' => 'Reparación de computadoras y equipo periférico',
            'classification' => 85,
        ]);

        EconomicActivity::create([
            'goes_id' => '95120',
            'name' => 'Reparación de equipo de comunicación',
            'classification' => 85,
        ]);

        EconomicActivity::create([
            'goes_id' => '95210',
            'name' => 'Reparación de aparatos electrónicos de consumo',
            'classification' => 85,
        ]);

        EconomicActivity::create([
            'goes_id' => '95220',
            'name' => 'Reparación de aparatos doméstico y equipo de hogar y jardín',
            'classification' => 85,
        ]);

        EconomicActivity::create([
            'goes_id' => '95230',
            'name' => 'Reparación de calzado y artículos de cuero',
            'classification' => 85,
        ]);

        EconomicActivity::create([
            'goes_id' => '95240',
            'name' => 'Reparación de muebles y accesorios para el hogar',
            'classification' => 85,
        ]);

        EconomicActivity::create([
            'goes_id' => '95291',
            'name' => 'Reparación de Instrumentos musicales',
            'classification' => 85,
        ]);

        EconomicActivity::create([
            'goes_id' => '95292',
            'name' => 'Servicios de cerrajería y copiado de llaves',
            'classification' => 85,
        ]);

        EconomicActivity::create([
            'goes_id' => '95293',
            'name' => 'Reparación de joyas y relojes',
            'classification' => 85,
        ]);

        EconomicActivity::create([
            'goes_id' => '95294',
            'name' => 'Reparación de bicicletas, sillas de ruedas y rodados n.c.p.',
            'classification' => 85,
        ]);

        EconomicActivity::create([
            'goes_id' => '95299',
            'name' => 'Reparaciones de enseres personales n.c.p.',
            'classification' => 85,
        ]);

        EconomicActivity::create([
            'goes_id' => '96010',
            'name' => 'Lavado y limpieza de prendas de tela y de piel, incluso la limpieza en seco',
            'classification' => 86,
        ]);

        EconomicActivity::create([
            'goes_id' => '96020',
            'name' => 'Peluquería y otros tratamientos de belleza',
            'classification' => 86,
        ]);

        EconomicActivity::create([
            'goes_id' => '96030',
            'name' => 'Pompas fúnebres y actividades conexas',
            'classification' => 86,
        ]);

        EconomicActivity::create([
            'goes_id' => '96091',
            'name' => 'Servicios de sauna y otros servicios para la estética corporal n.c.p.',
            'classification' => 86,
        ]);

        EconomicActivity::create([
            'goes_id' => '96092',
            'name' => 'Servicios n.c.p.',
            'classification' => 86,
        ]);

        EconomicActivity::create([
            'goes_id' => '97000',
            'name' => 'Actividad de los hogares en calidad de empleadores de personal doméstico',
            'classification' => 87,
        ]);

        EconomicActivity::create([
            'goes_id' => '98100',
            'name' => 'Actividades indiferenciadas de producción de bienes de los hogares privados para uso propio',
            'classification' => 88,
        ]);

        EconomicActivity::create([
            'goes_id' => '98200',
            'name' => 'Actividades indiferenciadas de producción de servicios de los hogares privados para uso propio',
            'classification' => 88,
        ]);

        EconomicActivity::create([
            'goes_id' => '99000',
            'name' => 'Actividades de organizaciones y órganos extraterritoriales',
            'classification' => 89,
        ]);

        EconomicActivity::create([
            'goes_id' => '10001',
            'name' => 'Empleados',
            'classification' => 90,
        ]);

        EconomicActivity::create([
            'goes_id' => '10002',
            'name' => 'Jubilado',
            'classification' => 91,
        ]);

        EconomicActivity::create([
            'goes_id' => '10003',
            'name' => 'Estudiante',
            'classification' => 92,
        ]);

        EconomicActivity::create([
            'goes_id' => '10004',
            'name' => 'Desempleado',
            'classification' => 93,
        ]);

        EconomicActivity::create([
            'goes_id' => '10005',
            'name' => 'Otros',
            'classification' => 94,
        ]);
    }
}
