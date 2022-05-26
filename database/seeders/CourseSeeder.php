<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $lorem = 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus sed non eligendi aperiam debitis assumenda quibusdam quod ipsa animi, quaerat omnis. Nulla architecto quaerat reiciendis eos recusandae sequi, deserunt illum.';
        $courses = ['Myanmar', 'English', 'Math', 'Physics', 'Chemistry', 'Bio', 'Eco'];
        foreach ($courses as $c) {
            DB::insert('insert into courses ( name,description,created_at,updated_at) values (?,?,?,?)', [$c, $lorem, now(), now()]);
        }
    }
}
