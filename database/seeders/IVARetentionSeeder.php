<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\IVARetention;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IVARetentionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IVARetention::create([
            'goes_id' => '22',
            'name' => 'Retención IVA 1%',
            'percent' => 0.01,
        ]);

        IVARetention::create([
            'goes_id' => 'C4',
            'name' => 'Retención IVA 13%',
            'percent' => 0.13,
        ]);

        IVARetention::create([
            'goes_id' => 'C9',
            'name' => 'Otras retenciones IVA casos especiales',
            'percent' => null,
        ]);
    }
}
