<?php

namespace App\Http\Controllers\v2;

use App\Client;
use App\Http\Controllers\Controller;
use App\Models\AffiliateCohort;
use App\Models\AffiliationLink;
use App\Models\ClientAffiliate;
use App\Models\RegistrationType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;

class AffiliatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = auth('client')->user()->cohorts()->select('group_name','id')->get();
        $clients = Client::whereIsActive(true)
            // ->whereHas("application")
            ->whereNotNull('verified_at')
            ->whereHas('registrationType', function($query){
                $query->whereName(RegistrationType::iWorker);
            })
            ->where('id','!=',auth('client')->id())
            ->get();

        return view('affiliates.affiliate_home', compact('groups','clients'));
    }

    public function aggregators()
    {
        $groups = auth('client')->user()->cohorts()->select('group_name','id')->get();
        $clients = Client::whereIsActive(true)
            ->whereHas("application")
            ->whereNotNull('verified_at')
            ->whereHas('registrationType', function($query){
                $query->where('name','!=',RegistrationType::iWorker);
            })
            ->where('id','!=',auth('client')->id())
            ->get();

        return view('affiliates.aggregator_home', compact('groups','clients'));
    }

    public function groupIndex($id)
    {
        $groups = auth('client')->user()->cohorts()->select('group_name','id')->get();
        $clients = Client::whereIsActive(true)
            // ->doesntHave("application")
            ->whereNotNull('verified_at')
            ->whereHas('registrationType')
            ->where('id','!=',auth('client')->id())
            ->get();

        $affiliates = Client::where('affiliated_by',auth('client')->id())
                            ->whereHas("application")->whereNotNull('verified_at')
                            ->whereHas('registrationType')
                            ->join('client_affiliate','client_affiliate.affiliates','clients.id')
                            ->select('clients.*','client_affiliate.status','client_affiliate.id as affliationId')
                            ->where('client_affiliate.affiliate_cohort_id',decryptId($id))
                            ->orderByDesc('client_affiliate.created_at')->paginate(10);

        return view('affiliates.affiliate_home_group', compact('affiliates','groups','clients'));
    }

    public function requests()
    {
        $requests = Client::whereIsActive(true)->whereNotNull('verified_at')
                            ->whereHas('registrationType')->whereStatus('Pending')
                            ->whereHas("application")
                            ->where('affiliates',auth('client')->id())
                            ->join('client_affiliate','client_affiliate.affiliated_by','clients.id')
                            ->select('clients.*','client_affiliate.status','client_affiliate.id as affliationId')
                            ->orderByDesc('client_affiliate.created_at')->get();

        return view('affiliates.affiliate_requests', compact('requests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(ClientAffiliate::whereAffiliates($request->client)->whereAffiliatedBy(auth('client')->id())->count() !=0){
            session()->flash('error','Affiliate Already Exists');
            return back()->withInput();
        }

        $validation = Validator::make($request->all(), [
            'grou_name'=>'nullable',
            'client'=>'required',
        ]);

        if($validation->fails()){
            session()->flash('error',$validation->errors()->first());
            return back()->withErrors($validation)->withInput();
        }

        auth('client')->user()->affiliatesTest()->attach($request->client,[
            'affiliate_cohort_id'=>$request->grou_name??NULL,
            'owner_status'=>'Approved',
        ]);

        return back()->with('success','Invitaion Sent created successfully!');
    }

    public function approve($id)
    {
        $aff = ClientAffiliate::findOrFail(decryptId($id))->update(['status'=>'Approved']);
        return back()->with('success','Request Approved successfully!');
    }

    public function deny($id)
    {
        $aff = ClientAffiliate::findOrFail(decryptId($id))->update(['status'=>'Denied']);
        return back()->with('success','Invitaion Denied successfully!');
    }

    public function approveJoin($id)
    {
        $aff = ClientAffiliate::findOrFail(decryptId($id))->update(['owner_status'=>'Approved']);
        return back()->with('success','Request Approved successfully!');
    }

    public function denyJoin($id)
    {
        $aff = ClientAffiliate::findOrFail(decryptId($id))->update(['owner_status'=>'Denied']);
        return back()->with('success','Invitaion Denied successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewGroupMembers($id)
    {
        $affiliates = Client::where('affiliated_by',auth('client')->id())
                            ->whereNotNull('verified_at')
                            ->whereHas('registrationType')
                            ->whereAffiliatedBy(auth('client')->id())
                            ->whereNotNull('affiliate_cohort_id')
                            ->whereNotNull('affiliation_link_id')
                            ->whereAffiliateCohortId(decryptId($id))
                            ->join('client_affiliate','client_affiliate.affiliates','clients.id')
                            ->select('clients.*','client_affiliate.owner_status','client_affiliate.id as affliationId')
                            ->orderByDesc('client_affiliate.created_at')->paginate(10);

        $group_name  = AffiliateCohort::findOrFail(decryptId($id))->group_name;

        return view('affiliates.group_view_all_affilates', compact('affiliates','group_name'));
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

    public function join(Request $request, $client,$group=NULL)
    {
        // dd('something');
        $link = AffiliationLink::findOrFail(decryptId($request->group));
        if($link->max_joins ==0){
            return back()->with('errors','Maximum number reached');
        }
        else if($link->expiry_date <= Carbon::now()){
            return back()->with('errors','Link Expired');
        }

        $link->decrement('max_joins');
        $affiliator = Client::findOrFail(decryptId($client));
        $group = AffiliateCohort::findOrFail(decryptId($group));

        // if(ClientAffiliate::where('affiliated_by',$affiliator->id)->where('affiliates',auth('client')->id())
        // ->where('affiliate_cohort_id',$group->id)->where('affiliation_link_id',$link->id)->first())
        // {
        //     return redirect()->route('client.affiliates.requests')->with('errors','You have Already Join with this link');
        // }
        ClientAffiliate::create([
            'affiliated_by'=>$affiliator->id,
            'affiliates'=>auth('client')->id(),
            'affiliate_cohort_id'=>$group->id,
            'affiliation_link_id'=>$link->id,
            'status'=>'Approved',
            'owner_status'=>'Pending',
        ]);

        return redirect()->route('client.affiliates.index')->with('success','Invitation Accepted Successfully!');
    }
}
