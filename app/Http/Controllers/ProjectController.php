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
        return view('livewire.projects.details', [
            'project' => Project::findOrFail($projectId),
        ]);
    }
}
