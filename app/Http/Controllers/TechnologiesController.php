<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Technology;
use Kyslik\ColumnSortable\Sortable;

class TechnologiesController extends Controller
{   
    public function addTechnology(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'region' => 'required',
            'technology_categories' => 'required'
        ));

        $tech = new Technology;
        $tech->name = $request->name;
        $tech->region = $request->region;
        $tech->description = $request->description;
        $tech->year_developed = $request->year_developed;
        $tech->user_id = 1;
        $tech->save();


        $tech->technology_categories()->sync($request->technology_categories);
        $tech->commodities()->sync($request->commodities);

        return redirect()->back()->with('success','Technology Added.'); 
    }
    
    public function editTechnology(Request $request, $tech_id){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        
        $tech = Technology::find($tech_id);
        $tech->name = $request->name;
        $tech->region = $request->region;
        $tech->description = $request->description;
        $tech->year_developed = $request->year_developed;
        $tech->user_id = 1;
        $tech->save();

        $tech->technology_categories()->sync($request->technology_categories);
        $tech->commodities()->sync($request->commodities);
        return redirect()->back()->with('success','Technology Updated.'); 
    }

    public function deleteTechnology($tech_id){
        $tech = Technology::find($tech_id);
        $tech->technology_categories()->detach();
        $tech->commodities()->detach();
        $tech->delete();
        return redirect()->back()->with('success','Technology Deleted.'); 
    }
}
