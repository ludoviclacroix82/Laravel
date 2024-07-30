<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClientsForm extends Component
{
    /**
     * Create a new component instance.
     */
    public $clients;
    public function __construct($clients = null)
    {
        $this->clients = $clients;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.clients-form');
    }
}
