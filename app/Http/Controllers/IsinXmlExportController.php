<?php

namespace App\Http\Controllers;

use App\Models\Isin;
use App\Services\XmlGeneratorService;
use DOMDocument;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class IsinXmlExportController
{
    public function __invoke()
    {
        $data = Isin::with('titleinfodata')->get();

        $xw = XmlGeneratorService::isinXmlGenerator($data);

        try {
            tap(new DOMDocument('1.0', 'utf-8'))
                ->loadXML($xw)
                ->schemaValidateSource(Storage::get('public/validation_schema.xsd'));
            return response()->streamDownload(function () use ($xw) {
                echo $xw;
            }, 'Report.xml');
        } catch (Exception $exception) {
            return back()->with(['Error' => 'Failed validation!']);
        }
    }
}
