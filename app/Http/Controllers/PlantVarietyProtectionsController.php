<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlantVarietyProtection;

class PlantVarietyProtectionsController extends Controller
{
    public function addPlantVarietyProtection(Request $request){
        $this->validate($request, array(
            'certificate_number' => 'required',
            'denomination' => 'required'
        ));

        $plantVarietyProtection = new PlantVarietyProtection;
        $plantVarietyProtection->certificate_number = $request->certificate_number;
        $plantVarietyProtection->denomination = $request->denomination;
        $plantVarietyProtection->crop_type = $request->crop_type;
        $plantVarietyProtection->technology_id = $request->tech_id;
        $plantVarietyProtection->save();

        return redirect()->back()->with('success','Plant Variety Protection Added.'); 
    }
    
    public function editPlantVarietyProtection(Request $request, $plantVarietyProtection_id){
        $this->validate($request, array(
            'certificate_number' => 'required',
            'denomination' => 'required'
        ));
        
        $plantVarietyProtection = PlantVarietyProtection::find($plantVarietyProtection_id); 
        $plantVarietyProtection->certificate_number = $request->certificate_number;
        $plantVarietyProtection->denomination = $request->denomination;
        $plantVarietyProtection->crop_type = $request->crop_type;
        $plantVarietyProtection->save();
        return redirect()->back()->with('success','Plant Variety Protection Updated.'); 
    }

    public function deletePlantVarietyProtection($plantVarietyProtection_id){
        $plantVarietyProtection = PlantVarietyProtection::find($plantVarietyProtection_id);
        $plantVarietyProtection->delete();
        return redirect()->back()->with('success','Plant Variety Protection Deleted.'); 
    }
}
