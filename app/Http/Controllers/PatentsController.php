<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patent;
use App\Log;

class PatentsController extends Controller
{
    public function addPatent(Request $request){
        $this->validate($request, array(
            'application_number' => 'required',
            'patent_number' => 'required'
        ));

        $patent = new Patent;
        $patent->application_number = $request->application_number;
        $patent->patent_number = $request->patent_number;
        $patent->date_of_filing = $request->date_of_filing;
        $patent->registration_date = $request->registration_date;
        $patent->status = $request->status;
        $patent->technology_id = $request->tech_id;
        $patent->save();

        return redirect()->back()->with('success','Patent Added.'); 
    }
    
    public function editPatent(Request $request, $patent_id){
        $this->validate($request, array(
            'application_number' => 'required',
            'patent_number' => 'required'
        ));
        
        $patent = Patent::find($patent_id); 
        $patent->application_number = $request->application_number;
        $patent->patent_number = $request->patent_number;
        $patent->date_of_filing = $request->date_of_filing;
        $patent->status = $request->status;
        $patent->save();
        return redirect()->back()->with('success','Patent Updated.'); 
    }

    public function deletePatent($patent_id){
        $patent = Patent::find($patent_id);
        $patent->delete();
        return redirect()->back()->with('success','Patent Deleted.'); 
    }
}
