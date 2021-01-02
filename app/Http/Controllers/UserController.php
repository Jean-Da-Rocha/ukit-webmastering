<?php

namespace App\Http\Controllers;

use App\Actions\TimeCalculation;
use App\Models\User;

final class UserController extends Controller
{
    /**
     * Show an user's profile.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function __invoke(int $id)
    {
        $user = User::with([
            'tasks' => fn ($query) => $query->where('duration', '!=', null)
        ])->findOrFail($id);

        return view('users.profile', [
            'user' => $user,
            'timeSpentOnTasks' => (new TimeCalculation($user))->getTotalTasksTime(),
        ]);
    }
}
