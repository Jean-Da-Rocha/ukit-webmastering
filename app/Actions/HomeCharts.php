<?php

namespace App\Actions;

use App\Models\Customer;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Services\HomeChartsData;

class HomeCharts
{
    /**
     * @var HomeChartsData
     */
    private HomeChartsData $homeCharts;

    /**
     * Instantiate the HomeChart service to get datasets.
     *
     * @return void
     */
    public function __construct()
    {
        $this->homeCharts = new HomeChartsData();
    }

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
            ->labels(['Admins', 'Webmasters', 'Developers'])
            ->datasets([
                [
                    'backgroundColor' => ['#fd5d93', '#ff8d72', '#00f2c3'],
                    'data' => [
                        User::where('role_id', config('role.admin'))->count(),
                        User::where('role_id', config('role.webmaster'))->count(),
                        User::where('role_id', config('role.developer'))->count(),
                    ],
                ],
            ])
            ->optionsRaw([
                'legend' => [
                    'labels' => ['fontColor' => '#fff'],
                ],
            ]);

        $expensiveHostingsChart = app()->chartjs
            ->name('expensiveHostings')
            ->type('horizontalBar')
            ->labels(collect($this->homeCharts->getMostExpensiveHostings('domain_name'))->all())
            ->datasets([
                [
                    'backgroundColor' => ['#1d8cf8', '#e14eca', '#00f2c3', '#ff8d72', '#8965e0'],
                    'data' => collect($this->homeCharts->getMostExpensiveHostings())->all(),
                ],
            ])
            ->optionsRaw([
                'legend' => [
                    'labels' => ['fontColor' => '#fff'],
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
                                'beginAtZero' => true,
                            ],
                        ],
                    ],
                ],
            ]);

        $userTasksChart = app()->chartjs
            ->name('userTasks')
            ->type('pie')
            ->labels($this->homeCharts->getUsersWithMostTasks()->all())
            ->datasets([
                [
                    'backgroundColor' => ['#1d8cf8', '#e14eca', '#00f2c3', '#ff8d72', '#8965e0'],
                    'data' => $this->homeCharts->getUsersWithMostTasks('tasks_count')->all(),
                ],
            ])
            ->optionsRaw([
                'legend' => [
                    'labels' => ['fontColor' => '#fff'],
                    'display' => true,
                ],
            ]);

        return compact(
            'globalStatsChart',
            'userRoleChart',
            'expensiveHostingsChart',
            'userTasksChart',
        );
    }
}
