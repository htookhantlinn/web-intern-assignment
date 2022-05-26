<?php

namespace App\Helpers;

use App\Models\StudentCourse;
use App\Models\Transaction;
use App\Models\Wallet;
use Faker;

class UUIDGenerate
{
    public static function generateUniqueCourseId($studentId)
    {
        $faker = Faker\Factory::create();
        $course_id = $faker->randomElement([1, 2, 3, 4, 5, 6]);
        if (StudentCourse::where('student_id', $studentId)->where('course_id', $course_id)->exists()) {
            return self::generateUniqueCourseId($studentId);
        } else {
            return $course_id;
        }
    }
}
