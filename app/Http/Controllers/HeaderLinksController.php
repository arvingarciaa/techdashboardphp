<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderLink;
use App\Log;

class HeaderLinksController extends Controller
{
    public function addHeaderLink(Request $request){
        $this->validate($request, [
            'name' => 'required|max:10240'
        ]);

        $item = new HeaderLink;
        $item->name = $request->name;
        $item->link = $request->link;
        $item->position = 1;
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
}
