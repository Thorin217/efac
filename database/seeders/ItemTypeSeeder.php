<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\DonationType;
use Exactum\Efac\Models\External\ItemType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemProduct = ItemType::create([
            'goes_id' => 1,
            'name' => 'Bienes'
        ]);

        $itemService = ItemType::create([
            'goes_id' => 2,
            'name' => 'Servicios'
        ]);

        ItemType::create([
            'goes_id' => 3,
            'name' => 'Ambos'
        ]);

        ItemType::create([
            'goes_id' => 4,
            'name' => 'Otros tributos por ítem'
        ]);

        $itemCash = ItemType::create([
            'goes_id' => 0,
            'name' => 'Efectivo'
        ]);

        DonationType::create([
            'goes_id' => 1,
            'name' => 'Efectivo',
            'item_type_id' => $itemCash->id,
        ]);

        DonationType::create([
            'goes_id' => 2,
            'name' => 'Bien',
            'item_type_id' => $itemProduct->id,
        ]);

        DonationType::create([
            'goes_id' => 3,
            'name' => 'Servicio',
            'item_type_id' => $itemService->id,
        ]);
    }
}
