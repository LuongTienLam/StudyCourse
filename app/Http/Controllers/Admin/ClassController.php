<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\ClassRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassRoom::all();
        return view('admin.classes.index', compact('classes'));
    }

    public function show($class)
    {
        $class = ClassRoom::findOrFail($class);
        return view('admin.classes.show',compact($class));
    }

    public function create()
    {
        $courses = Course::all();
        return view('admin.classes.add', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course' => 'required',
            'schedule' => 'required',
            'start' => 'required',
        ]);

        $class = ClassRoom::create([
            'course_id' => $data['course'],
            'schedule' => $data['schedule'],
            'start' => $data['start'],
        ]);

        return redirect()->route('admin.class.index');
    }

    public function edit($class)
    {
        $class = ClassRoom::findOrFail($class);
        $courses = Course::all();

        return view('admin.classes.edit', compact('courses','class'));
    }

    public function update(Request $request,$class)
    {
        $class = ClassRoom::findOrFail($class);
        
        $data = $request->validate([
            'course' => 'required',
            'schedule' => 'required',
            'start' => 'required',
        ]);

        $class->course_id = $data['course'];
        $class->schedule = $data['schedule'];
        $class->start = $data['start'];
        $class->save();

        return redirect()->route('admin.class.index');
    }

    public function destroy(Request $request,$class)
    {
        $class = ClassRoom::findOrFail($class);

        $class->delete();

        return redirect()->route('admin.class.index');
    }
}
