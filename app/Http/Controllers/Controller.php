<?php

namespace App\Http\Controllers;

use App\Client;
use App\Jobs\ProcessClientSms;
use App\Jobs\ProcessSendOtpMail;
use App\Models\Application;
use App\Models\ApplicationBaseModel;
use App\Models\ApplicationFlowHistory;
use App\Models\CompanyCategory;
use App\Models\RegistrationType;
use App\Models\Service;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class Controller extends BaseController
{

    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Ihuzo",
     *      description="Ihuzo API documentation",
     *      @OA\Contact(
     *          email="darius@matulionis.lt"
     *      ),
     * )
     */


    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function getOtp(): int
    {
        return rand(10000, 99999);
    }

    protected function sendOtp(Client $client, $message = null): void
    {
        if (is_null($message)) {
            $message = "Please use this OTP(One Time Password) : $client->otp to verify your phone for your account.";
        }
        // if env is local then send sms
        if (config('app.env') != 'local') {
            ProcessClientSms::dispatch($client->phone, $message);
        }
        ProcessSendOtpMail::dispatch($client, $message);
    }

    /**
     * @param $applicationId
     * @param string $reason
     * @param string $status
     */
    protected function saveApplicationFlow($applicationId, string $reason, string $status): void
    {
        ApplicationFlowHistory::create([
            'application_id' => $applicationId,
            'comment' => $reason,
            'status' => $status,
        ]);
    }

    /**
     * @param $authId
     * @return Application|Model
     */
    protected function createNewApplication($authId)
    {
        return Application::create([
            'client_id' => $authId,
            'status' => ApplicationBaseModel::DRAFT
        ]);
    }

    public function getLastComment($application_id = null)
    {

        return ApplicationFlowHistory::query()
            ->whereIn('status', [ApplicationBaseModel::RETURN_BACK, ApplicationBaseModel::REJECTED])
            ->whereNotNull('external_comment')
            ->where('application_id', '=', $application_id)
            ->orderByDesc('id')
            ->first();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getSupportServices(): \Illuminate\Support\Collection
    {

        return Service::orderBy('name')->get();
        /*
        return Service::whereHas('registrationTypes', function (Builder $builder) {
            $builder->where('registration_type_id', '=', $this->guard()->user()->registration_type_id);
        })->get();*/
    }

    /**
     * @return CompanyCategory[]|Collection
     */
    public function getCategories()
    {
        return CompanyCategory::query()
            ->whereHas('registrationTypes', function (Builder $builder) {
                $builder->where('registration_type_id', '=', Auth::guard('client')->user()->registration_type_id);
            })
            ->get();
    }

    /**function to check if a view exist
     *
     * @param $view_name
     *
     * @return mixed
     */
    public function isViewExist($view_name)
    {
        return DB::select("SELECT * FROM information_schema.VIEWS WHERE TABLE_NAME='$view_name'");

    }

    /**
     * @param Application $application
     * @param  $request
     */
    protected function saveInterests(Application $application, $request): void
    {
        $application->interests()->delete();
        foreach ($request->input('interests_id') as $item) {
            $data = explode(',', $item);
            $application->interests()->create([
                'registration_type_id' => $data[0],
                'category_id' => $data[1]
            ]);
        }
    }

    /**
     * @return Builder[]|Collection
     */
    protected function getRegistrationTypes()
    {
        return RegistrationType::with('categories')->whereHas('categories')->get();
    }

    /**
     * @return Carbon
     */
    protected function getAddMinutes(): Carbon
    {
        return now()->addMinutes(15);
    }


}
