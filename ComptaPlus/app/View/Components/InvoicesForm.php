<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InvoicesForm extends Component
{
    /**
     * Create a new component instance.
     */
    public $invoices;
    public function __construct($invoices = null)
    {
        $this->invoices = $invoices;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.invoices-form');
    }
}
