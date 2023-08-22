<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ApplicationBaseModel;
use App\Models\DSPRegistration;
use App\Models\IworkerRegistration;
use App\Models\MSMERegistration;
use App\Models\RegistrationType;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class ApplicationController extends Controller
{
    /**
     * Display a listing of all application.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        //
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $query = Application::with(["client" => function ($query) {
            $query->withoutGlobalScope('active');
        }, 'client.registrationType'])
            ->where("verification_requested", 1)
            ->where("status", '<>', ApplicationBaseModel::DRAFT);
        $query->when($start_date, function ($query) use ($start_date) {
            return $query->whereDate("submission_date", '>=', $start_date);
        });
        $query->when($end_date, function ($query) use ($end_date) {
            return $query->whereDate("submission_date", '<=', $end_date);
        });
        $query->when(($request->status && $request->status != "all"), function ($query) use ($request) {
            return $query->where("status", $request->status);
        });

        if ($request->ajax()) {
            $applications = $query->select(["applications.*"]);
            return $this->formatDataTableValue($applications);
        }
        return view("admin.applications.all_applications");
    }

    /**
     * function to return all new applications
     */
    public function pendingApplications()
    {
        $users = User::query()->whereHas("permissions", function ($q) {
            $q->where("name", "Review Application");
        })->get();
        $applications = Application::query()
            ->where("verification_requested", 1)
            ->where("status", Application::SUBMITTED)->orderBy("submission_date", 'asc')->get();
        return view("admin.applications.pending_applications", compact("applications", "users"));
    }

    /**
     * function to return all assigned applications
     */
    public function assignedApplications()
    {
        $users = User::query()->whereHas("permissions", function ($q) {
            $q->where("name", "Review Application");
        })->get();
        $applications = Application::query()
            ->where("verification_requested", 1)
            ->where("status", Application::UNDER_REVIEW)->orderBy("submission_date", 'asc')->get();
        return view("admin.applications.reassign_applications", compact("applications", "users"));
    }

    public function myTasks(Request $request)
    {
        $user = auth()->user();
        $query = Application::with(["client" => function ($query) {
            $query->withoutGlobalScope('active');
        }, 'client.registrationType'])
            ->where("verification_requested", 1);
        $applications = $query->where(function (Builder $q) use ($user) {
            $permissions = 0;
            if ($user->can("Review Application")) {
                $q->orWhereIn("status", [Application::UNDER_REVIEW,])
                    ->whereHas("assignment", function (Builder $q) use ($user) {
                        $q->where("assigned_to", $user->id);
                    });
                $permissions++;
            }
            if ($user->can("Approve Application")) {
                $q->orWhere("status", Application::REVIEWED);
                $permissions++;
            }
            if ($permissions == 0) {
                $q->where("status", 'Not Found');
            }
        })->get();
        if ($request->ajax()) {
            return $this->formatDataTableValue($applications);
        }
        return view('admin.applications.my_applications');
    }

    /**
     * function to format values of datatable
     */
    public function formatDataTableValue($applications)
    {
        return Datatables::of($applications)
            ->addIndexColumn()
            ->editColumn('submission_date', function ($item) {
                return $item->submission_date;
            })
            ->editColumn('type', function ($item) {
                return $item->client->registrationType->name;
            })
            ->editColumn('status', function ($item) {
                return '<span class="text-' . $item->status_color . ' label-inline" >' . $item->status . '</span>';
            })->addColumn('action', function ($item) {
                $details = '<a href="' . route("admin.application.details", encryptId($item->id)) . '" class="dropdown-item edit-btn"> Details </a>';
                return '<div class="btn-group"><button type="button" class="btn btn-primary  dropdown-toggle btn-sm"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"> Actions
                                    </button>
                                    <div class="dropdown-menu" style="">
                                         ' . $details . '

                                        </div>
                                        </div>';

            })
            ->rawColumns(['action', 'status'])
            ->make(true);
    }


    public function details(Application $application)
    {
        $application->load(['client.registrationType', 'completedProjects', 'applicationSolutions.platformTypes']);
        $type = $application->client->registrationType->name;
        if ($type == RegistrationType::DSP)
            $model = DSPRegistration::with(['companyCategory'])
                ->where('application_id', $application->id)->first();
        elseif ($type == RegistrationType::MSME) {
            $model = MSMERegistration::with(['companyCategory'])
                ->where('application_id', $application->id)->first();
        } elseif ($type == RegistrationType::iWorker) {
            $model = IworkerRegistration::with(['experiences'])
                ->where('application_id', $application->id)->first();
        }
        $histories = $application->histories()->get();
        return view("admin.applications.details", compact("application", "histories", "model", "type"));

    }
}
