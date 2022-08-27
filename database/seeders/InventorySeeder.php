<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inventories')->insert([
            [
            'inventoryName' => 'ほうれん草', 
            'weight' => 5000,
            'type_id' => 1,
            'created_at' => '2022-03-12',
            ],
            [
                'inventoryName' => 'みりん', 
                'weight' => 2000,
                'type_id' => 2,
                'created_at' => '2022-03-12',
                ],
        ]);
    }
}
