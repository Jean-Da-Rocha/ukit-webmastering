<?php

namespace App\Http\Controllers;

use App\Actions\HomeCharts;

final class HomeController extends Controller
{
    /**
     * Show the home page with charts to display
     * some stats within the current application.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke()
    {
        return view('home', (new HomeCharts())->build());
    }
}
