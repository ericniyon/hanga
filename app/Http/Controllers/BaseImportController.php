<?php

namespace App\Http\Controllers;

use App\Client;
use App\Imports\ImportDigitalPlatform;
use App\Models\Cell;
use App\Models\Sector;
use App\Models\District;
use App\Models\Province;
use App\Models\StudyLevel;
use Illuminate\Support\Str;
use App\Imports\ImportMSMEs;
use App\Models\CreditSource;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Imports\ImportIworkers;
use App\Models\DigitalPlatform;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ApplicationFlowHistory;

class BaseImportController
{
    function index()
    {
        return view('admin.import');
    }
    function import(Request $request)
    {
            $type = $request->type;
            $file = $request->file;
            if($type == 'MSMEs'){
                Excel::import(new ImportMSMEs, $file);
            }elseif($type=='Iworkers'){
                Excel::import(new ImportIworkers, $file);
            }elseif($type=='digital_platforms'){
                Excel::import(new ImportDigitalPlatform(), $file);
            }
            return redirect()->back()->with('success', 'Import Done Successfully 👌');
    }
    function getProvinceId($province_name){
        $response = Province::where('name', $province_name)->first();
        return $response ? $response->id : $response;
    }
    function getDistrict($district_name){
        $response = District::where('name', trim(strtoupper($district_name)))->first();
        return $response;
    }
    function getSectorId($sector_name){
        $response = Sector::where('name', $sector_name)->first();
        return $response ? $response->id : $response;
    }
    function getCellId($cell_name){
        $response = Cell::where('name', $cell_name)->first();
        return $response ? $response->id : $response;
    }
    protected function create(array $data): Client
    {
        $slug = Str::of($data['name'])->slug();
        $id = uniqid();
        $client =  new Client();
        $client->name = $data['name'];
        $client->email = $data['email'];
        $client->phone = $data['phone'];
        $client->name_slug = "$slug-$id";
        $client->registration_type_id = $data['registration_type_id'];
        $client->password = bcrypt('password');
        $client->otp = $this->getOtp();
        $client->verified_at=now();
        $client->save();
        return $client;
        // return
        // Client::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'phone' => $data['phone'],
        //     'name_slug' => "$slug-$id",
        //     'registration_type_id' => $data['registration_type_id'],
        //     'password' => bcrypt('password'),
        //     'otp' => $this->getOtp()
        // ]);
    }
    public function checkPhone($phone)
    {

        $phone = str_replace(" ", "", $phone);
        $phone = str_replace("+", "", $phone);
        $phone = str_replace("(", "", $phone);
        $phone = str_replace(")", "", $phone);
        $phone = str_replace("-", "", $phone);

        if (strlen($phone) === 9) {
            $phone = "250" . $phone;
        } else if (strlen($phone) === 10) {
            $phone = "25" . $phone;
        }

        return $phone;
    }
    public function getEducationLevel($edu_level)
    {
        $level = null;
        switch ($edu_level) {
            case "University":
                $level = StudyLevel::where('name', "=", "Bachelor")->first();
                break;
            case "High_school":
                $level = StudyLevel::where('name', "=", "Secondary")->first();
                break;
        }
        return $level ? $level->id : $level;
    }
    public function getCreditSource($source){
        // dd(CreditSource::where('name','=',$source)->get());
        if(str_starts_with($source,'Family')){
            return CreditSource::whereIn('name', ['Family','Friends'])->get()->pluck(['id'])->toArray();
        }elseif(str_starts_with($source, 'Asso')){
            return CreditSource::where('name','=','Association')->get()->pluck(['id'])->toArray();
        }else{
            $source = CreditSource::where('name','=',$source)->get();
            return $source->count() ? $source->pluck(['id'])->toArray() : [];

        }
    }
    public function getpaymentMethods($methods)
    {
        $methods = explode(',', $methods);
        $methods = array_map(function($item){return trim($item);}, $methods);
        $paymentMethods = PaymentMethod::whereIn('name', $methods)->get();
        return $paymentMethods->count()  ? $paymentMethods->pluck(['id'])->toArray() : [];
    }
    public function getDigitalPlatform($platforms)
    {
        $platforms = explode(',', $platforms);
        $platforms = array_map(function($item){return trim($item);}, $platforms);
        return DigitalPlatform::whereIn('name', $platforms)->get()->pluck(['id'])->toArray();
    }
    protected function getOtp(): int
    {
        return rand(10000, 99999);
    }
    protected function saveApplicationFlow($applicationId, string $reason, string $status): void
    {
        ApplicationFlowHistory::create([
            'application_id' => $applicationId,
            'comment' => $reason,
            'status' => $status,
        ]);
    }
}
