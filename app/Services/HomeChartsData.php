<?php

namespace App\Services;

use App\Models\{Hosting, User};

class HomeChartsData
{
    /**
     * Get the top 5 hostings with highest pricing.
     *
     * @param  string  $pluckBy
     * @return array
     */
    public function getMostExpensiveHostings(string $pluckBy = 'pricing')
    {
        return Hosting::orderBy('pricing', 'desc')
            ->pluck($pluckBy)
            ->take(5);
    }

    /**
     * Get the top 5 users with the highest number of tasks.
     *
     * @param  string  $pluckBy
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUsersWithMostTasks(string $pluckBy = 'username')
    {
        return User::select('username')
            ->withCount('tasks')
            ->orderBy('tasks_count', 'desc')
            ->pluck($pluckBy)
            ->take(5);
    }
}
