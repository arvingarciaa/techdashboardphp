<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Copyright;

class CopyrightsController extends Controller
{
    public function addCopyright(Request $request){
        $this->validate($request, array(
            'registration_number' => 'required'
        ));

        $copyright = new Copyright;
        $copyright->owners = $request->owners;
        $copyright->publishers = $request->publishers;
        $copyright->date_of_creation = $request->date_of_creation;
        $copyright->registration_date = $request->registration_date;
        $copyright->registration_number = $request->registration_number;
        $copyright->classes = $request->classes;
        $copyright->date_of_issuance = $request->date_of_issuance;
        $copyright->technology_id = $request->tech_id;
        $copyright->save();

        return redirect()->back()->with('success','Copyright Added.'); 
    }
    
    public function editCopyright(Request $request, $copyright_id){
        $this->validate($request, array(
            'registration_number' => 'required'
        ));
        
        $copyright = Copyright::find($copyright_id); 
        $copyright->owners = $request->owners;
        $copyright->publishers = $request->publishers;
        $copyright->date_of_creation = $request->date_of_creation;
        $copyright->registration_date = $request->registration_date;
        $copyright->registration_number = $request->registration_number;
        $copyright->classes = $request->classes;
        $copyright->date_of_issuance = $request->date_of_issuance;
        $copyright->save();
        return redirect()->back()->with('success','Copyright Updated.'); 
    }

    public function deleteCopyright($copyright_id){
        $copyright = Copyright::find($copyright_id);
        $copyright->delete();
        return redirect()->back()->with('success','Copyright Deleted.'); 
    }
}
