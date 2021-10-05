<?php

namespace App\Actions\Charts;

use App\Models\Customer;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class BuildGlobalStatsChart
{
    public function execute()
    {
        return app()->chartjs
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
    }
}
