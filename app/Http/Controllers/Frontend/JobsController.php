<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Requests\ValidateFrontJobOpportunity;
use Carbon\Carbon;
use App\Models\JobOpportunity;
use App\Models\OpportunityType;
use Illuminate\Database\Eloquent\Model;


class JobsController extends \App\Http\Controllers\Controller
{

    public function index()
    {
        $trendingJob = JobOpportunity::inRandomOrder()->get()->take(3);
        return view('frontend.jobs', compact('trendingJob'));
    }

    public function details($job_id)
    {
        $job = JobOpportunity::find(decryptId($job_id));
        $similarJob = JobOpportunity::query()
            ->where('opportunity_type_id', $job->opportunity_type_id)
            ->where('id', '!=', $job->id)
            ->orderBy('created_at', 'desc')
            ->get()->take(3);
        return view('frontend.job_details', compact('job', 'similarJob'));
    }

    public function listOpportunities()
    {
        return view('frontend.opportunities_list');
    }

    public function opportunityDetails($job_id)
    {
        $job = JobOpportunity::find(decryptId($job_id));
        $similarJob = JobOpportunity::inRandomOrder()->get()->take(3);
        return view('frontend.opportunity_details', compact('job', 'similarJob'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeJobOpportunity(ValidateFrontJobOpportunity $request)
    {
        $user = auth()->guard("client")->user();
        $request->validated();
        //Job attachment
        $job_opportunity = new JobOpportunity();
        $job_attachment = 'public/job_opportunities/attachments';
        if ($request->hasFile(('attachment'))) {

            $job_attachment_path = $request->file('attachment')->store($job_attachment);
            $job_attachment_file = str_replace("$job_attachment", "", $job_attachment_path);
            $job_opportunity->attachment = $job_attachment_file;
        }
//        //Logo file
//        $logo='public/job_opportunities/logo';
//        $logo_path=$request->file('logo')->store($logo);
        //      $logo_file=str_replace("$logo","","$logo_path");


//        $job_opportunity->logo=$logo_file;
        $job_opportunity->job_title = $request->get('job_title');
//        $job_opportunity->job_type_id=$request->get('job_type');
        $job_opportunity->opportunity_type_id = $request->get('opportunity_type');
//        dd(  $job_opportunity->name);
        $job_opportunity->company_name = $user->name;
        $job_opportunity->client_id = $user->id;
        $job_opportunity->link = $request->get('link');
        if ($request->get('has_grant') != null) {
            $job_opportunity->has_grant = $request->get('has_grant');
            $job_opportunity->grant = $request->get('grant');
        } else {
            $job_opportunity->has_grant = 0;
        }
        //
        $job_opportunity->required_experience = $request->get('required_experience');
        $job_opportunity->availability_time = $request->get('availability_time');
        $job_opportunity->availability_type_id = $request->get('availability_type_id');
        //
        $job_opportunity->deadline = $request->get('deadline');
        $job_opportunity->job_details = $request->get('job_details');
        $job_opportunity->save();
        $job_opportunity->opportunityStudyLevel()->sync($request->study_level);
        return redirect()->back()->with('success', 'Opportunity saved successfully!!');

    }

}
