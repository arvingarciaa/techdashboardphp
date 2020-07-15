<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    

    public function updateSlider(Request $request){
        $this->validate($request, [
            'image' => 'required'
        ]);

        $page = LandingPage::find(1);
        if($request->hasFile('image')){
            if($page->default_carousel != null){
                $image_path = public_path().'/storage/page_images/'.$page->default_carousel;
                unlink($image_path);
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('/storage/page_images/'), $imageName);
        }

        $page->default_carousel = $imageName;
        $page->save();

        return redirect('/manage')->with('success', 'Carousel slider default image updated');
    }

    public function updateChoiceCarousel(Request $request){
        $this->validate($request, [
            'feature_carousel' => 'required'
        ]);
        $posts = Post::get();
        $page = LandingPage::find(1);
        $page->feature_carousel = $request->feature_carousel;

        if($request->feature_carousel == 'select'){
            foreach($posts as $post){
                $post->featured = 0;
                if($request->selected_fiestas){
                    foreach($request->selected_fiestas as $selected){
                        if($post->id == $selected){
                            $post->featured = 1;
                        }
                    }
                }
                $post->save();
            }
        } elseif($request->feature_carousel == 'upcoming'){
            foreach($posts as $post){
                $post->featured = 0;
                if($post->start > Carbon::now('Asia/Singapore')){
                    $post->featured = 1;
                }
                $post->save();
            }
        }
        $page->save();

        return redirect('/manage')->with('success', 'Featured FIESTAs updated');
    }

    public function updateDefaultFiestaBanner(Request $request){
        $this->validate($request, [
            'image' => 'required',
        ]);

        $page = LandingPage::find(1);
        if($request->hasFile('image')){
            if($page->default_carousel != null){
                $image_path = public_path().'/storage/cover_images/noimage.jpg';
                unlink($image_path);
            }
            $imageFile = $request->file('image');
            $imageName = 'noimage.jpg';
    		$imageFile->move(public_path('/storage/cover_images/'), $imageName);
        }

        $page->default_fiesta_banner = $imageName;
        $page->save();

        return redirect('/manage')->with('success', 'FIESTA default image updated');
    }

    public function updateSliderBackground(Request $request){
        $this->validate($request, [
            'image' => 'required',
        ]);

        $page = LandingPage::find(1);
        if($request->hasFile('image')){
            if($page->slider_bg != null){
                $image_path = public_path().'/storage/page_images/'.$page->slider_bg;
                unlink($image_path);
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('/storage/page_images/'), $imageName);
        }

        $page->slider_bg = $imageName;
        $page->save();

        return redirect('/manage')->with('success', 'Slider Background updated');
    }

    public function updateConsortiaBanner(Request $request){
        $this->validate($request, [
            'image' => 'required',
        ]);

        $page = LandingPage::find(1);
        if($request->hasFile('image')){
            if($page->consortia_banner != null){
                $image_path = public_path().'/storage/page_images/'.$page->consortia_banner;
                unlink($image_path);
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('/storage/page_images/'), $imageName);
        }

        $page->consortia_banner = $imageName;
        $page->save();

        return redirect('/manage')->with('success', 'Consortia Banner updated');
    }
}
