<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::all();
        return view('home',compact('courses'));
    }

    public function chatBot(Request $request)
    {
        $text_chat = $request->text_chat;

        if($text_chat == '/help')
        {
            return response()->json([
                'type' => 'text',
                'data' => 'List of commands<br>- <strong>/courses</strong> to show view all own course<br>- <strong>/bye</strong> to say goodbye <3',
            ], 200);
        }
        else if($text_chat == '/courses')
        {
            $courses = 'List of courses';

            foreach(Course::all() as $course)
            {
                $courses = $courses . '<br>- ' . $course->name;
            }

            return response()->json([
                'type' => 'text',
                'data' => $courses,
            ], 200);
        }
        else if($text_chat == '/bye')
        {
            return response()->json([
                'type' => 'text',
                'data' => 'Goodbye see you later <3'
            ], 200);
        }
        else
        {
            return response()->json([
                'type' => 'text',
                'data' => 'Hi, I dont understand, please type /help'
            ], 200);
        }
    }
}
