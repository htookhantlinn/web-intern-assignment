<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Inertia\Inertia;

class PageController extends Controller
{
    //
    public function index(Request $request)
    {
        $students = StudentResource::collection(Student::query()->orderByName()->paginate(7));
        if ($request->tab) {
            $students->appends(['tab' => $request->tab])->links();
        }
        return Inertia::render('Welcome', [
            'students' => $students,
            'filters' => FacadesRequest::all('tab')
        ]);
    }
}
