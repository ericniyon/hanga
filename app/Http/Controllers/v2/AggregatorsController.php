<?php

namespace App\Http\Controllers\v2;

use App\Http\Controllers\Controller;
use App\Client;
use App\Mail\CohortBroadcastMail;
use App\Models\AffiliateCohort;
use App\Models\AffiliationLink;
use App\Models\Broadcast;
use App\Models\ClientAggregator;
use App\Models\RegistrationType;
use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Mail;

// use Illuminate\Support\Facades\Validator;

class AggregatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where('clients.is_active', true)
            // ->doesntHave("application")
            ->where('clients.id', '!=', auth('client')->id())
            ->whereNotNull('clients.verified_at')
            ->whereHas('registrationType', function($q){
                $q->where('name','!=',RegistrationType::iWorker);
            })
            ->join('applications','applications.client_id','clients.id')
            ->leftJoin('msme_registrations','msme_registrations.application_id','applications.id')
            ->leftJoin('dsp_registrations','dsp_registrations.application_id','applications.id')
            ->select('msme_registrations.company_name as msme_name','dsp_registrations.company_name as dsp_name','clients.id')
            ->get();

            // $aggregators = auth('client')->user()->aggregates()->withPivot('status')->get();
            $aggregators = Client::where('client_aggregator.aggrerated_by',auth('client')->id())
                                    ->join('client_aggregator','client_aggregator.aggrerated_by','clients.id')
                                    ->select('clients.*','client_aggregator.id as pivot_id','client_aggregator.status as pivot_status')
                                    ->orderByDesc('client_aggregator.created_at')
                                    ->get();

        return view('affiliates.aggregators_home', compact('clients','aggregators'));
    }

    public function requests()
    {
        $aggregation_requests = Client::where('client_aggregator.client',auth('client')->id())
                                ->join('client_aggregator','client_aggregator.client','clients.id')
                                ->select('clients.*','client_aggregator.id as pivot_id','client_aggregator.status as pivot_status')
                                ->orderByDesc('pivot_status')
                                ->paginate(10);
        return view('affiliates.aggregators_requests', compact('aggregation_requests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function aggregates(Request $request)
    {
        auth('client')->user()->aggregates()->attach($request->company);
        return back()->with('success','Aggregation Created Successfully');
    }

    public function approveAggregates($id)
    {
        $aggregate = ClientAggregator::findOrFail(decryptId($id))->update(['status'=>'Approved']);
        // $col = auth('client')->user()->aggregators()->updateExistingPivot(decryptId($id),['status'=>'Approved']);
        return back()->with('success','Aggregation Request Approved Successfully');
    }

    public function denyAggregates($id)
    {
        $aggregate = ClientAggregator::findOrFail(decryptId($id))->update(['status'=>'Denied']);
        // auth('client')->user()->aggregators()->updateExistingPivot(decryptId($id),['status'=>'Denied']);
        return back()->with('success','Aggregation Request Denied Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of all groups available for loged in company.
     *
     * @return \Illuminate\Http\Response
     */
    public function cohortIndex()
    {
        $groups = AffiliateCohort::with('client')->doesntHave('parent')->whereClientId(auth('client')->user()->id)->latest()->paginate(10);
        $parents = AffiliateCohort::whereClientId(auth('client')->user()->id)->doesntHave('parent')
                                    ->select('group_name','id')->orderBy('group_name')->get();
        return view('affiliates.groups_home', compact('groups','parents'));
    }

    public function deleteCohort($id)
    {
        $cohort = AffiliateCohort::findOrFail(decryptId($id));
        $cohort->delete();
        return back()->with('success','Group Deleted Successfully');
    }

    public function storeCohort(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string|min:3|max:50',
            'parent'=>'nullable|integer|exists:affiliate_cohorts,id',
            'description'=>'nullable|string|min:10|max:255',
        ]);

        if($validator->fails()){
            return back()->withInput()->with('error','Something went wrong, try again!!');
        }
        // dd($request->all());
        AffiliateCohort::create([
            'group_name'=>$request->name,
            'description'=>$request->description,
            'parent_id'=>$request->parent,
            'client_id'=>auth('client')->user()->id
        ]);
        return back()->with('success','Affiliate Cohort created Successfully!');
    }

    public function sendBroadcast(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'message'=>'required|string|min:10|max:2500',
            'title'=>'required|string|min:3|max:255',
            'group'=>'required|integer|exists:affiliate_cohorts,id',
        ]);

        if($validator->fails()){
            return back()->withInput()->with('error','Something went wrong, try again!!');
        }

        $cohort = AffiliateCohort::findOrFail($request->group);
        $clients = Client::select('clients.email')
                        ->join('client_affiliate','client_affiliate.affiliates','clients.id')
                        ->join('affiliate_cohorts','affiliate_cohorts.id','client_affiliate.affiliate_cohort_id')
                        ->where('affiliate_cohorts.id',$cohort->id)
                        ->get();

        $boradcast = Broadcast::create([
            'message'=>$request->message,
            'title'=>$request->title,
            'affiliate_cohort_id'=>$cohort->id,
        ]);


        foreach ($clients as $value) {
            Mail::to($value->email)->send(new CohortBroadcastMail($boradcast));
        }

        return back()->with('success','Broadcast sent Successfully!');
    }

    /**
     * Display a listing of all invitation links created by loggedin company.
     *
     * @return \Illuminate\Http\Response
     */
    public function invitationIndex()
    {
        $groups = AffiliateCohort::whereClientId(auth('client')->user()->id)
                                ->orderBy('group_name')->get();

        $links = AffiliationLink::with('client','cohort')->whereClientId(auth('client')->user()->id)
        ->latest()->paginate(10);

        return view('affiliates.invitation_home',compact('groups','links'));
    }

    public function invitationStore(Request $request)
    {
        $groups = AffiliateCohort::whereClientId(auth('client')->user()->id)->pluck('id');

        $validation = Validator::make($request->all(), [
            'group'=>'nullable',
            'expiry_date'=>'required|date|after:'.Carbon::now(),
            'expiry_time'=>'required_with:expiry_date',
            'maximum_joins'=>'integer|min:5',
        ]);

        if($validation->fails()){
            session()->flash('error',$validation->errors()->first());
            return back()->withErrors($validation)->withInput();
        }

        $expiry_date = $request->expiry_date.' '.$request->expiry_time;

        $link = route('client.invitaion.join',['affiliator'=>encryptId(auth('client')->id()),'group'=>encryptId($request->group)]);
        AffiliationLink::create(
            [
                'link'=>$link,
                'expiry_date'=>$expiry_date,
                'max_joins'=>$request->maximum_joins,
                'active'=>1,
                'affiliate_cohort_id'=>$request->group,
                'client_id'=>auth('client')->id()
            ]
        );

        return back()->with('success','Invitaion link created successfully!');
    }
}
