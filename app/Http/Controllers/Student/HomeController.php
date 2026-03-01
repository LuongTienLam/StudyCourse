<?php

namespace App\Http\Controllers\Student;

use App\NoteGeneral;
use App\NotePrivate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $note_privates = NotePrivate::where('user_id',Auth::guard('web')->user()->id)->get();

        $idClassOfUser = Auth::guard('web')->user()->classes->pluck('id');

        $note_generals = NoteGeneral::whereIn('class_id',$idClassOfUser)->get();

        $total_exam = 0;
        $exam_done = 0;

        foreach(Auth::guard('web')->user()->classes as $class)
        {
            foreach($class->course->exams as $exam)
            {
                $total_exam++;
                if(isset($exam->scores->where('id',Auth::guard('web')->user()->id)->first()->pivot->score))
                {
                    $exam_done++;
                }
            }
        }

        $percent_exam = $total_exam > 0 ? number_format(($exam_done/$total_exam)*100, 2) : 0;

        return view('dashboard-user.home',compact('note_privates','note_generals','percent_exam'));
    }
}