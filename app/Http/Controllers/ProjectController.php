<?php

namespace App\Http\Controllers;

use App\Models\Project;

final class ProjectController extends Controller
{
    /**
     * Show a project's details.
     *
     * @param  int  $projectId
     * @return \Illuminate\View\View
     */
    public function __invoke(int $projectId)
    {
        // $this->authorize('haveAccess');

        return view('livewire.projects.details', [
            'project' => Project::with('users.tasks')->findOrFail($projectId),
        ]);
    }
}
