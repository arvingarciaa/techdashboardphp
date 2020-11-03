<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndustrialDesign;

class IndustrialDesignsController extends Controller
{
    public function addIndustrialDesign(Request $request){
        $this->validate($request, array(
            'application_number' => 'required',
            'registration_number' => 'required'
        ));

        $industrialDesign = new IndustrialDesign;
        $industrialDesign->application_number = $request->application_number;
        $industrialDesign->registration_number = $request->registration_number;
        $industrialDesign->date_of_filing = $request->date_of_filing;
        $industrialDesign->registration_date = $request->registration_date;
        $industrialDesign->status = $request->status;
        $industrialDesign->technology_id = $request->tech_id;
        $industrialDesign->save();

        return redirect()->back()->with('success','Industrial Design Added.'); 
    }
    
    public function editIndustrialDesign(Request $request, $industrialDesign_id){
        $this->validate($request, array(
            'application_number' => 'required',
            'registration_number' => 'required'
        ));
        
        $industrialDesign = IndustrialDesign::find($industrialDesign_id); 
        $industrialDesign->application_number = $request->application_number;
        $industrialDesign->registration_number = $request->registration_number;
        $industrialDesign->date_of_filing = $request->date_of_filing;
        $industrialDesign->registration_date = $request->registration_date;
        $industrialDesign->status = $request->status;
        $industrialDesign->save();
        return redirect()->back()->with('success','Industrial Design Updated.'); 
    }

    public function deleteIndustrialDesign($industrialDesign_id){
        $industrialDesign = IndustrialDesign::find($industrialDesign_id);
        $industrialDesign->delete();
        return redirect()->back()->with('success','Industrial Design Deleted.'); 
    }
}
