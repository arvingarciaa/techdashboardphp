<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgencyType;

class AgencyTypesController extends Controller
{
    public function addAgencyType(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $agencyType = new AgencyType;
        $agencyType->name = $request->name;
        $agencyType->save();

        return redirect()->back()->with('success','Agency Type Added.'); 
    }
    
    public function editAgencyType(Request $request, $agencyType_id){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        
        $agencyType = AgencyType::find($agencyType_id);
        $agencyType->name = $request->name;
        $agencyType->save();

        return redirect()->back()->with('success','Agency Type Updated.'); 
    }

    public function deleteAgencyType($agencyType_id){
        $agencyType = AgencyType::find($agencyType_id);
        $agencyType->delete();
        return redirect()->back()->with('success','Agency Type Deleted.'); 
    }
}
