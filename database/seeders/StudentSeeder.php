<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Str;
use App\Helpers\Utilities;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        for ($i = 1; $i <= 100; $i++) {
            $student =  Student::create([
                'name' => 'Student ' . $i,
                'email' => 'student' . $i . '@demo.com',
                'roll_no' => Str::random(6),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'dob' => $faker->date(),
                'nrc' => generateNRC(),
            ]);
            if ($student->gender === 'Male') {
                $student->update([
                    'name' => generateMaleName(),
                ]);
            } else {
                $student->update([
                    'name' => generateFemaleName(),
                ]);
            }
        }
    }
}
