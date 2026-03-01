<?php

namespace App\Http\Controllers\Admin\Notification;

use App\NoteGeneral;
use App\NotePrivate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $note_privates = NotePrivate::all();
        $note_generals = NoteGeneral::all();

        return view('admin.notifications.index',compact('note_privates','note_generals'));
    }
    
}
