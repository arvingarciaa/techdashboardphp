<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commodity;

class CommoditiesController extends Controller
{
    public function addCommodity(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'sector' => 'required'
        ));

        $commodity = new Commodity;
        $commodity->name = $request->name;
        $commodity->sector_id = $request->sector;
        $commodity->save();

        return redirect()->back()->with('success','Commodity Added.'); 
    }
    
    public function editCommodity(Request $request, $commodity_id){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'sector' => 'required'
        ));
        
        $commodity = Commodity::find($commodity_id);
        $commodity->name = $request->name;
        $commodity->sector_id = $request->sector;
        $commodity->save();

        return redirect()->back()->with('success','Commodity Updated.'); 
    }

    public function deleteCommodity($commodity_id){
        $commodity = Commodity::find($commodity_id);
        $commodity->delete();
        return redirect()->back()->with('success','Commodity Deleted.'); 
    }
}
