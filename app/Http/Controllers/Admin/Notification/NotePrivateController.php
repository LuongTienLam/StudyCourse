<?php

namespace App\Http\Controllers\Admin\Notification;

use App\User;
use App\NotePrivate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotePrivateController extends Controller
{
    
    public function create()
    {
        $users = User::all();

        return view('admin.notifications.add-private',compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        NotePrivate::create([
            'user_id' => $data['user'],
            'admin_id' => Auth::guard('admin')->user()->id,
            'title' => $data['title'],
            'content' => $data['content'],
        ]);

        return redirect()->route('admin.notification.index');

    }

    public function edit($notification)
    {
        $notification = NotePrivate::findOrFail($notification);
        $users = User::all();

        return view('admin.notifications.edit-private',compact('users','notification'));
    }

    public function update(Request $request,$notification)
    {
        $notification = NotePrivate::findOrFail($notification);

        $data = $request->validate([
            'user' => 'required',
            'title' => 'required',
            'content' => 'required',
        ]);

        $notification->user_id = $data['user'];
        $notification->title = $data['title'];
        $notification->content = $data['content'];
        $notification->save();

        return redirect()->route('admin.notification.index');
    }

    public function delete($notification)
    {
        $notification = NotePrivate::findOrFail($notification);

        $notification->delete();

        return redirect()->route('admin.notification.index');
    }

    
}
