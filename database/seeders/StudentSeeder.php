<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()
            ->count(10)
            ->hasStudent(1) // Menghubungkan User dengan 1 Student
            ->create();

        $role = \Spatie\Permission\Models\Role::where('name', 'mahasiswa')->first();
        foreach ($users as $user) {
            $user->assignRole($role);
        }
    }
}
