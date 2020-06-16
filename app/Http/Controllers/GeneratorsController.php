<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Generator;

class GeneratorsController extends Controller
{
    public function addGenerator(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'agency' => 'required'
        ));

        $generator = new Generator;
        $generator->title = $request->title;
        $generator->name = $request->name;
        $generator->availability = $request->availability;
        $generator->expertise = $request->expertise;
        $generator->agency_id = $request->agency;
        $generator->save();

        return redirect()->back()->with('success','Generator Added.'); 
    }
    
    public function editGenerator(Request $request, $generator_id){
        $this->validate($request, array(
            'name' => 'required|max:255',
            'agency' => 'required'
        ));
        
        $generator = Generator::find($generator_id);
        $generator->title = $request->title;
        $generator->name = $request->name;
        $generator->availability = $request->availability;
        $generator->expertise = $request->expertise;
        $generator->agency_id = $request->agency;
        $generator->save();

        return redirect()->back()->with('success','Generator Updated.'); 
    }

    public function deleteGenerator($generator_id){
        $generator = Generator::find($generator_id);
        $generator->delete();
        return redirect()->back()->with('success','Generator Deleted.'); 
    }
}
