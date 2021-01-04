<?php

namespace App\Http\Controllers;

use App\Actions\TimeCalculation;
use App\Models\User;

final class UserController extends Controller
{
    /**
     * Show an user's profile.
     *
     * @param  int  $userId
     * @return \Illuminate\View\View
     */
    public function __invoke(int $userId)
    {
        $user = User::with([
            'tasks' => fn ($query) => $query->where('duration', '!=', null)
        ])->findOrFail($userId);

        return view('users.profile', [
            'user' => $user,
            'timeSpentOnTasks' => (new TimeCalculation($user))->getTotalTasksTime(),
        ]);
    }
}
