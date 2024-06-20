<?php

namespace Database\Seeders;

use Exactum\Efac\Models\External\OperationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OperationType::create([
            'goes_id' => 1,
            'name' => 'Transmisión normal',
            'default' => true
        ]);

        OperationType::create([
            'goes_id' => 2,
            'name' => 'Transmisión por contingencia',
        ]);
    }
}
