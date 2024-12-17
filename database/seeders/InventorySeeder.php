<?php

namespace Database\Seeders;

use App\Models\Inventory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inventories = [
            [
                'room_id' => 1,
                'code' => 'INV-001',
                'name' => 'Meja Belajar',
                'brand' => 'IKEA',
                'purchase_date' => '2022-01-01',
                'description' => 'Meja belajar untuk keperluan belajar mengajar.',
            ],
            [
                'room_id' => 1,
                'code' => 'INV-002',
                'name' => 'Kursi Belajar',
                'brand' => 'IKEA',
                'purchase_date' => '2022-01-01',
                'description' => 'Kursi belajar untuk keperluan belajar mengajar.',
            ],
            [
                'room_id' => 1,
                'code' => 'INV-003',
                'name' => 'Proyektor',
                'brand' => 'Epson',
                'purchase_date' => '2022-01-01',
                'description' => 'Proyektor untuk keperluan belajar mengajar.',
            ],
            [
                'room_id' => 2,
                'code' => 'INV-004',
                'name' => 'Meja Belajar',
                'brand' => 'IKEA',
                'purchase_date' => '2022-01-01',
                'description' => 'Meja belajar untuk keperluan belajar mengajar.',
            ],
            [
                'room_id' => 2,
                'code' => 'INV-005',
                'name' => 'Kursi Belajar',
                'brand' => 'IKEA',
                'purchase_date' => '2022-01-01',
                'description' => 'Kursi belajar untuk keperluan belajar mengajar.',
            ],
            [
                'room_id' => 2,
                'code' => 'INV-006',
                'name' => 'Proyektor',
                'brand' => 'Epson',
                'purchase_date' => '2022-01-01',
                'description' => 'Proyektor untuk keperluan belajar mengajar.',
            ],
        ];

        Inventory::insert($inventories);
    }
}
