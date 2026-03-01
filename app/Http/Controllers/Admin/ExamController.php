<?php

namespace App\Http\Controllers\Admin;

use App\Exam;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.exams.index',compact('courses'));
    }

    public function changeStatus(Exam $exam)
    {
        if($exam->status == 'UnLock')
        {
            $exam->status = 'Lock';
        }
        else if ($exam->status == 'Lock')
        {
            $exam->status = 'UnLock';
        }

        $exam->save();

        return redirect()->route('admin.exam.index');
    }

    public function edit(Exam $exam)
    {
        return view('admin.exams.edit',compact('exam'));
    }

    public function update(Request $request, Exam $exam)
    {
        $data = $request->validate([
            'name' => 'required',
            'total_time' => 'required'
        ]);

        $exam->name = $data['name'];
        $exam->total_time = $data['total_time'];
        $exam->save();

        return redirect()->route('admin.exam.index');
    }
}
