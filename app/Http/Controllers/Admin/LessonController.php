<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('admin.lessons.index', compact('lessons'));
    }

    public function show(Lesson $lesson)
    {
        return view('admin.lessons.show',compact('lesson'));
    }

    public function create()
    {
        $courses = Course::all();
        
        return view('admin.lessons.add', compact('courses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course' => 'required',
            'title' => 'required',
            'description' => 'required',
            'link_video' => 'required',
        ]);

        $lesson = Lesson::create([
            'course_id' => $data['course'],
            'title' => $data['title'],
            'description' => $data['description'],
            'link_video' => $data['link_video'],
        ]);

        return redirect()->route('admin.lesson.index');
    }

    public function edit(Lesson $lesson)
    {
        $courses = Course::all();

        return view('admin.lessons.edit', compact('courses','lesson'));
    }

    public function update(Request $request,Lesson $lesson)
    {
        
        $data = $request->validate([
            'course' => 'required',
            'title' => 'required',
            'description' => 'required',
            'link_video' => 'required',
        ]);

        $lesson->course_id = $data['course'];
        $lesson->title = $data['title'];
        $lesson->description = $data['description'];
        $lesson->link_video = $data['link_video'];
        $lesson->save();

        return redirect()->route('admin.lesson.index');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('admin.lesson.index');
    }
}
