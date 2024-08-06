<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index(Request $request,Auth $auth)
    {
        if (Gate::denies('admin.index')) {
            return redirect()->route('home')->with('error',Auth::user()->name.' :  You do not have permission to view this page.');
        }
        return view('admin.home');
    }
}
