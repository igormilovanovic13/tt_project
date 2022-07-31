<?php

namespace App\Services;

use App\Exports\IsinExcelExport;
use Maatwebsite\Excel\Facades\Excel;

class IsinExcelExportService implements IsinExport
{
    public function download()
    {
        return Excel::download(new IsinExcelExport(), 'Report.xlsx');
    }
}
