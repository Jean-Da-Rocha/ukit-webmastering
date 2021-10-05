<?php

namespace App\Actions\Charts;

use App\Services\HomeChartsData;

class BuildUserTasksChart
{
    /**
     * HomeChartsData service instance.
     *
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

    public function execute()
    {
        return app()->chartjs
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
    }
}
