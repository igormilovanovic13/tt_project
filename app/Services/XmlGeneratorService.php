<?php

namespace App\Services;

use PhpOffice\PhpSpreadsheet\Shared\XMLWriter;

class XmlGeneratorService
{
    public static function isinXmlGenerator($data)
    {
        $xw = new XMLWriter();
        $xw->openMemory();
        $xw->startDocument('1.0', 'UTF-8');

        $xw->startElement('REPORT');
        $xw->startElement('ISINS');
        $data->each(function ($elem) use ($xw) {
            $xw->startElement('ISIN');
            $xw->startElement('VALUE');
            $xw->text($elem->ISIN);
            $xw->endElement(); //VALUE
            if ($elem->ValidUntil !== null) {
                $xw->startElement('VALIDUNTIL');
                $xw->text($elem->ValidUntil);
                $xw->endElement(); //VALIDUNTIL
            }
            $xw->endElement(); //ISIN
        });
        $xw->endElement(); // ISINS

        $xw->startElement('TITLEINFODATA');
        $data->each(function ($elem) use($xw) {
            if ($elem->ValidUntil === null) {
                $xw->startElement('TITLEINFO');
                $xw->startElement('ID');
                $xw->text($elem->titleinfodata->TitleInfoDataID);
                $xw->endElement(); // ID
                $xw->startElement('ISIN');
                $xw->text($elem->ISIN);
                $xw->endElement(); // ISIN
                $xw->startElement('TITLENAME');
                $xw->text($elem->titleinfodata->TitleName);
                $xw->endElement(); // TITLENAME
                $xw->startElement('CURRENCY');
                $xw->text($elem->titleinfodata->Currency);
                $xw->endElement(); // CURRENCY
                $xw->startElement('EMITTENTNAME');
                $xw->text($elem->titleinfodata->EmittentName);
                $xw->endElement(); // EmittentName
                $xw->endElement(); // TITLEINFO
            }
        });
        $xw->endElement(); // TITLEINFODATA
        $xw->endElement(); // REPORT
        $xw->endDocument();
        return $xw->flush();
    }
}
