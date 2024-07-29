<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RestaurantForm extends Component
{
    /**
     * Create a new component instance.
     */
    public $restaurant;

    public function __construct($restaurant = null)
    {
        $this->restaurant = $restaurant;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.restaurant-form');
    }
}
