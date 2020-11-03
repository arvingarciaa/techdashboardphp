<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industry;
use App\Sector;
use App\Log;

class IndustriesController extends Controller
{
    public function addIndustry(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $user = auth()->user();
        $industry = new Industry;
        $industry->user_id = $user->id;
        $industry->name = $request->name;
        if($user->user_level == 5){
            $industry->approved = 2;
        }
        $industry->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Added \''. $request->name.'\'';
        $log->IP_address = $request->ip();
        $log->resource = 'Industries';
        $log->save();

        return redirect()->back()->with('success','Industry Added.'); 
    }
    
    public function editIndustry(Request $request, $industry_id){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        
        $user = auth()->user();
        $industry = Industry::find($industry_id);
        $industry->name = $request->name;
        $industry->save();

        if($industry->approved != 2 || $user->user_level == 5){
            $approvals = $industry->approvals()->open()->get();
            $approvals->each->accept();
        } 

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Changed \''. $request->name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Industries';
        $log->save();

        return redirect()->back()->with('success','Industry Updated.'); 
    }

    public function deleteIndustry($industry_id, Request $request){
        $industry = Industry::find($industry_id);
        $deletedName = $industry->name;
        $industry->sectors()->delete();
        $industry->delete();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Removed '. $deletedName.' from Industries';
        $log->IP_address = $request->ip();
        $log->resource = 'Industries';
        $log->save();

        return redirect()->back()->with('success','Industry Deleted.'); 
    }

    public function approveIndustry($industry_id){
        $industry = Industry::find($industry_id);
        if($industry->approved != 2){
            $industry->approved = 2;
            $industry->save();
        }
        $approvals = $industry->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success','Industry Approved.');
    }

    public function rejectIndustry($industry_id){
        $industry = Industry::find($industry_id);
        if($industry->approved != 2){
            $industry->approved = 0;
            $industry->save();
        }
        $approvals = $industry->approvals()->open()->get();
        $approvals->each->reject();
        return redirect()->back()->with('success','Industry Rejected.');
    }

    public function togglePublishIndustry($industry_id){
        $industry = Industry::find($industry_id);
        $user = auth()->user();

        if($industry->approved == 0){
            if($user->user_level == 5){
                $industry->approved = 2;
                $message = 'Industry added.';
            } else{
                $industry->approved = 1;
                $message = 'Industry submitted for approval.';
            }
        } elseif($industry->approved == 1 || $industry->approved == 2){
            $industry->approved = 0;
            $message = 'Industry unpublished.';
        }
        $industry->save();
        $approvals = $industry->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success',$message);
    }
    
}
