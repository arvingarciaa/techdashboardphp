<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industry;
use App\ProtectionType;
use App\Technology;
use App\TechnologyCategory;
use App\AdopterType;
use App\AgencyType;
use App\Agency;
use App\Adopter;
use App\PotentialAdopter;
use App\Commodity;
use App\Generator;
use App\Sector;
use App\Patent;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();
        return view('pages.index')->withTechnologies($technologies);
    }

    public function getAdmin(){
        $industries = Industry::pluck('name', 'id')->all();
        $sectors = Sector::pluck('name', 'id')->all();
        $commodities = Commodity::pluck('name', 'id')->all();
        $protectionTypes = ProtectionType::pluck('name', 'id')->all();
        $adopterTypes = AdopterType::pluck('name', 'id')->all();
        $technologyCategories = TechnologyCategory::pluck('name', 'id')->all();
        $agencyTypes = AgencyType::pluck('name', 'id')->all();
        $agencies = Agency::pluck('name', 'id')->all();
        return view('pages.admin')->withAgencyTypes($agencyTypes)->withAgencies($agencies)->withIndustries($industries)->withCommodities($commodities)->withTechnologyCategories($technologyCategories)->withSectors($sectors)->withProtectionTypes($protectionTypes)->withAdopterTypes($adopterTypes);
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
        $industries = Industry::pluck('name', 'id')->all();
        $sectors = Sector::pluck('name', 'id')->all();
        $commodities = Commodity::pluck('name', 'id')->all();
        $protectionTypes = ProtectionType::all();
        $generators = Generator::pluck('name','id')->all();
        $adopterTypes = AdopterType::pluck('name', 'id')->all();
        $technologyCategories = TechnologyCategory::pluck('name', 'id')->all();
        $agencyTypes = AgencyType::pluck('name', 'id')->all();
        $agencies = Agency::pluck('name', 'id')->all();
        $adopters = Adopter::pluck('name','id')->all();
        $potentialAdopters = PotentialAdopter::pluck('name','id')->all();
        $patents = Patent::pluck('patent_number', 'id')->all();
        return view('pages.techEdit')
            ->withTech($tech)
            ->withAdopters($adopters)
            ->withPotentialAdopters($potentialAdopters)
            ->withGenerators($generators)
            ->withAgencyTypes($agencyTypes)
            ->withAgencies($agencies)
            ->withIndustries($industries)
            ->withCommodities($commodities)
            ->withTechnologyCategories($technologyCategories)
            ->withSectors($sectors)
            ->withProtectionTypes($protectionTypes)
            ->withAdopterTypes($adopterTypes)
            ->withPatents($patents);
    }

    public function techAddPage(){
        $industries = Industry::pluck('name', 'id')->all();
        $sectors = Sector::pluck('name', 'id')->all();
        $commodities = Commodity::pluck('name', 'id')->all();
        $protectionTypes = ProtectionType::all();
        $adopterTypes = AdopterType::pluck('name', 'id')->all();
        $technologyCategories = TechnologyCategory::pluck('name', 'id')->all();
        $agencyTypes = AgencyType::pluck('name', 'id')->all();
        $agencies = Agency::pluck('name', 'id')->all();
        $generators = Generator::pluck('name','id')->all();
        $adopters = Adopter::pluck('name','id')->all();
        $potentialAdopters = PotentialAdopter::pluck('name','id')->all();
        return view('pages.techAdd')
            ->withAdopters($adopters)
            ->withPotentialAdopters($potentialAdopters)
            ->withGenerators($generators)
            ->withAgencyTypes($agencyTypes)
            ->withAgencies($agencies)
            ->withIndustries($industries)
            ->withCommodities($commodities)
            ->withTechnologyCategories($technologyCategories)
            ->withSectors($sectors)
            ->withProtectionTypes($protectionTypes)
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
}
