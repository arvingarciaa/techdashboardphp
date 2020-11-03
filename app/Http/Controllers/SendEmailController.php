<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    function send(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'concern' => 'required'
        ]);


    }
}
