<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarouselItemsController extends Controller
{
    public function addCarouselItem(Request $request){
        $this->validate($request, [
            'image' => 'required'
        ]);

        $item = new CarouselItem;
        if($request->hasFile('image')){
            if($page->top_banner != null){
                $image_path = public_path().'/storage/page_images/'.$page->top_banner;
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

        return redirect('/manage')->with('success', 'Carousel item added');
    }
}
