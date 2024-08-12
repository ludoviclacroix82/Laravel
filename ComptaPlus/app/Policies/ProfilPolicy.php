<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;

class ProfilPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function index(User $user)
    {
        return $user->id === Auth::user()->id
            ? Response::allow()
            : Response::deny('You do not have permission to view this page.');
    }

}
