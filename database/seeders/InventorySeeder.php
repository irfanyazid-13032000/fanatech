<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inventories = [
            [
                'code' => 'LNV',
                'name' => 'lenovo',
                'price' => 3000000000,
                'stock' => 20,
                'created_at' => now(),
            ],
           
            
        ];

        DB::table('inventories')->insert($inventories);
    }
}
