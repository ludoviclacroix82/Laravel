<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tableUser extends Component
{
    /**
     * Create a new component instance.
     */
    public $users;
    public function __construct($users = null)
    {
        $this->users = $users;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-user');
    }
}
