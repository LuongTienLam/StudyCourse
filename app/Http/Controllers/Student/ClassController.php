<?php

namespace App\Http\Controllers\Student;

use App\ClassRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function index()
    {
        return view('dashboard-user.classes.index');
    }

    public function show($class)
    {
        foreach(Auth::guard('web')->user()->classes->pluck('id') as $id)
        {
            if($id == $class)
            {
                $class = ClassRoom::findOrFail($class);

                $exams = $class->course->exams;

                return view('dashboard-user.classes.show',compact('class','exams'));
            }
        }

        return redirect()->route('student.class.index');
    }
}
