<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commodity;
use App\Log;

class CommoditiesController extends Controller
{
    public function addCommodity(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'sector' => 'required'
        ));

        $user = auth()->user();
        $commodity = new Commodity;
        $commodity->name = $request->name;
        $commodity->user_id = $user->id;
        $commodity->sector_id = $request->sector;
        if($user->user_level == 5){
            $commodity->approved = 2;
        }
        $commodity->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Added \''. $request->name.'\'';
        $log->IP_address = $request->ip();
        $log->resource = 'Commodities';
        $log->save();

        return redirect()->back()->with('success','Commodity Added.'); 
    }
    
    public function editCommodity(Request $request, $commodity_id){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'sector' => 'required'
        ));
        
        $user = auth()->user();
        $commodity = Commodity::find($commodity_id);
        $commodity->name = $request->name;
        $commodity->sector_id = $request->sector;
        $commodity->save();

        if($commodity->approved != 2 || $user->user_level == 5){
            $approvals = $commodity->approvals()->open()->get();
            $approvals->each->accept();
        } 

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Changed \''. $request->name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Commodities';
        $log->save();

        return redirect()->back()->with('success','Commodity Updated.'); 
    }

    public function deleteCommodity($commodity_id, Request $request){
        $commodity = Commodity::find($commodity_id);
        $deletedName = $commodity->name;
        $commodity->technologies()->detach();
        $commodity->delete();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Removed '. $deletedName.' from Commodities';
        $log->IP_address = $request->ip();
        $log->resource = 'Commodities';
        $log->save();
        return redirect()->back()->with('success','Commodity Deleted.'); 
    }

    public function approveCommodity($commodity_id){
        $commodity = Commodity::find($commodity_id);
        if($commodity->approved != 2){
            $commodity->approved = 2;
            $commodity->save();
        }
        $approvals = $commodity->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success','Commodity Approved.');
    }

    public function rejectCommodity($commodity_id){
        $commodity = Commodity::find($commodity_id);
        if($commodity->approved != 2){
            $commodity->approved = 0;
            $commodity->save();
        }
        $approvals = $commodity->approvals()->open()->get();
        $approvals->each->reject();
        return redirect()->back()->with('success','Commodity Rejected.');
    }

    public function togglePublishCommodity($commodity_id){
        $commodity = Commodity::find($commodity_id);
        $user = auth()->user();

        if($commodity->approved == 0){
            if($user->user_level == 5){
                $commodity->approved = 2;
                $message = 'Commodity added.';
            } else{
                $commodity->approved = 1;
                $message = 'Commodity submitted for approval.';
            }
        } elseif($commodity->approved == 1 || $commodity->approved == 2){
            $commodity->approved = 0;
            $message = 'Commodity unpublished.';
        }
        $commodity->save();
        $approvals = $commodity->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success',$message);
    }
}
