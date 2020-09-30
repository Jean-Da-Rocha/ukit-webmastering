<?php

namespace App\Http\Controllers;

use App\Models\{Customer, Project, Task, User};

final class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return void
     */
    public function __invoke()
    {
        return view('home', [
            'totalProjects' => Project::count(),
            'totalTasks' => Task::count(),
            'totalCustomers' => Customer::count(),
            'totalUsers' => User::count(),
        ]);
    }
}
