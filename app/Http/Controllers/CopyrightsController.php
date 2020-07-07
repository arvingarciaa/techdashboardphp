<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Copyright;

class CopyrightsController extends Controller
{
    public function addCopyright(Request $request){
        $this->validate($request, array(
            'application_number' => 'required',
            'registration_number' => 'required'
        ));

        $copyright = new Copyright;
        $copyright->application_number = $request->application_number;
        $copyright->registration_number = $request->registration_number;
        $copyright->date_of_filing = $request->date_of_filing;
        $copyright->status = $request->status;
        $copyright->technology_id = $request->tech_id;
        $copyright->save();

        return redirect()->back()->with('success','Copyright Added.'); 
    }
    
    public function editCopyright(Request $request, $copyright_id){
        $this->validate($request, array(
            'application_number' => 'required',
            'registration_number' => 'required'
        ));
        
        $copyright = Copyright::find($copyright_id); 
        $copyright->application_number = $request->application_number;
        $copyright->registration_number = $request->registration_number;
        $copyright->date_of_filing = $request->date_of_filing;
        $copyright->status = $request->status;
        $copyright->save();
        return redirect()->back()->with('success','Copyright Updated.'); 
    }

    public function deleteCopyright($copyright_id){
        $copyright = Copyright::find($copyright_id);
        $copyright->delete();
        return redirect()->back()->with('success','Copyright Deleted.'); 
    }
}
