<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TechnologyCategory;
use App\Log;

class TechnologyCategoriesController extends Controller
{
    public function addTechnologyCategory(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $user = auth()->user();
        $techCategory = new TechnologyCategory;
        $techCategory->name = $request->name;
        $techCategory->user_id = $user->id;
        if($user->user_level == 5){
            $techCategory->approved = 2;
        }
        $techCategory->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Added \''. $request->name.'\'';
        $log->IP_address = $request->ip();
        $log->resource = 'Technology Categories';
        $log->save();

        return redirect()->back()->with('success','Technology Category Added.'); 
    }
    
    public function editTechnologyCategory(Request $request, $techCategory_id){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        
        $user = auth()->user();
        $techCategory = TechnologyCategory::find($techCategory_id);
        $techCategory->name = $request->name;
        $techCategory->save();
        if($techCategory->approved != 2 || $user->user_level == 5){
            $approvals = $techCategory->approvals()->open()->get();
            $approvals->each->accept();
        } 
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Changed \''. $request->name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Technology Categories';
        $log->save();

        return redirect()->back()->with('success','Technology Category Updated.'); 
    }

    public function deleteTechnologyCategory($techCategory_id, Request $request){
        $techCategory = TechnologyCategory::find($techCategory_id);
        $deletedName = $techCategory->name;
        $techCategory->technologies()->detach();
        $techCategory->delete();
        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Removed '. $deletedName.' from Technology Categories';
        $log->IP_address = $request->ip();
        $log->resource = 'Technology Categories';
        $log->save();

        return redirect()->back()->with('success','Technology Category Deleted.'); 
    }

    public function approveTechnologyCategory($techCategory_id){
        $techCategory = TechnologyCategory::find($techCategory_id);
        if($techCategory->approved != 2){
            $techCategory->approved = 2;
            $techCategory->save();
        }
        $approvals = $techCategory->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success','Technology Category change approved.');
    }

    public function rejectTechnologyCategory($techCategory_id){
        $techCategory = TechnologyCategory::find($techCategory_id);
        if($techCategory->approved != 2){
            $techCategory->approved = 0;
            $techCategory->save();
        }
        $approvals = $techCategory->approvals()->open()->get();
        $approvals->each->reject();
        return redirect()->back()->with('success','Technology Category Rejected.');
    }

    public function togglePublishTechnologyCategory($techCategory_id){
        $techCategory = TechnologyCategory::find($techCategory_id);
        $user = auth()->user();

        if($techCategory->approved == 0){
            if($user->user_level == 5){
                $techCategory->approved = 2;
                $message = 'Technology Category added.';
            } else{
                $techCategory->approved = 1;
                $message = 'Technology Category submitted for approval.';
            }
        } elseif($techCategory->approved == 1 || $techCategory->approved == 2){
            $techCategory->approved = 0;
            $message = 'Technology Category unpublished.';
        }
        $techCategory->save();
        $approvals = $techCategory->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success',$message);
    }
}
