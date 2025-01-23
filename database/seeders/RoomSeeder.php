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
            ['code' => 'ML', 'name' => 'LAB Mesin Listrik', 'link_stream' => 'https://www.youtube.com/embed/tgbNymZ7vqY', 'foto' => 'uploads/mesin_listrik.jpeg'],
            ['code' => 'IL', 'name' => 'LAB Installasi Listrik', 'link_stream' => 'https://www.youtube.com/embed/tgbNymZ7vqY', 'foto' => 'uploads/installasi_listrik.jpeg'],
            ['code' => 'IP', 'name' => 'LAB Instrument dan Pengukuran', 'link_stream' => 'https://www.youtube.com/embed/tgbNymZ7vqY', 'foto' => 'uploads/instrumen_dan_pengukuran.jpeg'],
        ];

        Room::insert($rooms);
    }
}
