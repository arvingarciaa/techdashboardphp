<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;
use App\Log;

class AgenciesController extends Controller
{
    public function addAgency(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $agency = new Agency;
        $agency->name = $request->name;
        $agency->region = $request->region;
        $agency->province = $request->province;
        $agency->municipality = $request->municipality;
        $agency->district = $request->district;
        $agency->phone = $request->phone;
        $agency->fax = $request->fax;
        $agency->email = $request->email;
        if($user->user_level == 5){
            $agency->approved = 2;
        }
        $agency->save();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Added \''. $request->name.'\'';
        $log->IP_address = $request->ip();
        $log->resource = 'Agencies';
        $log->save();

        return redirect()->back()->with('success','Agency Added.'); 
    }
    
    public function editAgency(Request $request, $agency_id){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        
        $user = auth()->user();
        $agency = Agency::find($agency_id);
        $agency->name = $request->name;
        $agency->region = $request->region;
        $agency->province = $request->province;
        $agency->municipality = $request->municipality;
        $agency->district = $request->district;
        $agency->phone = $request->phone;
        $agency->fax = $request->fax;
        $agency->email = $request->email;
        $agency->save();

        if($agency->approved != 2 || $user->user_level == 5){
            $approvals = $agency->approvals()->open()->get();
            $approvals->each->accept();
        } 

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Changed \''. $request->name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Agencies';
        $log->save();

        return redirect()->back()->with('success','Agency Updated.'); 
    }

    public function deleteAgency($agency_id, Request $request){
        $agency = Agency::find($agency_id);
        $deletedName = $agency->name;
        $agency->technologies()->detach();
        $agency->delete();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Removed '. $deletedName.' from Agencies';
        $log->IP_address = $request->ip();
        $log->resource = 'Agencies';
        $log->save();

        return redirect()->back()->with('success','Agency Deleted.'); 
    }

    public function approveAgency($agency_id){
        $agency = Agency::find($agency_id);
        if($agency->approved != 2){
            $agency->approved = 2;
            $agency->save();
        }
        $approvals = $agency->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success','Agency Approved.');
    }

    public function rejectAgency($agency_id){
        $agency = Agency::find($agency_id);
        if($agency->approved != 2){
            $agency->approved = 0;
            $agency->save();
        }
        $approvals = $agency->approvals()->open()->get();
        $approvals->each->reject();
        return redirect()->back()->with('success','Agency Rejected.');
    }

    public function togglePublishAgency($agency_id){
        $agency = Agency::find($agency_id);
        $user = auth()->user();

        if($agency->approved == 0){
            if($user->user_level == 5){
                $agency->approved = 2;
                $message = 'Agency added.';
            } else{
                $agency->approved = 1;
                $message = 'Agency submitted for approval.';
            }
        } elseif($agency->approved == 1 || $agency->approved == 2){
            $agency->approved = 0;
            $message = 'Agency unpublished.';
        }
        $agency->save();
        $approvals = $agency->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success',$message);
    }
}
