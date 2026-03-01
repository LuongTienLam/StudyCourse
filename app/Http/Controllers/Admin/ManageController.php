<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ManageController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.managers.index', compact('admins'));
    }

    public function show(Admin $admin)
    {
        return view('admin.managers.show',compact($admin));
    }

    public function create()
    {
        return view('admin.managers.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);

        $admin = Admin::create([
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'role' => $data['role'],
        ]);

        return redirect()->route('admin.manager.index');
    }

    public function edit(Admin $admin)
    {
        return view('admin.managers.edit',compact('admin'));
    }

    public function update(Request $request,Admin $admin)
    {
        if($admin->role == 'Manager')
        {
            $data = $request->validate([
                'fullname' => 'required',
                'phone' => 'required',
                'role' => 'required',
            ]);
    
            $admin->fullname = $data['fullname'];
            $admin->phone = $data['phone'];
            $admin->role = $data['role'];
            $admin->save();
        }

        return redirect()->route('admin.manager.index');
    }

    public function destroy(Request $request,Admin $admin)
    {
        if($admin->role == 'Manager')
        {
            $admin->delete();
        }

        return redirect()->route('admin.manager.index');
    }
}
