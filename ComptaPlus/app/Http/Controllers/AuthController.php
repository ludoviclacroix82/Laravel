<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){

        return view('auth.login');
    }

    public function loginCheck(AuthRequest $request){

        $sessionUser = $request->validated();

        if(Auth::attempt($sessionUser)){
            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success','user Login !');
        }

        return to_route('auth.login')->withErrors([
                'email'=>'Email invalid !'
            ]
        )->onlyInput('email');

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('auth.login')->with('success','User logout!');
    }
}
