<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            ['day' => 'Monday', 'hour' => '08:00'],
            ['day' => 'Tuesday', 'hour' => '09:00'],
            ['day' => 'Wednesday', 'hour' => '10:00'],
            ['day' => 'Thursday', 'hour' => '11:00'],
            ['day' => 'Friday', 'hour' => '12:00'],
            ['day' => 'Saturday', 'hour' => '13:00'],
            ['day' => 'Sunday', 'hour' => '14:00'],
        ];

        Schedule::insert($schedules);
    }
}
