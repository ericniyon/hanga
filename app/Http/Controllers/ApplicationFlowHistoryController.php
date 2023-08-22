<?php

namespace App\Http\Controllers;

use App\Jobs\CustomMailJob;
use App\Models\Application;
use App\Models\ApplicationFlowHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationFlowHistoryController extends Controller
{


    public function store(Request $request,Application $application): \Illuminate\Http\RedirectResponse
    {
        $user=auth()->user();
        if(in_array($application->status,[Application::UNDER_REVIEW])
            &&in_array($request->status,[Application::PROPOSE_TO_REJECT,Application::PROPOSE_TO_RETURN_BACK,Application::PROPOSE_TO_APPROVE])
            && $user->can('Review Application')){
           return $this->reviewApplication($request,$application);
        }else if($application->status==Application::REVIEWED
            && in_array($request->status,[Application::APPROVED,Application::REJECTED,Application::RETURN_BACK_TO_REVIEW,Application::RETURN_BACK])
            && $user->can('Approve Application')){
          return $this->approveApplication($request,$application);
        }else{
            abort(403);
        }
    }


    function storeHistory(Application $application,$user,$status,$comment,$message_to_applicant,$is_comment=1)
    {

        $history = new ApplicationFlowHistory();
        $history->application_id = $application->id;
        $history->user_id = $user->id;
        $history->status = $status;
        $history->comment = $comment;
        $history->is_comment = $is_comment;
        $history->external_comment = $message_to_applicant;
        $history->save();
    }

    protected function reviewApplication($request,Application $application): \Illuminate\Http\RedirectResponse
    {
        $user=auth()->user();
        DB::beginTransaction();
        $application->status=Application::REVIEWED;
        $application->review_decision=$request->status;
        $application->save();
        $this->storeHistory($application,$user,$request->status,$request->comment,$request->message);
        DB::commit();
        return redirect()->back()->with("success","Review is stored Successfully");
    }

    protected function approveApplication($request,Application $application): \Illuminate\Http\RedirectResponse
    {
        $user=auth()->user();
        $lastReturn=null;
        DB::beginTransaction();
        if(in_array($request->status,[Application::RETURN_BACK_TO_REVIEW])){
            $lastReturn=$application->status;
            $application->status=Application::UNDER_REVIEW;
            $application->last_return=Application::REVIEWED;
            $return="Application is returned back for review";
        }
        if(in_array($request->status,[Application::REJECTED,Application::RETURN_BACK])){
            if($request->status==Application::RETURN_BACK){
                $lastReturn=$application->status;
                $return="Application is returned back";
            }else{
                $application->rejected_by=auth()->user()->id;
                $application->rejected_date=now()->toDateString();
                $return="Application is Rejected";
            }
            $application->status=$request->status;
            $application->last_return=$lastReturn;

            $message=$request->message;

        }
        if(in_array($request->status,[Application::APPROVED]))
        {
            $application->status=$request->status;
            $application->last_return=$lastReturn;
            $application->approved_by=auth()->user()->id;
            $application->approval_date=now()->toDateString();
            $return="Application is Approved";
            $message="Your application for membership verification is approved";
        }
        $application->save();
        $this->storeHistory($application,$user,$request->status,$request->comment,$request->message);
        $subject="Verification Notification";
        $email=$application->client->email;
        $this->dispatch(new CustomMailJob($message,$email,$subject));
        DB::commit();
        return redirect()->back()->with("success",$return);
    }

}
