<?php

namespace App\Http\Controllers;

use App\Models\Isin;
use App\Services\XmlGeneratorService;
use DOMDocument;
use Exception;
use Illuminate\Support\Facades\File;

class IsinXmlExportController
{
    public function __invoke()
    {
        $data = Isin::with('titleinfodata')->get();

        $xw = XmlGeneratorService::isinXmlGenerator($data);

        try {
            tap((new DOMDocument('1.0', 'utf-8')))
                ->loadXML($xw)
                ->schemaValidate('validation_schema.xsd');
            return response()->streamDownload(function () use ($xw) {
                echo $xw;
            }, 'Report.xml');
        } catch (Exception $exception) {
            throw new Exception('File validation failed!');
        }
    }
}
