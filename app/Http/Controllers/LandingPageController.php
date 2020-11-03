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
}
