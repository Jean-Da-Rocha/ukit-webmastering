<?php

namespace App\Http\Controllers\Exports;

use App\Exports\CustomersExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class CustomerExportController extends Controller
{
    /**
     * Export customers data in .xsls format.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function __invoke()
    {
        return Excel::download(
            new CustomersExport(), now()->format('Y-m-d') . '-customers.xlsx'
        );
    }
}
