<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RDResult;

class RDResultsController extends Controller
{
    public function addRDResult(Request $request){
        $this->validate($request, array(
        ));

        $rdResult = new RDResult;
        $rdResult->utilization = $request->utilization;
        $rdResult->title = $request->title;
        $rdResult->funding = $request->funding;
        $rdResult->implementing = $request->implementing;
        $rdResult->cost = str_replace(',', '', $request->cost);
        $rdResult->start_date = $request->start_date;
        $rdResult->end_date = $request->end_date;
        $rdResult->beneficiary_type = $request->beneficiary_type;
        $rdResult->beneficiary_name = $request->beneficiary_name;
        $rdResult->beneficiary_region = $request->beneficiary_region;
        $rdResult->beneficiary_province = $request->beneficiary_province;
        $rdResult->beneficiary_municipality = $request->beneficiary_municipality;
        $rdResult->technology_id = $request->tech_id;
        $rdResult->save();

        return redirect()->back()->with('success','R&D Result Added.'); 
    }
    
    public function editRDResult(Request $request, $rdResult_id){
        $this->validate($request, array(
        ));
        
        $rdResult = RDResult::find($rdResult_id);
        $rdResult->utilization = $request->utilization;
        $rdResult->title = $request->title;
        $rdResult->funding = $request->funding;
        $rdResult->implementing = $request->implementing;
        $rdResult->cost = $request->cost;
        $rdResult->start_date = $request->start_date;
        $rdResult->end_date = $request->end_date;
        $rdResult->beneficiary_type = $request->beneficiary_type;
        $rdResult->beneficiary_name = $request->beneficiary_name;
        $rdResult->beneficiary_region = $request->beneficiary_region;
        $rdResult->beneficiary_province = $request->beneficiary_province;
        $rdResult->beneficiary_municipality = $request->beneficiary_municipality;
        $rdResult->technology_id = $request->tech_id;
        $rdResult->save();
        return redirect()->back()->with('success','R&D Result Updated.'); 
    }

    public function deleteRDResult($rdResult_id){
        $rdResult = RDResult::find($rdResult_id);
        $rdResult->delete();
        return redirect()->back()->with('success','R&D Result Deleted.'); 
    }
}
