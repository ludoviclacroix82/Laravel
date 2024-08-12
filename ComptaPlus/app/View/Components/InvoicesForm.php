<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Clients;

class InvoicesForm extends Component
{
    /**
     * Create a new component instance.
     */
    public $invoices;
    public $clientsAll;
    public $usersAll;
    public function __construct($invoices = null,$clientsAll = null , $usersAll = null)
    {
        $this->invoices = $invoices;
        $this->clientsAll = $clientsAll;
        $this->usersAll = $usersAll;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.invoices-form');
    }

}
