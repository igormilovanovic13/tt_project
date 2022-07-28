<?php

namespace App\Http\Controllers;

use App\Exports\IsinExcelExport;
use Maatwebsite\Excel\Facades\Excel;

class IsinExcelExportController
{
    public function __invoke()
    {
        return Excel::download(new IsinExcelExport(), 'Report.xlsx');
    }
}
