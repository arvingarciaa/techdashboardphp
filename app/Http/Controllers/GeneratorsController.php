<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generator;
use App\Log;

class GeneratorsController extends Controller
{
    public function addGenerator(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'agency' => 'required'
        ));

        $user = auth()->user();
        $generator = new Generator;
        $generator->name = $request->name;
        $generator->user_id = $user->id;
        $generator->address = $request->address;
        $generator->phone = $request->phone;
        $generator->fax = $request->fax;
        $generator->email = $request->email;
        $generator->agency_id = $request->agency;
        if($user->user_level == 5){
            $generator->approved = 2;
        }
        $generator->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Added \''. $request->name.'\'';
        $log->IP_address = $request->ip();
        $log->resource = 'Generators';
        $log->save();

        return redirect()->back()->with('success','Generator Added.'); 
    }
    
    public function editGenerator(Request $request, $generator_id){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'agency' => 'required'
        ));
        
        $user = auth()->user();
        $generator = Generator::find($generator_id);
        $generator->name = $request->name;
        $generator->address = $request->address;
        $generator->phone = $request->phone;
        $generator->fax = $request->fax;
        $generator->email = $request->email;
        $generator->agency_id = $request->agency;
        $generator->save();

        if($generator->approved != 2 || $user->user_level == 5){
            $approvals = $generator->approvals()->open()->get();
            $approvals->each->accept();
        } 

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Changed \''. $request->name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Generators';
        $log->save();

        return redirect()->back()->with('success','Generator Updated.'); 
    }

    public function deleteGenerator($generator_id, Request $request){
        $generator = Generator::find($generator_id);
        $deletedName = $generator->name;
        $generator->technologies()->detach();
        $generator->delete();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Removed '. $deletedName.' from Generators';
        $log->IP_address = $request->ip();
        $log->resource = 'Generators';
        $log->save();
        return redirect()->back()->with('success','Generator Deleted.'); 
    }

    public function approveGenerator($generator_id){
        $generator = Generator::find($generator_id);
        if($generator->approved != 2){
            $generator->approved = 2;
            $generator->save();
        }
        $approvals = $generator->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success','Generator Approved.');
    }

    public function rejectGenerator($generator_id){
        $generator = Generator::find($generator_id);
        if($generator->approved != 2){
            $generator->approved = 0;
            $generator->save();
        }
        $approvals = $generator->approvals()->open()->get();
        $approvals->each->reject();
        return redirect()->back()->with('success','Generator Rejected.');
    }

    public function togglePublishGenerator($generator_id){
        $generator = Generator::find($generator_id);
        $user = auth()->user();

        if($generator->approved == 0){
            if($user->user_level == 5){
                $generator->approved = 2;
                $message = 'Generator added.';
            } else{
                $generator->approved = 1;
                $message = 'Generator submitted for approval.';
            }
        } elseif($generator->approved == 1 || $generator->approved == 2){
            $generator->approved = 0;
            $message = 'Generator unpublished.';
        }
        $generator->save();
        $approvals = $generator->approvals()->open()->get();
        $approvals->each->accept();
        return redirect()->back()->with('success',$message);
    }
}
