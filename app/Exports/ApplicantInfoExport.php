<?php

namespace App\Exports;

use App\Models\ApplicantInfo;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Excel;

class ApplicantInfoExport implements FromCollection, WithHeadings
{
    use Exportable;

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ApplicantInfo::select('full_name', 'email', 'phone_number', 'age', 'gender', 'education_level', 'university', 'devices_owned', 'internet_access', 'physical_tranning_attendence', 'physical_attendence_district', 'skills', 'attend_digtal_tranning', 'application_id')->get();
    }
        public function headings() :array
    {
        return ["Name", "Email", "Mobile","Age", "Gender", "Education Level", "University", "Devices", "Internet Access", "Physical Tranning", "Attendence District", "Skills", "Digital Tranning", "ApplicationType"];
    }
}
