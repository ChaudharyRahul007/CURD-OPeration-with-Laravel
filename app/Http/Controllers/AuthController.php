<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        // validate data 
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // login code 

        if(\Auth::attempt($request->only('email','password'))){
            return redirect('home');
        }

        return redirect('login')->withError('Login details are not valid');

    }

}
