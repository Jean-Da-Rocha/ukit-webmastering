<?php

namespace App\Http\Controllers\Exports;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

final class UserExportController extends Controller
{
    /**
     * Export users data in .xsls format.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function __invoke()
    {
        return Excel::download(
            new UsersExport(),
            now()->format('Y-m-d') . '-users.xlsx'
        );
    }
}
