<?php

namespace App\Exports;

use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ReportExport implements FromCollection,WithHeadings,WithTitle,ShouldQueue,ShouldAutoSize,WithEvents
{

    protected $query;
    public $columns;
    public $data;
    public $title;
    public $headers;
    public function __construct($query,$columns,$title)
    {
        $this->query = $query;
        $this->columns=$columns;
        $this->title=$title;

    }

    public function headings(): array
    {
        $columns=[];
        foreach ($this->columns as $column){
            $columns[]=strtoupper($column);
        }
        return $columns;
    }

    public function ShouldAutoSize()
    {
        return true;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
        $data=collect();
        $applications=$this->query->get();
        foreach ($applications as $key=>$application){
            $arr=array();
            foreach ($this->columns as $column){
                is_numeric($application->{$column})?$arr[]=" ".$application->{$column}:$arr[]=$application->{$column};
            }
            $data->push($arr);
        }

        return $data;
    }


    public function title(): string
    {
        return 'Report';
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $event->sheet
                    ->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A3);
                $event->sheet
                    ->getPageSetup()
                    ->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

            },
            AfterSheet::class => function(AfterSheet $event) {
                $last_column = Coordinate::stringFromColumnIndex(count($this->columns));
                $style_text_center = [
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER
                    ]
                ];
                $event->sheet->insertNewRowBefore(1);
                // merge cells for full-width
                $event->sheet->mergeCells(sprintf('A1:%s1',$last_column));
                // assign cell values
                $event->sheet->setCellValue('A1',$this->title);
                // assign cell styles
                $event->sheet->getStyle('A1:A2')->applyFromArray($style_text_center);
                $cellRange = sprintf('A2:%s2',$last_column); // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
                $event->sheet->getDelegate()->getStyle(sprintf('A1:%s1',$last_column))->getFont()->setSize(16);
            },
        ];
    }


}
