<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PotentialAdopter;

class PotentialAdoptersController extends Controller
{
    public function addPotentialAdopter(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'adopter_type' => 'required'
        ));

        $potentialAdopter = new PotentialAdopter;
        $potentialAdopter->name = $request->name;
        $potentialAdopter->adopter_type_id = $request->adopter_type;
        $potentialAdopter->save();

        return redirect()->back()->with('success','Potential Adopter Added.'); 
    }
    
    public function editPotentialAdopter(Request $request, $potentialAdopter_id){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'adopter_type' => 'required'
        ));
        
        $potentialAdopter = PotentialAdopter::find($potentialAdopter_id);
        $potentialAdopter->name = $request->name;
        $potentialAdopter->adopter_type_id = $request->adopter_type;
        $potentialAdopter->save();

        return redirect()->back()->with('success','Potential Adopter Updated.'); 
    }

    public function deletePotentialAdopter($potentialAdopter_id){
        $potentialAdopter = PotentialAdopter::find($potentialAdopter_id);
        $potentialAdopter->delete();
        return redirect()->back()->with('success','Potential Adopter Deleted.'); 
    }
}
