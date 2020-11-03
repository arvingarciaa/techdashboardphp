<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adopter;
use App\Log;

class AdoptersController extends Controller
{
    public function addAdopter(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'adopter_type' => 'required'
        ));

        $user = auth()->user();
        $adopter = new Adopter;
        $adopter->name = $request->name;
        $adopter->region = $request->region;
        $adopter->province = $request->province;
        $adopter->municipality = $request->municipality;
        $adopter->phone = $request->phone;
        $adopter->fax = $request->fax;
        $adopter->email = $request->email;
        $adopter->user_id = $user->id;
        $adopter->adopter_type_id = $request->adopter_type;
        if($user->user_level == 5){
            $adopter->approved = 2;
        }
        $adopter->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Added \''. $request->name.'\'';
        $log->IP_address = $request->ip();
        $log->resource = 'Adopters';
        $log->save();

        return redirect()->back()->with('success','Adopter Added.'); 
    }
    
    public function editAdopter(Request $request, $adopter_id){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'adopter_type' => 'required'
        ));
        
        $user = auth()->user();
        $adopter = Adopter::find($adopter_id);
        $adopter->name = $request->name;
        $adopter->region = $request->region;
        $adopter->province = $request->province;
        $adopter->municipality = $request->municipality;
        $adopter->phone = $request->phone;
        $adopter->fax = $request->fax;
        $adopter->email = $request->email;
        $adopter->adopter_type_id = $request->adopter_type;
        $adopter->save();

        if($adopter->approved != 2 || $user->user_level == 5){
            $approvals = $adopter->approvals()->open()->get();
            $approvals->each->accept();
        } 

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Changed \''. $request->name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Adopters';
        $log->save();

        return redirect()->back()->with('success','Adopter Updated.'); 
    }

    public function deleteAdopter($adopter_id, Request $request){
        $adopter = Adopter::find($adopter_id);
        $deletedName = $appIndustry->name;
        $adopter->technologies()->detach();
        $adopter->delete();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Removed '. $deletedName.' from Adopters';
        $log->IP_address = $request->ip();
        $log->resource = 'Adopters';
        $log->save();

        return redirect()->back()->with('success','Adopter Deleted.'); 
    }

    public function approveAdopter($adopter_id){
        $adopter = Adopter::find($adopter_id);
        if($adopter->approved != 2){
            $adopter->approved = 2;
            $adopter->save();
        }
        $approvals = $adopter->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success','Adopter Approved.');
    }

    public function rejectAdopter($adopter_id){
        $adopter = Adopter::find($adopter_id);
        if($adopter->approved != 2){
            $adopter->approved = 0;
            $adopter->save();
        }
        $approvals = $adopter->approvals()->open()->get();
        $approvals->each->reject();
        return redirect()->back()->with('success','Adopter Rejected.');
    }

    public function togglePublishAdopter($adopter_id){
        $adopter = Adopter::find($adopter_id);
        $user = auth()->user();

        if($adopter->approved == 0){
            if($user->user_level == 5){
                $adopter->approved = 2;
                $message = 'Adopter added.';
            } else{
                $adopter->approved = 1;
                $message = 'Adopter submitted for approval.';
            }
        } elseif($adopter->approved == 1 || $adopter->approved == 2){
            $adopter->approved = 0;
            $message = 'Adopter unpublished.';
        }
        $adopter->save();
        $approvals = $adopter->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success',$message);
    }
}
