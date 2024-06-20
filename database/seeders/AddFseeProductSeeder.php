<?php

namespace Database\Seeders;

use Exactum\Efac\Models\Enterprise\Entity;
use Exactum\Efac\Services\Entity\EmitterEntityService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddFseeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emitterEntityService = new EmitterEntityService();

        $emitterEntityService->addProductService(Entity::find(1), [
            'measurement_unit_id' => null,
            'item_type_id' => 1,
            'code' => 'FSEE_ITEM',
            'name' => 'Item para factura de sujeto excluido',
            'unit_price' => 1,
        ]);

        $emitterEntityService->addProductService(Entity::find(1), [
            'measurement_unit_id' => null,
            'item_type_id' => 2,
            'code' => 'FSEE_ITEM_SERVICE',
            'name' => 'Item de servicio para factura de sujeto excluido',
            'unit_price' => 1,
        ]);
    }
}
