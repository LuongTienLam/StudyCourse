<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');
        //attempt login.
        if(Auth::guard('admin')->attempt(['email' => $email, 'password' =>$password])){
            //Authenticated, redirect to the intended route
            //if available else admin dashboard.
            return redirect()
                ->intended(route('admin.home'))
                ->with('status','You are Logged in as Admin!');
        }

        //Authentication failed, redirect back with input.
        return $this->loginFailed();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()
            ->route('admin.login')
            ->with('status','Admin has been logged out!');
    }


    private function loginFailed(){
        return view('admin.auth.login',[
            'error' => 'Username or Password not correct'
        ]);
    }
}
