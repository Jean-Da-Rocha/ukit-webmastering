<?php

namespace App\Http\Controllers;

use App\Actions\Charts\BuildExpensiveHostingsChart;
use App\Actions\Charts\BuildGlobalStatsChart;
use App\Actions\Charts\BuildUserRoleChart;
use App\Actions\Charts\BuildUserTasksChart;

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
        return view('home', [
            'globalStatsChart' => (new BuildGlobalStatsChart())->execute(),
            'userRoleChart' => (new BuildUserRoleChart())->execute(),
            'expensiveHostingsChart' => (new BuildExpensiveHostingsChart())->execute(),
            'userTasksChart' => (new BuildUserTasksChart())->execute(),
        ]);
    }
}
