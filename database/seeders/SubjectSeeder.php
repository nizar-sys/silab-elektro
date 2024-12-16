<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'code' => 'MATH101',
                'name' => 'Mathematics',
                'credit' => 3,
            ],
            [
                'code' => 'PHYS101',
                'name' => 'Physics',
                'credit' => 3,
            ],
            [
                'code' => 'CHEM101',
                'name' => 'Chemistry',
                'credit' => 3,
            ],
            [
                'code' => 'BIO101',
                'name' => 'Biology',
                'credit' => 3,
            ],
            [
                'code' => 'COMP101',
                'name' => 'Computer Science',
                'credit' => 3,
            ],
        ];

        Subject::insert($subjects);
    }
}
