<?php

namespace App\Imports;

use App\Client;
use App\Constants;
use App\Models\Application;
use App\Models\RegistrationType;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\IworkerRegistration;
use Illuminate\Support\Facades\Log;
use App\Models\ApplicationBaseModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Http\Controllers\BaseImportController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportIworkers extends BaseImportController implements ToCollection, WithHeadingRow, ShouldQueue, WithChunkReading
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $iworkers)
    {
        // dd(Client::where('email',"=","mw")->get() == null ? 'yes':'no');
        // try {
            // $iworkers = array_slice($iworkers->toArray(), 20, 1);
            // dd($iworkers);
            foreach ($iworkers as $iworker)
            {
                $account = [
                    "name" => $iworker['name'],
                    "email" => $iworker['email_address'],
                    "phone" => $iworker['phone_number'] ? $this->checkPhone($iworker['phone_number']) : $iworker['phone_number'],
                    "registration_type_id" => RegistrationType::where('name', RegistrationType::iWorker)->first()->id,
                ];
                if ($account['name'] && $account['email'] && $account['phone']) {
                    $client = Client::where('email', '=', $account['email'])->orWhere('phone', '=', $account['phone'])->first();
                    if ($client === null) {
                        $client = $this->create($account);
                        //  $this->sendOtp($client);
                    } else {
                        Log::info('Iworker exists with given email.', ['data' => $iworker]);
                    }
                    $this->finishClientRegistration($client, $iworker);
                } else {
                    Log::info('Iworker can\'t be imported.', ['data' => $iworker]);
                }

            }
        // } catch (\Throwable $th) {
        //     Log::info('Iworker failed to be imported.', ['data' => $iworker]);
        //     throw $th;
        // }

    }
    public function finishClientRegistration($client, $iworker)
    {
        DB::beginTransaction();
        $clientId = $client->id;
        $application = Application::where('client_id', '=', $clientId)->first();
        if ($application == null) {
            $application = Application::create([
                'client_id' => $clientId,
                'status' => ApplicationBaseModel::DRAFT,
            ]);
            $model = new IworkerRegistration();
            $this->saveApplicationFlow($application->id, 'Application started', ApplicationBaseModel::DRAFT);

        } else {
            $model = IworkerRegistration::where([
                ['application_id', '=', $application->id]
            ])->first();
        }
        $model = $this->saveModel($iworker, $model, $application);

        $application->status = ApplicationBaseModel::SUBMITTED;
        $application->is_migrated = true;
        $application->save();

        $this->saveApplicationFlow($application->id, 'Application Imported', ApplicationBaseModel::SUBMITTED);
        DB::commit();

    }
    private function saveModel($data, IworkerRegistration $model, $application)
    {
        $district = $this->getDistrict($data['district']);
        // $model->registration_date = now();

        $model->application_id = $application->id;
        $model->iworker_type =Constants::Individual;
        $model->name = $data['name'];
        $model->phone = $this->checkPhone($data['phone_number']);
        $model->email = $data['email_address'];
        $model->gender = $data['gender'];

        $education_level =  $this->getEducationLevel($data['education_level']);

        $model->level_of_study_id = $education_level;
        $model->province_id = $district ? optional($district->province)->id : $district;
        $model->district_id = $district ? $district->id : $district;

        $credit_sources =  $this->getCreditSource($data['credit_sources']);
        $payment_method =  $this->getpaymentMethods($data['digital_payments_used']);

        // $model->digital_literacy = $data['digital_literacy'];
        $model->digital_literacy = $data['digital_literacy'];
        $model->has_bank_account = $data['has_a_bank_account'] == "Yes" ? true:false;
        $model->credit_access = $data['has_access_to_credit'] == "Yes" ? true:false;
        // if($credit_sources != []){
        //     $model->creditSources()->sync($credit_sources);
        // }
        // if($payment_method != []){
        //      $model->paymentMethods()->sync($payment_method);
        // }

        $platforms_used =  $this->getDigitalPlatform($data['platforms_used']);
        // $platforms_used = array_map(function(item){return $item,'link'=>'N/A';},$platforms_used);
        // dd($platforms_used);
        // $model->digitalPlatforms()->sync($platforms_used);
        // foreach ($platforms_used as $item) {
        //         $model->iWorkerDigitalPlatforms()->updateOrCreate(
        //         ['digital_platform_id'=>$item],[
        //         'link' => 'N/A',
        //         'digital_platform_id' => $item
        //     ]);
        // }

        // $speakers  = array_values($platforms_used); // related ids
        // $pivotData = array_fill(0, count($speakers), ['link' => 'N/A']);
        // $syncData  = array_combine($speakers, $pivotData);
        // $model->digitalPlatforms()->sync($syncData);
        // dd($syncData);

        // foreach ($platforms_used as $key => $item) {
        //     $platforms_used[$key] = ['link' => 'N/A'];
        // }
        // dd($platforms_used);

        // //Insert into offence_photo table
        // $offence->photos()->sync($photo_id_array, false);//dont delete old entries = false

        $model->save();

        return $model;

    }
    public function chunkSize(): int
    {
        return 50;
    }
}
