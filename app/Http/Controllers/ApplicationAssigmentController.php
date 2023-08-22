<?php

namespace App\Http\Controllers;

use App\Jobs\CustomMailJob;
use App\Models\Application;
use App\Models\ApplicationAssignment;
use App\Models\ApplicationFlowHistory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationAssigmentController extends Controller
{
    //
    /**
     * function to assign application to user for review
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = \auth()->user();
        if ($user->can("Assign Application")) {
            if(isset($request->applications)){
                foreach (json_decode($request->applications,true) as $id){
                    $application = Application::find($id["id"]);
                    DB::beginTransaction();
                    if($application->status!=Application::SUBMITTED){
                        $exist=ApplicationAssignment::where("application_id",$application->id)->first();
                        $record=ApplicationAssignment::find($exist->id);
                        $comment= "Application is Re-assigned";
                    }else{
                        $record = new ApplicationAssignment();
                        $comment= "Application is assigned";
                    }
                    $assindeTo=User::find($request->assign_to);

                    $record->application_id = $application->id;
                    $record->assigned_to = $request->assign_to;
                    $record->assigned_by = $user->id;
                    $record->save();
                    //save application flow history
                    ApplicationFlowHistory::create([
                        "application_id"=>$application->id,
                        "comment"=>$comment." to ".$assindeTo->name,
                        "status"=>Application::UNDER_REVIEW,
                        "user_id"=>$user->id
                    ]);
                    //update application status
                    $application->status = Application::UNDER_REVIEW;
                    $application->save();
                    $message="Dear $user->name, You have been assigned tasks in Ihuzo.Kindly,
                    login to the system to access tasks assigned to you.";
                    $subject="Task Assignment";
                    $this->dispatch(new CustomMailJob($message,$assindeTo->email,$subject));
                    DB::commit();
                }
                return redirect()->back()->with("success", "$comment successfully");
            }else{
                return redirect()->back()->with("error", "Please select one request");
            }

        } else {
            abort(403);
        }
    }
}
