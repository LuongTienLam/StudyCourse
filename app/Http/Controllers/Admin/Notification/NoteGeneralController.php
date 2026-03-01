<?php

namespace App\Http\Controllers\Admin\Notification;

use App\ClassRoom;
use App\NoteGeneral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NoteGeneralController extends Controller
{
    
    public function create()
    {
        $classes = ClassRoom::all();

        return view('admin.notifications.add-general',compact('classes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'class' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        NoteGeneral::create([
            'class_id' => $data['class'],
            'admin_id' => Auth::guard('admin')->user()->id,
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        return redirect()->route('admin.notification.index');

    }

    public function edit($notification)
    {
        $notification = NoteGeneral::findOrFail($notification);
        $classes = ClassRoom::all();

        return view('admin.notifications.edit-general',compact('classes','notification'));
    }

    public function update(Request $request,$notification)
    {
        $notification = NoteGeneral::findOrFail($notification);

        $data = $request->validate([
            'class' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $notification->class_id = $data['class'];
        $notification->title = $data['title'];
        $notification->content = $data['content'];
        $notification->save();

        return redirect()->route('admin.notification.index');
    }

    public function delete($notification)
    {
        $notification = NoteGeneral::findOrFail($notification);

        $notification->delete();

        return redirect()->route('admin.notification.index');
    }
}
