<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteButton extends Component
{

    public $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    public function render()
    {
        return view('components.delete-button');
    }
}
