<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $users->getCollection()->transform(function ($user) {
            $user->updated_at_format = $user->updated_at->format('d-m-Y');
            $user->created_at_format = $user->created_at->format('d-m-Y');
            return $user;
        });

        return view('admin.user.home', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        if (Gate::denies('create', $user))
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');

        $roles = $user->getRole();

        return view('admin.user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUsersRequest $request, User $user)
    {
        $datas = $request->validated();
        $datas['password'] = $request->name . 'Compta';
        $datas['updated_at'] = now();
        $datas['created_at'] = now();

        $user->create($datas);

        $previousUrl = $request->input('previous_url');

        if ($datas)
            return redirect()->to($previousUrl)->with('success', 'User a été crée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        if (Gate::denies('index', $user))
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');

        return view('admin.user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        if (Gate::denies('update', $user))
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');

        $roles = $user->getRole();

        return view('admin.user.edit', ['users' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateUsersRequest $request, User $user)
    {
        if (Gate::denies('update', $user))
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');


        $datas = $request->validated();
        $datas['updated_at'] = now();

        if ($datas['password'] === null && $datas['passwordConfirm'] === null) {
            $user->update(
                [
                    'name' => $datas['name'],
                    'role' => $datas['role'],
                    'email' => $datas['email'],
                ]
            );
        }else{
            $user->update(
                [
                    'name' => $datas['name'],
                    'role' => $datas['role'],
                    'email' => $datas['email'],
                    'password' => $datas['password']
                ]
            );
        }




        $previousUrl = $request->input('previous_url');

        if ($datas)
            return redirect()->to($previousUrl)->with('success', 'User a été crée avec succès !');
    }


    public function delete(User $user)
    {
        if (Gate::denies('delete', $user))
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');

        return view('admin.user.delete', ['users' => $user]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Request $request)
    {
        $result = $user->delete();
        $previousUrl = $request->input('previous_url');

        if ($result)
            return redirect()->to($previousUrl)->with('success', 'User a été crée avec succès !');
    }
}
