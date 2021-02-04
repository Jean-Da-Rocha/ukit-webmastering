<?php

namespace App\Actions;

use App\Models\{Customer, Project, Task, User};

class HomeCharts
{
    /**
     * Build several charts which will be
     * displayed in the home page.
     *
     * @return array
     */
    public function build()
    {
        $globalStatsChart = app()->chartjs
            ->name('globalStats')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Total Projects', 'Total Tasks', 'Total Users', 'Total Customers'])
            ->datasets([
                [
                    'backgroundColor' => ['#1d8cf8', '#e14eca', '#00f2c3', '#ff8d72'],
                    'data' => [Project::count(), Task::count(), User::count(), Customer::count()],
                ],
            ])
            ->optionsRaw([
                'legend' => [
                    'display' => false,
                ],
                'scales' => [
                    'yAxes' => [
                        [
                            'ticks' => [
                                'beginAtZero' => true,
                                'fontColor' => '#fff',
                            ],
                        ],
                    ],
                    'xAxes' => [
                        [
                            'ticks' => [
                                'fontColor' => '#fff',
                            ],
                        ],
                    ],
                ],
            ]);

        $userRoleChart = app()->chartjs
            ->name('userRole')
            ->type('doughnut')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Admins', 'Webmasters', 'Developers'])
            ->datasets([
                [
                    'backgroundColor' => ['#f5365c', '#ff8d72', '#00f2c3'],
                    'data' => [
                        User::where('role_id', config('role.admin'))->count(),
                        User::where('role_id', config('role.webmaster'))->count(),
                        User::where('role_id', config('role.developer'))->count()
                    ],
                ],
            ])
            ->optionsRaw([
                'legend' => [
                    'labels' => ['fontColor' => '#fff'],
                ],
            ]);

        return compact('globalStatsChart', 'userRoleChart');
    }
}
