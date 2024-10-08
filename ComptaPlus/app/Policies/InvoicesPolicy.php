<?php

namespace App\Policies;

use App\Models\Invoices;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InvoicesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Invoices $invoices): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Invoices $invoices)
    {
        if($invoices->to_conclude === 0){
            return $user->id === $invoices->author_id || $user->role === 'admin'
                ? Response::allow()
                : Response::deny('You do not have permission to view this page.');
        }else{
            return $user->role === 'admin'
                ? Response::allow()
                : Response::deny('You do not have permission to view this page.');
        }


    }

    /**
     * Determine whether the user can update the model.
     */
    public function unclosed(User $user, Invoices $invoices)
    {
        return $user->id === $invoices->author_id || $user->role === 'admin'
            ? Response::allow()
            : Response::deny('You do not have permission to view this page.');

    }

     /**
     * Determine whether the user can update the model.
     */
    public function updateAuthor(User $user, Invoices $invoices)
    {
        return $user->role === 'admin';

    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Invoices $invoices)
    {
        return $user->role === 'admin'
            ? Response::allow()
            : Response::deny('You do not have permission to view this page.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Invoices $invoices)
    {
        return $user->role === 'admin'
        ? Response::allow()
        : Response::deny('You do not have permission to view this page.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Invoices $invoices)
    {
        return $user->role === 'admin'
            ? Response::allow()
            : Response::deny('You do not have permission to view this page.');
    }
}
