<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            ['code' => 'A1', 'name' => 'Room A1'],
            ['code' => 'A2', 'name' => 'Room A2'],
            ['code' => 'A3', 'name' => 'Room A3'],
            ['code' => 'A4', 'name' => 'Room A4'],
            ['code' => 'A5', 'name' => 'Room A5'],
        ];

        Room::insert($rooms);
    }
}
