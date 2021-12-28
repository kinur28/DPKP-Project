<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auths.login');
    }
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('/Dashboard');
        }
        return redirect('/')->with('error','Email/Password yang dimasukkan salah.');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

}
