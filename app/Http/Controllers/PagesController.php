<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industry;
use App\Technology;
use App\TechnologyCategory;
use App\AdopterType;
use App\Agency;
use App\Adopter;
use App\Commodity;
use App\Generator;
use App\Sector;
use App\Patent;
use App\CarouselItem;
use App\LandingPage;
use App\ApplicabilityIndustry;
use App\HeaderLink;
use App\UserMessage;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Victorlap\Approvable\Approvable;
use Auth;
use Redirect;

class PagesController extends Controller
{
    use Approvable;
    public function index()
    {
        $technologies = Technology::where('approved', '=', '2')->get();
        $techGrid = Technology::where('approved', '=', '2')->paginate(6);
        $techCommodities = Technology::where('approved','=', '2')->get();
        $sectors = Sector::where('approved','=', '2')->get();
        $carouselItems = CarouselItem::all();
        $commodities = Commodity::where('approved','=', '2')->get();
        $industries = Industry::where('approved','=', '2')->get();
        $headerLinks = HeaderLink::all();
        $userMessages = UserMessage::all();
        $applicabilityIndustries = ApplicabilityIndustry::where('approved','=', '2')->get();
        return view('pages.index')
            ->withTechGrid($techGrid)
            ->withTechnologies($technologies)
            ->withSectors($sectors)
            ->withUserMessages($userMessages)
            ->withCommodities($commodities)
            ->withCarouselItems($carouselItems)
            ->withIndustries($industries)
            ->withApplicabilityIndustries($applicabilityIndustries)
            ->withHeaderLinks($headerLinks)
            ->withTechCommodities($techCommodities);
    }

    public function contactUsPage(){
        $technologies = Technology::where('approved','=', '2')->pluck('title', 'id')->all();
        return view('pages.contactUs')->withTechnologies($technologies);
    }

    public function getAdmin(){
        $user = Auth::user();
        if (Auth::check() && $user->user_level >= 4){
            $industries = Industry::pluck('name', 'id')->all();
            $sectors = Sector::pluck('name', 'id')->all();
            $commodities = Commodity::pluck('name', 'id')->all();
            $adopterTypes = AdopterType::pluck('name', 'id')->all();
            $technologyCategories = TechnologyCategory::pluck('name', 'id')->all();
            $agencies = Agency::pluck('name', 'id')->all();
            return view('pages.admin')->withAgencies($agencies)->withIndustries($industries)->withCommodities($commodities)->withTechnologyCategories($technologyCategories)->withSectors($sectors)->withAdopterTypes($adopterTypes);
        } else {
            if(Auth::check()){
                return redirect()->back()->with('error','Your user level doesnt have access this page.'); 
            } else {
                return Redirect::route('login')->with('error','You have to be logged in to access this page.');
            }
        }
    }

    public function fetchDependent(Request $request){  
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = Sector::all()->where($select, $value);
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row){
            $output .= '<option value="'.$row->id.'">'.$row->name.'</option>';
        }
        echo $output;
    }

    public function techEditPage($id){
        $tech = Technology::find($id);
        $industries = Industry::where('approved','=', '2')->pluck('name', 'id')->all();
        $sectors = Sector::where('approved','=', '2')->pluck('name', 'id')->all();
        $commodities = Commodity::where('approved','=', '2')->pluck('name', 'id')->all();
        $applicabilityIndustries = ApplicabilityIndustry::where('approved','=', '2')->pluck('name', 'id')->all();
        $generators = Generator::where('approved','=', '2')->pluck('name','id')->all();
        $adopterTypes = AdopterType::where('approved','=', '2')->pluck('name', 'id')->all();
        $technologyCategories = TechnologyCategory::where('approved','=', '2')->pluck('name', 'id')->all();
        $agencies = Agency::where('approved','=', '2')->pluck('name', 'id')->all();
        $adopters = Adopter::where('approved','=', '2')->pluck('name','id')->all();
        $patents = Patent::pluck('patent_number', 'id')->all();
        return view('pages.techEdit')
            ->withTech($tech)
            ->withAdopters($adopters)
            ->withGenerators($generators)
            ->withAgencies($agencies)
            ->withIndustries($industries)
            ->withApplicabilityIndustries($applicabilityIndustries)
            ->withCommodities($commodities)
            ->withTechnologyCategories($technologyCategories)
            ->withSectors($sectors)
            ->withAdopterTypes($adopterTypes)
            ->withPatents($patents);
    }

    public function techAddPage(){
        $industries = Industry::where('approved','=', '2')->pluck('name', 'id')->all();
        $sectors = Sector::where('approved','=', '2')->pluck('name', 'id')->all();
        $commodities = Commodity::where('approved','=', '2')->pluck('name', 'id')->all();
        $adopterTypes = AdopterType::where('approved','=', '2')->pluck('name', 'id')->all();
        $technologyCategories = TechnologyCategory::where('approved','=', '2')->pluck('name', 'id')->all();
        $applicabilityIndustries = ApplicabilityIndustry::where('approved','=', '2')->pluck('name', 'id')->all();
        $agencies = Agency::where('approved','=', '2')->pluck('name', 'id')->all();
        $generators = Generator::where('approved','=', '2')->pluck('name','id')->all();
        $adopters = Adopter::where('approved','=', '2')->pluck('name','id')->all();
        return view('pages.techAdd')
            ->withAdopters($adopters)
            ->withGenerators($generators)
            ->withAgencies($agencies)
            ->withIndustries($industries)
            ->withCommodities($commodities)
            ->withTechnologyCategories($technologyCategories)
            ->withApplicabilityIndustries($applicabilityIndustries)
            ->withSectors($sectors)
            ->withAdopterTypes($adopterTypes);
    }

    public function getJSON(){
        $technologies = Technology::all();
        $technologyCategories = TechnologyCategory::pluck('name', 'id')->all();
        $industries = Industry::pluck('name', 'id')->all();
        $sectors = Sector::pluck('name', 'id')->all();
        $commodities = Commodity::all();
        $agencies = Agency::pluck('name', 'id')->all();
        $generators = Generator::pluck('name','id')->all();
        return view('api.current')
            ->withTechnologies($technologies)
            ->withTechnologyCategories($technologyCategories)
            ->withCommodities($commodities)
            ->withAgencies($agencies)
            ->withGenerators($generators)
            ->withSectors($sectors)
            ->withIndustries($industries);
    }

    public function manageLandingPage(){
        $carousel_items = CarouselItem::all();
        $landing_page = LandingPage::find(1);
        $headerLinks = HeaderLink::all();
        return view('pages.manage')
            ->withCarouselItems($carousel_items)
            ->withHeaderLinks($headerLinks)
            ->withLandingPage($landing_page);
    }

    public function printTechPDF($tech_id){
        $tech = Technology::where('id', '=', $tech_id)->first();
        $pdf = PDF::loadView('pages.techPDF', ['tech' => $tech]);
        return $pdf->download($tech->title.'.pdf');
    }

    public function surveyForm(){
        return view('pages.surveyForm');
    }
}
