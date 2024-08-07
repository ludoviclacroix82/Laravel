<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserForm extends Component
{
    /**
     * Create a new component instance.
     */
    public $users;
    public $roles;
    public function __construct($users = null , $roles = null)
    {
        $this->users = $users;
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-form');
    }
}
