<?php

namespace App\Exports;

use App\Models\Application;
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

class ClientExport implements FromCollection,WithHeadings,WithTitle,ShouldQueue,ShouldAutoSize,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $query;
    public $title;
    public function __construct($query,$title)
    {
        $this->query = $query;
        $this->title=$title;

    }

    public function collection()
    {
        //
        $clients=$this->query->get();
        $data=collect();
        foreach ($clients as $client){
            $arr=array();
            $arr[]=$client->name;
            $arr[]="'".$client->phone;
            $arr[]=$client->email;
            $arr[]=$client->registrationType->name;
            $arr[]=$client->application->status==Application::APPROVED?'YES':'No';
            if($client->application->iWorkerRegistrations){
                $arr[]=$client->application->iWorkerRegistrations->province->name??'';
                $arr[]=$client->application->iWorkerRegistrations->district->name??'';
                $arr[]=$client->application->iWorkerRegistrations->sector->name??'';
                $arr[]=$client->application->iWorkerRegistrations->cell->name??'';
                $arr[]=$client->application->iWorkerRegistrations->village->name??'';
            }
            if($client->application->msmeRegistrations){
                $arr[]=$client->application->msmeRegistrations->province->name??'';
                $arr[]=$client->application->msmeRegistrations->district->name??'';
                $arr[]=$client->application->msmeRegistrations->sector->name??'';
                $arr[]=$client->application->msmeRegistrations->cell->name??'';
                $arr[]=$client->application->msmeRegistrations->village->name??'';
            }
            if($client->application->dspRegistrations){
                $arr[]=$client->application->dspRegistrations->province->name??'';
                $arr[]=$client->application->dspRegistrations->district->name??'';
                $arr[]=$client->application->dspRegistrations->sector->name??'';
                $arr[]=$client->application->dspRegistrations->cell->name??'';
                $arr[]=$client->application->dspRegistrations->village->name??'';
            }
            $data->push($arr);
        }

        return $data;
    }

    public function title(): string
    {
        return 'Member Report';
    }

    public function headings(): array
    {
        return [
            "Member Name",
            "Member phone",
            "Member Email",
            "Registration Type",
            "Is verified",
            "Province",
            "District",
            "Sector",
            "Cell",
            "Village"
        ];
    }

    public function ShouldAutoSize()
    {
        return true;
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
                $last_column = Coordinate::stringFromColumnIndex(10);
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
