<?php

namespace App\Http\Controllers;

use App\Models\Task;

final class TaskController extends Controller
{
    /**
     * Show a given task's details.
     *
     * @param  int  $taskId
     * @return \Illuminate\View\View
     */
    public function __invoke(int $taskId)
    {
        return view('tasks.details', [
            'task' => Task::with('project.customer:id,designation')->findOrFail($taskId),
        ]);
    }
}
