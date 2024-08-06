<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    public function index(User $user)
    {
        return $user->role === 'admin'
            ? Response::allow()
            : Response::deny('You do not have permission to view this page.');
    }
}
