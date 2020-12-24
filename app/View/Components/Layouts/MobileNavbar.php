<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class MobileNavbar extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('layouts.mobile_navbar');
    }
}
