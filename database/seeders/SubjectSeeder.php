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
            ],
            [
                'code' => 'PHYS101',
                'name' => 'Physics',
            ],
            [
                'code' => 'CHEM101',
                'name' => 'Chemistry',
            ],
            [
                'code' => 'BIO101',
                'name' => 'Biology',
            ],
            [
                'code' => 'COMP101',
                'name' => 'Computer Science',
            ],
        ];

        Subject::insert($subjects);
    }
}
