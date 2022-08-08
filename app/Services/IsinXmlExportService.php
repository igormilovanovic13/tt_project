<?php

namespace App\Services;

use App\Models\Isin;
use DOMDocument;
use Exception;

class IsinXmlExportService implements IsinExport
{
    public function download()
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
            return back()->with(['Error' => 'WARNING: XML validation failed!']);
        }
    }
}
