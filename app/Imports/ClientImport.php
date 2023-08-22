<?php

namespace App\Imports;

use App\Client;
use App\Models\Application;
use App\Models\DSPRegistration;
use App\Models\IworkerRegistration;
use App\Models\MSMERegistration;
use App\Models\RegistrationType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $slug = Str::of($row[0])->slug();
        $id = uniqid();

        $reg = RegistrationType::findByName($row[3]);

        $regId = optional($reg)->id;

        if(!$regId) return null;

        $client = new Client([
            'name'=>$row[0],
            'phone'=>$row[1],
            'email'=>$row[2],
            'name_slug'=>"$slug-$id",
            'verified_at' => now(),
            'password' => bcrypt('123'),
            'registration_type_id'=> $regId
        ]);

        $check = Client::query()->where("email","=",$row[2])
            ->orWhere("phone","=",$row[1])
            ->count();

        if($check <= 0 ) {
            $client->save();
            $app = new Application([
                "client_id" => $client->id
            ]);

            $app->save();
            if($reg->name == RegistrationType::iWorker){
               return new IworkerRegistration(['application_id' => $app->id]);
            } else if($reg->name == RegistrationType::DSP){
               return new DSPRegistration(['application_id' => $app->id]);
            } else if($reg->name == RegistrationType::DSP){
               return new MSMERegistration(['application_id' => $app->id]);
            }


            return null;
        }else{
            return null;
        }
    }

    public function __construct()
    {
    }
}
