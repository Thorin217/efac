<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\OperationCondition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperationConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OperationCondition::create([
            'goes_id' => 1,
            'name' => 'Contado'
        ]);

        OperationCondition::create([
            'goes_id' => 2,
            'name' => 'A crédito'
        ]);

        OperationCondition::create([
            'goes_id' => 3,
            'name' => 'Otro'
        ]);
    }
}
