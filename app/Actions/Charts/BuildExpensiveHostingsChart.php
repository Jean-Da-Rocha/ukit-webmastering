<?php

namespace App\Actions\Charts;

use App\Services\HomeChartsData;

class BuildExpensiveHostingsChart
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
    }
}
