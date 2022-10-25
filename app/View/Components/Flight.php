<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Flight extends Component
{
    public $flight;

    public function __construct($flight)
    {
        $this->flight = $flight;
    }

    public function render()
    {
        return view('components.flight');
    }
}
