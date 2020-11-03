<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technology;
use Kyslik\ColumnSortable\Sortable;
use App\Log;

class TechnologiesController extends Controller
{   
    public function addTechnology(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:255',
            'technology_categories' => 'required'
        ));

        $tech = new Technology;
        $tech->title = $request->title;
        $tech->description = $request->description;
        $tech->significance = $request->significance;
        $tech->target_users = $request->target_users;
        $tech->applicability_location = $request->applicability_location;
        $tech->applicability_industry = $request->applicability_industry;
        $user = auth()->user();
        $tech->user_id = $user->id;
        $tech->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Added a new technology';
        $log->IP_address = $request->ip();
        $log->resource = 'Technologies';
        $log->save();

        $tech->technology_categories()->sync($request->technology_categories);
        $tech->commodities()->sync($request->commodities);
        return redirect()->back()->with('success','Technology Added. <a href="/admin/tech/'.$tech->id.'/edit">Click this link add more details.</a>'); 
    }
    
    public function editTechnology(Request $request, $tech_id){
        $this->validate($request, array(
            'title' => 'required|max:255'
        ));
        
        $tech = Technology::find($tech_id);
        $tech->title = $request->title;
        $tech->description = $request->description;
        $tech->significance = $request->significance;
        $tech->target_users = $request->target_users;
        $tech->applicability_location = $request->applicability_location;
        $tech->applicability_industry = $request->applicability_industry;
        $tech->year_developed = $request->year_developed;
        $tech->commercialization_mode = $request->commercialization_mode;
        $user = auth()->user();
        $tech->user_id = $user->id;

        if($request->hasFile('banner')){
            if($tech->banner != null){
                $image_path = public_path().'/storage/page_images/'.$tech->banner;
                unlink($image_path);
            }
            $imageFile = $request->file('banner');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $tech->banner = $imageName;
        }

        $tech->basic_research_title = $request->basic_research_title;
        $tech->basic_research_funding = $request->basic_research_funding;
        $tech->basic_research_implementing = $request->basic_research_implementing;
        $tech->basic_research_cost = str_replace( ',', '', $request->basic_research_cost);
        $tech->basic_research_start_date = $request->basic_research_start_date;
        $tech->basic_research_end_date = $request->basic_research_end_date;
        $tech->applied_research_type = $request->applied_research_type;
        $tech->applied_research_title = $request->applied_research_title;
        $tech->applied_research_funding = $request->applied_research_funding;
        $tech->applied_research_implementing = $request->applied_research_implementing;
        $tech->applied_research_cost = str_replace( ',', '', $request->applied_research_cost);
        $tech->applied_research_start_date = $request->applied_research_start_date;
        $tech->applied_research_end_date = $request->applied_research_end_date;

        $tech->save();

        if($tech->approved != 2 || $user->user_level == 5){
            $approvals = $tech->approvals()->open()->get();
            $approvals->each->accept();
        } 

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Changed \''. $request->name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Technologies';
        $log->save();

        $tech->technology_categories()->sync($request->technology_categories);
        $tech->commodities()->sync($request->commodities);
        $tech->generators()->sync($request->generators);
        $tech->agencies()->sync($request->owners);
        $tech->adopters()->sync($request->adopters);
        return redirect()->back()->with('success','Technology Updated.'); 
    }

    public function deleteTechnology($tech_id, Request $request){
        $tech = Technology::find($tech_id);
        $deletedName = $tech->name;
        if($tech->banner != null){
            $image_path = public_path().'/storage/page_images/'.$tech->banner;
            unlink($image_path);
        }
        $tech->technology_categories()->detach();
        $tech->commodities()->detach();
        $tech->generators()->detach();
        $tech->agencies()->detach();
        $tech->adopters()->detach();
        $tech->delete();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Removed '. $deletedName.' from Technologies';
        $log->IP_address = $request->ip();
        $log->resource = 'Technologies';
        $log->save();

        return redirect()->back()->with('success','Technology Deleted.'); 
    }

    public function approveTechnology($tech_id){
        $tech = Technology::find($tech_id);
        if($tech->approved != 2){
            $tech->approved = 2;
            $tech->save();
        }
        $approvals = $tech->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success','Technology Approved.');
    }

    public function rejectTechnology($tech_id){
        $tech = Technology::find($tech_id);
        if($tech->approved != 2){
            $tech->approved = 0;
            $tech->save();
        }
        $approvals = $tech->approvals()->open()->get();
        $approvals->each->reject();
        return redirect()->back()->with('success','Technology Rejected.');
    }

    public function togglePublishTechnology($tech_id){
        $tech = Technology::find($tech_id);
        $user = auth()->user();

        if($tech->approved == 0){
            if($user->user_level == 5){
                $tech->approved = 2;
                $message = 'Technology added.';
            } else{
                $tech->approved = 1;
                $message = 'Technology submitted for approval.';
            }
        } elseif($tech->approved == 1 || $tech->approved == 2){
            $tech->approved = 0;
            $message = 'Technology unpublished.';
        }
        $tech->save();
        $approvals = $tech->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success',$message);
    }
}
