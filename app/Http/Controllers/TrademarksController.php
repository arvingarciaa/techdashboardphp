<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trademark;

class TrademarksController extends Controller
{
    public function addTrademark(Request $request){
        $this->validate($request, array(
            'application_number' => 'required',
            'registration_number' => 'required'
        ));

        $trademark = new Trademark;
        $trademark->application_number = $request->application_number;
        $trademark->registration_number = $request->registration_number;
        $trademark->date_of_filing = $request->date_of_filing;
        $trademark->expiration_date = $request->expiration_date;
        $trademark->registration_date = $request->registration_date;
        $trademark->status = $request->status;
        $trademark->technology_id = $request->tech_id;
        $trademark->save();

        return redirect()->back()->with('success','Trademark Added.'); 
    }
    
    public function editTrademark(Request $request, $trademark_id){
        $this->validate($request, array(
            'application_number' => 'required',
            'registration_number' => 'required'
        ));
        
        $trademark = Trademark::find($trademark_id); 
        $trademark->application_number = $request->application_number;
        $trademark->registration_number = $request->registration_number;
        $trademark->registration_date = $request->registration_date;
        $trademark->expiration_date = $request->expiration_date;
        $trademark->date_of_filing = $request->date_of_filing;
        $trademark->status = $request->status;
        $trademark->save();
        return redirect()->back()->with('success','Trademark Updated.'); 
    }

    public function deleteTrademark($trademark_id){
        $trademark = Trademark::find($trademark_id);
        $trademark->delete();
        return redirect()->back()->with('success','Trademark Deleted.'); 
    }
}
