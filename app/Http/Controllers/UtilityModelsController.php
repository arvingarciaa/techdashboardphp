<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UtilityModel;

class UtilityModelsController extends Controller
{
    public function addUtilityModel(Request $request){
        $this->validate($request, array(
            'application_number' => 'required',
            'um_number' => 'required'
        ));

        $utilityModel = new UtilityModel;
        $utilityModel->application_number = $request->application_number;
        $utilityModel->um_number = $request->um_number;
        $utilityModel->date_of_filing = $request->date_of_filing;
        $utilityModel->registration_date = $request->registration_date;
        $utilityModel->status = $request->status;
        $utilityModel->technology_id = $request->tech_id;
        $utilityModel->save();

        return redirect()->back()->with('success','Utility Model Added.'); 
    }
    
    public function editUtilityModel(Request $request, $utilityModel_id){
        $this->validate($request, array(
            'application_number' => 'required',
            'um_number' => 'required'
        ));
        
        $utilityModel = UtilityModel::find($utilityModel_id); 
        $utilityModel->application_number = $request->application_number;
        $utilityModel->um_number = $request->um_number;
        $utilityModel->registration_date = $request->registration_date;
        $utilityModel->date_of_filing = $request->date_of_filing;
        $utilityModel->status = $request->status;
        $utilityModel->save();
        return redirect()->back()->with('success','Utility Model Updated.'); 
    }

    public function deleteUtilityModel($utilityModel_id){
        $utilityModel = UtilityModel::find($utilityModel_id);
        $utilityModel->delete();
        return redirect()->back()->with('success','Utility Model Deleted.'); 
    }
}
