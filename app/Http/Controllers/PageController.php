<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;
use Illuminate\Support\Str;

class PageController extends Controller
{
    //
    public function index(Request $request)
    {
        $students = StudentResource::collection(Student::query()->orderByName()->paginate(7));
        $courses = Course::all();
        if ($request->tab) {
            $students->appends(['tab' => $request->tab])->links();
        }
        return Inertia::render('Welcome', [
            'students' => $students,
            'filters' => FacadesRequest::all('tab'),
            'courses' => $courses
        ]);
    }

    public function store(Request $request)
    {

        $data =  $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'gender' => ['required'],
            'dob' => ['required'],
            'nrc' => ['required'],
            'courses' => ['required'],
        ], [
            'name.required' => 'Please Fill Name',
            'email.required' => 'Please Fill Email',
            'gender.required' => 'Please Select Gender',
            'dob.required' => 'Please Select Gender',
            'nrc.required' => 'Please Select NRC',
            'courses.required' => 'Please Choose Courses',
        ]);

        $student = Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'nrc' => $data['nrc'],
            'roll_no' =>  Str::random(6)
        ]);
        foreach ($data['courses'] as $course_id) {
            DB::insert('insert into student_courses (course_id,student_id) values(?,?) ', [$course_id, $student->id]);
        }

        return redirect()->back()->with('success', 'Student Created Successfully.');
    }
}
