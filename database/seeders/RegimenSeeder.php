<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\Regimen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegimenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Regimen::create([
            'goes_id' => 'EX-1.1000.000',
            'name' => 'Exportación Definitiva, Exportación Definitiva, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1040.000',
            'name' => 'Exportación Definitiva, Exportación Definitiva Sustitución de Mercancías, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1041.020',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Provisional, Franq. Presidenciales exento de DAI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1041.021',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Provisional, Franq. Presidenciales exento de DAI e IVA ',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.025',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Maquinaria y Equipo LZF. DPA',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.031',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Distribución Internacional',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.032',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente. de Franquicia Definitiva, Operaciones Internacionales de Logística',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.033',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Centro Internacional de llamadas (Call Center)',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.034',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Tecnologías de Información LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.035',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Investigación y Desarrollo LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.036',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Reparación y Mantenimiento de Embarcaciones Marítimas LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.037',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Reparación y Mantenimiento de Aeronaves LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.038',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Procesos Empresariales LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.039',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Servicios Medico-Hospitalarios LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.040',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Servicios Financieros Internacionales LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.043',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Reparación y Mantenimiento de Contenedores LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.044',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Reparación de Equipos Tecnológicos LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.054',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Atención Ancianos y Convalecientes LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.055',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Telemedicina LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1048.056',
            'name' => 'Exportación Definitiva, Exportación Definitiva Proveniente de Franquicia Definitiva, Cinematografía LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1052.000',
            'name' => 'Exportación Definitiva, Exportación Definitiva de DPA con origen en Compras Locales, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1054.000',
            'name' => 'Exportación Definitiva, Exportación Definitiva de Zona Franca con origen en Compras Locales, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1100.000',
            'name' => 'Exportación Definitiva, Exportación Definitiva de Envíos de Socorro, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1200.000',
            'name' => 'Exportación Definitiva, Exportación Definitiva de Envíos Postales, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1300.000',
            'name' => 'Exportación Definitiva, Exportación Definitiva Envíos que requieren despacho urgente, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1400.000',
            'name' => 'Exportación Definitiva, Exportación Definitiva Courier, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1400.011',
            'name' => 'Exportación Definitiva, Exportación Definitiva Courier, Muestras Sin Valor Comercial',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1400.012',
            'name' => 'Exportación Definitiva, Exportación Definitiva Courier, Material Publicitario',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1400.017',
            'name' => 'Exportación Definitiva, Exportación Definitiva Courier, Declaración de Documentos',
        ]);

        Regimen::create([
            'goes_id' => 'EX-1.1500.000',
            'name' => 'Exportación Definitiva, Exportación Definitiva Menaje de casa, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-2.2100.000',
            'name' => 'Exportación Temporal, Exportación Temporal para Perfeccionamiento Pasivo, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-2.2200.000',
            'name' => 'Exportación Temporal, Exportación Temporal con Reimportación en el mismo estado, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3050.000',
            'name' => 'Re-Exportación, Reexportación Proveniente de Importación Temporal, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3051.000',
            'name' => 'Re-Exportación, Reexportación Proveniente de Tiendas Libres, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3052.000',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal para Perfeccionamiento Activo, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3053.000',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3054.000',
            'name' => 'Re-Exportación, Reexportación Proveniente de Régimen de Zona Franca, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3055.000',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal para Perfeccionamiento Activo con Garantía, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3056.000',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Distribución Internacional Parque de Servicios, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3056.057',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Distribución Internacional Parque de Servicios, Remisión entre Usuarios Directos del Mismo Parque de Servicios',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3056.058',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Distribución Internacional Parque de Servicios, Remisión entre Usuarios Directos de Diferente Parque de Servicios',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3056.072',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Distribución Internacional Parque de Servicios, Decreto 738 Eléctricos e Híbridos',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3057.000',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Operaciones Internacional de Logística Parque de Servicios, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3057.057',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Operaciones Internacional de Logística Parque de Servicios, Remisión entre Usuarios Directos del Mismo Parque de Servicios',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3057.058',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Operaciones Internacional de Logística Parque de Servicios, Remisión entre Usuarios Directos de Diferente Parque de Servicios',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3058.033',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Centro Servicio LSI, Centro Internacional de llamadas (Call Center)',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3058.036',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Centro Servicio LSI, Reparación y Mantenimiento de Embarcaciones Marítimas LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3058.037',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Centro Servicio LSI, Reparación y Mantenimiento de Aeronaves LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3058.043',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Centro Servicio LSI, Reparación y Mantenimiento de Contenedores LSI',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3059.000',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Reparación de Equipo Tecnológico Parque de Servicios, Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3059.057',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Reparación de Equipo Tecnológico Parque de Servicios, Remisión entre Usuarios Directos del Mismo Parque de Servicios',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3059.058',
            'name' => 'Re-Exportación, Reexportación Proveniente de Admisión Temporal Reparación de Equipo Tecnológico Parque de Servicios, Remisión entre Usuarios Directos de Diferente Parque de Servicios',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3070.000',
            'name' => 'Re-Exportación, Reexportación Proveniente de Depósito., Régimen Común',
        ]);

        Regimen::create([
            'goes_id' => 'EX-3.3070.072',
            'name' => 'Re-Exportación, Reexportación Proveniente de Depósito., Decreto 738 Eléctricos e Híbridos',
        ]);
    }
}
