<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function showFormUpdateProfile()
    {
        return view('admin.accounts.profile');
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required',
        ]);

        Auth::guard('admin')->user()->fullname = $data['fullname'];
        Auth::guard('admin')->user()->phone = $data['phone'];
        Auth::guard('admin')->user()->save();

        $request->session()->flash('message', 'Change your info successfull !');

        return redirect()->route('admin.account.edit-profile');
    }

    public function showFormUpdatePassword()
    {
        return view('admin.accounts.password');
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        if(!Hash::check($data['old_password'], Auth::guard('admin')->user()->password))
        {
            $request->session()->flash('error', 'Your old password are not correct !');

            return redirect()->route('admin.account.edit-password');
        }

        $request->session()->flash('message', 'Change password successfull !');

        Auth::guard('admin')->user()->password = Hash::make($data['password']);
        Auth::guard('admin')->user()->save();

        return redirect()->route('admin.account.edit-password');
    }
}
