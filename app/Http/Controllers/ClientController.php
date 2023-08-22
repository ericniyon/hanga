<?php

namespace App\Http\Controllers;

use App\Client;
use App\Models\Application;
use App\Models\ApplicationBaseModel;
use App\Models\Connection;
use App\Models\DSPRegistration;
use App\Models\IworkerRegistration;
use App\Models\Message;
use App\Models\MSMERegistration;
use App\Models\RegistrationType;

use DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Response
     */
    public function index(Request $request)
    {
        //
        $query = Application::with(["client" => function ($query) {
            $query->withoutGlobalScope('active');
        }, 'client.registrationType','iWorkerRegistrations','msmeRegistrations','dspRegistrations'])->where("status", '<>', ApplicationBaseModel::DRAFT);
        if ($request->ajax()) {
            $applications = $query->select(["applications.*"]);
            return $this->formatDataTableValue($applications);
        }
        return view("admin.clients.index");
    }

    /**
     * function to format values of datatable
     */
    public function formatDataTableValue($applications)
    {
        return Datatables::of($applications)
            ->addIndexColumn()
            ->editColumn('creation_date', function ($item) {
                return $item->client->created_at;
            })->editColumn('type', function ($item) {
                return $item->client->registrationType->name;
            })->editColumn('is_verified', function ($item) {
                if ($item->status == Application::APPROVED) {
                    return '<span class="label label-light-success label-inline" >Yes</span>';
                }
                else {
                    return '<span class="label label-light-warning label-inline" >No</span>';
                }
            })->editColumn('is_active', function ($item) {
                return optional($item->client)->is_active ?
                    '<span class="label label-light-success label-inline label-pill" >Active</span>'
                    : '<span class="label label-light-danger label-inline label-pill" >Inactive</span>';


            })->addColumn("member_name",function ($item){
                if($item->iWorkerRegistrations){
                   return $item->iWorkerRegistrations->name;
                }
                if($item->msmeRegistrations){
                    return $item->msmeRegistrations->company_name;
                }
                if($item->dspRegistrations){
                    return $item->dspRegistrations->company_name;
                }
            })
            ->addColumn('action', function ($item) {
                $details = '<a href="' . route("admin.clients.details", encryptId($item->id)) . '" class="dropdown-item"> Details </a>';
                $delete = '';
                $activate = '';
                $changeClient = '';
                if (auth()->user()->is_superadmin) {
                    $label = optional($item->client)->is_active ? 'Disable Member' : "Activate Member";
                    $status = optional($item->client)->is_active ? 0 : 1;
                    $delete = '<a href="' . route("admin.clients.destroy", encryptId($item->client->id)) . '" class="dropdown-item btn-delete"> delete </a>';
                    $activate = '<a href="' . route("admin.clients.change.status", ['client' => encryptId($item->client->id), 'status' => encryptId($status)]) . '" class="dropdown-item btn-change-status"> ' . $label . ' </a>';
                    $changeClient = '<a href="' . route("admin.change.client", ['client' => encryptId($item->client->id)]) . '" class="dropdown-item btn-change-client"> Change Ownsership </a>';
                }


                return '<div class="btn-group"><button type="button" class="btn btn-primary  dropdown-toggle btn-sm"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"> Actions
                                    </button>
                                    <div class="dropdown-menu" style="">
                                         ' . $details . '
                                         ' . $activate . '
                                         ' . $changeClient . '
                                         ' . $delete . '

                                        </div>
                                        </div>';

            })
            ->rawColumns(['action', 'is_verified', 'is_active'])
            ->make(true);
    }


    /**
     * Display the specified resource.
     *
     * @param Application $application
     * @return Response
     */
    public function show(Application $application)
    {
        $application->load(['client.registrationType', 'completedProjects', 'applicationSolutions.platformTypes']);
        $type = $application->client->registrationType->name;
        if ($type == RegistrationType::DSP) {
            $model = DSPRegistration::with(['companyCategory'])
                ->where('application_id', $application->id)->first();
        }
        elseif ($type == RegistrationType::MSME) {
            $model = MSMERegistration::with(['companyCategory'])
                ->where('application_id', $application->id)->first();
        }
        elseif ($type == RegistrationType::iWorker) {
            $model = IworkerRegistration::with(['experiences'])
                ->where('application_id', $application->id)->first();
        }
        return view("admin.clients.details", compact("application", "model", "type"));
    }


    public function destroy(Client $client): RedirectResponse
    {
        $type = $client->registrationType->name;
        DB::beginTransaction();
        Message::query()->where("from", "=", $client->id)
            ->orWhere("to", "=", $client->id)
            ->delete();
        $connections = Connection::where("friend_id", "=", $client->id)
            ->orWhere("requester_id", "=", $client->id)
            ->get();
        $connections->each(function (Connection $connection) {
            $connection->services()->detach();
            $connection->delete();
        });
        $client->application->categories()->detach();
        if ($type == RegistrationType::DSP) {
            DSPRegistration::reset($client->id);
        }
        elseif ($type == RegistrationType::iWorker) {
            IworkerRegistration::reset($client->id);
        }
        elseif ($type == RegistrationType::MSME) {
            MSMERegistration::reset($client->id);
        }
        $client->affiliations()->delete();
        $client->searchHistory()->delete();
        $client->profileViews()->delete();
        $client->ratings()->delete();
        $client->profileVisits()->delete();
        $client->myOpportunities()->delete();
        $client->myRates()->delete();
        $client->affiliationsEmployers()->delete();
        $client->searchBy()->delete();
        $client->delete();
        DB::commit();

        return redirect()->back()->with("success", "Record is deleted");
    }

    public function changeStatus(Client $client, $status): RedirectResponse
    {
        $client->update(["is_active" => decryptId($status)]);
        return redirect()->back()->with("success", "Member status is changed");
    }


    public function clientList(Request $request)
    {
     $clients=Client::select('*');
//     return  $clients->get();
        if ($request->ajax()) {
            return $this->formatDataTable($clients);
        }
        return view('admin.clients.list', compact('clients'));
    }
    public function formatDataTable($clients){
        return
            DataTables::of($clients)
                ->addIndexColumn()
                ->editColumn("client_name",function ($item){
                    return $item->first_name ." ".$item->last_name;
                })
                ->editColumn("created_at",function ($item){
                    return $item->created_at;
                })
                ->editColumn('is_active', function ($item) {
                return $item->is_active ?
                    '<span class="label label-light-success label-inline label-pill" >Active</span>'
                    : '<span class="label label-light-danger label-inline label-pill" >Inactive</span>';


            })->rawColumns(['action', 'is_active'])
                ->make(true);
    }
//    public function formatDataTable($clients)
//    {
//        return
//            Datatables::of($clients)
//            ->addIndexColumn()
//            ->editColumn('creation_date', function ($item) {
//                return optional($item->client)->created_at;
//            })
//            ->editColumn('is_active', function ($item) {
//                return optional($item->client)->is_active ?
//                    '<span class="label label-light-success label-inline label-pill" >Active</span>'
//                    : '<span class="label label-light-danger label-inline label-pill" >Inactive</span>';
//
//
//            })->addColumn('action', function ($item) {
//                $details = '<a href="' . route("admin.clients.details", encryptId($item->id)) . '" class="dropdown-item"> Details </a>';
//                $delete = '';
//                $activate = '';
//                if (auth()->user()->is_superadmin) {
//                    $label = optional($item->client)->is_active ? 'Disable Member' : "Activate Member";
//                    $status = optional($item->client)->is_active ? 0 : 1;
//                    $delete = '<a href="' . route("admin.clients.destroy", encryptId($item->client->id)) . '" class="dropdown-item btn-delete"> delete </a>';
//                    $activate = '<a href="' . route("admin.clients.change.status", ['client' => encryptId($item->client->id), 'status' => encryptId($status)]) . '" class="dropdown-item btn-change-status"> ' . $label . ' </a>';
//                }
//
//
//                return '<div class="btn-group"><button type="button" class="btn btn-primary  dropdown-toggle btn-sm"
//                                            data-toggle="dropdown"
//                                            aria-haspopup="true" aria-expanded="false"> Actions
//                                    </button>
//                                    <div class="dropdown-menu" style="">
//                                         ' . $details . '
//                                         ' . $activate . '
//                                         ' . $delete . '
//
//                                        </div>
//                                        </div>';
//
//            })
//            ->rawColumns(['action', 'is_active'])
//            ->make(true);
//    }

    public function searchClient(Request $request)
    {

        return Client::where('is_active', true)
            ->doesntHave("application")
            ->whereNotNull('verified_at')
            ->where(function (Builder $builder) use ($request) {
                $builder->where("first_name", "iLIKE", "%$request->name%")
                    ->orWhere("last_name", "iLIKE", "%$request->name%");
            })
            ->take(20)->get();
    }

    public function changeClient(Client $client, Request $request): RedirectResponse
    {
        $newClient = Client::find($request->name);
        $newClient->update(["registration_type_id" => $client->registration_type_id]);
        $client->application()->update(["client_id" => $newClient->id]);
        $client->update(["registration_type_id" => null]);
        return redirect()->back()->with("success", "Ownership is change successfully");

    }

}
