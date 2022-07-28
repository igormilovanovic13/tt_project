<?php

namespace App\Exports;

use App\Models\Isin;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class IsinExcelExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize, WithStyles, WithEvents
{
    public function query()
    {
        return Isin::query()->orderBy('ISIN', 'ASC')->with('titleinfodata')->whereNull('ValidUntil');
    }

    public function map($row): array
    {
        return [
            $row->ISIN,
            $row->titleinfodata->TitleName,
            $row->titleinfodata->Currency,
            $row->titleinfodata->EmittentName
        ];
    }


    public function headings(): array
    {
        return [
            'ISIN',
            'TitleName',
            'Currency',
            'EmittentName'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]]
        ];
    }

    public function registerEvents(): array
    {
        return array(
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->setAutoFilter('A1:'.$event->sheet->getDelegate()->getHighestColumn().'1');
            }
        );
    }
}
