<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProtectionType;

class ProtectionTypesController extends Controller
{
    public function addProtectionType(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $protType = new ProtectionType;
        $protType->name = $request->name;
        $protType->save();

        return redirect()->back()->with('success','Protection Type Added.'); 
    }
    
    public function editProtectionType(Request $request, $protType_id){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        
        $protType = ProtectionType::find($protType_id);
        $protType->name = $request->name;
        $protType->save();

        return redirect()->back()->with('success','Protection Type Updated.'); 
    }

    public function deleteProtectionType($protType_id){
        $protType = ProtectionType::find($protType_id);
        $protType->delete();
        return redirect()->back()->with('success','Protection Type Deleted.'); 
    }
}
