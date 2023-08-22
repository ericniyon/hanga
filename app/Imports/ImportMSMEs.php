<?php

namespace App\Imports;

use App\Client;
use App\Models\Application;
use App\Models\MSMERegistration;
use App\Models\RegistrationType;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\ApplicationBaseModel;
use Illuminate\Auth\Events\Registered;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Http\Controllers\BaseImportController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportMSMEs extends BaseImportController implements ToCollection, WithHeadingRow, ShouldQueue, WithChunkReading
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $msmes)
    {
        try {
            // $msmes = array_slice($msmes->toArray(), 15, 2);
            foreach ($msmes as $msme)
            {
                $account = [
                    "name" => $msme['name_of_the_msme'],
                    "email" => $msme['email'],
                    "phone" => $msme['phone'] ? $this->checkPhone($msme['phone']) : $msme['phone'],
                    "registration_type_id" => RegistrationType::where('name', RegistrationType::MSME)->first()->id,
                ];
                if ($account['name'] && $account['email']&& $account['phone']) {
                    $client = Client::where('email', '=', $account['email'])->orWhere('phone',$account['phone'] )->first();
                    if ($client === null) {
                        event(new Registered($client = $this->create($account)));
                        //  $this->sendOtp($client);
                        $this->finishClientRegistration($client, $msme);
                    } else {
                        Log::info('MSMEs already exists with given email.', ['data' => $msme]);
                    }
                } else {
                    Log::info('MSMEs can\'t be imported.', ['data' => $msme]);
                }

            }
        } catch (\Throwable $th) {
            Log::info('MSME failed to be imported.', ['data' => $msme]);
            throw $th;
        }

    }
    public function finishClientRegistration($client, $msme)
    {
        DB::beginTransaction();
        $clientId = $client->id;
        $application = Application::where('client_id', '=', $clientId)->first();
        if ($application == null) {
            $application = Application::create([
                'client_id' => $clientId,
                'status' => ApplicationBaseModel::DRAFT,
            ]);
            $model = new MSMERegistration();
            $this->saveApplicationFlow($application->id, 'Application started', ApplicationBaseModel::DRAFT);

        } else {
            $model = MSMERegistration::where([
                ['application_id', '=', $application->id]
            ])->first();
        }
        $model = $this->saveModel($msme, $model, $application);

        $application->status = ApplicationBaseModel::SUBMITTED;
        $application->is_migrated = true;
        $application->save();

        $this->saveApplicationFlow($application->id, 'Application Imported', ApplicationBaseModel::SUBMITTED);
        DB::commit();

    }
    private function saveModel($data, MSMERegistration $model, $application)
    {
        $district = $this->getDistrict($data['district']);
        $model->application_id = $application->id;
        $model->company_name = $data['name_of_the_msme'];
        $model->company_phone = $data['phone'];
        $model->company_email = $data['email'];
        $model->number_of_employees = $data['number_of_employees'];

        $model->registration_date = now();


        $model->province_id = $district ? optional($district->province)->id : $district;
        $model->district_id = $district ? $district->id : $district;

        $model->has_digital_platform = $data['do_your_company_have_an_online_marketing_platform'] == "Yes" ? true:false;

        $model->representative_name = $data['name_of_the_business_owner'];
        $model->representative_email = $data['email'];
        $model->representative_phone = $data['phone'];
        $model->representative_gender = $data['gender'];
        $model->save();
        return $model;
    }
    public function chunkSize(): int
    {
        return 10;
    }
}
