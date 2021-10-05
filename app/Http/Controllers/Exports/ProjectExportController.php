<?php

namespace App\Http\Controllers\Exports;

use App\Exports\ProjectsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

final class ProjectExportController extends Controller
{
    /**
     * Export projects data in .xsls format.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function __invoke()
    {
        return Excel::download(
            new ProjectsExport(),
            now()->format('Y-m-d') . '-projects.xlsx'
        );
    }
}
