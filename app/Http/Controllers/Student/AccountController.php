<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function showFormUpdateProfile()
    {
        return view('dashboard-user.accounts.profile');
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required|max:255',
            'birthday' => 'required',
            'phone' => 'required',
        ]);

        if(isset($request->url_avatar))
        {
            // DELETE IMAGE EXIST
            if(File::exists(public_path(Auth::guard('web')->user()->url_avatar))){

                File::delete(public_path(Auth::guard('web')->user()->url_avatar));
            }

            // UPLOAD NEW IMAGE
            $image = $request->file('url_avatar');
            $image_path = '/storage/uploads/image_avatar/' . time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/storage/uploads/image_avatar');

            $image->move($path ,$image_path);
        }
        else
        {
            $image_path = Auth::guard('web')->user()->url_avatar;
        }

        Auth::guard('web')->user()->fullname = $data['fullname'];
        Auth::guard('web')->user()->birthday = $data['birthday'];
        Auth::guard('web')->user()->phone = $data['phone'];
        Auth::guard('web')->user()->url_avatar = $image_path;
        Auth::guard('web')->user()->save();

        $request->session()->flash('message', 'Change your info successfull !');

        return redirect()->route('student.account.edit-profile');
    }

    public function showFormUpdatePassword()
    {
        return view('dashboard-user.accounts.password');
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        if(!Hash::check($data['old_password'], Auth::guard('web')->user()->password))
        {
            $request->session()->flash('error', 'Your old password are not correct !');

            return redirect()->route('student.account.edit-password');
        }

        $request->session()->flash('message', 'Change password successfull !');

        Auth::guard('web')->user()->password = Hash::make($data['password']);
        Auth::guard('web')->user()->save();

        return redirect()->route('student.account.edit-password');
    }
}
