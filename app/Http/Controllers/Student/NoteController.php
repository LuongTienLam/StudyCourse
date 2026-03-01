<?php

namespace App\Http\Controllers\Student;

use App\NoteGeneral;
use App\NotePrivate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $note_privates = NotePrivate::where('user_id',Auth::guard('web')->user()->id)->get();

        $idClassOfUser = Auth::guard('web')->user()->classes->pluck('id');

        $note_generals = NoteGeneral::whereIn('class_id',$idClassOfUser)->get();

        return view('dashboard-user.notifications.index', compact('note_privates','note_generals'));
    }
}
