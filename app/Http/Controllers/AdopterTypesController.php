<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdopterType;

class AdopterTypesController extends Controller
{
    public function addAdopterType(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $adopterType = new AdopterType;
        $adopterType->name = $request->name;
        $adopterType->save();

        return redirect()->back()->with('success','Adopter Type Added.'); 
    }
    
    public function editAdopterType(Request $request, $adopterType_id){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        
        $adopterType = AdopterType::find($adopterType_id);
        $adopterType->name = $request->name;
        $adopterType->save();

        return redirect()->back()->with('success','Adopter Type Updated.'); 
    }

    public function deleteAdopterType($adopterType_id){
        $adopterType = AdopterType::find($adopterType_id);
        $adopterType->delete();
        return redirect()->back()->with('success','Adopter Type Deleted.'); 
    }
}
