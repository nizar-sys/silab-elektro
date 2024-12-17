<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $this->call([
            SubjectSeeder::class,
            RoomSeeder::class,
            ScheduleSeeder::class,
            InventorySeeder::class,
            StudentSeeder::class,
        ]);
    }
}
