<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LessonController extends Controller
{
    public function show(Course $course)
    {

        $lessons = $course->lessons;

        return view('dashboard-user.lessons.show',compact('lessons','course'));
    }

    public function showLesson(Lesson $lesson)
    {
        return view('dashboard-user.lessons.show-lesson',compact('lesson'));
    }
}
