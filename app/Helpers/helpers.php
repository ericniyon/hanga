<?php


use App\Client;
use App\Constants;
use App\Models\Application;
use App\Models\Connection;
use App\Models\DSPRegistration;
use App\Models\IworkerRegistration;
use App\Models\JobOpportunity;
use App\Models\Message;
use App\Models\MSMERegistration;
use App\Models\OpportunityType;
use App\Models\ProfileViews;
use App\Models\RegistrationType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

if (!function_exists('canReviewApplication')) {
    /**
     * Checking if can review application
     * @param Application $application
     * @return bool
     */
    function canReviewApplication(Application $application): bool
    {
        $user = auth()->user();
        if (in_array($application->status, [Application::UNDER_REVIEW]) && $user->can('Review Application')) {
            if (optional($application->assignment)->assigned_to == $user->id) return true;
        }
        if (in_array($application->status, [Application::REVIEWED]) && $user->can('Approve Application')) {
            return true;
        }
        return false;
    }
}

if (!function_exists('returnBackOrResubmitted')) {
    /**
     * Checking if application is returned back or is resubmitted
     * @param Application $application
     * @return string
     */
    function returnBackOrResubmitted(Application $application): ?string
    {
        $message = null;
        if ($application->last_return && $application->status == Application::UNDER_REVIEW) {
            $review = $application->histories()->latest()->first();
            if ($review) {
                if ($review->status == Application::SUBMITTED) {
                    $message = "Returned Back";
                }
                if ($review->status == Application::RETURN_BACK) {
                    $message = "Resubmitted";
                }
            }
        }
        if ($application->last_return && $application->status == Application::REVIEWED) {
            $message = "Resubmitted";
        }
        return $message;
    }

    function getTruthyValue($value): string
    {
        if ($value == 1)
            return "Yes";
        elseif ($value == 0)
            return "No";
        return "";
    }

    function getSelectedPlatform(Collection $platforms, $platFormId)
    {
        return $platforms->where('digital_platform_id', '=', $platFormId)->first();
    }

    function forMsme(): bool
    {
        return in_array(auth('client')->user()->type, [RegistrationType::iWorker, RegistrationType::DSP]);
    }

    function forDsp(): bool
    {
        return in_array(auth('client')->user()->type, [RegistrationType::iWorker, RegistrationType::MSME]);
    }

    function forIworker(): bool
    {
        return in_array(auth('client')->user()->type, [RegistrationType::DSP, RegistrationType::MSME]);
    }

    function approvedRegistrationType($registrationType): int
    {
        return Application::query()->whereHas("client", function ($q) use ($registrationType) {
            $q->whereHas("registrationType", function ($query) use ($registrationType) {
                $query->where("name", $registrationType);
            });
        })->whereNotIn("status", [Application::DRAFT])
            ->count();
    }
}

function getColorByJobType($job_type)
{
    if ($job_type == 'Sponsorship') {
        return 'primary';
    } elseif ($job_type == 'Job') {
        return 'info';
    } elseif ($job_type == 'Scholarship') {
        return 'success';
    } else {
        return 'primary';
    }
}

function myConnections()
{
    return Client::query()->connectedWithMe()->get();
}

function connectionExists($otherUser)
{
    $user = auth('client')->id();
    return Connection::query()->where([
        ["requester_id", "=", $user],
        ["friend_id", "=", $otherUser],
        ["status", "<>", Connection::REJECTED]
    ])->orWhere([
        ["friend_id", "=", $user],
        ["requester_id", "=", $otherUser],
        ["status", "<>", Connection::REJECTED]
    ])->latest()->first();
}

function recentMessage()
{
    $user = auth('client')->id();
    return collect(DB::select("SELECT m.id, m.created_at, m.message, u.name, m.from as message_from, m.to, c.name as message_to
FROM clients AS u
          JOIN messages AS m ON m.from = u.id
     join clients c on c.id = m.to
WHERE m.id IN (
    SELECT MAX(id)
    FROM messages
    WHERE messages.from = " . $user . " OR messages.to = " . $user . "
    GROUP BY LEAST(messages.from, messages.to), GREATEST(messages.from, messages.to)
) order By m.id desc limit 10"));
}

function amMessagingTo($messageId)
{
    $message = Message::find($messageId);
    $user = auth('client')->id();
    return $message->from == $user ? $message->messageTo : $message->messageFrom;
}

function saveProfileVisit(Client $profile)
{
    $userId = auth("client")->id();
    if ($userId && $userId != $profile->id) {
        $existViews = ProfileViews::where("profile_id", $profile->id)
            ->where("visitor_id", $userId)->first();
        if (!$existViews) {
            ProfileViews::create([
                "profile_id" => $profile->id,
                "visitor_id" => $userId
            ]);
        }
    }
}

function myProfileViews()
{
    return ProfileViews::query()->where("profile_id", auth("client")->id())
        ->where("visitor_id", "<>", auth("client")->id())->get();
}

function profilePercentage(): int
{
    $client = auth("client")->user();
    $application = $client->application;
    if ($client->registrationType->name == RegistrationType::DSP) {
        $completedSteps = 4;
        if (count($application->completedProjects) > 0) {
            $completedSteps++;
        }
        if (count($application->certificationAwards) > 0) {
            $completedSteps++;
        }
        return floor(($completedSteps / 6) * 100);
    } elseif ($client->registrationType->name == RegistrationType::MSME) {
        $completedSteps = 4;
        if (count($application->completedProjects) > 0) {
            $completedSteps++;
        }
        if (count($application->certificationAwards) > 0) {
            $completedSteps++;
        }
        return floor(($completedSteps / 5) * 100);
    } else {

        if ($application->iworker_type == Constants::Company) {
            $finalStep = 5;
            $completedSteps = 3;
            if (count($application->iWorkerRegistrations->experiences) > 0) {
                $completedSteps++;
            }
            if (count($application->iWorkerRegistrations->companyEmployees) > 0) {
                $completedSteps++;
            }
        } else {
            $completedSteps = 2;
            $finalStep = 4;
            if (count($application->certificationAwards) > 0) {
                $completedSteps++;
            }
            if (count($application->iWorkerRegistrations->experiences) > 0) {
                $completedSteps++;
            }
        }
        return floor(($completedSteps / $finalStep) * 100);
    }
}

function registeredClient(): Collection
{
    $data = collect();
    $allData = collect(DB::select("select EXTRACT(MONTH FROM a.submission_date) as monthNumber,count(*) as applicationCount
from applications a where  a.status <> 'Draft'
and EXTRACT(YEAR FROM a.submission_date)=EXTRACT(YEAR FROM now()) group by EXTRACT(MONTH FROM a.submission_date)"));
    for ($month = 1; $month <= 12; $month++) {
        $arr = collect();
        $applications = $allData->where("monthnumber", $month)
            ->sum("applicationcount");
        $monthName = date('F', mktime(0, 0, 0, $month, 10));
        $arr->put("month", $monthName);
        $arr->put("applications", $applications);
        $data->push($arr);
    }
    return $data;
}

function registeredClientByType(): Collection
{
    return collect(DB::select("select count(*) as applicationCount,c.name
from applications a, clients b, registration_types  c
where a.client_id=b.id and b.registration_type_id=c.id  and a.status <>'Draft'
group by c.name"));
}


function getDspModel(Application $application)
{
    return DSPRegistration::with(['companyCategory'])
        ->whereHas('application', function (Builder $builder) use ($application) {
            $builder->where('id', '=', $application->id);
        })
        ->first();
}

function getIworkerModel(Application $application)
{
    return IworkerRegistration::with(['experiences'])
        ->whereHas('application', function (Builder $builder) use ($application) {
            $builder->where('id', '=', $application->id);
        })->first();
}

function getMsmeModel(Application $application)
{
    return MSMERegistration::with(['companyCategory'])
        ->whereHas('application', function (Builder $builder) use ($application) {
            $builder->where('id', '=', $application->id);
        })
        ->first();
}

function getOpportunityType($id)
{
    $job_type = OpportunityType::find($id);
    return $job_type ? $job_type->name : '';
}

function systemSettingsPermissions(): array
{
    return
        [
            "Manage Digital Services",
            "Manage Business Sectors",
            "Manage Registration Types",
            "Manage Opportunity Types",
            "Manage Company Categories",
            "Manage Platform Type",
            "Manage Level of Studies",
            "Manage iWorker Software skills",
            "Manage Payment Methods",
            "Manage Digital platforms",
            "Manage Income Ranges",
            "Manage Credit Sources",
            "Manage Physical Disability",
            "Manage Field Of Study",
            "Manage System Parameters"
        ];
}

function selectedFor(Collection $collection, $typeId, $categoryId)
{
    return $collection
        ->where('registration_type_id', '=', $typeId)
        ->where('category_id', '=', $categoryId)
        ->first();
}

function getBoolValueFromString($s): int
{
    $s = strtolower($s);
    info($s);
    if ($s == 'yes')
        return 1;
    elseif ($s == 'no')
        return 0;
    return -1;
}


function getOpportunityCount(): int
{
    return JobOpportunity::query()
        ->where('deadline', '>', today())
        ->where(function ($builder) {
            $builder->where('client_id', '!=', auth('client')->id())
                ->orWhereNull('client_id');
        })
        ->count();
}

function getActiveClass(string $activeTab, string $tab): string
{
    if ($activeTab == $tab) {
        return 'active';
    }
    return '';
}


function  getClientFields()
{

    $client = auth("client")->user();


    // get a=total columun for client table fields

    $clients = new Client;
    $table = $clients->getTable();
    $columuns = \DB::getSchemaBuilder()->getColumnListing($table);

    $client1 = Client::where('id',$client->id)->first();
    $test1 = array();
    foreach ($columuns as $key => $value) {
        $exists =   Client::where('id', $client1->id)->whereNull($value)->exists();
        if($exists){
            array_push($test1,$exists);
        }
    }




    // dd(Client::WhereNull($columuns)->get());


    $dsp = new DSPRegistration;
    $dsp_table = $dsp->getTable();
    $dspsColumuns = \DB::getSchemaBuilder()->getColumnListing($dsp_table);

    $application = Application::where('client_id', $client1->id)->pluck('id');
    $test2 = array();
    foreach ($dspsColumuns as $key => $value) {
        # code...
        $dsps = DSPRegistration::where('application_id', $application)->whereNull($value)->exists();
        if($dsps){
            array_push($test2, $dsps);
        }
    }


    $totalColumuns = count($dspsColumuns) + count($columuns);
    $nullFields = count($test1) + count($test2);

    $fieldColumun = $totalColumuns - $nullFields;
    $progression = ((int) $fieldColumun * 100) / (int)$totalColumuns;

    return round($progression);


    }

    function format_money($money,$currency='RWF')
    {
        if(!$money) {
            return $currency." 0.00";
        }

        $money = number_format($money, 2);

        if(strpos($money, '-') !== false) {
            $formatted = explode('-', $money);
            return $currency."- $formatted[1]";
        }

        return $currency." $money ";
    }
