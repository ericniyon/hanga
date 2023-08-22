<?php

namespace App\Http\Controllers;

use App\FileManager;
use App\Http\Requests\ValidateEditJobOpportunity;
use App\Models\OpportunityStudyLevel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\JobOpportunity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\DataTables\JobOpportunityDataTable;
use App\Http\Requests\ValidateJobOpportunity;

class JobOpportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function listOfJobOpportunities()
    {
        $job_opportunities=JobOpportunity::orderBy('created_at','desc')->select('*');
        $datatable=new JobOpportunityDataTable($job_opportunities);
        return $datatable->render('admin.job_opportunities.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function storeJobOpportunity(ValidateJobOpportunity $request)
    {
         $user = auth()->guard("web")->user();
        $request->validated();
        //Job attachment
        $job_opportunity = new JobOpportunity();
        $job_attachment = FileManager::OPPORTUNITY_ATTACHMENT_PATH;
        if($request->hasFile(('attachment'))) {
            $job_attachment_path = $request->file('attachment')->store($job_attachment);
            $job_attachment_file = str_replace("$job_attachment", "", $job_attachment_path);
            $job_opportunity->attachment = $job_attachment_file;
        }
        //Logo file
        $logo=FileManager::OPPORTUNITY_LOGO_PATH;
        $logo_path=$request->file('logo')->store($logo);
        $logo_file=str_replace("$logo","","$logo_path");


        $job_opportunity->logo=$logo_file;
        $job_opportunity->job_title=$request->get('job_title');
//        $job_opportunity->job_type_id=$request->get('job_type');
        $job_opportunity->opportunity_type_id=$request->get('opportunity_type');
        $job_opportunity->company_name=$request->get('company_name');
        $job_opportunity->link=$request->get('link');
            if ($request->get('has_grant')!=null) {
                $job_opportunity->has_grant = $request->get('has_grant');
                $job_opportunity->grant=$request->get('grant');
            }else
            {
                $job_opportunity->has_grant = 0;
            }
        $job_opportunity->required_experience=$request->get('required_experience');
        $job_opportunity->deadline=$request->get('deadline');
        $job_opportunity->availability_time=$request->get('availability_time');
        $job_opportunity->availability_type_id=$request->get('availability_type_id');

        $job_opportunity->expiration_date=$request->get('expiration_date');
        $job_opportunity->job_details=$request->get('job_details');
        $job_opportunity->save();
        $job_opportunity->opportunityStudyLevel()->sync($request->study_level);
//        dd($job_opportunity->id);
        return redirect()->back()->with('success','Opportunity saved successfully!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|Response
     */
    public function jobOpportunityDetails($id)
    {
        $decryptId=decryptId($id);
            $job_opportunity=JobOpportunity::findOrFail($decryptId);
        return view('admin.job_opportunities.details',compact('job_opportunity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function updateJobOpportunity(ValidateEditJobOpportunity $request)
    {
        $user = auth()->guard("web")->user();
        $request->validated();
        $job_opportunity = JobOpportunity::findOrFail($request->input('job_id'));
        //Job attachment
        $job_attachment = FileManager::OPPORTUNITY_ATTACHMENT_PATH;
        if($request->hasFile(('attachment')))
        {
            $job_attachment_path=$request->file('attachment')->store($job_attachment);
            $job_attachment_file=str_replace("$job_attachment","",$job_attachment_path);
            $job_opportunity->attachment=$job_attachment_file;

        }
        //Logo file
        $logo=FileManager::OPPORTUNITY_LOGO_PATH;
        if ($request->hasFile('logo'))
        {
            $logo_path=$request->file('logo')->store($logo);
            $logo_file=str_replace("$logo","","$logo_path");
            $job_opportunity->logo=$logo_file;
        }
        $job_opportunity->job_title=$request->get('job_title');
        $job_opportunity->company_name=$request->get('company_name');
        $job_opportunity->link=$request->get('link');
//        $job_opportunity->job_type_id=$request->get('job_type');
        if ($request->get('has_grant')!=null) {
            $job_opportunity->has_grant = $request->get('has_grant');
            $job_opportunity->grant=$request->get('grant');
        }else
        {
            $job_opportunity->has_grant = 0;
        }
        $job_opportunity->required_experience=$request->input('required_experience');
        $job_opportunity->opportunity_type_id=$request->get('opportunity_type');
        $job_opportunity->deadline=$request->get('deadline');
        $job_opportunity->expiration_date=$request->get('expiration_date');
        $job_opportunity->job_details=$request->get('job_details');
        $job_opportunity->save();
        //Saving Study levels to Opporunity
        $job_opportunity->opportunityStudyLevel()->sync($request->study_level);
        return redirect()->back()->with('success', 'Opportunity updated successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroyJobOpportunity($id)
    {
        $decryptId=decryptId($id);
        OpportunityStudyLevel::where('opportunity_id',$decryptId)->delete();
        $job_opportunity=JobOpportunity::find($decryptId);
        $job_opportunity->delete();
        return redirect()->back()->with('success','Opportunity deleted successfully!!');

    }
    public function jobOpportunityUpdate($id)
    {
        $job_opportunity = JobOpportunity::findOrFail($id);
        return response()->json($job_opportunity);
    }
    public function downloadAttachment($filename)
    {
        // dd($filename);
        $path = 'public/job_opportunities/attachments/';
        $fullPath = $path . $filename;
        return Storage::download($fullPath);
    }

}
