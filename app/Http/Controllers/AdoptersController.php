<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adopter;

class AdoptersController extends Controller
{
    public function addAdopter(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'adopter_type' => 'required'
        ));

        $adopter = new Adopter;
        $adopter->name = $request->name;
        $adopter->address = $request->address;
        $adopter->phone = $request->phone;
        $adopter->fax = $request->fax;
        $adopter->email = $request->email;
        $adopter->adopter_type_id = $request->adopter_type;
        $adopter->save();

        return redirect()->back()->with('success','Adopter Added.'); 
    }
    
    public function editAdopter(Request $request, $adopter_id){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'adopter_type' => 'required'
        ));
        
        $adopter = Adopter::find($adopter_id);
        $adopter->name = $request->name;
        $adopter->address = $request->address;
        $adopter->phone = $request->phone;
        $adopter->fax = $request->fax;
        $adopter->email = $request->email;
        $adopter->adopter_type_id = $request->adopter_type;
        $adopter->save();

        return redirect()->back()->with('success','Adopter Updated.'); 
    }

    public function deleteAdopter($adopter_id){
        $adopter = Adopter::find($adopter_id);
        $adopter->delete();
        return redirect()->back()->with('success','Adopter Deleted.'); 
    }
}
