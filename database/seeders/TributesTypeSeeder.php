<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\TributesType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TributesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TributesType::create([
            'goes_id' => '20',
            'name' => 'Impuesto al Valor Agregado 13%',
            'retail_price' => 0.13,
            'percent' => true,
            'classification' => 1,
            'default' => true,
        ]);

        TributesType::create([
            'goes_id' => 'C3',
            'name' => 'Impuesto al Valor Agregado (exportaciones)',
            'retail_price' => 0,
            'percent' => true,
            'classification' => 1,
            'default' => true,
        ]);

        TributesType::create([
            'goes_id' => '59',
            'name' => 'Turismo: por alojamiento',
            'retail_price' => 0.05,
            'percent' => true,
            'classification' => 1,
        ]);

        TributesType::create([
            'goes_id' => '71',
            'name' => 'Turismo: salida del país por vía aérea',
            'retail_price' => 7,
            'classification' => 1,
        ]);

        TributesType::create([
            'goes_id' => 'D1',
            'name' => 'FOVIAL',
            'retail_price' => 0.20,
            'classification' => 1,
        ]);

        TributesType::create([
            'goes_id' => 'C8',
            'name' => 'COTRANS',
            'retail_price' => 0.1,
            'classification' => 1,
        ]);

        TributesType::create([
            'goes_id' => 'D5',
            'name' => 'Otras tasas casos especiales',
            'classification' => 1,
        ]);

        TributesType::create([
            'goes_id' => 'D4',
            'name' => 'Otros impuestos casos especiales ',
            'classification' => 1,
        ]);

        TributesType::create([
            'goes_id' => 'A8',
            'name' => 'Impuesto Especial al Combustible 0%',
            'retail_price' => 0,
            'percent' => true,
            'classification' => 2,
        ]);

        TributesType::create([
            'goes_id' => 'A8',
            'name' => 'Impuesto Especial al Combustible 0.5%',
            'retail_price' => 0.005,
            'percent' => true,
            'classification' => 2,
        ]);

        TributesType::create([
            'goes_id' => 'A8',
            'name' => 'Impuesto Especial al Combustible 1%',
            'retail_price' => 0.01,
            'percent' => true,
            'classification' => 2,
        ]);

        TributesType::create([
            'goes_id' => '57',
            'name' => 'Impuesto industria de Cemento',
            'classification' => 2,
        ]);

        TributesType::create([
            'goes_id' => '90',
            'name' => 'Impuesto especial a la primera matrícula',
            'classification' => 2,
        ]);

        TributesType::create([
            'goes_id' => 'D4',
            'name' => 'Otros impuestos casos especiales',
            'classification' => 2,
        ]);

        TributesType::create([
            'goes_id' => 'D5',
            'name' => 'Otras tasas casos especiales',
            'classification' => 2,
        ]);

        TributesType::create([
            'goes_id' => 'A6',
            'name' => 'Impuesto ad-valorem, armas de fuego, municiones explosivas y artículos similares',
            'classification' => 2,
        ]);

        TributesType::create([
            'goes_id' => 'C5',
            'name' => 'Impuesto ad-valorem por diferencial de precios de bebidas alcohólicas',
            'retail_price' => 0.08,
            'percent' => true,
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => 'C6',
            'name' => 'Impuesto ad-valorem por diferencial de precios al tabaco cigarrillos',
            'retail_price' => 0.39,
            'percent' => true,
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => 'C7',
            'name' => 'Impuesto ad-valorem por diferencial de precios al tabaco cigarros',
            'retail_price' => 1,
            'percent' => true,
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '19',
            'name' => 'Fabricante de Bebidas Gaseosas, Isotónicas, Deportivas, Fortificantes, Energizante o Estimulante',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '28',
            'name' => 'Importador de Bebidas Gaseosas, Isotónicas, Deportivas, Fortificantes, Energizante o Estimulante',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '31',
            'name' => 'Detallistas o Expendedores de Bebidas Alcohólicas',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '32',
            'name' => 'Fabricante de Cerveza',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '33',
            'name' => 'Importador de Cerveza',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '34',
            'name' => 'Fabricante de Productos de Tabaco',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '35',
            'name' => 'Importador de Productos de Tabaco',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '36',
            'name' => 'Fabricante de Armas de Fuego, Municiones y Artículos Similares',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '37',
            'name' => 'Importador de Arma de Fuego, Munición y Artículos. Similares',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '38',
            'name' => 'Fabricante de Explosivos',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '39',
            'name' => 'Importador de Explosivos',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '42',
            'name' => 'Fabricante de Productos Pirotécnicos',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '43',
            'name' => 'Importador de Productos Pirotécnicos',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '44',
            'name' => 'Productor de Tabaco',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '50',
            'name' => 'Distribuidor de Bebidas Gaseosas, Isotónicas, Deportivas, Fortificantes, Energizante o Estimulante',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '51',
            'name' => 'Bebidas Alcohólicas',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '52',
            'name' => 'Cerveza',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '53',
            'name' => 'Productos del Tabaco',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '54',
            'name' => 'Bebidas Carbonatadas o Gaseosas Simples o Endulzadas',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '55',
            'name' => 'Otros Específicos',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '58',
            'name' => 'Alcohol',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '77',
            'name' => 'Importador de Jugos, Néctares, Bebidas con Jugo y Refrescos',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '78',
            'name' => 'Distribuidor de Jugos, Néctares, Bebidas con Jugo y Refrescos',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '79',
            'name' => 'Sobre Llamadas Telefónicas Provenientes del Ext.',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '85',
            'name' => 'Detallista de Jugos, Néctares, Bebidas con Jugo y Refrescos',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '86',
            'name' => 'Fabricante de Preparaciones Concentradas o en Polvo para la Elaboración de Bebidas',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '91',
            'name' => 'Fabricante de Jugos, Néctares, Bebidas con Jugo y Refrescos',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => '92',
            'name' => 'Importador de Preparaciones Concentradas o en Polvo para la Elaboración de Bebidas',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => 'A1',
            'name' => 'Específicos y Ad-Valorem',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => 'A5',
            'name' => 'Bebidas Gaseosas, Isotónicas, Deportivas, Fortificantes, Energizantes o Estimulantes',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => 'A7',
            'name' => 'Alcohol Etílico',
            'classification' => 3,
        ]);

        TributesType::create([
            'goes_id' => 'A9',
            'name' => 'Sacos Sintéticos',
            'classification' => 3,
        ]);
    }
}
