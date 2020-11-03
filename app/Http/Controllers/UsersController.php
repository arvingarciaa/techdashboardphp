<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UsersController extends Controller
{
    public function changeUserLevel(Request $request, $id){
        $userLoggedIn = Auth::user();
        if($userLoggedIn->id == $id){
            return redirect()->back()->with('error', 'You cannot change the user level of your own account.');
        } else {
            $user = User::find($id);
            $user->user_level = $request->user_level;
            $user->save();
            return redirect()->back()->with('success',  $user->name.'\'s level has been updated to '.$request->user_level.'.');
        }
    }

    public function createUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->user_level = $request->user_level;
        $user->save();
        return redirect()->back()->with('success',  'User has been created.');
    }

    public function deleteUser($id){
        $userLoggedIn = Auth::user();
        if($userLoggedIn->id == $id){
            return redirect()->back()->with('error', 'You cannot delete your own account.');
        } else {
            $user = User::find($id);
            $user->delete();
            return redirect()->back()->with('success', 'User removed');
        }
    }
}
