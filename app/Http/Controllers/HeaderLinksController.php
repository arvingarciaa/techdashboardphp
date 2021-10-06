<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderLink;
use App\Log;

class HeaderLinksController extends Controller
{
    public function addHeaderLink(Request $request){
        $this->validate($request, [
            'name' => 'required|max:10240',
            'link' => 'required',
            'position' => 'required'
        ]);

        $item = new HeaderLink;
        $item->name = $request->name;
        $item->link = $request->link;
        $item->position = $request->position;
        $item->save();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Added a header link.';
        $log->IP_address = $request->ip();
        $log->resource = 'Header';
        $log->save();

        return redirect('/admin/manageLandingPage')->with('success', 'Header Link added');
    }

    public function editHeaderLink(Request $request, $header_id){
        $this->validate($request, array(
            'name' => 'required|max:50',
            'position' => 'required'
        ));
        $header = HeaderLink::find($header_id);
        $header->name = $request->name;
        $header->position = $request->position;
        $header->link = $request->link;
        $header->save();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Edited a header link.';
        $log->IP_address = $request->ip();
        $log->resource = 'Header';
        $log->save();

        return redirect()->back()->with('success','Header Link Updated.'); 
    }
    public function deleteHeaderLink($header_id){
        $header = HeaderLink::find($header_id);
        $header->delete();
        return redirect()->back()->with('success','Header Link Deleted.'); 
    }
}
