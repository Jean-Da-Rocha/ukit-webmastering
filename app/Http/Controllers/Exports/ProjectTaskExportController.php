<?php

namespace App\Http\Controllers\Exports;

use App\Exports\ProjectTasksExport;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Maatwebsite\Excel\Facades\Excel;

final class ProjectTaskExportController extends Controller
{
    /**
     * Export projects data in .xsls format.
     *
     * @param  int  $id (project's id).
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function __invoke(int $id)
    {
        $exportFile = new ProjectTasksExport();
        $exportFile->project_id = $id;

        $project = Project::findOrFail($id);

        return Excel::download($exportFile, $project->name . '-tasks.xlsx');
    }
}
