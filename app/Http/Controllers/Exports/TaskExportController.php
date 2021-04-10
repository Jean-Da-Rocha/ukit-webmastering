<?php

namespace App\Http\Controllers\Exports;

use App\Exports\TasksExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class TaskExportController extends Controller
{
    /**
     * Export tasks data in .xsls format.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function __invoke()
    {
        return Excel::download(
            new TasksExport(), now()->format('Y-m-d') . '-tasks.xlsx'
        );
    }
}
