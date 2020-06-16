<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TechnologyCategory;

class TechnologyCategoriesController extends Controller
{
    public function addTechnologyCategory(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $techCategory = new TechnologyCategory;
        $techCategory->name = $request->name;
        $techCategory->save();

        return redirect()->back()->with('success','Technology Category Added.'); 
    }
    
    public function editTechnologyCategory(Request $request, $techCategory_id){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        
        $techCategory = TechnologyCategory::find($techCategory_id);
        $techCategory->name = $request->name;
        $techCategory->save();

        return redirect()->back()->with('success','Technology Category Updated.'); 
    }

    public function deleteTechnologyCategory($techCategory_id){
        $techCategory = TechnologyCategory::find($techCategory_id);
        $techCategory->delete();
        return redirect()->back()->with('success','Technology Category Deleted.'); 
    }
}
