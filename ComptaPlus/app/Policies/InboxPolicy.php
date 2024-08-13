<?php

namespace App\Policies;

use App\Models\Inbox;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;

class InboxPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function index(User $user): bool
    {
        return $user->id === Auth::user()->id;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->id === Auth::user()->id;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user , Inbox $inbox): bool
    {
        return $user->id === Auth::user()->id && $inbox->sender_id === $user->id || $inbox->receiver_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->id === Auth::user()->id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Inbox $inbox): bool
    {
        return $user->id === Auth::user()->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Inbox $inbox): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Inbox $inbox): bool
    {
        return $user->role === 'admin' ;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Inbox $inbox): bool
    {
        return $user->role === 'admin' ;
    }
}
