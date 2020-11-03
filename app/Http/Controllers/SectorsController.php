<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;
use App\Log;

class SectorsController extends Controller
{
    public function addSector(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'industry' => 'required'
        ));

        $user = auth()->user();
        $sector = new Sector;
        $sector->user_id = $user->id;
        $sector->name = $request->name;
        $sector->industry_id = $request->industry;
        if($user->user_level == 5){
            $sector->approved = 2;
        }
        $sector->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Added \''. $request->name.'\'';
        $log->IP_address = $request->ip();
        $log->resource = 'Sectors';
        $log->save();

        return redirect()->back()->with('success','Sector Added.'); 
    }
    
    public function editSector(Request $request, $sector_id){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'industry' => 'required'
        ));
        
        $user = auth()->user();
        $sector = Sector::find($sector_id);
        $sector->name = $request->name;
        $sector->industry_id = $request->industry;
        $sector->save();

        if($sector->approved != 2 || $user->user_level == 5){
            $approvals = $sector->approvals()->open()->get();
            $approvals->each->accept();
        } 

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Changed \''. $request->name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Sectors';
        $log->save();

        return redirect()->back()->with('success','Sector Updated.'); 
    }

    public function deleteSector($sector_id, Request $request){
        $sector = Sector::find($sector_id);
        $deletedName = $sector->name;
        $sector->delete();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Removed '. $deletedName.' from Sectors';
        $log->IP_address = $request->ip();
        $log->resource = 'Sectors';
        $log->save();

        return redirect()->back()->with('success','Sector Deleted.'); 
    }

    public function approveSector($sector_id){
        $sector = Sector::find($sector_id);
        if($sector->approved != 2){
            $sector->approved = 2;
            $sector->save();
        }
        $approvals = $sector->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success','Sector Approved.');
    }

    public function rejectSector($sector_id){
        $sector = Sector::find($sector_id);
        if($sector->approved != 2){
            $sector->approved = 0;
            $sector->save();
        }
        $approvals = $sector->approvals()->open()->get();
        $approvals->each->reject();
        return redirect()->back()->with('success','Sector Rejected.');
    }

    public function togglePublishSector($sector_id){
        $sector = Sector::find($sector_id);
        $user = auth()->user();

        if($sector->approved == 0){
            if($user->user_level == 5){
                $sector->approved = 2;
                $message = 'Sector added.';
            } else{
                $sector->approved = 1;
                $message = 'Sector submitted for approval.';
            }
        } elseif($sector->approved == 1 || $sector->approved == 2){
            $sector->approved = 0;
            $message = 'Sector unpublished.';
        }
        $sector->save();
        $approvals = $sector->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success',$message);
    }



}
