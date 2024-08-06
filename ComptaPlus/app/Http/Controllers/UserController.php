<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {

        if (Gate::denies('index', $user)) 
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');
        

        $users = $user->paginate(10);

        $users->getCollection()->transform(function ($user){
            $user->updated_at_format = $user->updated_at->format('d-m-Y');
            $user->created_at_format = $user->created_at->format('d-m-Y');
            return $user;
        });

        return view('admin.user.home',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (Gate::denies('index', $user)) 
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');

        return view('admin.user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
