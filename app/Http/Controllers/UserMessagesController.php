<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMessage;

class UserMessagesController extends Controller
{
    function send(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'concern' => 'required'
        ]);
        $userMessage = new UserMessage;
        $userMessage->name = $request->name;
        $userMessage->email = $request->email;
        $userMessage->message = $request->message;
        $userMessage->concern = $request->concern;
        $userMessage->save();

        return redirect()->back()->with('success','Message sent. Please check your emails within 1-2 days for our response.'); 
    }

    function readMessage($messageId){
        $userMessage = UserMessage::find($messageId);
        $userMessage->status = 1;
        $userMessage->save();
    }

    function resolveMessage($messageId){
        $userMessage = UserMessage::find($messageId);
        $userMessage->status = 2;
        $userMessage->save();
        return redirect()->back()->with('success','Message resolved.'); 
    }
}
