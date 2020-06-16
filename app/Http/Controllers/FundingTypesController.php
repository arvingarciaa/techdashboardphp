<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FundingType;

class FundingTypesController extends Controller
{
    public function addFundingType(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $fundingType = new FundingType;
        $fundingType->name = $request->name;
        $fundingType->save();

        return redirect()->back()->with('success','Funding Type Added.'); 
    }
    
    public function editFundingType(Request $request, $fundingType_id){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        
        $fundingType = FundingType::find($fundingType_id);
        $fundingType->name = $request->name;
        $fundingType->save();

        return redirect()->back()->with('success','Funding Type Updated.'); 
    }

    public function deleteFundingType($fundingType_id){
        $fundingType = FundingType::find($fundingType_id);
        $fundingType->delete();
        return redirect()->back()->with('success','Funding Type Deleted.'); 
    }
}
