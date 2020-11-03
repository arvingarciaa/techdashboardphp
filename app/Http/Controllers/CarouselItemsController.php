<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarouselItem;
use App\Log;

class CarouselItemsController extends Controller
{
    public function addCarouselItem(Request $request){
        $this->validate($request, [
            'image' => 'required|max:10240'
        ]);

        $item = new CarouselItem;
        if($request->hasFile('image')){
            if($item->banner != null){
                $image_path = public_path().'/storage/page_images/'.$page->banner;
                unlink($image_path);
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('/storage/page_images/'), $imageName);
        }


        $item->title = $request->title;
        $item->subtitle = $request->subtitle;
        $item->button_link = $request->button_link;
        $item->position = 1;
        $item->banner = $imageName;
        $item->save();

        $user = auth()->user();
        $log = new Log;
        $log->user_id = $user->id;
        $log->user_name = $user->name;
        $log->user_level = $user->user_level;
        $log->action = 'Added an entry.';
        $log->IP_address = $request->ip();
        $log->resource = 'Carousel Items';
        $log->save();

        return redirect('/admin/manageLandingPage')->with('success', 'Carousel item added');
    }
}
