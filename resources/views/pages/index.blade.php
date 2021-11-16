@extends('layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb pb-0" style="background-color:transparent">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">km4aanr</a></li>
        <li class="breadcrumb-item" style="color:white" aria-current="page">Technology Dashboard</li>
    </ol>
@endsection
@section('content')
    <?php
        $landing_page = App\LandingPage::first();
    ?>

    <div title="Know more about Tech Dashboard in different platforms" class="icon-bar hide-when-mobile" style="z-index:1000">
        <?php $sticky = App\SocialMediaSticky::all()?>
        <a target="_blank" href="{{$sticky->where('name', '=', 'PCAARRD')->first()->link}}" class="sarai"><img src="/storage/page_images/TRr6O4s.png" height="30" width="30"></a> 
        <a target="_blank" data-toggle="tooltip" title="Visit our Facebook"href="{{$sticky->where('name', '=', 'Facebook')->first()->link}}" class="facebook"><i class="fab fa-facebook"></i></a> 
        <a target="_blank" data-toggle="tooltip" title="Visit our Twitter" href="{{$sticky->where('name', '=', 'Twitter')->first()->link}}" class="twitter"><i class="fab fa-twitter"></i></a> 
        <a target="_blank" data-toggle="tooltip" title="Visit our Instagram" href="{{$sticky->where('name', '=', 'Instagram')->first()->link}}" class="instagram"><i class="fab fa-instagram"></i></a> 
        <a target="_blank" data-toggle="tooltip" title="Send us an email" href="mailto:{{$sticky->where('name', '=', 'Email')->first()->link}}" class="email"><i class="fas fa-envelope"></i></a>
        <a target="_blank" data-toggle="tooltip" title="Visit our YouTube" href="{{$sticky->where('name', '=', 'YouTube')->first()->link}}" class="youtube"><i class="fab fa-youtube"></i></a> 
    </div>
    <div class="container-fluid px-0">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            @foreach($carouselItems as $carousel_item)
                <li data-target="#carouselExampleCaptions" data-slide-to={{$loop->index}} class={{$loop->first ? "active" : ""}}></li>
            @endforeach
            </ol>
          <div class="carousel-inner" style="max-height:700px;">
            @foreach($carouselItems as $carousel_item)
            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                <img alt="carousel image" class="card-img-top" src="/storage/page_images/{{$carousel_item->banner}}" width="100%" style="object-fit: cover; max-height:700px;min-height:450px">
                <div class="carousel-overlay px-3">
                    <span>
                        <h1 class="carousel-title font-weight-bold" style="color:white;">
                            {{$carousel_item->title}}
                        </h1>
                        <h2 class="carousel-subtitle" style="color:white">
                            {{$carousel_item->subtitle}}
                        </h2>
                        <a href="{{$carousel_item->button_link}}" aria-label="Visit the article" rel="noreferrer" target="_blank"><button title="Visit the article" type="button" class=" mt-2 btn btn-primary btn-lg font-weight-bold">Read More</button></a>
                    </span>
                </div>
            </div>
            @endforeach
          </div>
          <!--
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        -->
        </div>
    </div>

    <style>
        .carousel-overlay{
            background-color:rgba(0, 0, 0,0.6);
            position: absolute;
            right: 15%;
            bottom: 20px;
            left: 15%;
            z-index: 10;
            padding-top: 20px;
            padding-bottom: 20px;
            color: #fff;
            text-align: center;
        }
        @media only screen and (max-width: 600px) {
            .hide-when-mobile {
                display:none !important
            }
        }
        .instagram {
            background: #D62976;
            color: white;
        }
    </style>
    <?php
        $first = 0;
        $under = 0;
        $first_tech = 0;
        $under_commodity = 0;
    ?>
    <!--
    <nav class="navbar navbar-light bg-white topbar shadow" id="dashboardHeader">
        Sidebar Toggle (Topbar) 
        <h2 class="my-4 ml-4" style="color: #5a5c69!important;">Technology Dashboard</h2>
        <div class="float-right row mr-4 nav">
            <span class="mt-1">View as:&nbsp;</span>
            <a data-toggle="tab" href="#dashboard">
                <button type="button" id="dash-view" style="border: 1px solid" class="btn btn-light toggle-item active" autocomplete="off">
                    Dashboard View
                </button>
            </a>
            <a data-toggle="tab" href="#card">
                <button type="button" id="card-view" style="border: 1px solid" class="btn btn-light toggle-item" autocomplete="off">
                    Card View
                </button>
            </a>
        </div>
    </nav>
    -->
    

    <div class="pb-5" id="content" style="background-image:linear-gradient(rgb(255,255,255),rgb(230,230,230),rgb(200, 210, 210));">
        <div class="container-fluid">
            <?php
                //get technology per industry numbers for display
                $industryArray = array();
                $industryArray[0] = array();
                $industryArray[1] = array();
                $counter = 0;
                foreach(App\Industry::where('approved', '=', 2)->get() as $itemIndustry){
                    $industryArray[0][$counter] = $itemIndustry->name;
                    $industryCount = 0;
                    foreach(App\Sector::where('approved', '=', 2)->where('industry_id', '=', $itemIndustry->id)->get() as $itemSector){
                        $sectorCommodityCount = 0;
                        foreach(App\Commodity::withCount(['technologies' => function($q){
                            $q->where('approved', '=', 2);
                        }])->where('sector_id', '=', $itemSector->id)->orderBy('technologies_count', 'desc')->where('approved', '=', 2)->get() as $item)
                        {
                            $sectorCommodityCount = $sectorCommodityCount + $item->technologies_count;
                        }
                        $industryCount = $industryCount + $sectorCommodityCount;
                    }
                    array_push($industryArray[1],$industryCount);
                }
            ?>
            <style>
                @media (max-width: 576px){
                    .tech-count-number{
                        font-size:110px !important;
                        margin-top:10px
                    }
                    .tech-count-text{
                        font-size:26px !important;
                    }
                    .icon-bar{
                        display:none;
                    }
                    .mobile-margin{
                        margin-top:30px !important;
                    }
                    .carousel-title{
                        font-size: 1.125rem !important;
                    }
                    .carousel-subtitle{
                        font-size:.85rem !important;
                    }
                }
                @media (max-width: 768px) {
                    .tech-count-image{
                        font-size: 5vh;
                        }
                    .content-margin{
                        padding-left: 0;
                        padding-right: 0;
                        padding-top: 0;
                    }   
                    
                }

                @media (max-width: 992px){
                    .tech-count-image{
                        height:140px !important;
                        margin-top:10px !important;
                    }

                    .tech-count-number{
                        font-size:100px !important;
                        line-height:0.7;
                        margin-top:15px !important;
                    }
                    .tech-count-title{
                        font-size:20px !important; 
                        line-height:1.1; 
                    } 
                }

                @media (min-width: 1200px) {
                    .content-margin{
                        padding-left: 6rem;
                        padding-right: 6rem;
                        padding-top: 1.5rem;
                    }
                    .carousel-title{
                        font-size: 2.25rem !important;
                    }
                    .carousel-subtitle{
                        font-size: 1.8rem !important;
                    } 
                }

                .carousel-title{
                    font-size: 2.25rem;
                    margin-bottom: 0.5rem;
                    font-weight: 500;
                    line-height: 1.2;
                }
                .carousel-subtitle{
                    margin-bottom: 0.5rem;
                    font-weight: 500;
                    line-height: 1.2;
                } 

                .tech-count-image{
                    height:170px;
                }

                .tech-count-number{
                    font-size:130px;
                    font-weight:900; 
                    line-height:0.7;
                    font-family: Century Gothic,CenturyGothic,sans-serif;
                }
                .tech-count-text{
                    text-align:right; 
                    font-size:30px; 
                    line-height:1.1; 
                    font-weight:900;
                    float:right;
                }

            </style>
            <a id="posts-anchor" style="top:6em;position:relative"></a>
            <div class="content-margin">
                <div class="row">
                    <div class="col-md-4">
                        <a class="" style="text-decoration: none;color:inherit" title="Number of Agricultural Technologies Available" href="/?view=dashboardView&dashboard=AgriculturalTechnologies#posts-anchor">
                            <div class="card mb-3 shadow" style="flex-wrap:wrap;height:170px;background-color:rgb(253,186,5)">
                                <div class="col-6 pr-0 ml-2" style="display:grid">
                                    <div class="w-100 mt-2">
                                        <span class="float-right tech-count-number">{{$industryArray[1][0]}}</span>
                                    </div>
                                    <div class="w-100">
                                        <span class="tech-count-text">Agricultural Technologies</span>
                                    </div>
                                </div>
                                <div class="col-6 pl-4 pt-2 pb-2" style="height:170px">
                                    <img alt="Agri logo" class="" src="/storage/page_images/{{$landing_page->industry_profile_agri_icon}}" style="height:100%; ">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="" style="text-decoration: none;color:inherit" title="Number of Aquatic Resources Available" href="/?view=dashboardView&dashboard=AquaticResources#posts-anchor">
                            <div class="card mb-3 shadow" style="flex-wrap:wrap;height:170px;background-color:rgb(41,136,235)">
                                <div class="col-6 pr-0 ml-2" style="display:grid">
                                    <div class="w-100 mt-2">
                                        <span class="float-right tech-count-number">{{$industryArray[1][1]}}</span>
                                    </div>
                                    <div class="w-100">
                                        <span class="tech-count-text">Aquatic Resources</span>
                                    </div>
                                </div>
                                <div class="col-6 pl-4 pt-2 pb-2" style="height:170px">
                                    <img alt="Agri logo" class="" src="/storage/page_images/{{$landing_page->industry_profile_aqua_icon}}" style="height:100%; ">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a class="" style="text-decoration: none;color:inherit" title="Number of Natural Resources Available" href="/?view=dashboardView&dashboard=NaturalResources#posts-anchor">
                            <div class="card bg-success mb-3 shadow" style="flex-wrap:wrap;height:170px">
                                <div class="col-6 pr-0 ml-2" style="display:grid">
                                    <div class="w-100 mt-2">
                                        <span class="float-right tech-count-number">{{$industryArray[1][2]}}</span>
                                    </div>
                                    <div class="w-100">
                                        <span class="tech-count-text">Natural Resources</span>
                                    </div>
                                </div>
                                <div class="col-6 pl-4 pt-2 pb-2" style="height:170px">
                                    <img alt="Agri logo" class="" src="/storage/page_images/{{$landing_page->industry_profile_natural_icon}}" style="height:100%; ">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                @include('inc.messages')
                <form action="/search" method="GET" role="search" name="searchForm" class="mb-2 {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'd-none' : ''}}">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <label for="searchForm" class="" style="margin-top:-5000px;margin-left:-40px">label</label>
                            <input type="text" id="searchForm" name="searchForm" class="form-control {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'invisible' : ''}}" style="font-size:2em" placeholder="Search Technology Title" value={{ isset($results) ? $query : ''}}> 
                            <span class="input-group-btn">
                                <button title="Browse through available technologies" type="submit" class="btn btn-default {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'disabled invisible' : ''}}" style="border:1px solid #ced4da;font-size:2em">
                                    <i class="fas fa-search" ></i>
                                </button>
                            </span>
                    </div>
                </form>   
                <div class="row" style="display:contents">
                    <div class="btn-group" style="flex-wrap:wrap">
                        <h4 style="margin-top:6px" class="{{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'invisible' : ''}}">Filter:</h4>
                        <div class="dropdown"> 
                            <button style="font-size:18px" class="btn btn-default dropdown-toggle {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'disabled invisible' : ''}}" type="button" id="dropdownMenuButtonRegion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret">{!!request()->location ? '<b>'.request()->location.'</b>' : 'Any Region'!!}</span>
                            </button>
                            <?php 
                                $applicability_locations_filter = App\Technology::select(DB::raw('applicability_location as applicability_location'))->groupBy(DB::raw('applicability_location'))->orderBy('applicability_location','asc')->get();
                            ?>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonRegion">
                                <a class="dropdown-item" href="/#posts-anchor">Any Region</a>
                                @foreach($applicability_locations_filter as $region)
                                    <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium,'sort' => request()->sort, 'sortOrder' => request()->sortOrder, 'year' => request()->year, 'location' => $region->applicability_location])}}#posts-anchor">{{$region->applicability_location}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="dropdown">
                            <button style="font-size:18px" class="btn btn-default dropdown-toggle {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'disabled invisible' : ''}}" type="button" id="dropdownMenuButtonYear" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret {{ request()->year ? '':'text-muted' }}">{!!request()->year ? '<b>'.request()->year.'</b>' : 'Any Year'!!}</span>
                            </button>
                            <?php
                                $years_filter = App\Technology::where('approved', '=', '2 ')->select('year_developed')->groupBy(DB::raw('year_developed'))->orderBy('year_developed','desc')->get();
                            ?>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonYear">
                                <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location,'sort' => request()->sort, 'sortOrder' => request()->sortOrder])}}#posts-anchor">Any Year</a>
                                @foreach($years_filter as $year)
                                    <a class="dropdown-item" style="{!! App\Technology::where('year_developed')->count() == $years_filter->count() ? 'display:none' : ''!!}" href="{!! route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location,'sort' => request()->sort, 'sortOrder' => request()->sortOrder, 'year' => $year->year_developed])!!}#posts-anchor">{{$year->year_developed}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="dropdown">
                            <button style="font-size:18px" class="btn btn-default dropdown-toggle {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'disabled invisible' : ''}}" type="button" id="dropdownMenuButtonSort" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret {{ request()->sort ? '':'text-muted' }}">{!!request()->sort ? '<b>'.request()->sort.'</b>' : 'SORT BY'!!}</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSort">
                                <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'year' => request()->year, 'view' => request()->view, 'sortOrder' => request()->sortOrder, 'commodities' => request()->commodities, 'title' == request()->sort ? '' : 'sort=Title'])}}#posts-anchor">TITLE</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button style="font-size:18px" class="btn btn-default dropdown-toggle {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'disabled invisible' : ''}}" type="button" id="dropdownSortBy" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret {{ request()->sortOrder ? '':'text-muted' }}">{!!request()->sortOrder ? '<b>'.strtoupper(request()->sortOrder).'</b>' : 'ASC'!!}</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownSortBy">
                                <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'year' => request()->year, 'view' => request()->view, 'sort' => request()->sort, 'asc' == request()->sortOrder ? '' : 'sortOrder=Asc'])}}#posts-anchor">ASC</a>
                                <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'year' => request()->year, 'view' => request()->view, 'sort' => request()->sort, 'desc' == request()->sortOrder ? '' : 'sortOrder=Desc'])}}#posts-anchor">DESC</a>
                            </div>
                        </div>
                    <!--    <button style="font-size:18px" type="button" class="btn btn-default {{ request()->view == 'listView' || request()->view == 'dashboardView' ? 'disabled' : ''}}" data-toggle="modal" data-target="{{ request()->view == 'listView' || request()->view == 'dashboardView' ? '' : '#commodityFilterModal'}}">{!! request()->commodities ? '<b>Filtered by Commodity</b>' : 'Any Commodity'!!}</button> 
                        <a href="/#posts-anchor" style="font-size:18px" class="btn btn-default {{ request()->view == 'listView' || request()->view == 'dashboardView' ? 'disabled' : ''}}" role="button">Clear Filters</a> -->
                    </div>
                    <div class="float-right">
                        <a aria-label="View as grid" href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'sort' => request()->sort, 'year' => request()->year, 'sortOrder' => request()->sortOrder, 'commodities' => request()->commodities, 'view' => 'gridView'])}}#posts-anchor">
                            <button type="button" data-toggle="tooltip" title="View as Grid" class="btn btn-light {{ request()->view == 'gridView' || !request()->view  ? 'active' : ''}}" autocomplete="off">
                                <i class="fas fa-grip-horizontal"></i>
                            </button>
                        </a>
                        <a aria-label="View as table" href="{{ route('pages.index', ['view' => 'listView'])}}#posts-anchor">
                            <button type="button" data-toggle="tooltip" title="View as Table" class="btn btn-light {{ request()->view == 'listView' ? 'active' : ''}}" autocomplete="off">
                                <i class="fas fa-table"></i>
                            </button>
                        </a>
                        <a aria-label="View as dashboard" href="{{ route('pages.index', ['view' => 'dashboardView'])}}#posts-anchor">
                            <button title="View data on technologies, sectors, funds, and technology map" type="button" class="btn btn-light {{ request()->view == 'dashboardView' ? 'active' : ''}}" autocomplete="off">
                                <span>Dashboard</span>
                            </button>
                        </a>
                        <a aria-label="View by commodity" href="{{ route('pages.index', ['view' => 'commodityView'])}}#posts-anchor">
                            <button title="View available commodities in AANR" type="button" class="btn btn-light {{ request()->view == 'commodityView' ? 'active' : ''}}" autocomplete="off">
                                <span>By Commodity</span>
                            </button>
                        </a>
                    </div>
                </div> 
                <div class="dropdown-divider mobile-margin"></div> 
                @if(request()->view == 'listView') 
                <div class="card shadow mb-5">
                    <div style="padding-left:20px;padding-top:15px;padding-right:25px"> 
                        <span class="font-weight-bold text-primary" style="font-size:27px">Technologies</span>              
                        <small>Click table headers to sort Ascending/Descending</small>  
                        <span class="float-right mt-2 text-muted">{{App\Technology::all()->count()}} Technologies</span>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table data-table tech-table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Target Users</th>
                                        <th>Applicability - Location</th>
                                        <th>Applicability - Industry</th>
                                        <th>Category</th>
                                        <th>Sector</th>
                                        <th>Commodity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($technologies as $tech)
                                        <tr data-toggle="modal" data-id="2" data-target="#techModal-{{$tech->id}}">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$tech->title}}</td>
                                            <td>{{$tech->target_users}}</td>
                                            <td>{{$tech->applicability_location}}</td>
                                            <td>
                                                @foreach($tech->applicability_industries as $applicability_industry)
                                                    @if( $loop->first ) 
                                                        {{ $applicability_industry->name }}
                                                    @else
                                                        • {{ $applicability_industry->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($tech->technology_categories as $technology_category)
                                                    @if( $loop->first ) 
                                                        {{ $technology_category->name }}
                                                    @else
                                                        • {{ $technology_category->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($tech->commodities as $commodity)
                                                    @if( $loop->first ) 
                                                        <i>{{ $commodity->sector->name }} </i>
                                                    @else
                                                        <i> • {{ $commodity->sector->name }} </i>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($tech->commodities as $commodity)
                                                    @if( $loop->first ) 
                                                        <i>{{ $commodity->name }} </i>
                                                    @else
                                                        <i> <br>{{ $commodity->name }} </i>
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <style>
                                .tech-table{
                                    overflow-y:scroll;
                                    overflow-x:scroll;
                                    height:500px;
                                    display:block;
                                }
                                td, th{
                                    white-space:nowrap;
                                }
                            </style>
                        </div>
                    </div>
                </div>
                @elseif(request()->view == 'gridView' || request()->view == null)
                @if(isset($results))
                    @if($results->count() == 0)
                        <a href="/" style="font-size:16px;color:black"><i class="fas fa-arrow-left"></i> Back to Home</a><br><br>
                        Sorry, no results found for <b>'{{$query}}' </b>
                    @else
                        <div id="techCards" class="row">
                            <?php $techCount = 0; ?>
                            @foreach($results as $tech)
                            <div class="col-md-4 tech-card-container">
                                <a data-toggle="modal" data-id="2" data-target="#techModal-{{$tech->id}}">
                                    <div class="card card-overlay-container front-card h-auto shadow rounded">
                                        @if( $tech->banner == null)
                                        <div class="card-img-top center-vertically px-3 tech-card-color" style="height:200px">
                                            <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                                {{$tech->title}}
                                            </span>
                                        </div>
                                        @else
                                        <img alt="Page banner" class="card-img-top center-vertically" src="/storage/page_images/{{$tech->banner}}" style="height:200px;object-fit:cover">
                                        @endif
                                        <div class="card-body">
                                            <h4 class="card-title trail-end font-weight-bold">{{$tech->title}}</h4>
                                            <div class="card-text trail-end" style="line-height: 120%;">
                                                <p class="mb-2"><b>{{$tech->year_developed}} • {{$tech->applicability_location}}</b></p>
                                                <span>
                                                    @foreach($tech->applicability_industries as $applicability_industry)
                                                        @if( $loop->first ) 
                                                            {{ $applicability_industry->name }}
                                                        @else
                                                            • {{ $applicability_industry->name }}
                                                        @endif
                                                    @endforeach
                                                    @foreach($tech->technology_categories as $category)
                                                        @if( $loop->first ) 
                                                            {{ $category->name }} 
                                                        @else
                                                            • {{ $category->name }}
                                                        @endif  
                                                    @endforeach
                                                    <br>
                                                    @foreach($tech->commodities as $commodity)
                                                        @if( $loop->first ) 
                                                            {{ $commodity->name }} 
                                                        @else
                                                            • {{ $commodity->name }}
                                                        @endif  
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                        <!--<a href="/posts/76" class="stretched-link"></a>-->
                                        <div class="card-hover-overlay px-4">
                                            <span style="color:white">
                                                <h4 class="font-weight-bold card-overlay-content">
                                                    {{$tech->title}}
                                                </h4>
                                                <h6 class="card-overlay-content">
                                                    {{$tech->description}}
                                                </h6>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php $techCount++; ?>
                            @endforeach
                        </div>
                        <nav style="padding-top: 45px">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    {{$results->appends(request()->input())->fragment('posts-anchor')->links()}}
                                </li>
                            </ul>
                        </nav> 
                    @endif
                @else
                    @if(DB::table('technologies')->where('approved', '=', 2)->count() != 0)
                    <?php 

                        $techGrid = App\Technology::where('approved', '=', '2');
                        if(request()->year){
                            $techGrid = $techGrid->where('year_developed', request()->year);
                        }
                        if(request()->location){
                            $techGrid = $techGrid->where('applicability_location', request()->location);
                        }
                        $techGrid = $techGrid->paginate(6);
                        if(request()->sort == 'Title'){
                            if(request()->sortOrder == 'Desc'){
                                $techGridSorted = $techGrid->sortByDesc('title');
                            } else {
                                $techGridSorted = $techGrid->sortBy('title');
                            }
                        } elseif(request()->sort == 'Date'){
                            if(request()->sortOrder == 'Desc'){
                                $techGridSorted = $techGrid->sortByDesc('date');
                            } else {
                                $techGridSorted = $techGrid->sortBy('date');
                            }
                        } else {
                            $techGridSorted = $techGrid;
                        }
                    ?>
                    <div id="techCards" class="row">
                        <?php $techCount = 0; ?>
                        @forelse($techGridSorted as $tech)
                        <div class="col-md-4 tech-card-container">
                            <a data-toggle="modal" data-id="2" data-target="#techModal-{{$tech->id}}">
                                <div class="card card-overlay-container front-card h-auto shadow rounded">
                                    @if( $tech->banner == null)
                                    <div class="card-img-top center-vertically px-3 tech-card-color" style="height:200px">
                                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                            {{$tech->title}}
                                        </span>
                                    </div>
                                    @else
                                    <img alt="Technology banner" class="card-img-top center-vertically" src="/storage/page_images/{{$tech->banner}}" style="height:200px;object-fit:cover">
                                    @endif
                                    <div class="card-body">
                                        <h4 class="card-title trail-end font-weight-bold">{{$tech->title}}</h4>
                                        <div class="card-text trail-end" style="line-height: 120%;">
                                            <p class="mb-2"><b>{{$tech->year_developed}} • {{$tech->applicability_location}}</b></p>
                                            <span>
                                                @foreach($tech->applicability_industries as $applicability_industry)
                                                    @if( $loop->first ) 
                                                        {{ $applicability_industry->name }}
                                                    @else
                                                        • {{ $applicability_industry->name }}
                                                    @endif
                                                @endforeach
                                                <br>
                                                @foreach($tech->technology_categories as $category)
                                                    @if( $loop->first ) 
                                                        {{ $category->name }} 
                                                    @else
                                                        • {{ $category->name }}
                                                    @endif  
                                                @endforeach
                                                <br>
                                                @foreach($tech->commodities as $commodity)
                                                    @if( $loop->first ) 
                                                        {{ $commodity->name }} 
                                                    @else
                                                        • {{ $commodity->name }}
                                                    @endif  
                                                @endforeach
                                            </span>
                                        </div>
                                    </div>
                                    <!--<a href="/posts/76" class="stretched-link"></a>-->
                                    <div class="card-hover-overlay px-4">
                                        <span style="color:white">
                                            <h4 class="font-weight-bold card-overlay-content">
                                                {{$tech->title}}
                                            </h4>
                                            <h6 class="card-overlay-content">
                                                {{$tech->description}}
                                            </h6>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php $techCount++; ?>
                        @empty
                            No results found
                        @endforelse
                    </div>
                    <nav style="padding-top: 45px">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                {{$techGrid->appends(request()->input())->fragment('posts-anchor')->links()}}
                            </li>
                        </ul>
                    </nav> 
                    @else
                    <div class="pt-3">
                        <div class="text-center">
                            <h1>No technologies to show.</h1>
                        </div>
                    </div>
                    @endif
                @endif
                <style>
                    .center {
                    text-align: center;
                    }
                    
                    .pagination a {
                    color: rgb(124, 124, 124);
                    float: left;
                    background-color: #ffff;
                    padding: 8px 16px;
                    text-decoration: none;
                    transition: background-color .3s;
                    border: 1px solid #ddd;
                    font-size: 22px;
                    }

                    .pagination li.active {
                    color: black;
                    font-size: 22px;
                    }

                    .pagination a:hover:not(.active) {
                        background-color: #ddd;
                        color:rgb(25,25,25)
                    }
                </style>
                @elseif(request()->view == 'commodityView')
                @if(DB::table('technologies')->where('approved', '=', 2)->count() != 0)
                <div class="pt-3">
                    <div class="row">
                        <div class="col-sm-3 sidebar px-0" style="background-color:transparent">
                            @foreach($industries as $industry)
                                <div id="accordion-industry-{{$industry->id}}">
                                    <div class="card accordion-card" style="width: 100%;">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-header p-0" style="background-color: rgb(109,169,253)">
                                                <button title="Technology per Industry" class="btn btn-link collapsed" data-toggle="collapse" data-target="#industry-{{$industry->id}}-collapse" aria-expanded="false" aria-controls="aquaticCollapse" style="color:white;background: url('/storage/page_images/{{$industry->thumbnail}}') no-repeat;width:100%;height:100px">
                                                    <b style="font-size:20px;text-shadow: 1px 1px rgb(0,0,0);">{{$industry->name}}</b>
                                                </button>
                                            </li>
                                            <div id="industry-{{$industry->id}}-collapse" class="collapse" data-parent="#accordion-industry-{{$industry->id}}">
                                                <?php $hasTechnology = 0?>
                                                @foreach($sectors->where('industry_id', '=', $industry->id)->where('approved', '=', 2) as $sector)
                                                    <?php 
                                                        $techSectorCount = 0;
                                                        $techSectorQuery = App\Commodity::withCount(['technologies' => function($q){
                                                                $q->where('approved', '=', 2);
                                                            }])
                                                            ->where('commodities.sector_id', '=', $sector->id)
                                                            ->where('approved', '=', 2)
                                                            ->get();
                                                        foreach($techSectorQuery as $tsq)
                                                            $techSectorCount = $techSectorCount + $tsq->technologies_count;
                                                    ?>
                                                    @if($techSectorCount != 0)
                                                    <div id="accordion-{{strtolower(str_replace(' ', '_', $sector->name))}}">
                                                        <li class="list-group-item list-group-header px-2 py-1" style="background-color: rgb(233, 233, 233);{{$sector->commodities->count() == 0 ? 'display:none;' : ''}}">
                                                            <button title="Technology per Sector" class="btn btn-link collapsed inner-collapse" data-toggle="collapse" data-target="#collapse-{{strtolower(str_replace(' ', '_', $sector->name))}}" aria-expanded="false" aria-controls="collapse-{{strtolower(str_replace(' ', '_', $sector->name))}}">
                                                                <b style="color:rgb(49, 49, 49)"> {{$sector->name}}</b>
                                                            </button>
                                                        </li>
                                                        <div id="collapse-{{strtolower(str_replace(' ', '_', $sector->name))}}" class="collapse" data-parent="#accordion-{{strtolower(str_replace(' ', '_', $sector->name))}}">
                                                            @foreach($commodities->where('sector_id', $sector->id)->where('approved', '=', 2) as $comms)
                                                                <div id="accordion-{{strtolower(str_replace(' ', '_', $comms->name))}}">
                                                                    <div class="list-group" id="list-tab" role="tablist">
                                                                        <button title="Technology per Commodity" class="btn btn-link collapsed inner-collapse" style="{{$comms->technologies->where('approved', '=', '2')->count() == 0 ? 'display:none;' : ''}} text-align:inherit;padding-left:2.5rem" data-toggle="collapse" data-target="#collapse-{{strtolower(str_replace(' ', '_', $comms->name))}}" aria-expanded="false" aria-controls="collapse-{{strtolower(str_replace(' ', '_', $sector->name))}}">
                                                                            <span class="badge badge-secondary badge-pill ml-1">{{$comms->technologies->where('approved', '=', '2')->count()}}</span><span> {{$comms->name}}</span>
                                                                        </button>
                                                                        <div id="collapse-{{strtolower(str_replace(' ', '_', $comms->name))}}" class="collapse" data-parent="#accordion-{{strtolower(str_replace(' ', '_', $comms->name))}}">
                                                                            @foreach($comms->technologies->where('approved', '=', '2') as $tech)
                                                                                <a class="list-group-item list-group-item-action {{$first == 0 ? 'active' : ''}}" id="list-{{$tech->id}}-list" data-toggle="list" href="#list-{{$tech->id}}" role="tab">{{$tech->title}}</a>
                                                                                <?php 
                                                                                    if($first == 0) {
                                                                                        $first = $industry->id;
                                                                                        $under = strtolower(str_replace(' ', '_', $sector->name));
                                                                                        $under_commodity = strtolower(str_replace(' ', '_', $comms->name));
                                                                                    };
                                                                                    $hasTechnology++;
                                                                                    if($first_tech == 0){
                                                                                        $first_tech = $tech->id;
                                                                                    }
                                                                                ?>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                                @if($hasTechnology == 0)
                                                    <div id="accordion-{{strtolower(str_replace(' ', '_', $sector->name))}}">
                                                        <li class="list-group-item">
                                                            <span> No technologies to show.</span>
                                                        </li>
                                                    </div>
                                                @endif
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                            <style>
                                a.list-group-item{
                                color:#495057 !important;
                                font-size:1.125rem !important;
                                font-weight:500 !important;
                                }

                                a.list-group-item.active:hover{
                                }

                                a.list-group-item:hover{
                                color:#495057 !important;
                                text-decoration: none !important;
                                }

                                a.list-group-item:active{
                                text-decoration: none !important;
                                background-color: #3490dc !important;
                                }

                                .list-group-item.active{
                                    color: white !important;
                                }
                                a.list-group-item.active:hover{
                                    color: #fffa !important;
                                }
                            </style>
                        </div>
                        
                        <div class="col-sm-9 py-0 pr-0">
                            <div class="tab-content">
                                @foreach($techCommodities as $technology)
                                    <div class="card tab-pane mt-1 {{$technology->id == $first_tech ? 'active' : ''}}" id="list-{{$technology->id}}" role="tabpanel" >
                                        <div class="card-body row mx-1 mt-0">
                                            <span class="mt-3 w-100 col-sm-12">
                                                <div style="display:flow-root">
                                                    <div style="font-weight:900; float:left; width:90%">
                                                        <h1>
                                                            {{$technology->title}}
                                                        </h1>
                                                    </div>
                                                    <button style="width:10%;margin-top:0.4rem" type="button" title="export as PDF file" class="btn btn-primary float-right" onclick="location.href='{{ url('/'.$technology->id.'/printTechPDF') }}'">Save as PDF</button>
                                                </div>
                                                <small class="text-muted" style="display:flow-root">
                                                    @if($technology->applicability_location != null)
                                                    <i class="fas fa-map-marker-alt"></i> {{$technology->applicability_location}}
                                                    @endif
                                                    @if($technology->year_developed != null)
                                                    <i class="far fa-calendar-alt ml-2"></i> {{$technology->year_developed}}
                                                    @endif
                                                </small>
                                            </span>
                                            <div class="dropdown-divider mt-3 mb-3 w-100"></div>
                                            <div class="{{$technology->banner ? 'col-sm-7' : 'col-sm-12'}}">
                                                
                                                @if($technology->description != null)
                                                <b>Description</b><br>
                                                <span>{{$technology->description}}</span>
                                                @endif
                                                @if($technology->significance != null)
                                                <div class="dropdown-divider mt-3"></div>
                                                <b>Significance</b><br>
                                                <span>{{$technology->significance}}</span>
                                                @endif
                                                @if($technology->target_users != null)
                                                <div class="dropdown-divider mt-3"></div>
                                                <b>Target Users</b><br>
                                                <span>{{$technology->target_users}}</span>
                                                @endif
                                                <div class="dropdown-divider mt-3"></div>
                                                <b>Technology Applicability - Industry</b><br>
                                                @foreach($technology->applicability_industries as $applicability_industry)
                                                    <span class="ml-3">
                                                        • {{ $applicability_industry->name }}<br> 
                                                    </span>
                                                @endforeach
                                                <div class="dropdown-divider mt-3"></div>
                                                <b>Industry - Sector - Commodity</b><br>
                                                @foreach($technology->commodities as $commodity)
                                                    <span class="ml-3">• 
                                                        {{ $commodity->sector->industry->name }}
                                                        <i class="fas fa-angle-double-right"></i>
                                                        {{ $commodity->sector->name }}
                                                        <i class="fas fa-angle-double-right"></i>
                                                        {{ $commodity->name }}<br></span><br>
                                                @endforeach
                                            </div>
                                            @if($technology->banner != null)
                                            <div class="col-sm-5">
                                                <img alt="Technology banner" src="/storage/page_images/{{$technology->banner}}" class="card-img-top" width="100%">
                                            </div>
                                            @endif
                                            
                                            <div class="dropdown-divider mt-3"></div>
                                            @if(!Auth::check())
                                            <a type="button" title="Click for more information" href="/login" class="btn btn-lg btn-block btn-primary mt-3 mx-5" style="font-size:20px">More Information</a>
                                            @endif
                                            @if(Auth::check())
                                                @if(count($technology->agencies) != null)
                                                <div class="col-sm-4">
                                                    <div class="card p-3" style="width:100%;">
                                                        <h4 class="mb-0">Technology Owner</h4>
                                                        @foreach($technology->agencies as $agency)
                                                            <div class="dropdown-divider"></div>
                                                            <span>
                                                                {{$agency->name}} 
                                                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#viewAgencyModal-{{$agency->id}}"><i class="far fa-eye"></i> View details</button>
                                                            </span>
                                                            
                                                        @endforeach
                                                    </div>
                                                </div> 
                                                @endif
                                                @if(count($technology->generators) != null)
                                                <div class="col-sm-4">
                                                    <div class="card p-3" style="width:100%;">
                                                        <h4 class="mb-0">Technology Generator</h4>
                                                        @foreach($technology->generators as $generator)
                                                            <div class="dropdown-divider"></div>
                                                            <span>
                                                                {{$generator->name}}
                                                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#viewGeneratorModal-{{$generator->id}}"><i class="far fa-eye"></i> View details</button>
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                @if(count($technology->adopters) != null)
                                                <div class="col-sm-4">
                                                    <div class="card p-3" style="width:100%;">
                                                        <h4 class="mb-0">Technology Adopters</h4>
                                                        @foreach($technology->adopters as $adopter)
                                                            <div class="dropdown-divider"></div>
                                                            <span>
                                                                {{$adopter->name}}
                                                                <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#viewAdopterModal-{{$adopter->id}}"><i class="far fa-eye"></i> View details</button>
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                @if($technology->patents->count() != 0 || $technology->utility_models->count() != 0 || $technology->industrial_designs->count() != 0 || $technology->copyrights->count() != 0 || $technology->trademarks->count() != 0 || $technology->plant_variety_protections->count() != 0)
                                                <div class="col-sm-12">
                                                    <div class="card p-3" style="width:100%;">
                                                        <h3 class="mt-3 mb-3 font-weight-bold">Protection Type</h3>
                                                        <div class="dropdown-divider mb-3"></div>
                                                        <div class="card-body">
                                                            <table class="table table-bordered table-striped shadow-sm mb-3" id="user_table" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="50%">Type of Protection</th>
                                                                        <th width="35%">Status</th>
                                                                        <th width="25%">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($technology->patents as $patent)
                                                                        <tr>
                                                                            <td>Patent</td>
                                                                            <td>{{$patent->status}}</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewPatentModal-{{$patent->id}}"><i class="far fa-eye"></i> View details</button></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    @foreach($technology->utility_models as $utility_model)
                                                                        <tr>
                                                                            <td>Utility Model</td>
                                                                            <td>{{$utility_model->status}}</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewUtilityModelModal-{{$utility_model->id}}"><i class="far fa-eye"></i> View details</button></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    @foreach($technology->trademarks as $trademark)
                                                                        <tr>
                                                                            <td>Trademark</td>
                                                                            <td>{{$trademark->status}}</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewTrademarkModal-{{$trademark->id}}"><i class="far fa-eye"></i> View details</button></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    @foreach($technology->industrial_designs as $industrial_design)
                                                                        <tr>
                                                                            <td>Industrial Design</td>
                                                                            <td>{{$industrial_design->status}}</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewIndustrialDesignModal-{{$industrial_design->id}}"><i class="far fa-eye"></i> View details</button></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    @foreach($technology->copyrights as $copyright)
                                                                        <tr>
                                                                            <td>Copyright</td>
                                                                            <td>{{$copyright->status}}</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewCopyrightModal-{{$copyright->id}}"><i class="far fa-eye"></i> View details</button></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    @foreach($technology->plant_variety_protections as $plant_variety_protection)
                                                                        <tr>
                                                                            <td>Plant Variety Protection</td>
                                                                            <td>-------</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewPlantVarietyProtectionModal-{{$plant_variety_protection->id}}"><i class="far fa-eye"></i> View details</button></td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($technology->basic_research_title != null)
                                                <div class="col-sm-12">
                                                    <div class="dropdown-divider mt-3"></div>
                                                    <h3 class="my-3 font-weight-bold">Basic Research</h3>
                                                    <div class="dropdown-divider mt-3"></div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <b>Project Title</b><br>
                                                            <span>{{$technology->basic_research_title}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <br><b>Funding Agency</b><br>
                                                            <span>{{$technology->basic_research_funding}}</span>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <br><b>Implementing Agency</b><br>
                                                            <span>{{$technology->basic_research_implementing}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <br><b>Project Cost</b><br>
                                                            <span>₱{{$technology->basic_research_cost}}</span>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <br><b>Start Date</b><br>
                                                            <span>{{$technology->basic_research_start_date}}</span>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <br><b>End Date</b><br>
                                                            <span>{{$technology->basic_research_end_date}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($technology->applied_research_title != null)
                                                <div class="col-sm-12">
                                                    <div class="dropdown-divider mt-3"></div>
                                                    <h3 class="my-3 font-weight-bold">Applied Research</h3>
                                                    <div class="dropdown-divider mt-3"></div>
                                                    <div class="row">
                                                        <div class="col-sm-12 mb-3">
                                                            <b>Applied Research Type</b><br>
                                                            <span>{{$technology->applied_research_type}}</span>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <b>Project Title</b><br>
                                                            <span>{{$technology->applied_research_title}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <br><b>Funding Agency</b><br>
                                                            <span>{{$technology->applied_research_funding}}</span>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <br><b>Implementing Agency</b><br>
                                                            <span>{{$technology->applied_research_implementing}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <br><b>Project Cost</b><br>
                                                            <span>₱{{$technology->applied_research_cost}}</span>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <br><b>Start Date</b><br>
                                                            <span>{{$technology->applied_research_start_date}}</span>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <br><b>End Date</b><br>
                                                            <span>{{$technology->applied_research_end_date}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-divider mt-3"></div>
                                                </div>
                                                @endif
                                                @if(count($technology->r_d_results) != null)
                                                <div class="col-sm-12">
                                                    <div class="card p-3" style="width:100%;">
                                                        <h3 class="mt-3 mb-3 font-weight-bold">R&D Results Utilization</h3>
                                                        <div class="dropdown-divider mb-3"></div>
                                                        <div class="card-body">
                                                            <table class="table table-bordered table-striped shadow-sm mb-3" id="user_table" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="20%">Utilization</th>
                                                                        <th width="65%">Title</th>
                                                                        <th width="15%">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($technology->r_d_results as $r_d_result)
                                                                        <tr>
                                                                            <td>{{$r_d_result->utilization}}</td>
                                                                            <td>{{$r_d_result->title}}</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewRDResultModal-{{$r_d_result->id}}"><i class="far fa-eye"></i> View details</button></td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <div style="padding-left:15px;padding-right:15px;width:100%">
                                                    @if($technology->files->where('category', '=', 'application_of_technology')->where('technology_id', '=', $technology->id)->count() > 0)
                                                    <h3 class="text-muted mt-3 mb-3">
                                                        Application of Technology 
                                                    </h3>
                                                    <div class="dropdown-divider mb-3 w-100"></div> 
                                                    <div class="row ml-1 mr-1" style="width:100%">
                                                        @foreach($technology->files->where('category', '=', 'application_of_technology')->where('technology_id', '=', $technology->id) as $file)
                                                        <div class="col-sm-3 mx-3 px-0 pdf-card">
                                                            <a class="pdf-card-link" href="/storage/files/{{$file->filename}}" target="_blank">
                                                                <span class="pdf-card-title">
                                                                    {{$file->filename}}
                                                                </span>
                                                                <span class="pdf-card-type">
                                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                                    <span class="pdf-card-size">
                                                                        {{$file->filesize}} KB
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    @if($technology->files->where('category', '=', 'limitation_of_technology')->where('technology_id', '=', $technology->id)->count() > 0)
                                                    <h3 class="text-muted mt-3 mb-3">
                                                        Limitation of Technology
                                                    </h3>
                                                    <div class="dropdown-divider mb-3 w-100"></div>  
                                                    <div class="row ml-1 mr-1" style="width:100%">
                                                        @foreach($technology->files->where('category', '=', 'limitation_of_technology')->where('technology_id', '=', $technology->id) as $file)
                                                        <div class="col-sm-3 mx-3 px-0 pdf-card">
                                                            <a class="pdf-card-link" href="/storage/files/{{$file->filename}}" target="_blank">
                                                                <span class="pdf-card-title">
                                                                    {{$file->filename}}
                                                                </span>
                                                                <span class="pdf-card-type">
                                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                                    <span class="pdf-card-size">
                                                                        {{$file->filesize}} KB
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    @if($technology->files->where('category', '=', 'market_study_summary')->where('technology_id', '=', $technology->id)->count() > 0)
                                                    <h3 class="text-muted mt-3 mb-3">
                                                        Market Study Summary
                                                    </h3>
                                                    <div class="dropdown-divider mb-3 w-100"></div>  
                                                    <div class="row ml-1 mr-1" style="width:100%">
                                                        @foreach($technology->files->where('category', '=', 'market_study_summary')->where('technology_id', '=', $technology->id) as $file)
                                                        <div class="col-sm-3 mx-3 px-0 pdf-card">
                                                            <a class="pdf-card-link" href="/storage/files/{{$file->filename}}" target="_blank">
                                                                <span class="pdf-card-title">
                                                                    {{$file->filename}}
                                                                </span>
                                                                <span class="pdf-card-type">
                                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                                    <span class="pdf-card-size">
                                                                        {{$file->filesize}} KB
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    @if($technology->files->where('category', '=', 'technology_valuation_summary')->where('technology_id', '=', $technology->id)->count() > 0)
                                                    <h3 class="text-muted mt-3 mb-3">
                                                        Technology Valuation Summary
                                                    </h3>
                                                    <div class="dropdown-divider mb-3 w-100"></div>  
                                                    <div class="row ml-1 mr-1" style="width:100%">
                                                        @foreach($technology->files->where('category', '=', 'technology_valuation_summary')->where('technology_id', '=', $technology->id) as $file)
                                                        <div class="col-sm-3 mx-3 px-0 pdf-card">
                                                            <a class="pdf-card-link" href="/storage/files/{{$file->filename}}" target="_blank">
                                                                <span class="pdf-card-title">
                                                                    {{$file->filename}}
                                                                </span>
                                                                <span class="pdf-card-type">
                                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                                    <span class="pdf-card-size">
                                                                        {{$file->filesize}} KB
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    @if($technology->files->where('category', '=', 'freedom_to_operate_summary')->where('technology_id', '=', $technology->id)->count() > 0)
                                                    <h3 class="text-muted mt-3 mb-3">
                                                        Freedom to Operate Summary
                                                    </h3>
                                                    <div class="dropdown-divider mb-3 w-100"></div>  
                                                    <div class="row ml-1 mr-1" style="width:100%">
                                                        @foreach($technology->files->where('category', '=', 'freedom_to_operate_summary')->where('technology_id', '=', $technology->id) as $file)
                                                        <div class="col-sm-3 mx-3 px-0 pdf-card">
                                                            <a class="pdf-card-link" href="/storage/files/{{$file->filename}}" target="_blank">
                                                                <span class="pdf-card-title">
                                                                    {{$file->filename}}
                                                                </span>
                                                                <span class="pdf-card-type">
                                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                                    <span class="pdf-card-size">
                                                                        {{$file->filesize}} KB
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    @if($technology->files->where('category', '=', 'proposed_term_sheet')->where('technology_id', '=', $technology->id)->count() > 0)
                                                    <h3 class="text-muted mt-3 mb-3">
                                                        Proposed Term Sheet
                                                    </h3>
                                                    <div class="dropdown-divider mb-3 w-100"></div>  
                                                    <div class="row ml-1 mr-1" style="width:100%">
                                                        @foreach($technology->files->where('category', '=', 'proposed_term_sheet')->where('technology_id', '=', $technology->id) as $file)
                                                        <div class="col-sm-3 mx-3 px-0 pdf-card">
                                                            <a class="pdf-card-link" href="/storage/files/{{$file->filename}}" target="_blank">
                                                                <span class="pdf-card-title">
                                                                    {{$file->filename}}
                                                                </span>
                                                                <span class="pdf-card-type">
                                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                                    <span class="pdf-card-size">
                                                                        {{$file->filesize}} KB
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    @if($technology->files->where('category', '=', 'fairness_opinion_report')->where('technology_id', '=', $technology->id)->count() > 0)
                                                    <h3 class="text-muted mt-3 mb-3">
                                                        Fairness Opinion Report
                                                    </h3>
                                                    <div class="dropdown-divider mb-3 w-100"></div>  
                                                    <div class="row ml-1 mr-1" style="width:100%">
                                                        @foreach($technology->files->where('category', '=', 'fairness_opinion_report')->where('technology_id', '=', $technology->id) as $file)
                                                        <div class="col-sm-3 mx-3 px-0 pdf-card">
                                                            <a class="pdf-card-link" href="/storage/files/{{$file->filename}}" target="_blank">
                                                                <span class="pdf-card-title">
                                                                    {{$file->filename}}
                                                                </span>
                                                                <span class="pdf-card-type">
                                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                                    <span class="pdf-card-size">
                                                                        {{$file->filesize}} KB
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    @if($technology->files->where('category', '=', 'process_flow')->where('technology_id', '=', $technology->id)->count() > 0)
                                                    <h3 class="text-muted mt-3 mb-3">
                                                        Process Flow
                                                    </h3>
                                                    <div class="dropdown-divider mb-3 w-100"></div>  
                                                    <div class="row ml-1 mr-1" style="width:100%">
                                                        @foreach($technology->files->where('category', '=', 'process_flow')->where('technology_id', '=', $technology->id) as $file)
                                                        <div class="col-sm-3 mx-3 px-0 pdf-card">
                                                            <a class="pdf-card-link" href="/storage/files/{{$file->filename}}" target="_blank">
                                                                <span class="pdf-card-title">
                                                                    {{$file->filename}}
                                                                </span>
                                                                <span class="pdf-card-type">
                                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                                    <span class="pdf-card-size">
                                                                        {{$file->filesize}} KB
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    @if($technology->files->where('category', '=', 'materials_equipment')->where('technology_id', '=', $technology->id)->count() > 0)
                                                    <h3 class="text-muted mt-3 mb-3">
                                                        Materials/Equipment
                                                    </h3>
                                                    <div class="dropdown-divider mb-3 w-100"></div>  
                                                    <div class="row ml-1 mr-1" style="width:100%">
                                                        @foreach($technology->files->where('category', '=', 'materials_equipment')->where('technology_id', '=', $technology->id) as $file)
                                                        <div class="col-sm-3 mx-3 px-0 pdf-card">
                                                            <a class="pdf-card-link" href="/storage/files/{{$file->filename}}" target="_blank">
                                                                <span class="pdf-card-title">
                                                                    {{$file->filename}}
                                                                </span>
                                                                <span class="pdf-card-type">
                                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                                    <span class="pdf-card-size">
                                                                        {{$file->filesize}} KB
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="pt-3">
                    <div class="text-center">
                        <h1>No technologies to show.</h1>
                    </div>
                </div>
                @endif
                @else
                <!-- ===========OLD DASHBOARD DESIGN w/ Dropdown============
                <div class="row">
                    <div class="dashboard-view py-3">
                        <div class="text-center mx-5 px-5 mb-5">
                            <span style="font-weight:900;font-size:3rem">Technology Dashboard</span>
                        </div>
                        <div class="row mx-0 px-0">
                            <div class="col-sm-6 pl-0">
                                <h3>
                                    This graph shows the no. and distribution of technologies.
                                </h3>
                                <div class="card shadow">
                                    <div title="Click to see available technologies per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Technology per&nbsp;</h5>
                                        <div class="dropdown" >
                                            <a class="row mx-0" style="color:rgb(24, 106, 248)" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php
                                                    $techBy = str_replace('_', ' ', request()->techBy)
                                                ?>
                                                <h4 class="font-weight-bold my-1">{{request()->techBy ? $techBy : 'Region'}}</h4>
                                                <i class="fas fa-caret-down fa-lg fa-fw" style=margin:auto></i>
                                            </a>
                                            <div id="techByDropdown" class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="techByDropdown" style="">
                                                <div class="dropdown-header">Sort by:</div>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy, 'dashboard' == request()->dashboard, 'adoptersBy' == request()->adoptersBy ? '' : 'techBy=Sector'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Sector</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy, 'dashboard' == request()->dashboard, 'adoptersBy' == request()->adoptersBy ? '' : 'techBy=Commodity'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Commodity</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy, 'dashboard' == request()->dashboard, 'adoptersBy' == request()->adoptersBy ? '' : 'techBy=Year'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Year</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy, 'dashboard' == request()->dashboard, 'adoptersBy' == request()->adoptersBy ? '' : 'techBy=Implementing_Agency'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Implementing Agency</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy, 'dashboard' == request()->dashboard, 'adoptersBy' == request()->adoptersBy ? '' : 'techBy=Category'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Category</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy, 'dashboard' == request()->dashboard, 'adoptersBy' == request()->adoptersBy ? '' : 'techBy=Region'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Region</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="techBarChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6 pr-0">
                                <h3>
                                    This graph shows the no. and distribution of adopters.
                                </h3>
                                <div class="card shadow">
                                    <div title="Click to see available adopters per..." class="card-header chart-header py-3 d-flex flex-row align-items-center">
                                        <h5 class="font-weight-bold my-1 text-primary">Adopters per&nbsp;</h5>
                                        <div class="dropdown">
                                            <a class="row mx-0" style="color:rgb(24, 106, 248)" href="#" role="button" id="dropdownMenuLinkAdopters" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php
                                                    $adoptersBy = str_replace('_', ' ', request()->adoptersBy)
                                                ?>
                                                <h4 class="font-weight-bold my-1">{{request()->adoptersBy ? $adoptersBy : 'Sector'}}</h4>
                                                <i class="fas fa-caret-down fa-lg fa-fw" style=margin:auto></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLinkAdopters" style="">
                                                <div class="dropdown-header">Sort by:</div>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'dashboard' == request()->dashboard, 'adoptersBy' == request()->adoptersBy ? '' : 'adoptersBy=Sector'])}}&view=dashboardView#posts-anchor"  class="dropdown-item" href="#">Sector</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'dashboard' == request()->dashboard, 'adoptersBy' == request()->adoptersBy ? '' : 'adoptersBy=Commodity'])}}&view=dashboardView#posts-anchor"  class="dropdown-item" href="#">Commodity</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'dashboard' == request()->dashboard, 'adoptersBy' == request()->adoptersBy ? '' : 'adoptersBy=Year'])}}&view=dashboardView#posts-anchor"  class="dropdown-item" href="#">Year</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'dashboard' == request()->dashboard, 'adoptersBy' == request()->adoptersBy ? '' : 'adoptersBy=Implementing_Agency'])}}&view=dashboardView#posts-anchor"  class="dropdown-item" href="#">Implementing Agency</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'dashboard' == request()->dashboard, 'adoptersBy' == request()->adoptersBy ? '' : 'adoptersBy=Category'])}}&view=dashboardView#posts-anchor"  class="dropdown-item" href="#">Category</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'dashboard' == request()->dashboard, 'adoptersBy' == request()->adoptersBy ? '' : 'adoptersBy=Region'])}}&view=dashboardView#posts-anchor"  class="dropdown-item" href="#">Region</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="adopterPieChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-12 px-0">
                                <h3 class="mt-5">
                                    This graph shows the amount and distribution of DOST-PCAARRD funded projects.
                                </h3>
                                <div class="card shadow">
                                    <div title="Click to see amount of funds per..." class="card-header chart-header py-3 d-flex flex-row align-items-center">
                                        <h5 class="font-weight-bold my-1 text-primary">Amount Funded per&nbsp;</h5>
                                        <div class="dropdown">
                                            <a class="row mx-0" style="color:rgb(24, 106, 248)" href="#" role="button" id="dropdownMenuLinkAmoundFunded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php
                                                    $fundedBy = str_replace('_', ' ', request()->fundedBy)
                                                ?>
                                                <h4 class="font-weight-bold my-1">{{request()->fundedBy ? $fundedBy : 'Year'}}</h4>
                                                <i class="fas fa-caret-down fa-lg fa-fw" style=margin:auto></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLinkAmoundFunded" style="">
                                                <div class="dropdown-header">Sort by:</div>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'dashboard' == request()->dashboard, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Sector'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Sector</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'dashboard' == request()->dashboard, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Commodity'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Commodity</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'dashboard' == request()->dashboard, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Year'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Year</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'dashboard' == request()->dashboard, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Implementing_Agency'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Implementing Agency</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'dashboard' == request()->dashboard, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Category'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Category</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'dashboard' == request()->dashboard, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Region'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Region</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div style="height:21rem">
                                            <canvas id="amountFundedYearChart" style="margin:auto"></canvas>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ===========OLD DASHBOARD DESIGN w/ Dropdown=========== -->
                <div class="row">
                    <div class="dashboard-view px-3 w-100">
                        <div class="text-center mt-5 mb-5">
                            <span style="font-weight:900;font-size:3rem">Technology Dashboard</span>
                        </div>
                        <ul class="nav nav-tabs mb-4">
                            <li class="nav-item">
                              <a class="nav-link {{request()->dashboard == 'All' || !request()->dashboard ? 'active font-weight-bold' : ''}}" data-bs-toggle="tab" role="tab" aria-current="page" href="{{ route('pages.index', ['view' => request()->view, 'dashboard' == request()->dashboard ? '' : 'dashboard=All'])}}#posts-anchor">All Industries</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link {{request()->dashboard == 'AgriculturalTechnologies' ? 'active font-weight-bold' : ''}}" data-bs-toggle="tab" role="tab" href="{{ route('pages.index', ['view' => request()->view, 'dashboard' == request()->dashboard ? '' : 'dashboard=AgriculturalTechnologies'])}}#posts-anchor">Agricultural Technologies</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link {{request()->dashboard == 'AquaticResources' ? 'active font-weight-bold' : ''}}" data-bs-toggle="tab" role="tab" href="{{ route('pages.index', ['view' => request()->view, 'dashboard' == request()->dashboard ? '' : 'dashboard=AquaticResources'])}}#posts-anchor">Aquatic Resources</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link {{request()->dashboard == 'NaturalResources' ? 'active font-weight-bold' : ''}}" data-bs-toggle="tab" role="tab" href="{{ route('pages.index', ['view' => request()->view, 'dashboard' == request()->dashboard ? '' : 'dashboard=NaturalResources'])}}#posts-anchor">Natural Resources</a>
                            </li>
                          </ul>
                        <?php 
                            if(request()->dashboard == 'All' || !request()->dashboard){
                                $dashboardIndustryString = 'All Industries';
                            } else if(request()->dashboard == 'AgriculturalTechnologies') {
                                $dashboardIndustryString = 'Agricultural Technologies Industry';
                            } else if(request()->dashboard == 'AquaticResources') {
                                $dashboardIndustryString = 'Aquatic Resources Industry';
                            } else if(request()->dashboard == 'NaturalResources') {
                                $dashboardIndustryString = 'Natural Resources Industry';
                            }
                        ?>
                        <h3>
                            These graphs show the distribution of technologies under <span class="font-weight-bold">{{$dashboardIndustryString}}</span> per region, sector, commodity, year, implementing agency, and category.
                        </h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div title="Click to see available technologies per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Technology Generated per Sector</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="techPerSector"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div title="Click to see available technologies per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Technology Generated per Commodity</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="techPerCommodityChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div title="Click to see available technologies per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Technology Generated per Year</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="techPerYearChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div title="Click to see available technologies per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Technology Generated per Implementing Agency</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="techPerAgencyChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div title="Click to see available technologies per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Technology Generated per Category</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="techPerCategoryChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div title="Click to see available technologies per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Technology Generated per Region</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="techPerRegionChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-5">
                            These graphs show the distribution of adopter under <span class="font-weight-bold">{{$dashboardIndustryString}}</span> per sector, region, commodity, year, implementing agency, and category.
                        </h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div title="Click to see available adopters per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Number of Adopters per Sector</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="adoptersPerSectorChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div title="Click to see available adopters per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Number of Adopters per Commodity</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="adoptersPerCommodityChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div title="Click to see available adopters per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Number of Adopters per Year</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="adoptersPerYearChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div title="Click to see available adopters per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Number of Adopters per Agency</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="adoptersPerAgencyChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div title="Click to see available adopters per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Number of Adopters per Category</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="adoptersPerCategoryChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card shadow">
                                    <div title="Click to see available adopters per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Number of Adopters per Region</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="adoptersPerRegionChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <h3 class="mt-5">
                            These graphs show the amount in millions for projects funded by DOST-PCAARRD under <span class="font-weight-bold">{{$dashboardIndustryString}}</span> per year, sector, commodity, implementing agency, category, and region.
                        </h3>
                        <div class="row">
                            <!--
                            <div class="col-sm-12" >
                                <div class="card shadow" style="height:350px">
                                    <div title="Click to see available funded per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Amount Funded per Sector</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="fundedPerSectorChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card shadow" style="height:350px">
                                    <div title="Click to see available funded per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Amount Funded per Commodity</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="fundedPerCommodityChart"></canvas>
                                    </div>   
                                </div>
                            </div>-->
                            <div class="col-sm-12">
                                <div class="card shadow" style="height:350px">
                                    <div title="Click to see available funded per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Amount Funded per Year</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="fundedPerYearChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card shadow" style="height:350px">
                                    <div title="Click to see available funded per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Amount Funded per Agency</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="fundedPerAgencyChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card shadow" style="height:350px">
                                    <div title="Click to see available funded per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Amount Funded per Category</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="fundedPerCategoryChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="card shadow" style="height:350px">
                                    <div title="Click to see available funded per..." class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Amount Funded per Region</h5>
                                        <div class="dropdown" >
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="fundedPerRegionChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <style>
                .extra{
                    width: 100vw;
                    position: relative;
                    left: calc(-50vw + 50%);
                }
                .chart-header{
                    background-color: #f8f9fc; 
                    border-bottom: 1px solid #e3e6f0; 
                    font-weight:500
                }
            </style>

            <!-- DYNAMIC DATA INPUT FOR TECHNOLOGY PER ____ Bar Graph -->
            <?php
                    //data input for technology per ___ bar graph
                    $techChartArray = array();
                    $techChartArray[0] = array();
                    $techChartArray[1] = array();
                    $othersCount = 0;
                    $counter = 0;
                    $nullYears = 0;
                    if(request()->dashboard == 'AgriculturalTechnologies'){
                        $industryID = 1;
                    } elseif(request()->dashboard == 'AquaticResources'){
                        $industryID = 2;
                    } elseif(request()->dashboard == 'NaturalResources'){
                        $industryID = 3;
                    } 

                    //Tech Per Sector
                    $techPerSectorArray = array();
                    $techPerSectorArray[0] = array();
                    $techPerSectorArray[1] = array();
                    $techPerSectorOthersCount = 0;
                    $techPerSectorCounter = 0;
                    
                    if(!request()->dashboard || request()->dashboard == 'All'){
                        $techPerSectorForeachQuery = App\Sector::where('approved', '=', 2)->get();
                    } else {
                        $techPerSectorForeachQuery = App\Sector::where('approved', '=', 2)->where('industry_id', '=', $industryID)->get();
                    }
                    foreach($techPerSectorForeachQuery as $itemSector){
                        $techPerSectorOthersCount = 0;
                        $sectorCommodityCount = 0;
                        if(!request()->dashboard || request()->dashboard == 'All'){
                        $techPerSectorQuery = App\Commodity::withCount(['technologies' => function($q){
                                $q->where('approved', '=', 2);
                            }])
                            ->where('commodities.sector_id', '=', $itemSector->id)
                            ->orderBy('technologies_count', 'desc')
                            ->where('approved', '=', 2)
                            ->get();
                        } else {
                            $techPerSectorQuery = App\Commodity::withCount(['technologies' => function($q){
                                    $q->where('approved', '=', 2);
                                }])
                                ->where('commodities.approved', '=', 2)
                                ->where('commodities.sector_id', '=', $itemSector->id)
                                ->join('sectors', 'sectors.id', '=', 'sector_id')
                                ->where('sectors.industry_id', '=', $industryID)
                                ->where('sectors.approved', '=', 2)
                                ->orderBy('technologies_count', 'desc')
                                ->get();
                        }
                        foreach($techPerSectorQuery as $item)
                        {
                            $sectorCommodityCount = $sectorCommodityCount + $item->technologies_count; 
                        }
                        if($sectorCommodityCount != 0){
                            if($techPerSectorCounter < 10){
                                array_push($techPerSectorArray[0],$itemSector->name);
                                array_push($techPerSectorArray[1],$sectorCommodityCount);
                                $techPerSectorCounter++;
                            } else {    
                                $techPerSectorOthersCount = $techPerSectorOthersCount + $item->technologies_count;
                            }
                        }
                    }
                    sort($techPerSectorArray[0]);
                    if($techPerSectorOthersCount!= 0){
                        array_push($techPerSectorArray[0],'Others');
                        array_push($techPerSectorArray[1],$techPerSectorOthersCount);
                    }
                    
                    //Tech Per Commodity
                    $techPerCommodityArray = array();
                    $techPerCommodityArray[0] = array();
                    $techPerCommodityArray[1] = array();
                    $techPerCommodityOthersCount = 0;
                    $techPerCommodityCounter = 0;
                    if(!request()->dashboard || request()->dashboard == 'All'){
                        $techPerCommodityQuery = App\Commodity::withCount(['technologies' => function($q){
                                $q->where('approved', '=', 2);
                            }])
                            ->where('commodities.approved', '=', 2)
                            ->orderBy('technologies_count', 'desc')->get();
                    } else {
                        $techPerCommodityQuery = App\Commodity::withCount(['technologies' => function($q){
                                $q->where('approved', '=', 2);
                            }])
                            ->join('sectors', 'sectors.id', '=', 'commodities.sector_id')
                            ->where('sectors.industry_id', '=', $industryID)
                            ->where('commodities.approved', '=', 2)
                            ->orderBy('technologies_count', 'desc')->get();
                    }
                    foreach($techPerCommodityQuery as $item)
                    {
                        if($techPerCommodityCounter < 10 && $item->technologies_count != 0){
                            array_push($techPerCommodityArray[0],$item->name);
                            array_push($techPerCommodityArray[1],$item->technologies_count);
                            $techPerCommodityCounter++;
                        } else {
                            $techPerCommodityOthersCount = $techPerCommodityOthersCount + $item->technologies_count;
                        }
                    }
                    sort($techPerCommodityArray[0]);
                    if($techPerCommodityOthersCount != 0){
                        array_push($techPerCommodityArray[0],'Others');
                        array_push($techPerCommodityArray[1],$techPerCommodityOthersCount);
                    }

                    //Tech Per Year
                    $techPerYearArray = array();
                    $techPerYearArray[0] = array();
                    $techPerYearArray[1] = array();
                    $techPerYearOthersCount = 0;
                    $techPerYearCounter = 0;
                    if(!request()->dashboard || request()->dashboard == 'All'){
                        $techPerYearQuery = DB::table('technologies')
                            ->where('technologies.approved', '=', 2)
                            ->select('year_developed', DB::raw('count(*) as total'))
                            ->groupBy('year_developed')
                            ->orderBy('total', 'desc')
                            ->get();
                    } else {
                        $techPerYearQuery = DB::table('technologies')
                            ->join('commodity_technology', 'technologies.id', '=', 'commodity_technology.technology_id')
                            ->join('commodities', 'commodity_technology.commodity_id', '=', 'commodities.id')
                            ->join('sectors', 'commodities.id', '=', 'sectors.id')
                            ->where('sectors.industry_id', '=', $industryID)
                            ->where('technologies.approved', '=', 2)
                            ->select('year_developed', DB::raw('count(*) as total'))
                            ->groupBy('year_developed')
                            ->orderBy('total', 'desc')
                            ->get();
                    }
                    foreach($techPerYearQuery as $item){
                        if($techPerYearCounter < 10){
                            if($item->year_developed == NULL){
                                $nullYears = $nullYears + $item->total;
                            } else {
                                array_push($techPerYearArray[0],$item->year_developed);
                                array_push($techPerYearArray[1],$item->total);
                            }
                            $techPerYearCounter++;
                        } else {
                            $techPerYearOthersCount = $techPerYearOthersCount + $item->total;
                        }
                    }
                    sort($techPerYearArray[0]);
                    if($nullYears != 0){
                        array_push($techPerYearArray[0], 'No Year');
                        array_push($techPerYearArray[1],$nullYears);
                    }
                    if($techPerYearOthersCount!= 0){
                        array_push($techPerYearArray[0], 'Others');
                        array_push($techPerYearArray[1],$techPerYearOthersCount);
                    }

                    //Tech Per Agency
                    $techPerAgencyArray = array();
                    $techPerAgencyArray[0] = array();
                    $techPerAgencyArray[1] = array();
                    $techPerAgencyOthersCount = 0;
                    $techPerAgencyCounter = 0;
                    foreach(App\Agency::withCount(['technologies' => function($q){
                        $q->where('approved', '=', 2);
                    }])->where('approved', '=', 2)->orderBy('technologies_count', 'desc')->get() as $item)
                    {
                        if($techPerAgencyCounter < 10 && $item->technologies_count != 0){
                            array_push($techPerAgencyArray[0], $item->name);
                            array_push($techPerAgencyArray[1], $item->technologies_count);
                            $techPerAgencyCounter++;
                        } else {
                            $techPerAgencyOthersCount = $techPerAgencyOthersCount + $item->total;
                        }
                    }
                    sort($techPerAgencyArray[0]);
                    if($techPerAgencyOthersCount!= 0){
                        array_push($techPerAgencyArray[0],'Others');
                        array_push($techPerAgencyArray[1],$techPerAgencyOthersCount);
                    }

                    //Tech Per Category
                    $techPerCategoryArray = array();
                    $techPerCategoryArray[0] = array();
                    $techPerCategoryArray[1] = array();
                    $techPerCategoryOthersCount = 0;
                    $techPerCategoryCounter = 0;
                    if(!request()->dashboard || request()->dashboard == 'All'){
                        $techPerCategoryQuery = App\TechnologyCategory::withCount(['technologies' => function($q){
                                $q->where('approved', '=', 2);
                            }])
                            ->where('technology_categories.approved', '=', 2)
                            ->orderBy('technologies_count', 'desc')
                            ->get();
                    } else {
                        $techPerCategoryQuery = App\TechnologyCategory::withCount(['technologies' => function($q){
                                $q->where('approved', '=', 2);
                            }])
                            ->join('technology_technology_category', 'technology_technology_category.technology_category_id', '=', 'technology_categories.id')
                            ->join('technologies', 'technologies.id', '=', 'technology_technology_category.technology_id')
                            ->join('commodity_technology', 'commodity_technology.technology_id', '=', 'technologies.id')
                            ->join('commodities', 'commodities.id', '=', 'commodity_technology.commodity_id')
                            ->join('sectors', 'sectors.id', '=', 'commodities.id')
                            ->where('sectors.industry_id', '=', $industryID)
                            ->where('technology_categories.approved', '=', 2)
                            ->orderBy('technologies_count', 'desc')
                            ->get();
                    }
                    foreach($techPerCategoryQuery as $item)
                    {
                        if($techPerCategoryCounter < 10 && $item->technologies_count != 0){
                            array_push($techPerCategoryArray[0],$item->name);
                            array_push($techPerCategoryArray[1],$item->technologies_count);
                            $techPerCategoryCounter++;
                        } else {
                            $techPerCategoryOthersCount = $techPerCategoryOthersCount + $item->technologies_count;
                        }
                    }
                    sort($techPerCategoryArray[0]);
                    if($techPerCategoryOthersCount!= 0){
                        array_push($techPerCategoryArray[0],'Others');
                        array_push($techPerCategoryArray[1],$techPerCategoryOthersCount);
                    }

                    //Tech Per Region
                    $techPerRegionArray = array();
                    $techPerRegionArray[0] = array();
                    $techPerRegionArray[1] = array();
                    $techPerRegionOthersCount = 0;
                    $techPerRegionCounter = 0;
                    foreach(DB::table('technologies')->where('approved', '=', 2)->where('applicability_location', '!=' , NULL)->select('applicability_location', DB::raw('count(*) as total'))->groupBy('applicability_location')->orderBy('total', 'desc')->get() as $item){
                        if($counter < 5){
                            array_push($techPerRegionArray[0],$item->applicability_location);
                            array_push($techPerRegionArray[1],$item->total);
                            $counter++;
                        } else {
                            $othersCount = $othersCount + $item->total;
                        }
                    }
                    sort($techPerRegionArray[0]);
                    if($othersCount!= 0){
                        array_push($techPerRegionArray[0],'Others');
                        array_push($techPerRegionArray[1],$othersCount);
                    }
                
            ?>
            <!-- END OF DATA INPUT FOR TECHNOLOGY PER ____ Bar Graph -->
            <!-- DYNAMIC DATA INPUT FOR ADOPTERS PER ____ PIE Graph -->
            <?php
                $adopterChartArray = array();
                $adopterChartArray[0] = array();
                $adopterChartArray[1] = array();
                $othersCount = 0;
                $counter = 0;
                $stringCheck = 0;
                $nullYears = 0;

                //Adopters per Region
                $adoptersPerRegionArray = array();
                $adoptersPerRegionArray[0] = array();
                $adoptersPerRegionArray[1] = array();
                $adoptersPerRegionOthersCount = 0;
                $adoptersPerRegionCounter = 0;
                foreach(App\Adopter::where('approved', '=', 2)->select('region', DB::raw('count(*) as total'))->groupBy('region')->orderBy('total', 'desc')->get() as $item){
                    if($adoptersPerRegionCounter < 10){
                        array_push($adoptersPerRegionArray[0],$item->region);
                        array_push($adoptersPerRegionArray[1],$item->total);
                        $adoptersPerRegionCounter++;
                    } else {
                        $adoptersPerRegionOthersCount = $adoptersPerRegionOthersCount + $item->total;
                    }
                }
                sort($adoptersPerRegionArray[0]);
                if($adoptersPerRegionOthersCount!= 0){
                    array_push($adoptersPerRegionArray[0],'Others');
                    array_push($adoptersPerRegionArray[1],$adoptersPerRegionOthersCount);
                }

                //Adopters per sector
                $adoptersPerSectorArray = array();
                $adoptersPerSectorArray[0] = array();
                $adoptersPerSectorArray[1] = array();
                $adoptersPerSectorOthersCount = 0;
                $adoptersPerSectorCounter = 0;
                $commodityTempArray = array();
                $commodityTempArray[0] = array();
                $commodityTempArray[1] = array();
                foreach(DB::table('commodity_technology')->get() as $ct){
                    foreach(DB::table('adopter_technology')->get() as $at){
                        if($at->technology_id == $ct->technology_id){
                            foreach($commodityTempArray[0] as $key => $val){
                                if(App\Commodity::find($ct->commodity_id)->name == $val){
                                    $commodityTempArray[1][$key] = $commodityTempArray[1][$key] + 1;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                array_push($commodityTempArray[0], App\Commodity::find($ct->commodity_id)->name);
                                array_push($commodityTempArray[1], 1);
                            }
                            $stringCheck = 0;
                        }
                    }
                }
                foreach($commodityTempArray[0] as $keyComm => $valComm){
                    foreach(App\Commodity::where('approved', '=', 2)->get() as $itemCommodity){
                        $sectorID = App\Commodity::where('name', '=', $valComm)->first()->sector_id;
                        if($valComm == $itemCommodity->name){
                            foreach($adoptersPerSectorArray[0] as $keySector => $valSector){
                                if(App\Sector::find($sectorID)->name == $valSector){
                                    $adoptersPerSectorArray[1][$keySector] = $adoptersPerSectorArray[1][$keySector] + $commodityTempArray[1][$keyComm];
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($adoptersPerSectorCounter < 10){
                                    array_push($adoptersPerSectorArray[0], App\Sector::find($sectorID)->name);
                                    array_push($adoptersPerSectorArray[1], $commodityTempArray[1][$keyComm]);
                                    $adoptersPerSectorCounter++;
                                } else {
                                    $adoptersPerSectorOthersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                }
                sort($adoptersPerSectorArray[0]);
                if($adoptersPerSectorOthersCount!= 0){
                    array_push($adoptersPerSectorArray[0],'Others');
                    array_push($adoptersPerSectorArray[1],$adoptersPerSectorOthersCount);
                }

                //Adopters per Year
                $adoptersPerYearArray = array();
                $adoptersPerYearArray[0] = array();
                $adoptersPerYearArray[1] = array();
                $adoptersPerYearOthersCount = 0;
                $adoptersPerYearCounter = 0;
                foreach(DB::table('adopter_technology')->get() as $at){
                    foreach(App\Technology::where('id', '=', $at->technology_id)->get() as $tech){
                        if($tech->year_developed != null){
                            foreach($adoptersPerYearArray[0] as $key => $val){
                                if((string)$tech->year_developed == $val){
                                    $adoptersPerYearArray[1][$key] = $adoptersPerYearArray[1][$key] + 1;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($adoptersPerYearCounter < 10){
                                    array_push($adoptersPerYearArray[0], $tech->year_developed);
                                    array_push($adoptersPerYearArray[1], 1);
                                    $adoptersPerYearCounter++;
                                } else {
                                    $adoptersPerYearOthersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                }
                sort($adoptersPerYearArray[0]);
                if($adoptersPerYearOthersCount!= 0){
                    array_push($adoptersPerYearArray[0],'Others');
                    array_push($adoptersPerYearArray[1],$adoptersPerYearOthersCount);
                }

                //Adopters per Commodity
                $adoptersPerCommodityArray = array();
                $adoptersPerCommodityArray[0] = array();
                $adoptersPerCommodityArray[1] = array();
                $adoptersPerCommodityOthersCount = 0;
                $adoptersPerCommodityCounter = 0;
                foreach(DB::table('commodity_technology')->get() as $ct){
                    foreach(DB::table('adopter_technology')->get() as $at){
                        if($at->technology_id == $ct->technology_id){
                            foreach($adoptersPerCommodityArray[0] as $key => $val){
                                if(App\Commodity::find($ct->commodity_id)->name == $val){
                                    $adoptersPerCommodityArray[1][$key] = $adoptersPerCommodityArray[1][$key] + 1;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($adoptersPerCommodityCounter < 10){
                                    array_push($adoptersPerCommodityArray[0], App\Commodity::find($ct->commodity_id)->name);
                                    array_push($adoptersPerCommodityArray[1], 1);
                                    $adoptersPerCommodityCounter++;
                                } else {
                                    $adoptersPerCommodityOthersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                }
                sort($adoptersPerCommodityArray[0]);
                if($adoptersPerCommodityOthersCount!= 0){
                    array_push($adoptersPerCommodityArray[0],'Others');
                    array_push($adoptersPerCommodityArray[1],$adoptersPerCommodityOthersCount);
                }
                    
                //Adopters per Agency
                $adoptersPerAgencyArray = array();
                $adoptersPerAgencyArray[0] = array();
                $adoptersPerAgencyArray[1] = array();
                $adoptersPerAgencyOthersCount = 0;
                $adoptersPerAgencyCounter = 0;
                foreach(DB::table('agency_technology')->get() as $ot){
                    foreach(DB::table('adopter_technology')->get() as $at){
                        if($at->technology_id == $ot->technology_id){
                            foreach($adoptersPerAgencyArray[0] as $key => $val){
                                if(App\Agency::find($ot->agency_id)->name == $val){
                                    $adoptersPerAgencyArray[1][$key] = $adoptersPerAgencyArray[1][$key] + 1;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($adoptersPerAgencyCounter < 10){
                                    array_push($adoptersPerAgencyArray[0], App\Agency::find($ot->agency_id)->name);
                                    array_push($adoptersPerAgencyArray[1], 1);
                                    $adoptersPerAgencyCounter++;
                                } else {
                                    $adoptersPerAgencyOthersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                }
                sort($adoptersPerAgencyArray[0]);
                if($adoptersPerAgencyOthersCount!= 0){
                    array_push($adoptersPerAgencyArray[0],'Others');
                    array_push($adoptersPerAgencyArray[1],$adoptersPerAgencyOthersCount);
                }

                //Adopters per Category
                $adoptersPerCategoryArray = array();
                $adoptersPerCategoryArray[0] = array();
                $adoptersPerCategoryArray[1] = array();
                $adoptersPerCategoryOthersCount = 0;
                $adoptersPerCategoryCounter = 0;
                foreach(DB::table('technology_technology_category')->get() as $tct){
                    foreach(DB::table('adopter_technology')->get() as $at){
                        if($at->technology_id == $tct->technology_id){
                            foreach($adoptersPerCategoryArray[0] as $key => $val){
                                if(App\TechnologyCategory::where('id', '=', $tct->technology_category_id)->first()->name == $val){
                                    $adoptersPerCategoryArray[1][$key] = $adoptersPerCategoryArray[1][$key] + 1;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($adoptersPerCategoryCounter < 10){
                                    array_push($adoptersPerCategoryArray[0], App\TechnologyCategory::where('id', '=', $tct->technology_category_id)->first()->name);
                                    array_push($adoptersPerCategoryArray[1], 1);
                                    $adoptersPerCategoryCounter++;
                                } else {
                                    $adoptersPerCategoryOthersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                }
                sort($adoptersPerCategoryArray[0]);
                if($adoptersPerCategoryOthersCount!= 0){
                    array_push($adoptersPerCategoryArray[0],'Others');
                    array_push($adoptersPerCategoryArray[1],$adoptersPerCategoryOthersCount);
                }
                
            ?>
             <!-- END DYNAMIC DATA INPUT FOR ADOPTERS PER ____ PIE Graph -->
             <!-- DYNAMIC DATA INPUT FOR AMOUNT FUNDED PER ____ --> 
            <?php
                $fundedChartArray = array();
                $fundedChartArray[0] = array();
                $fundedChartArray[1] = array();
                $fundedTempArray = array();
                $fundedTempArray[0] = array();
                $fundedTempArray[1] = array();
                $othersCount = 0;
                $counter = 0;
                $stringCheck = 0;
                $nullYears = 0;

                //Amount funded per year
                $fundedPerYearArray = array();
                $fundedPerYearArray[0] = array();
                $fundedPerYearArray[1] = array();
                $fundedPerYearOthersCount = 0;
                $fundedPerYearCounter = 0;
                foreach(DB::table('technologies')->where('approved', '=', 2)->get() as $tech){
                    foreach(DB::table('r_d_results')->where('technology_id', '=', $tech->id)->get() as $rd){
                        if($rd->cost != 0){
                            foreach($fundedPerYearArray[0] as $key => $val){
                                if($tech->year_developed == $val){
                                    $fundedPerYearArray[1][$key] = $fundedPerYearArray[1][$key] + (int)$rd->cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($fundedPerYearCounter < 10){
                                    array_push($fundedPerYearArray[0], $tech->year_developed);
                                    array_push($fundedPerYearArray[1], (int)$rd->cost/1000000);
                                    $fundedPerYearCounter++;
                                } else {
                                    $fundedPerYearOthersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                    if($tech->basic_research_cost != 0 || $tech->applied_research_cost != 0){
                        foreach($fundedPerYearArray[0] as $key => $val){
                            if($tech->year_developed == $val){
                                $fundedPerYearArray[1][$key] = $fundedPerYearArray[1][$key] + (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000;
                                $stringCheck = 1;
                            }
                        }
                        if($stringCheck == 0){
                            if($fundedPerYearCounter < 10){
                                array_push($fundedPerYearArray[0], $tech->year_developed);
                                array_push($fundedPerYearArray[1], (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000);
                                $fundedPerYearCounter++;
                            } else {
                                $fundedPerYearOthersCount++;
                            }
                        }
                        $stringCheck = 0;
                    }
                }
                sort($fundedPerYearArray[0]);
                if($fundedPerYearOthersCount!= 0){
                    array_push($fundedPerYearArray[0],'Others');
                    array_push($fundedPerYearArray[1],$othersCount);
                }
                    //Amount funded per Commodity
                    $fundedPerCommodityArray = array();
                    $fundedPerCommodityArray[0] = array();
                    $fundedPerCommodityArray[1] = array();
                    $fundedPerCommodityOthersCount = 0;
                    $fundedPerCommodityCounter = 0;
                    /*
                    foreach(DB::table('commodity_technology')->get() as $ct){
                            $tech = DB::table('technologies')->where('approved', '=', 2)->where('id', '=', $ct->technology_id)->first();
                            $comm = DB::table('commodities')->where('id', '=', $ct->commodity_id)->first();
                            foreach(DB::table('r_d_results')->where('technology_id', '=', $tech->id)->get() as $rd){
                                if($rd->cost != 0){
                                    foreach($fundedPerCommodityArray[0] as $key => $val){
                                    if($comm->name == $val){
                                        $fundedPerCommodityArray[1][$key] = $fundedPerCommodityArray[1][$key] + (int)$rd->cost/1000000;
                                        $stringCheck = 1;
                                    }
                                }
                                if($stringCheck == 0){
                                    if($fundedPerCommodityCounter < 10){
                                        array_push($fundedPerCommodityArray[0], $comm->name);
                                        array_push($fundedPerCommodityArray[1], (int)$rd->cost/1000000);
                                        $fundedPerCommodityCounter++;
                                    } else {
                                        $fundedPerCommodityOthersCount++;
                                    }
                                }
                                $stringCheck = 0;
                                }
                            }
                            if($tech->basic_research_cost != 0 || $tech->applied_research_cost != 0){
                                foreach($fundedPerCommodityArray[0] as $key => $val){
                                    if($comm->name == $val){
                                        $fundedPerCommodityArray[1][$key] = $fundedPerCommodityArray[1][$key] + (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000;
                                        $stringCheck = 1;
                                    }
                                }
                                if($stringCheck == 0){
                                    if($fundedPerCommodityCounter < 10){
                                        array_push($fundedPerCommodityArray[0], $comm->name);
                                        array_push($fundedPerCommodityArray[1], (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000);
                                        $fundedPerCommodityCounter++;
                                    } else {
                                        $fundedPerCommodityOthersCount++;
                                    }
                                }
                                $stringCheck = 0;
                            }
                        }*/
                        //Amount funded per Sector
                        $fundedPerSectorArray = array();
                        $fundedPerSectorArray[0] = array();
                        $fundedPerSectorArray[1] = array();
                        $fundedPerSectorOthersCount = 0;
                        $fundedPerSectorCounter = 0;
                        /*
                        foreach(DB::table('commodity_technology')->get() as $ct){
                            $tech = DB::table('technologies')->where('approved', '=', 2)->where('id', '=', $ct->technology_id)->first();
                            $comm = DB::table('commodities')->where('id', '=', $ct->commodity_id)->first();
                            $sect = App\Sector::where('id', '=', $comm->sector_id)->first();
                            foreach(DB::table('r_d_results')->where('technology_id', '=', $tech->id)->get() as $rd){
                                if($rd->cost != 0){
                                    foreach($fundedPerSectorArray[0] as $key => $val){
                                    if($sect->name == $val){
                                        $fundedPerSectorArray[1][$key] = $fundedPerSectorArray[1][$key] + (int)$rd->cost/1000000;
                                        $stringCheck = 1;
                                    }
                                }
                                if($stringCheck == 0){
                                    if($fundedPerSectorCounter < 10){
                                        array_push($fundedPerSectorArray[0], $sect->name);
                                        array_push($fundedPerSectorArray[1], (int)$rd->cost/1000000);
                                        $fundedPerSectorCounter++;
                                    } else {
                                        $fundedPerSectorOthersCount++;
                                    }
                                }
                                $stringCheck = 0;
                                }
                            }
                            if($tech->basic_research_cost != 0 || $tech->applied_research_cost != 0){
                                foreach($fundedPerSectorArray[0] as $key => $val){
                                    if($sect->name == $val){
                                        $fundedPerSectorArray[1][$key] = $fundedPerSectorArray[1][$key] + (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000;
                                        $stringCheck = 1;
                                    }
                                }
                                if($stringCheck == 0){
                                    if($fundedPerSectorCounter < 10){
                                        array_push($fundedPerSectorArray[0], $sect->name);
                                        array_push($fundedPerSectorArray[1], (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000);
                                        $fundedPerSectorCounter++;
                                    } else {
                                        $fundedPerSectorOthersCount++;
                                    }
                                }
                                $stringCheck = 0;
                            }
                        }
                    */
                    //Amount funded per Region
                    $fundedPerRegionArray = array();
                    $fundedPerRegionArray[0] = array();
                    $fundedPerRegionArray[1] = array();
                    $fundedPerRegionOthersCount = 0;
                    $fundedPerRegionCounter = 0;
                    foreach(DB::table('technologies')->get() as $tech){
                        foreach(DB::table('r_d_results')->where('technology_id', '=', $tech->id)->get() as $rd){
                            if($rd->cost != 0){
                                foreach($fundedPerRegionArray[0] as $key => $val){
                                if($tech->applicability_location == $val){
                                    $fundedPerRegionArray[1][$key] = $fundedPerRegionArray[1][$key] + (int)$rd->cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($fundedPerRegionCounter < 10){
                                    array_push($fundedPerRegionArray[0], $tech->applicability_location);
                                    array_push($fundedPerRegionArray[1], (int)$rd->cost/1000000);
                                    $fundedPerRegionCounter++;
                                } else {
                                    $fundedPerRegionOthersCount++;
                                }
                            }
                            $stringCheck = 0;
                            }
                        }
                        if($tech->basic_research_cost != 0 || $tech->applied_research_cost != 0){
                            foreach($fundedPerRegionArray[0] as $key => $val){
                                if($tech->applicability_location == $val){
                                    $fundedPerRegionArray[1][$key] = $fundedPerRegionArray[1][$key] + (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($fundedPerRegionCounter < 10){
                                    array_push($fundedPerRegionArray[0], $tech->applicability_location);
                                    array_push($fundedPerRegionArray[1], (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000);
                                    $fundedPerRegionCounter++;
                                } else {
                                    $fundedPerRegionOthersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                    sort($fundedPerRegionArray[0]);
                    if($fundedPerRegionOthersCount!= 0){
                        array_push($fundedPerRegionArray[0],'Others');
                        array_push($fundedPerRegionArray[1], $fundedPerRegionOthersCount);
                    }
                    
                    //Amount funded per Technology Category
                    $fundedPerCategoryArray = array();
                    $fundedPerCategoryArray[0] = array();
                    $fundedPerCategoryArray[1] = array();
                    $fundedPerCategoryOthersCount = 0;
                    $fundedPerCategoryCounter = 0;
                    foreach(DB::table('technology_technology_category')->get() as $tct){
                        $tech = DB::table('technologies')->where('id', '=', $tct->technology_id)->first();
                        $categ = DB::table('technology_categories')->where('id', '=', $tct->technology_category_id)->first();
                        foreach(DB::table('r_d_results')->where('technology_id', '=', $tech->id)->get() as $rd){
                            if($rd->cost != 0){
                                foreach($fundedPerCategoryArray[0] as $key => $val){
                                if($categ->name == $val){
                                    $fundedPerCategoryArray[1][$key] = $fundedPerCategoryArray[1][$key] + (int)$rd->cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($fundedPerCategoryCounter < 10){
                                    array_push($fundedPerCategoryArray[0], $categ->name);
                                    array_push($fundedPerCategoryArray[1], (int)$rd->cost/1000000);
                                    $fundedPerCategoryCounter++;
                                } else {
                                    $fundedPerCategoryOthersCount++;
                                }
                            }
                            $stringCheck = 0;
                            }
                        }
                        if($tech->basic_research_cost != 0 || $tech->applied_research_cost != 0){
                            foreach($fundedPerCategoryArray[0] as $key => $val){
                                if($categ->name == $val){
                                    $fundedPerCategoryArray[1][$key] = $fundedPerCategoryArray[1][$key] + (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($fundedPerCategoryCounter < 10){
                                    array_push($fundedPerCategoryArray[0], $categ->name);
                                    array_push($fundedPerCategoryArray[1], (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000);
                                    $fundedPerCategoryCounter++;
                                } else {
                                    $fundedPerCategoryOthersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                    sort($fundedPerCategoryArray[0]);
                    if($fundedPerCategoryOthersCount!= 0){
                        array_push($fundedPerCategoryArray[0],'Others');
                        array_push($fundedPerCategoryArray[1], $fundedPerCategoryOthersCount);
                    }
                    
                    //Amount funded per Agency
                    $fundedPerAgencyArray = array();
                    $fundedPerAgencyArray[0] = array();
                    $fundedPerAgencyArray[1] = array();
                    $fundedPerAgencyOthersCount = 0;
                    $fundedPerAgencyCounter = 0;
                    foreach(DB::table('agency_technology')->get() as $at){
                        $tech = DB::table('technologies')->where('id', '=', $at->technology_id)->first();
                        $agenc = DB::table('agencies')->where('id', '=', $at->agency_id)->first();
                        foreach(DB::table('r_d_results')->where('technology_id', '=', $tech->id)->get() as $rd){
                            if($rd->cost != 0){
                                foreach($fundedPerAgencyArray[0] as $key => $val){
                                if($agenc->name == $val){
                                    $fundedPerAgencyArray[1][$key] = $fundedPerAgencyArray[1][$key] + (int)$rd->cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($fundedPerAgencyCounter < 10){
                                    array_push($fundedPerAgencyArray[0], $agenc->name);
                                    array_push($fundedPerAgencyArray[1], (int)$rd->cost/1000000);
                                    $fundedPerAgencyCounter++;
                                } else {
                                    $fundedPerAgencyOthersCount++;
                                }
                            }
                            $stringCheck = 0;
                            }
                        }
                        if($tech->basic_research_cost != 0 || $tech->applied_research_cost != 0){
                            foreach($fundedPerAgencyArray[0] as $key => $val){
                                if($agenc->name == $val){
                                    $fundedPerAgencyArray[1][$key] = $fundedPerAgencyArray[1][$key] + (int)$tech->basic_research_cost + (int)$tech->applied_research_cost;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($fundedPerAgencyCounter < 10){
                                    array_push($fundedPerAgencyArray[0], $agenc->name);
                                    array_push($fundedPerAgencyArray[1], (int)$tech->basic_research_cost + (int)$tech->applied_research_cost);
                                    $fundedPerAgencyCounter++;
                                } else {
                                    $fundedPerAgencyOthersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                    sort($fundedPerRegionArray[0]);
            ?>
             <!-- END DYNAMIC DATA INPUT FOR AMOUNT FUNDED PER ____ --> 
        </div> 
    </div>

<!-- Agency View Modal -->
    @foreach(App\Agency::all() as $agency)
        <div class="modal fade" id="viewAgencyModal-{{$agency->id}}" tabindex="-1" role="dialog" aria-labelledby="viewAgencyModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="font-weight:900" class="modal-title">Technology Owner</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <b>Name</b><br>
                        {{$agency->name}}<br><br>
                        <div class="row">
                            @if($agency->region != null)
                            <div class="col-sm-3">
                                <b>Region</b><br>
                                {{$agency->region}}
                            </div>
                            @endif
                            @if($agency->province != null)
                            <div class="col-sm-3">
                                <b>Province</b><br>
                                {{$agency->province}}
                            </div>
                            @endif
                            @if($agency->municipality != null)
                            <div class="col-sm-3">
                                <b>Municipality</b><br>
                                {{$agency->municipality}}
                            </div>
                            @endif
                            @if($agency->district != null)
                            <div class="col-sm-3">
                                <b>District</b><br>
                                {{$agency->district}}
                            </div>
                            @endif
                        </div><br>
                        <div class="row">
                            @if($agency->phone != null)
                            <div class="col-sm-3">
                                <b>Phone</b><br>
                                {{$agency->phone}}
                            </div>
                            @endif
                            @if($agency->fax != null)
                            <div class="col-sm-3">
                                <b>Fax</b><br>
                                {{$agency->fax}}
                            </div>
                            @endif
                            @if($agency->email != null)
                            <div class="col-sm-4">
                                <b>Email</b><br>
                                {{$agency->email}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
<!-- END of Agency View Modal -->

<!-- Generator View Modal -->
    @foreach(App\Generator::all() as $generator)
    <div class="modal fade" id="viewGeneratorModal-{{$generator->id}}" tabindex="-1" role="dialog" aria-labelledby="viewGeneratorModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="font-weight:900" class="modal-title">Technology Generator</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b>Name</b><br>
                    {{$generator->name}}<br><br>
                    <b>Latest Agency Affiliation</b><br>
                    {{$generator->agency->find(1)->name}}<br><br>
                    @if($generator->address != null)
                    <b>Address</b><br>
                    {{$generator->address}}<br><br>
                    @endif
                    <div class="row">
                        @if($generator->phone != null)
                        <div class="col-sm-3">
                            <b>Phone</b><br>
                            {{$generator->phone}}
                        </div>
                        @endif
                        @if($generator->fax != null)
                        <div class="col-sm-3">
                            <b>Fax</b><br>
                            {{$generator->fax}}
                        </div>
                        @endif
                        @if($generator->email != null)
                        <div class="col-sm-4">
                            <b>Email</b><br>
                            {{$generator->email}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<!-- END of Generator View Modal -->

<!-- Adopter View Modal -->
    @foreach(App\Adopter::all() as $adopter)
    <div class="modal fade" id="viewAdopterModal-{{$adopter->id}}" tabindex="-1" role="dialog" aria-labelledby="viewAdopterModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="font-weight:900" class="modal-title">Technology Adopter</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b>Name</b><br>
                    {{$adopter->name}}<br><br>
                    <b>Adopter Type</b><br>
                    {{$adopter->adopter_type->find(1)->name}}<br><br>
                    <div class="row">
                        @if($adopter->region != null)
                        <div class="col-sm-3">
                            <b>Region</b><br>
                            {{$adopter->region}}
                        </div>
                        @endif
                        @if($adopter->province != null)
                        <div class="col-sm-3">
                            <b>Province</b><br>
                            {{$adopter->province}}
                        </div>
                        @endif
                        @if($adopter->municipality != null)
                        <div class="col-sm-3">
                            <b>Municipality</b><br>
                            {{$adopter->municipality}}
                        </div>
                        @endif
                    </div><br>
                    <div class="row">
                        @if($adopter->phone != null)
                        <div class="col-sm-3">
                            <b>Phone</b><br>
                            {{$adopter->phone}}
                        </div>
                        @endif
                        @if($adopter->fax != null)
                        <div class="col-sm-3">
                            <b>Fax</b><br>
                            {{$adopter->fax}}
                        </div>
                        @endif
                        @if($adopter->email != null)
                        <div class="col-sm-4">
                            <b>Email</b><br>
                            {{$adopter->email}}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<!-- END of Generator View Modal -->

<!-- RDRU View Modal -->
    @foreach(App\RDResult::all() as $r_d_result)
        <div class="modal fade" id="viewRDResultModal-{{$r_d_result->id}}" tabindex="-1" role="dialog" aria-labelledby="viewRDResultModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="font-weight:900" class="modal-title">Technology R&D Result</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <b>RDRU Results Utilization</b><br>
                        {{$r_d_result->utilization}}<br><br>
                        <b>Project Title</b><br>
                        {{$r_d_result->title}}<br><br>
                        <div class="row">
                            @if($r_d_result->funding != null)
                            <div class="col-sm-6">
                                <b>Funding Agency</b><br>
                                {{$r_d_result->funding}}
                            </div>
                            @endif
                            @if($r_d_result->implementing != null)
                            <div class="col-sm-6">
                                <b>Implementing Agency</b><br>
                                {{$r_d_result->implementing}}
                            </div>
                            @endif
                        </div><br>
                        <div class="row">
                            @if($r_d_result->cost != null)
                            <div class="col-sm-3">
                                <b>Project cost</b><br>
                                ₱{{number_format($r_d_result->cost, 2, '.', ',')}}
                            </div>
                            @endif
                            @if($r_d_result->start_date != null)
                            <div class="col-sm-3">
                                <b>Start Date</b><br>
                                {{$r_d_result->start_date}}
                            </div>
                            @endif
                            @if($r_d_result->end_date != null)
                            <div class="col-sm-4">
                                <b>End Date</b><br>
                                {{$r_d_result->end_date}}
                            </div>
                            @endif
                        </div><br>
                        @if($r_d_result->beneficiary_type != null)
                        <b>Type of Beneficiary</b><br>
                        {{$r_d_result->beneficiary_type}}<br><br>
                        @endif
                        @if($r_d_result->beneficiary_name != null)
                        <b>Name of Beneficiaries</b><br>
                        {{$r_d_result->beneficiary_name}}<br><br>
                        @endif
                        <div class="row">
                            @if($r_d_result->beneficiary_region != null)
                            <div class="col-sm-3">
                                <b>Beneficiary Address - Region</b><br>
                                {{$r_d_result->beneficiary_region}}
                            </div>
                            @endif
                            @if($r_d_result->beneficiary_province != null)
                            <div class="col-sm-3">
                                <b>Beneficiary Address - Province</b><br>
                                {{$r_d_result->beneficiary_province}}
                            </div>
                            @endif
                            @if($r_d_result->beneficiary_municipality != null)
                            <div class="col-sm-4">
                                <b>Beneficiary Address - Municipality</b><br>
                                {{$r_d_result->beneficiary_municipality}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
<!-- END of RDRU View Modal -->
       
<!-- Protection Modals -->

    @foreach($techCommodities as $technology)
    <!-- Modal for Patents -->
        @foreach($technology->patents as $patent)
        <div class="modal fade" id="viewPatentModal-{{$patent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="font-weight:900" class="modal-title">Patent</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                                    <div class="col-sm-6">
                                        <b>Application Number</b><br>
                                        {{$patent->application_number}}
                                    </div>
                                    @if($patent->date_of_filing != null)
                                    <div class="col-sm-6">
                                        <b>Date of Filing</b><br>
                                        {{$patent->date_of_filing}}
                                    </div>
                                    @endif
                        </div><br>
                        <div class="row">
                            @if($patent->patent_number != null)
                            <div class="col-sm-4">
                                <b>Patent Number</b><br>
                                {{$patent->patent_number}}
                            </div>
                            @endif
                            @if($patent->registration_date != null)
                            <div class="col-sm-4">
                                <b>Registration Date</b><br>
                                {{$patent->registration_date}}
                            </div>
                            @endif
                            @if($patent->status != null)
                            <div class="col-sm-4">
                                <b>Status</b><br>
                                {{$patent->status}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    <!-- END modal for Patents -->

    <!-- Modal for Utility Model -->
        @foreach($technology->utility_models as $utility_model)
        <div class="modal fade" id="viewUtilityModelModal-{{$utility_model->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="font-weight:900" class="modal-title">Utility Model</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                                    <div class="col-sm-6">
                                        <b>Application Number</b><br>
                                        {{$utility_model->application_number}}
                                    </div>
                                    @if($utility_model->date_of_filing != null)
                                    <div class="col-sm-6">
                                        <b>Date of Filing</b><br>
                                        {{$utility_model->date_of_filing}}
                                    </div>
                                    @endif
                        </div><br>
                        <div class="row">
                            @if($utility_model->um_number != null)
                            <div class="col-sm-4">
                                <b>Utility Model Number</b><br>
                                {{$utility_model->um_number}}
                            </div>
                            @endif
                            @if($utility_model->registration_date != null)
                            <div class="col-sm-4">
                                <b>Registration Date</b><br>
                                {{$utility_model->registration_date}}
                            </div>
                            @endif
                            @if($utility_model->status != null)
                            <div class="col-sm-4">
                                <b>Status</b><br>
                                {{$utility_model->status}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    <!-- END modal for Utility Model -->

    <!-- Modal for Trademark -->
        @foreach($technology->trademarks as $trademark)
        <div class="modal fade" id="viewTrademarkModal-{{$trademark->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="font-weight:900" class="modal-title">Trademark</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                                    <div class="col-sm-6">
                                        <b>Application Number</b><br>
                                        {{$trademark->application_number}}
                                    </div>
                                    @if($trademark->date_of_filing != null)
                                    <div class="col-sm-6">
                                        <b>Date of Filing</b><br>
                                        {{$trademark->date_of_filing}}
                                    </div>
                                    @endif
                        </div><br>
                        <div class="row">
                            @if($trademark->registration_number != null)
                            <div class="col-sm-4">
                                <b>Registration Number</b><br>
                                {{$trademark->registration_number}}
                            </div>
                            @endif
                            @if($trademark->registration_date != null)
                            <div class="col-sm-4">
                                <b>Registration Date</b><br>
                                {{$trademark->registration_date}}
                            </div>
                            @endif
                            @if($trademark->expiration_date != null)
                            <div class="col-sm-4">
                                <b>Expiration Date</b><br>
                                {{$trademark->expiration_date}}
                            </div>
                            @endif
                        </div><br>
                        <div class="row">
                            @if($trademark->status != null)
                            <div class="col-sm-4">
                                <b>Status</b><br>
                                {{$trademark->status}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    <!-- END modal for Trademark -->

    <!-- Modal for Industrial Design -->
        @foreach($technology->industrial_designs as $industrial_design)
        <div class="modal fade" id="viewIndustrialDesignModal-{{$industrial_design->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="font-weight:900" class="modal-title">Industrial Design</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                                    <div class="col-sm-6">
                                        <b>Application Number</b><br>
                                        {{$industrial_design->application_number}}
                                    </div>
                                    @if($industrial_design->date_of_filing != null)
                                    <div class="col-sm-6">
                                        <b>Date of Filing</b><br>
                                        {{$industrial_design->date_of_filing}}
                                    </div>
                                    @endif
                        </div><br>
                        <div class="row">
                            @if($industrial_design->registration_number != null)
                            <div class="col-sm-4">
                                <b>Registration Number</b><br>
                                {{$industrial_design->registration_number}}
                            </div>
                            @endif
                            @if($industrial_design->registration_date != null)
                            <div class="col-sm-4">
                                <b>Registration Date</b><br>
                                {{$industrial_design->registration_date}}
                            </div>
                            @endif
                            @if($industrial_design->status != null)
                            <div class="col-sm-4">
                                <b>Status</b><br>
                                {{$industrial_design->status}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    <!-- END modal for Industrial Design -->

    <!-- Modal for Copyright -->
        @foreach($technology->copyrights as $copyright)
        <div class="modal fade" id="viewCopyrightModal-{{$copyright->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="font-weight:900" class="modal-title">Copyright</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <b>Copyright Owners</b><br>
                                {{$copyright->owners}}
                            </div>
                            @if($copyright->publishers != null)
                            <div class="col-sm-6">
                                <b>Publishers</b><br>
                                {{$copyright->publishers}}
                            </div>
                            @endif
                        </div><br>
                        <div class="row">
                            @if($copyright->date_of_creation != null)
                            <div class="col-sm-4">
                                <b>Date of Creation</b><br>
                                {{$copyright->date_of_creation}}
                            </div>
                            @endif
                            @if($copyright->registration_date != null)
                            <div class="col-sm-4">
                                <b>Date Registered</b><br>
                                {{$copyright->registration_date}}
                            </div>
                            @endif
                            @if($copyright->classes != null)
                            <div class="col-sm-4">
                                <b>Classes</b><br>
                                {{$copyright->classes}}
                            </div>
                            @endif
                        </div><br>
                        <div class="row">
                            @if($copyright->registration_number != null)
                            <div class="col-sm-4">
                                <b>Registration Number</b><br>
                                {{$copyright->registration_number}}
                            </div>
                            @endif
                            @if($copyright->date_of_issuance != null)
                            <div class="col-sm-4">
                                <b>Date of Issuance</b><br>
                                {{$copyright->date_of_issuance}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    <!-- END modal for Copyright -->

    <!-- Modal for Plant Variety Protection -->
        @foreach($technology->plant_variety_protections as $plant_variety_protection)
        <div class="modal fade" id="viewPlantVarietyProtectionModal-{{$plant_variety_protection->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="font-weight:900" class="modal-title">Plant Variety Protection</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <b>Application Number</b><br>
                                {{$plant_variety_protection->application_number}}
                            </div>
                            @if($plant_variety_protection->applicant != null)
                            <div class="col-sm-6">
                                <b>Applicant</b><br>
                                {{$plant_variety_protection->applicant}}
                            </div>
                            @endif
                        </div><br>
                        <div class="row">
                            @if($plant_variety_protection->crop != null)
                            <div class="col-sm-4">
                                <b>Crop</b><br>
                                {{$plant_variety_protection->crop}}
                            </div>
                            @endif
                            @if($plant_variety_protection->denomination != null)
                            <div class="col-sm-4">
                                <b>Proposed Denomination</b><br>
                                {{$plant_variety_protection->denomination}}
                            </div>
                            @endif
                            @if($plant_variety_protection->description_of_variety != null)
                            <div class="col-sm-4">
                                <b>Description of Variety</b><br>
                                {{$plant_variety_protection->description_of_variety}}
                            </div>
                            @endif
                        </div><br>
                        <div class="row">
                            @if($plant_variety_protection->certificate_number != null)
                            <div class="col-sm-4">
                                <b>Certificate Number</b><br>
                                {{$plant_variety_protection->certificate_number}}
                            </div>
                            @endif
                            @if($plant_variety_protection->date_of_issuance != null)
                            <div class="col-sm-4">
                                <b>Date of Issuance</b><br>
                                {{$plant_variety_protection->date_of_issuance}}
                            </div>
                            @endif
                            @if($plant_variety_protection->duration_of_protection != null)
                            <div class="col-sm-4">
                                <b>Duration of Protection</b><br>
                                {{$plant_variety_protection->duration_of_protection}}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    <!-- END modal for Copyright -->
    @endforeach
<!-- End of Protection Modals -->

<!-- TECH VIEW MODAL -->
    @foreach(App\Technology::all() as $tech)
        <div class="modal fade" id="techModal-{{$tech->id}}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content pl-0 pr-0 pl-0">
                    <div id="popup-details-{{$tech->id}}" class="inner-modal pl-3 pr-3"> 
                        <div class="modal-header" style="padding-bottom:8px">
                            <span style="width:100%" class="mt-2">
                                <h4>{{$tech->title}} </h4>
                            <span>
                            <small class="text-muted">
                                @if($tech->applicability_location != null)
                                <i class="fas fa-map-marker-alt"></i> {{$tech->applicability_location}}
                                @endif
                                @if($tech->year_developed != null)
                                    <i class="far fa-calendar-alt ml-2"></i> {{$tech->year_developed}}
                                @endif
                            </small>
                        </div>
                        <div class="modal-body">
                            <b>Description</b><br>
                            <span>{{$tech->description}}</span>
                            @if($tech->significance != NULL)
                                <div class="dropdown-divider mt-3"></div>
                                <b>Significance</b><br>
                                <span>{{$tech->significance}}</span>
                            @endif
                            @if($tech->target_users != NULL)
                                <div class="dropdown-divider mt-3"></div>
                                <b>Target Users</b><br>
                                <span>{{$tech->target_users}}</span>
                            @endif
                            <div class="dropdown-divider mt-3"></div>
                            <b>Technology Applicability - Industry</b><br>
                            @foreach($tech->applicability_industries as $applicability_industry)
                                <span class="ml-3">
                                    • {{$applicability_industry->name}}
                                </span><br>
                            @endforeach
                            <div class="dropdown-divider mt-3"></div>
                            <b>Industry - Sector - Commodity</b><br>
                            @foreach($tech->commodities as $commodity)
                                <span class="ml-3">•
                                    {{ $commodity->sector->industry->name }}
                                    <i class="fas fa-angle-double-right"></i>
                                    {{ $commodity->sector->name }}
                                    <i class="fas fa-angle-double-right"></i>
                                    {{ $commodity->name }}
                                </span><br>
                            @endforeach
                            @if(count($tech->agencies) != 0)
                            <div class="dropdown-divider mt-3"></div>
                            <b>Technology Owner</b><br>
                            @foreach($tech->agencies as $agency)
                                <span class="ml-3">• {{$agency->name}} </span><br>
                            @endforeach
                            @endif
                            @if(count($tech->generators) != 0)
                            <div class="dropdown-divider mt-3"></div>
                            <b>Technology Generator</b><br>
                            @foreach($tech->generators as $generator)
                                <span class="ml-3">• {{$generator->name}} </span><br>
                            @endforeach
                            @endif
                            @if(count($tech->adopters) != 0)
                            <div class="dropdown-divider mt-3"></div>
                            <b>Technology Adopters</b><br>
                            @foreach($tech->adopters as $adopter)
                                <span class="ml-3">• {{$adopter->name}} </span><br>
                            @endforeach
                            @endif
                            @if($tech->basic_research_title != null)
                            <div class="dropdown-divider mt-3"></div>
                            <b>Basic Research</b><br>
                            Project Title - {{$tech->basic_research_title}}<br>
                            Funding Agency - {{$tech->basic_research_funding}}<br>
                            Implementing Agency - {{$tech->basic_research_implementing}}<br>
                            Project Cost - {{$tech->basic_research_cost}}<br>
                            Start date - {{$tech->basic_research_start_date}}<br>
                            End date - {{$tech->basic_research_end_date}}
                            <div class="dropdown-divider mt-3"></div>
                            @endif
                            @if($tech->applied_research_title != null)
                            <b>Applied Research</b><br>
                            Project Title - {{$tech->applied_research_title}}<br>
                            Funding Agency - {{$tech->applied_research_funding}}<br>
                            Implementing Agency - {{$tech->applied_research_implementing}}<br>
                            Project Cost - {{$tech->applied_research_cost}}<br>
                            Start date - {{$tech->basic_research_start_date}}<br>
                            End date - {{$tech->basic_research_end_date}}
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" title="export as PDF file" class="btn btn-primary" onclick="location.href='{{ url('/'.$tech->id.'/printTechPDF') }}'">Save as PDF</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
<!-- END OF TECH VIEW MODAL -->

<!-- Modal for filter by commodity -->
    <div class="modal fade" id="commodityFilterModal" tabindex="-1" role="dialog" aria-labelledby="commodityFilterModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter by Commodities</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['action' => ['PagesController@index'], 'method' => 'GET']) }}
                <div class="modal-body">
                    <!--<div class="form-group">
                        <select name="commodities[]" class="selectpicker form-control" multiple data-actions-box="true" data-live-search="true" title="Choose Commodities">
                            @foreach($sectors as $sector)
                                <optgroup label={{$sector->name}}>
                                    @foreach($commodities->where('sector_id','=',$sector->id) as $commodity)
                                        <option>{{$commodity->name}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </div> -->
                    <div class="form-group">
                        {{Form::label('industry', 'Industry')}}
                        <select name="industry" class="form-control dynamic_create" id="industry" data-dependent="sector">
                            <option value=""> Select Industry </option>
                            @foreach(App\Industry::all() as $industry)
                                <option value="{{$industry->id}}">{{$industry->name}}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="form-group">
                        {{Form::label('sector', 'Sector')}}
                        <select name="sector" class="form-control" id="sector-create">
                            <option value=""> Select Sector </option>
                        </select> 
                    </div>
                    <div class="form-group">
                        {{Form::label('commodity', 'Commodity')}}
                        <select name="sector" class="form-control" id="commodity-create">
                            <option value=""> Select Commodity </option>
                        </select> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Apply Filters', ['class' => 'btn btn-success'])}}
                    {{ Form::close() }}
                    
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL FOR filter by commodity -->

<!-- Survey Modal -->
    <div id="survey-modal">
        <div class="text-center">
            <div class="survey-header">
                <h1>Thanks for visiting!</h1>
            </div>
            <div class="survey-body">
                <h3>By answering this short survey, you'll help us improve our service.</h3><br>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSeMjCI_JZILR2JxD8fK27dw_H1EynvRSoYHLpfXw47ckJYo5A/viewform?usp=sf_link"><button  class="btn btn-success rounded-pill" style="font-size:25px">Take The Survey</button></a><br><br>
                <span class="mt-4 text-muted take-survey" style="text-decoration:none">No, Thank You</span>
            </div>
        </div>
    </div>
<!-- End of Survey Modal -->

<style> 
    .take-survey{
        cursor: pointer;
    }
    .survey-header{
        background-color:rgb(59,74,114);
        height:100px;
        padding:25px;
        margin:auto;
        color:white;
        font-weight:900;
    }
    .survey-body{
        padding:45px;
    }
    #cboxLoadedContent {
    background: #d6d6d6;
    }

    #survey-modal {
    display: none;
    }

    #survey-modal label {
    display: block;
    margin-bottom: 5px;
    }

    #survey-modal input {
    width: 95%;
    }

    /* The sticky class is added to the header with JS when it reaches its scroll position */
    .sticky {
    position: fixed;
    top: 139px;
    z-index:1000;
    width: 100%;
    transition-timing-function: ease-in-out 1s;
    }

    /* Add some top padding to the page content to prevent sudden quick movement (as the header gets a new position at the top of the page (position:fixed and top:0) */
    .content {
        padding-top: 98px;
    }

    .card-hover-overlay {
    transition: 0.5s ease;
    opacity: 0;
    position: absolute;
    background-color: rgba(0, 0, 0,0.75);
    top: 0;
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    }


    .card-overlay-container:hover .card-hover-overlay{
        opacity:1;
    }

    .card-overlay-content{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 5; /* number of lines to show */
        -webkit-box-orient: vertical;
    }
    
    .center-vertically{
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #techCards .tech-card-container:nth-child(4n+1) div .tech-card-color{
        background-color: rgb(1, 197, 237);
    }
    #techCards .tech-card-container:nth-child(4n+2) div .tech-card-color {
        background-color: rgb(255, 206, 16);
    }
    #techCards .tech-card-container:nth-child(4n+3) div .tech-card-color {
        background-color: rgb(241, 86, 64);
    }
    #techCards .tech-card-container:nth-child(4n+4) div .tech-card-color {
        background-color:#01a635;
    }
</style>

@endsection

@section ('scripts')
<script>   
    $(document).ready(function() {
        // init datatable on #example table
        $('.data-table').DataTable();
    });
    $(".list-group-item-action").on('click', function() {
        $(".list-group-item-action").each(function(index) {
            $(this).removeClass("active show");
        });
    })
    var first = "<?php echo $first; ?>";
    var under = "<?php echo $under ?>";
    var under_commodity = "<?php echo $under_commodity ?>"
    if(first != 0){
        $('#industry-'+first+'-collapse').addClass('show');
        $('#collapse-'+under).addClass('show');
        $('#collapse-'+under_commodity).addClass('show');
    }

    $(".dropdown-menu a").click(function(){
        $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
        $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
    });
    $(".take-survey").on("click", function() {
        $.colorbox.close();
    });

    function onPopupOpen() {
        $("#survey-modal").show();
        $("#yurEmail").focus();
    }

    function onPopupClose() {
        $("#survey-modal").hide();
        Cookies.set('colorboxShown', 'yes', {
            expires: 1
        });
        $(".clear-cookie").fadeIn();
        lastFocus.focus();
    }

    function displayPopup() {
        $.colorbox({
            inline: true,
            href: "#survey-modal",
            className: "cta",
            width: 600,
            height: 445,
            onComplete: onPopupOpen,
            onClosed: onPopupClose
        });
    }

    var lastFocus;
    var popupShown = Cookies.get('colorboxShown');

    if (popupShown) {
        //console.log("Cookie found. No action necessary");
        $(".clear-cookie").show();
    } else {
        //console.log("No cookie found. Opening popup in 3 seconds");
        $(".clear-cookie").hide();
        setTimeout(function() {
            lastFocus = document.activeElement;
            displayPopup();
        }, 3000);
    }
    $('.toggle-item').click(function() {
        $('.toggle-item').removeClass('active');
        $(this).addClass('active');
    });
    $(document).on('click', '.dropdown-menu li a', function() {
        $('#datebox').val($(this).html());
    }); 
    $('.dynamic_create').change(function(){
        if($(this).val() != ''){
            var select = $(this).attr('id');
            var select = select+'_id';
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var identifier = $(this).data('identifier');
            //console.log(identifier);
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('fetchDependent') }}",
                method:"POST",
                data:{select:select, value:value, _token:_token, dependent:dependent},
                success:function(result){
                    $('#sector-create').html(result);
                }
            })
        }
    });

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };

    var view = getUrlParameter('view');
    if(view == 'dashboardView'){
        let techPerSector = new Chart(document.getElementById('techPerSector').getContext('2d'), {
            type:'bar',
            data:{
                labels: @php echo json_encode($techPerSectorArray[0]);@endphp,
                datasets:[{
                    label: 'Number of Technologies',
                    data: @php echo json_encode($techPerSectorArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(255,99,132,1)',
                        'rgba(54,38,195,1)',
                        'rgba(108,21,105,1)',
                        'rgba(169,201,51,1)',
                        'rgba(20,21,20,1)',
                        'rgb(213,213,213)', 
                        'rgb(168,254,56)',
                        'rgb(182,11,201)',
                        'rgb(60,193,255)',
                        'rgb(60,105,66)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                legend: {
                    display: false
                },
                responsive:true,
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        }); 
        let techPerCommodityChart = new Chart(document.getElementById('techPerCommodityChart').getContext('2d'), {
            type:'pie',
            data:{
                labels: @php echo json_encode($techPerCommodityArray[0]);@endphp,
                datasets:[{
                    label: 'Number of Technologies',
                    data: @php echo json_encode($techPerCommodityArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(255,99,132,1)',
                        'rgba(54,38,195,1)',
                        'rgba(108,21,105,1)',
                        'rgba(169,201,51,1)',
                        'rgba(20,21,20,1)',
                        'rgb(213,213,213)',
                        'rgb(168,254,56)', 
                        'rgb(182,11,201)',
                        'rgb(60,193,255)',
                        'rgb(60,105,66)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
            }
        }); 
        let techPerYearChart = new Chart(document.getElementById('techPerYearChart').getContext('2d'), {
            type:'line',
            data:{
                labels: @php echo json_encode($techPerYearArray[0]);@endphp,
                datasets:[{
                    label: 'Number of Technologies',
                    data: @php echo json_encode($techPerYearArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(20,99,20,1)',
                        'rgba(54,38,195,1)',
                        'rgba(108,21,105,1)',
                        'rgba(169,201,51,1)',
                        'rgba(20,21,20,1)',
                        'rgb(213,213,213)',
                        'rgb(168,254,56)',
                        'rgb(182,11,201)',
                        'rgb(60,193,255)',
                        'rgb(60,105,66)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                legend: {
                    display: false
                },
                responsive:true,
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        }); 
        let techPerAgencyChart = new Chart(document.getElementById('techPerAgencyChart').getContext('2d'), {
            type:'bar',
            data:{
                labels: @php echo json_encode($techPerAgencyArray[0]);@endphp,
                datasets:[{
                    label: 'Number of Technologies',
                    data: @php echo json_encode($techPerAgencyArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(5,99,255,1)',
                        'rgba(54,38,195,1)',
                        'rgba(108,21,105,1)',
                        'rgba(169,201,51,1)',
                        'rgba(20,21,20,1)',
                        'rgb(213,213,213)',     
                        'rgb(168,254,56)',
                        'rgb(182,11,201)',
                        'rgb(60,193,255)',
                        'rgb(60,105,66)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                legend: {
                    display: false
                },
                responsive:true,
                scales: {
                    xAxes: [{
                        ticks: {
                            callback: function(value) {
                                return value.substr(0, 10) + '...';//truncate
                            },
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });
        let techPerCategoryChart = new Chart(document.getElementById('techPerCategoryChart').getContext('2d'), {
            type:'bar',
            data:{
                labels: @php echo json_encode($techPerCategoryArray[0]);@endphp,
                datasets:[{
                    label: 'Number of Technologies',
                    data: @php echo json_encode($techPerCategoryArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(72,255,132,1)',
                        'rgba(54,38,195,1)',
                        'rgba(108,21,105,1)',
                        'rgba(169,201,51,1)',
                        'rgba(20,21,20,1)',
                        'rgb(213,213,213)',
                        'rgb(168,254,56)',                
                        'rgb(182,11,201)',    
                        'rgb(60,193,255)',   
                        'rgb(60,105,66)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                legend: {
                    display: false
                },
                responsive:true,
                scales: {
                    xAxes: [{
                        ticks: {
                            callback: function(value) {
                                return value.substr(0, 10) + '...';//truncate
                            },
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        }); 
        let techPerRegionChart = new Chart(document.getElementById('techPerRegionChart').getContext('2d'), {
            type:'pie',
            data:{
                labels: @php echo json_encode($techPerRegionArray[0]);@endphp,
                datasets:[{
                    label: 'Number of Technologies',
                    data: @php echo json_encode($techPerRegionArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(106,99,132,1)',
                        'rgba(54,38,195,1)',
                        'rgba(108,21,105,1)',
                        'rgba(169,201,51,1)',
                        'rgba(20,21,20,1)',
                        'rgb(213,213,213)',              
                        'rgb(168,254,56)',                      
                        'rgb(182,11,201)',                      
                        'rgb(60,193,255)',                    
                        'rgb(60,105,66)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
            }
        }); 
        let adoptersPerSectorChart = new Chart(document.getElementById('adoptersPerSectorChart').getContext('2d'), {
            type:'doughnut',
            data:{
                labels: @php echo json_encode($adoptersPerSectorArray[0]);@endphp,
                datasets:[{
                    label: 'Number of Technologies',
                    data: @php echo json_encode($adoptersPerSectorArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(8,99,132,1)',
                        'rgba(54,38,8,1)',
                        'rgba(9,21,5,1)',
                        'rgba(3,201,51,1)',
                        'rgba(210,7,100,1)',
                        'rgba(31,7,100,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
            }
        });
        let adoptersPerCommodityChart = new Chart(document.getElementById('adoptersPerCommodityChart').getContext('2d'), {
            type:'bar',
            data:{
                labels: @php echo json_encode($adoptersPerCommodityArray[0]);@endphp,
                datasets:[{
                    label: 'Number of Technologies',
                    data: @php echo json_encode($adoptersPerCommodityArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(8,99,132,1)',
                        'rgba(54,38,8,1)',
                        'rgba(9,21,5,1)',
                        'rgba(3,201,51,1)',
                        'rgba(210,7,100,1)',
                        'rgba(31,7,100,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
                scales: {
                    yAxes: [{
                        ticks: {
                        reverse: false,
                        min: 0,
                        stepSize: 1
                        },
                    }]
                }
            },

        });
        let adoptersPerYearChart = new Chart(document.getElementById('adoptersPerYearChart').getContext('2d'), {
            type:'line',
            data:{
                labels: @php echo json_encode($adoptersPerYearArray[0]);@endphp,
                datasets:[{
                    label: 'Number of Technologies',
                    data: @php echo json_encode($adoptersPerYearArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(8,99,132,1)',
                        'rgba(54,38,8,1)',
                        'rgba(9,21,5,1)',
                        'rgba(3,201,51,1)',
                        'rgba(210,7,100,1)',
                        'rgba(31,7,100,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });
        let adoptersPerAgencyChart = new Chart(document.getElementById('adoptersPerAgencyChart').getContext('2d'), {
            type:'bar',
            data:{
                labels: @php echo json_encode($adoptersPerAgencyArray[0]);@endphp,
                datasets:[{
                    label: 'Number of Technologies',
                    data: @php echo json_encode($adoptersPerAgencyArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(8,99,132,1)',
                        'rgba(54,38,8,1)',
                        'rgba(9,21,5,1)',
                        'rgba(3,201,51,1)',
                        'rgba(210,7,100,1)',
                        'rgba(31,7,100,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
                scales: {
                    xAxes: [{
                        ticks: {
                            callback: function(value) {
                                return value.substr(0, 10) + '...';//truncate
                            },
                        }
                    }],
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });
        let adoptersPerCategoryChart = new Chart(document.getElementById('adoptersPerCategoryChart').getContext('2d'), {
            type:'doughnut',
            data:{
                labels: @php echo json_encode($adoptersPerCategoryArray[0]);@endphp,
                datasets:[{
                    label: 'Number of Technologies',
                    data: @php echo json_encode($adoptersPerCategoryArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(8,99,132,1)',
                        'rgba(54,38,8,1)',
                        'rgba(9,21,5,1)',
                        'rgba(3,201,51,1)',
                        'rgba(210,7,100,1)',
                        'rgba(31,7,100,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
            }
        });
        let adoptersPerRegionChart = new Chart(document.getElementById('adoptersPerRegionChart').getContext('2d'), {
            type:'line',
            data:{
                labels: @php echo json_encode($adoptersPerRegionArray[0]);@endphp,
                datasets:[{
                    label: 'Number of Technologies',
                    data: @php echo json_encode($adoptersPerRegionArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(8,99,132,1)',
                        'rgba(54,38,8,1)',
                        'rgba(9,21,5,1)',
                        'rgba(3,201,51,1)',
                        'rgba(210,7,100,1)',
                        'rgba(31,7,100,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });
        /*
        let fundedPerSectorChart = new Chart(document.getElementById('fundedPerSectorChart').getContext('2d'), {
            type:'line',
            data:{
                labels: @php echo json_encode($fundedPerSectorArray[0]);@endphp,
                datasets:[{
                    label: 'Amount of Funds in Millions',
                    data: @php echo json_encode($fundedPerSectorArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(85,32,200,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });
        let fundedPerCommodityChart = new Chart(document.getElementById('fundedPerCommodityChart').getContext('2d'), {
            type:'line',
            data:{
                labels: @php echo json_encode($fundedPerCommodityArray[0]);@endphp,
                datasets:[{
                    label: 'Amount of Funds in Millions',
                    data: @php echo json_encode($fundedPerCommodityArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(85,32,200,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });*/
        let fundedPerYearChart = new Chart(document.getElementById('fundedPerYearChart').getContext('2d'), {
            type:'line',
            data:{
                labels: @php echo json_encode($fundedPerYearArray[0]);@endphp,
                datasets:[{
                    label: 'Amount of Funds in Millions',
                    data: @php echo json_encode($fundedPerYearArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(85,32,200,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }]
                }
            }
        });
        let fundedPerAgencyChart = new Chart(document.getElementById('fundedPerAgencyChart').getContext('2d'), {
            type:'line',
            data:{
                labels: @php echo json_encode($fundedPerAgencyArray[0]);@endphp,
                datasets:[{
                    label: 'Amount of Funds in Millions',
                    data: @php echo json_encode($fundedPerAgencyArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(85,32,200,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        ticks: {
                            callback: function(value) {
                                return value.substr(0, 10) + '...';//truncate
                            },
                        }
                    }]
                }
            }
        });
        let fundedPerCategoryChart = new Chart(document.getElementById('fundedPerCategoryChart').getContext('2d'), {
            type:'line',
            data:{
                labels: @php echo json_encode($fundedPerCategoryArray[0]);@endphp,
                datasets:[{
                    label: 'Amount of Funds in Millions',
                    data: @php echo json_encode($fundedPerCategoryArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(85,32,200,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        ticks: {
                            callback: function(value) {
                                return value.substr(0, 10) + '...';//truncate
                            },
                        }
                    }],
                }
            }
        });
        let fundedPerRegionChart = new Chart(document.getElementById('fundedPerRegionChart').getContext('2d'), {
            type:'line',
            data:{
                labels: @php echo json_encode($fundedPerRegionArray[0]);@endphp,
                datasets:[{
                    label: 'Amount of Funds in Millions',
                    data: @php echo json_encode($fundedPerRegionArray[1]);@endphp,
                    backgroundColor:[
                        'rgba(85,32,200,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
                maintainAspectRatio: false,
            }
        });
    }
</script>

<style>
    .nav-link{
        color:#495057 !important;
    }
    .nav-link.active{
        color:black !important;
    }
    .clean-anchor{
        text-decoration: none !important;
        color:inherit !important;
    }
</style>
@endsection