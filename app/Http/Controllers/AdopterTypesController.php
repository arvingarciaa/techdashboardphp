<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdopterType;
use App\Log;

class AdopterTypesController extends Controller
{
    public function addAdopterType(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $user = auth()->user();
        $adopterType = new AdopterType;
        $adopterType->name = $request->name;
        $adopterType->user_id = $user->id;
        if($user->user_level == 5){
            $adopterType->approved = 2;
        }
        $adopterType->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Added \''. $request->name.'\'';
        $log->IP_address = $request->ip();
        $log->resource = 'Adopter Types';
        $log->save();

        return redirect()->back()->with('success','Adopter Type Added.'); 
    }
    
    public function editAdopterType(Request $request, $adopterType_id){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        
        $user = auth()->user();
        $adopterType = AdopterType::find($adopterType_id);
        $adopterType->name = $request->name;
        $adopterType->save();

        if($adopterType->approved != 2 || $user->user_level == 5){
            $approvals = $adopterType->approvals()->open()->get();
            $approvals->each->accept();
        } 

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Changed \''. $request->name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Adopter Types';
        $log->save();

        return redirect()->back()->with('success','Adopter Type Updated.'); 
    }

    public function deleteAdopterType($adopterType_id, Request $request){
        $adopterType = AdopterType::find($adopterType_id);
        $deletedName = $adopterType->name;
        $adopterType->delete();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Removed '. $deletedName.' from Adopter Types';
        $log->IP_address = $request->ip();
        $log->resource = 'Adopter Types';
        $log->save();

        return redirect()->back()->with('success','Adopter Type Deleted.'); 
    }

    public function approveAdopterType($adopterType_id){
        $adopterType = AdopterType::find($adopterType_id);
        if($adopterType->approved != 2){
            $adopterType->approved = 2;
            $adopterType->save();
        }
        $approvals = $adopterType->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success','Adopter Type Approved.');
    }

    public function rejectAdopterType($adopterType_id){
        $adopterType = AdopterType::find($adopterType_id);
        if($adopterType->approved != 2){
            $adopterType->approved = 0;
            $adopterType->save();
        }
        $approvals = $adopterType->approvals()->open()->get();
        $approvals->each->reject();
        return redirect()->back()->with('success','Adopter Type Rejected.');
    }

    public function togglePublishAdopterType($adopterType_id){
        $adopterType = AdopterType::find($adopterType_id);
        $user = auth()->user();

        if($adopterType->approved == 0){
            if($user->user_level == 5){
                $adopterType->approved = 2;
                $message = 'Adopter Type added.';
            } else{
                $adopterType->approved = 1;
                $message = 'Adopter Type submitted for approval.';
            }
        } elseif($adopterType->approved == 1 || $adopterType->approved == 2){
            $adopterType->approved = 0;
            $message = 'AdopterType unpublished.';
        }
        $adopterType->save();
        $approvals = $adopterType->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success',$message);
    }
}
