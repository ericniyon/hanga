<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\ApplicantInfo;
use App\Exports\ApplicantInfoExport;
use Excel;
use Maatwebsite\Excel\Concerns\Exportable;

class Applicants extends Component
{
    use Exportable;
    public $searchKey = '';
    public $bySkills;
    public $from;
    public $until;
    public $perPage = 10;



    public function export()
    {
        // $data = ApplicantInfo::get()->toArray();

        // return Excel::download('laravelcode.xlsx', function($excel) use ($data) {
        //     $excel->sheet('mySheet', function($sheet) use ($data)
        //     {
        //         $sheet->cell('A1', function($cell) {$cell->setValue('First Name');   });
        //         $sheet->cell('B1', function($cell) {$cell->setValue('Last Name');   });
        //         $sheet->cell('C1', function($cell) {$cell->setValue('Email');   });
        //         if (!empty($data)) {
        //             foreach ($data as $key => $value) {
        //                 $i= $key+2;
        //                 $sheet->cell('A'.$i, $value['firstname']);
        //                 $sheet->cell('B'.$i, $value['lastname']);
        //                 $sheet->cell('C'.$i, $value['email']);
        //             }
        //         }
        //     });
        // } );
        // return (new ApplicantInfoExport)->download('invoices.xlsx');
        return Excel::download(new ApplicantInfoExport, 'applicant_infos.xlsx');
        // return new ApplicantInfoExport();
    }


    public function render()
    {
        $applications = ApplicantInfo::when($this->searchKey, function($query){
            return $query->where('full_name', 'like','%'.$this->searchKey.'%');
        })
        ->when($this->bySkills, function($query1){
            return $query1->where('skills', $this->bySkills);
        })
        ->when($this->from, function($query2){
            return $query2->whereDate('created_at','>=',$this->from);
        })
        ->when($this->until, function($query3){
            return $query3->whereDate('created_at','<=',$this->until);
        })
        ->orderByDesc('created_at')
        ->paginate($this->perPage)
        ;
        return view('livewire.frontend.applicants', compact('applications'))
                ->extends("layouts.master")
                ->section("content")
        ;
    }
}
