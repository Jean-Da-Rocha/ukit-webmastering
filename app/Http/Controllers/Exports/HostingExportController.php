<?php

namespace App\Http\Controllers\Exports;

use App\Exports\HostingsExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

final class HostingExportController extends Controller
{
    /**
     * Export hostings data in .xsls format.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function __invoke()
    {
        return Excel::download(
            new HostingsExport(),
            now()->format('Y-m-d') . '-hostings.xlsx'
        );
    }
}
