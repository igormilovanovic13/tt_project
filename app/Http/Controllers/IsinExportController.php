<?php
namespace App\Http\Controllers;

use App\Services\IsinExport;

class IsinExportController
{
    public function __invoke(IsinExport $isinExport)
    {
        return $isinExport->download();
    }
}
