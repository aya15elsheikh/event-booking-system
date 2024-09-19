<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuthManager extends Controller
{
     function login ()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->Only('email','password');
        if (Auth::attempt($credentials)){
            return redirect()->intended(route('home'));  
        }
        return redirect(route('login'))->with("error","data are not valid");
    }

    function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'role_id'=>$request->role_id ,
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route("home")->with("success","user registerd");        
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route("login")->with("success","you are logout");

    }
}
