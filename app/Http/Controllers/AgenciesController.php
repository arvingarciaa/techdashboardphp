<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;

class AgenciesController extends Controller
{
    public function addAgency(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'agency_type' => 'required'
        ));

        $agency = new Agency;
        $agency->name = $request->name;
        $agency->address = $request->address;
        $agency->phone = $request->phone;
        $agency->fax = $request->fax;
        $agency->agency_type_id = $request->agency_type;
        $agency->save();

        return redirect()->back()->with('success','Agency Added.'); 
    }
    
    public function editAgency(Request $request, $agency_id){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'agency_type' => 'required'
        ));
        
        $agency = Agency::find($agency_id);
        $agency->name = $request->name;
        $agency->address = $request->address;
        $agency->phone = $request->phone;
        $agency->fax = $request->fax;
        $agency->agency_type_id = $request->agency_type;
        $agency->save();

        return redirect()->back()->with('success','Agency Updated.'); 
    }

    public function deleteAgency($agency_id){
        $agency = Agency::find($agency_id);
        $agency->delete();
        return redirect()->back()->with('success','Agency Deleted.'); 
    }
}
