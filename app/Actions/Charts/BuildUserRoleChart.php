<?php

namespace App\Actions\Charts;

use App\Models\User;

class BuildUserRoleChart
{
    public function execute()
    {
        return app()->chartjs
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
    }
}
