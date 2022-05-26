<?php

namespace Database\Seeders;

use App\Helpers\UUIDGenerate;
use App\Models\StudentCourse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;

class StudentCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($student_id = 1; $student_id <= 100; $student_id++) {
            for ($i = 1; $i <= 3; $i++) {
                StudentCourse::create([
                    'student_id' => $student_id,
                    'course_id' => UUIDGenerate::generateUniqueCourseId($student_id),
                ]);
            }
        }
    }
}
