<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\LandingPage;

class LandingPageController extends Controller
{

    public function updateLandingPageItems(Request $request){
        $page = LandingPage::find(1);
        $page->landing_page_item_carousel = $request->input('landing_page_item_carousel');
        $page->landing_page_item_social_media_button = $request->input('landing_page_item_social_media_button');
        $page->landing_page_item_technology_counter = $request->input('landing_page_item_technology_counter');
        $page->landing_page_item_technology_grid_view = $request->input('landing_page_item_technology_grid_view');
        $page->landing_page_item_technology_table_view = $request->input('landing_page_item_technology_table_view');
        $page->landing_page_item_technology_dashboard_view = $request->input('landing_page_item_technology_dashboard_view');
        $page->landing_page_item_technology_commodity_view = $request->input('landing_page_item_technology_commodity_view');
        $page->save();
        return redirect('/admin/manageLandingPage')->with('success', 'Landing page items updated');
    }

    public function editIndustryProfile(Request $request){
        $page = LandingPage::first();
        if($request->hasFile('agri_icon')){
            if($page->industry_profile_agri_icon != null){
                $image_path = public_path().'/storage/page_images/'.$page->industry_profile_agri_icon;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('agri_icon');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $page->industry_profile_agri_icon = $imageName;
        } 
        if($request->hasFile('aqua_icon')){
            if($page->industry_profile_aqua_icon != null){
                $image_path = public_path().'/storage/page_images/'.$page->industry_profile_aqua_icon;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('aqua_icon');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $page->industry_profile_aqua_icon = $imageName;
        }
        if($request->hasFile('natural_icon')){
            if($page->industry_profile_natural_icon != null){
                $image_path = public_path().'/storage/page_images/'.$page->industry_profile_natural_icon;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('natural_icon');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $page->industry_profile_natural_icon = $imageName;
        }
        $page->save();
        return redirect('/admin/manageLandingPage')->with('success', 'Industry profile icons updated');
    }
}
