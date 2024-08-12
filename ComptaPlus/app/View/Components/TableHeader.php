<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public string $direction;
    public string $name;
    public string $field;

    public function __construct( string $direction,string $name,string $field )
    {
        $this->direction = $direction;
        $this->name = $name;
        $this->field = $field;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-header',[
            'actived'=> $this->field === $this->name
        ]);
    }
}
