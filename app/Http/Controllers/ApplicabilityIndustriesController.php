<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicabilityIndustry;
use App\Log;

class ApplicabilityIndustriesController extends Controller
{
    public function addApplicabilityIndustry(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $user = auth()->user();
        $appIndustry = new ApplicabilityIndustry;
        $appIndustry->name = $request->name;
        $appIndustry->user_id = $user->id;
        if($user->user_level == 5){
            $appIndustry->approved = 2;
        }
        $appIndustry->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Added \''. $request->name.'\'';
        $log->IP_address = $request->ip();
        $log->resource = 'Technology Applicability - Industry';
        $log->save();

        return redirect()->back()->with('success','Technology Applicability - Industry Added.'); 
    }
    
    public function editApplicabilityIndustry(Request $request, $appIndustry_id){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        
        $user = auth()->user();
        $appIndustry = ApplicabilityIndustry::find($appIndustry_id);
        $appIndustry->name = $request->name;
        $appIndustry->save();

        if($appIndustry->approved != 2 || $user->user_level == 5){
            $approvals = $appIndustry->approvals()->open()->get();
            $approvals->each->accept();
        } 

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Changed \''. $request->name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Technology Applicability - Industry';
        $log->save();

        return redirect()->back()->with('success','Technology Applicability - Industry Updated.'); 
    }

    public function deleteApplicabilityIndustry($appIndustry_id, Request $request){
        $appIndustry = ApplicabilityIndustry::find($appIndustry_id);
        $deletedName = $appIndustry->name;
        $appIndustry->technologies()->detach();
        $appIndustry->delete();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Removed '. $deletedName.' from Technology Applicability - Industry';
        $log->IP_address = $request->ip();
        $log->resource = 'Technology Applicability - Industry';
        $log->save();

        return redirect()->back()->with('success','Technology Applicability - Industry Deleted.'); 
    }

    public function approveApplicabilityIndustry($applicabilityIndustry_id){
        $applicabilityIndustry = ApplicabilityIndustry::find($applicabilityIndustry_id);
        if($applicabilityIndustry->approved != 2){
            $applicabilityIndustry->approved = 2;
            $applicabilityIndustry->save();
        }
        $approvals = $applicabilityIndustry->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success','Applicability Industry Approved.');
    }

    public function rejectApplicabilityIndustry($applicabilityIndustry_id){
        $applicabilityIndustry = ApplicabilityIndustry::find($applicabilityIndustry_id);
        if($applicabilityIndustry->approved != 2){
            $applicabilityIndustry->approved = 0;
            $applicabilityIndustry->save();
        }
        $approvals = $applicabilityIndustry->approvals()->open()->get();
        $approvals->each->reject();
        return redirect()->back()->with('success','Applicability Industry Rejected.');
    }

    public function togglePublishApplicabilityIndustry($applicabilityIndustry_id){
        $applicabilityIndustry = ApplicabilityIndustry::find($applicabilityIndustry_id);
        $user = auth()->user();

        if($applicabilityIndustry->approved == 0){
            if($user->user_level == 5){
                $applicabilityIndustry->approved = 2;
                $message = 'Applicability Industry added.';
            } else{
                $applicabilityIndustry->approved = 1;
                $message = 'Applicability Industry submitted for approval.';
            }
        } elseif($applicabilityIndustry->approved == 1 || $applicabilityIndustry->approved == 2){
            $applicabilityIndustry->approved = 0;
            $message = 'ApplicabilityIndustry unpublished.';
        }
        $applicabilityIndustry->save();
        $approvals = $applicabilityIndustry->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success',$message);
    }
}
