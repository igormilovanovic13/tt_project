<?php
namespace App\Http\Controllers;

use App\Services\IsinExport;

class IsinExportController
{
    public function export(IsinExport $isinExport)
    {
        return $isinExport->download();
    }
}
