<?php

namespace App\Services;

use App\Models\Hosting;
use App\Models\User;

class HomeChartsData
{
    /**
     * Get the top 5 hostings with highest pricing.
     *
     * @param  string  $pluckBy
     * @return \Illuminate\Support\Collection
     */
    public function getMostExpensiveHostings(string $pluckBy = 'pricing')
    {
        return Hosting::orderBy('pricing', 'desc')
            ->limit(5)
            ->pluck($pluckBy);
    }

    /**
     * Get the top 5 users with the highest number of tasks.
     *
     * @param  string  $pluckBy
     * @return  \Illuminate\Support\Collection
     */
    public function getUsersWithMostTasks(string $pluckBy = 'username')
    {
        return User::select('username')
            ->withCount('tasks')
            ->orderBy('tasks_count', 'desc')
            ->limit(5)
            ->pluck($pluckBy);
    }
}
