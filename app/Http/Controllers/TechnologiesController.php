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
        
        if($request->has('trade_secret')){
            $tech->is_trade_secret = 1;
            $tech->protection_type = 'trade_secret';
        } else {
            $tech->is_trade_secret = 0;
        }

        if($request->protection_type_select == 2){
            
        }

        $tech->save();

        

        $tech->technology_categories()->sync($request->technology_categories);
        $tech->commodities()->sync($request->commodities);
        return redirect()->back()->with('success','Technology Added. Edit your entry to add more details.'); 
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
        if($request->has('trade_secret')){
            $tech->is_trade_secret = 1;
            $tech->protection_type = 'trade_secret';
        } else {
            $tech->is_trade_secret = 0;
        }
        $tech->save();

        $tech->technology_categories()->sync($request->technology_categories);
        $tech->commodities()->sync($request->commodities);
        $tech->generators()->sync($request->generators);
        $tech->agencies()->sync($request->owners);
        $tech->adopters()->sync($request->adopters);
        $tech->potential_adopters()->sync($request->potential_adopters);
        return redirect()->back()->with('success','Technology Updated.'); 
    }

    public function deleteTechnology($tech_id){
        $tech = Technology::find($tech_id);
        $tech->technology_categories()->detach();
        $tech->commodities()->detach();
        $tech->generators()->detach();
        $tech->agencies()->detach();
        $tech->adopters()->detach();
        $tech->potential_adopters()->detach();
        $tech->delete();
        return redirect()->back()->with('success','Technology Deleted.'); 
    }
}
