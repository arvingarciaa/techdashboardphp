@extends('layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb pb-0" style="background-color:transparent">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">km4aanr</a></li>
        <li class="breadcrumb-item" style="color:white" aria-current="page">Technology Dashboard</li>
    </ol>
@endsection
@section('content')
<div class="container-fluid">

@include('inc.messages')
</div>
    <div class="icon-bar" style="z-index:1000">
        <a href="#" class="sarai"><img src="https://i.imgur.com/TRr6O4s.png" height="30" width="30"></a> 
        <a href="#" class="facebook"><i class="fab fa-facebook"></i></a> 
        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a> 
        <a href="#" class="email"><i class="fas fa-envelope"></i></a>
        <a href="#" class="youtube"><i class="fab fa-youtube"></i></a> 
    </div>
    <div class="container-fluid px-0">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
            </ol>
          <div class="carousel-inner" style="max-height:700px;">
            @foreach($carouselItems as $carousel_item)
            <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                <img class="card-img-top" src="/storage/page_images/{{$carousel_item->banner}}" width="100%" style="object-fit: cover; max-height:700px;min-height:450px">
                <div class="carousel-overlay px-3">
                    <span>
                        <h1 class="carousel-title font-weight-bold" style="color:white;">
                            {{$carousel_item->title}}
                        </h1>
                        <h2 class="carousel-subtitle" style="color:white">
                            {{$carousel_item->subtitle}}
                        </h2>
                        <a href="{{$carousel_item->button_link}}" target="_blank"><button type="button" class=" mt-2 btn btn-primary btn-lg font-weight-bold">Read More</button></a>
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
    </style>
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
                        <div class="card mb-3 shadow" style="flex-wrap:wrap;height:170px;background-color:rgb(253,186,5)">
                            <div class="col-6 pr-0 ml-2" style="display:grid">
                                <div class="w-100 mt-2">
                                    <span class="float-right tech-count-number">{{$industryArray[1][0]}}</span>
                                </div>
                                <div class="w-100">
                                    <span class="tech-count-text">Agricultural Technologies</span>
                                </div>
                            </div>
                            <div class="col-6 pl-0">
                                <img class="tech-count-image" src="https://i.imgur.com/cTl6vKX.png" style="object-fit: contain;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3 shadow" style="flex-wrap:wrap;height:170px;background-color:rgb(41,136,235)">
                            <div class="col-6 pr-0 ml-2" style="display:grid">
                                <div class="w-100 mt-2">
                                    <span class="float-right tech-count-number">{{$industryArray[1][1]}}</span>
                                </div>
                                <div class="w-100">
                                    <span class="tech-count-text">Aquatic Resources</span>
                                </div>
                            </div>
                            <div class="col-6 pl-0">
                                <img class="tech-count-image" src="https://i.imgur.com/ETFwTqr.png" style="object-fit: contain;">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-success mb-3 shadow" style="flex-wrap:wrap;height:170px">
                            <div class="col-6 pr-0 ml-2" style="display:grid">
                                <div class="w-100 mt-2">
                                    <span class="float-right tech-count-number">{{$industryArray[1][2]}}</span>
                                </div>
                                <div class="w-100">
                                    <span class="tech-count-text">Natural Resources</span>
                                </div>
                            </div>
                            <div class="col-6 pl-0">
                                <img class="tech-count-image" src="https://i.imgur.com/d09nMpk.png" style="object-fit: contain;">
                            </div>
                        </div>
                    </div>
                </div>
                <form action="/search" method="GET" role="search" class="mb-2 {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'd-none' : ''}}">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'invisible' : ''}}" name="search" style="font-size:2em"
                            placeholder="Search Technology Title" value={{ isset($results) ? $query : ''}}> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'disabled invisible' : ''}}" style="border:1px solid #ced4da;font-size:2em">
                                <i class="fas fa-search" ></i>
                            </button>
                        </span>
                    </div>
                </form>   
                <div class="row" style="display:contents">
                    <div class="btn-group" style="flex-wrap:wrap">
                        <h4 style="margin-top:6px" class="{{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'invisible' : ''}}">Filter:</h4>
                        <div class="dropdown"> 
                            <button style="font-size:18px" class="btn btn-default dropdown-toggle {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'disabled invisible' : ''}}" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret">{!!request()->location ? '<b>'.request()->location.'</b>' : 'Any Region'!!}</span>
                            </button>
                            <?php 
                                $applicability_locations_filter = App\Technology::select(DB::raw('applicability_location as applicability_location'))->groupBy(DB::raw('applicability_location'))->orderBy('applicability_location','asc')->get();
                            ?>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/#posts-anchor">Any Region</a>
                                @foreach($applicability_locations_filter as $region)
                                    <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium,'sort' => request()->sort, 'sortOrder' => request()->sortOrder, 'year' => request()->year, 'location' => $region->location])}}#posts-anchor">{{$region->applicability_location}}</a>
                                @endforeach
                                </div>
                            <script>
                                $(".dropdown-menu a").click(function(){
                                    $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
                                    $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
                                });
                            </script>
                        </div>
                        <div class="dropdown">
                            <button style="font-size:18px" class="btn btn-default dropdown-toggle {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'disabled invisible' : ''}}" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {!!request()->year ? '<b>'.request()->year.'</b>': 'Any Year'!!}
                            </button>
                            <?php
                                $years_filter = App\Technology::select('year_developed')->groupBy(DB::raw('year_developed'))->orderBy('year_developed','desc')->get();
                            ?>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location,'sort' => request()->sort, 'sortOrder' => request()->sortOrder])}}#posts-anchor">Any Year</a>
                                @foreach($years_filter as $year)
                                    <a class="dropdown-item" style="{!! App\Technology::where('year_developed')->count() == $years_filter->count() ? 'display:none' : ''!!}" href="{!! route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location,'sort' => request()->sort, 'sortOrder' => request()->sortOrder, 'year' => $year->start])!!}#posts-anchor">{{$year->year_developed}}</a>
                                @endforeach
                            </div>
                        </div>
                        <div class="dropdown">
                            <button style="font-size:18px" class="btn btn-default dropdown-toggle {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'disabled invisible' : ''}}" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret {{ request()->sort ? '':'text-muted' }}">{!!request()->sort ? '<b>'.request()->sort.'</b>' : 'SORT BY'!!}</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'year' => request()->year, 'view' => request()->view, 'sortOrder' => request()->sortOrder, 'commodities' => request()->commodities, 'title' == request()->sort ? '' : 'sort=Title'])}}#posts-anchor">TITLE</a>
                                <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'year' => request()->year, 'view' => request()->view, 'sortOrder' => request()->sortOrder, 'commodities' => request()->commodities, 'start' == request()->sort ? '' : 'sort=Start'])}}#posts-anchor">START DATE</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button style="font-size:18px" class="btn btn-default dropdown-toggle {{ request()->view == 'listView' || request()->view == 'dashboardView' || request()->view == 'commodityView' ? 'disabled invisible' : ''}}" type="button" id="dropdownSortBy" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="caret text-muted">ASC</span>
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
                        <a href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'sort' => request()->sort, 'year' => request()->year, 'sortOrder' => request()->sortOrder, 'commodities' => request()->commodities, 'view' => 'gridView'])}}#posts-anchor">
                            <button type="button" data-toggle="tooltip" title="View as Grid" class="btn btn-light {{ request()->view == 'gridView' || !request()->view  ? 'active' : ''}}" autocomplete="off">
                                <i class="fas fa-grip-horizontal"></i>
                            </button>
                        </a>
                        <a href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'sort' => request()->sort, 'year' => request()->year, 'sortOrder' => request()->sortOrder, 'commodities' => request()->commodities, 'view' => 'listView'])}}#posts-anchor">
                            <button type="button" data-toggle="tooltip" title="View as Table" class="btn btn-light {{ request()->view == 'listView' ? 'active' : ''}}" autocomplete="off">
                                <i class="fas fa-table"></i>
                            </button>
                        </a>
                        <a href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'sort' => request()->sort, 'year' => request()->year, 'sortOrder' => request()->sortOrder, 'commodities' => request()->commodities, 'view' => 'dashboardView'])}}#posts-anchor">
                            <button type="button" class="btn btn-light {{ request()->view == 'dashboardView' ? 'active' : ''}}" autocomplete="off">
                                <span>Dashboard</span>
                            </button>
                        </a>
                        <a href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'sort' => request()->sort, 'year' => request()->year, 'sortOrder' => request()->sortOrder, 'commodities' => request()->commodities, 'view' => 'commodityView'])}}#posts-anchor">
                            <button type="button" class="btn btn-light {{ request()->view == 'commodityView' ? 'active' : ''}}" autocomplete="off">
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
                            <table class="table tech-table table-hover">
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
                                                @if($tech->applicability_industry != null)
                                                    {{App\ApplicabilityIndustry::where('id', '=', $tech->applicability_industry)->find(1)->name}}
                                                @endif
                                            </td>
                                            <td>
                                                @foreach($tech->technology_categories as $technology_category)
                                                    @if( $loop->first ) 
                                                        {{ $technology_category->name }}
                                                    @else
                                                        <br> {{ $technology_category->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($tech->commodities as $commodity)
                                                    @if( $loop->first ) 
                                                        <i>{{ $commodity->sector->name }} </i>
                                                    @else
                                                        <i> <br>{{ $commodity->sector->name }} </i>
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
                            <script>
                                $(document).ready(function() {
                                    // init datatable on #example table
                                    $('.table').DataTable();
                                });
                            </script>
                        </div>
                    </div>
                </div>
                @elseif(request()->view == 'gridView' || request()->view == null)
                @if(DB::table('technologies')->where('approved', '=', 2)->count() != 0)
                <div id="techCards" class="row">
                    <?php $techCount = 0; ?>
                    @foreach($techGrid as $tech)
                    <div class="col-md-4 tech-card-container">
                        <div class="card card-overlay-container front-card h-auto shadow rounded">
                            @if( $tech->banner == null)
                            <div class="card-img-top center-vertically px-3 tech-card-color" style="height:200px">
                                <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                    {{$tech->title}}
                                </span>
                            </div>
                            @else
                            <img class="card-img-top center-vertically" src="/storage/page_images/{{$tech->banner}}" style="height:200px;object-fit:cover">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title trail-end font-weight-bold">{{$tech->title}}</h4>
                                <div class="card-text trail-end" style="line-height: 120%;">
                                    <p class="mb-2"><b>{{$tech->year_developed}} · {{$tech->applicability_location}} · {{App\ApplicabilityIndustry::where('id', '=', $tech->applicability_industry)->find(1)->name}}</b></p>
                                    <span>
                                        @foreach($tech->technology_categories as $category)
                                            @if( $loop->first ) 
                                                {{ $category->name }} 
                                            @else
                                                · {{ $category->name }}
                                            @endif  
                                        @endforeach
                                        <br>
                                        @foreach($tech->commodities as $commodity)
                                            @if( $loop->first ) 
                                                {{ $commodity->name }} 
                                            @else
                                                · {{ $commodity->name }}
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
                    </div>
                    <?php $techCount++; ?>
                    @endforeach
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
                            <?php
                                $first = 0;
                                $under = 0;
                                $first_tech = 0;
                            ?>
                            @foreach($industries as $industry)
                                <div id="accordion-industry-{{$industry->id}}">
                                    <div class="card accordion-card" style="width: 100%;">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-header p-0" style="background-color: rgb(109,169,253)">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#industry-{{$industry->id}}-collapse" aria-expanded="false" aria-controls="aquaticCollapse" style="color:white;background: url('/storage/page_images/{{$industry->thumbnail}}') no-repeat;width:100%;height:100px">
                                                    <b style="font-size:20px;text-shadow: 1px 1px rgb(0,0,0);">{{$industry->name}}</b>
                                                </button>
                                            </li>
                                            <div id="industry-{{$industry->id}}-collapse" class="collapse" data-parent="#accordion-industry-{{$industry->id}}">
                                                <?php $hasTechnology = 0?>
                                                @foreach($sectors->where('industry_id', '=', $industry->id) as $sector)
                                                    <div id="accordion-{{strtolower(str_replace(' ', '_', $sector->name))}}">
                                                        <li class="list-group-item list-group-header px-2 py-1" style="background-color: rgb(230, 230, 230);{{$sector->commodities->count() == 0 ? 'display:none;' : ''}}">
                                                            <button class="btn btn-link collapsed inner-collapse" data-toggle="collapse" data-target="#collapse-{{strtolower(str_replace(' ', '_', $sector->name))}}" aria-expanded="false" aria-controls="collapse-{{strtolower(str_replace(' ', '_', $sector->name))}}">
                                                                <span> {{$sector->name }}</span>
                                                            </button>
                                                        </li>
                                                        <div id="collapse-{{strtolower(str_replace(' ', '_', $sector->name))}}" class="collapse" data-parent="#accordion-{{strtolower(str_replace(' ', '_', $sector->name))}}">
                                                            @foreach($commodities->where('sector_id', $sector->id) as $comms)
                                                                <div id="accordion-{{strtolower(str_replace(' ', '_', $comms->name))}}">
                                                                    <div class="list-group" id="list-tab" role="tablist">
                                                                        <button class="btn btn-link collapsed inner-collapse" style="{{$comms->technologies->where('approved', '=', '2')->count() == 0 ? 'display:none;' : ''}} text-align:inherit;padding-left:2.5rem" data-toggle="collapse" data-target="#collapse-{{strtolower(str_replace(' ', '_', $comms->name))}}" aria-expanded="false" aria-controls="collapse-{{strtolower(str_replace(' ', '_', $sector->name))}}">
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
                                color:#495057;
                                font-size:1.125rem;
                                font-weight:500;
                                }

                                a.list-group-item.active:hover{
                                    color:white;
                                }

                                a.list-group-item:hover{
                                color:#495057;
                                text-decoration: none !important;
                                }

                                a.list-group-item:active{
                                text-decoration: none !important;
                                background-color: #3490dc !important;
                                }
                            </style>
                            <script>
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
                            </script>
                        </div>
                        
                        <div class="col-sm-9 py-0 pr-0">
                            <div class="tab-content">
                                @foreach($techCommodities as $technology)
                                    <div class="card tab-pane mt-1 {{$technology->id == $first_tech ? 'active' : ''}}" id="list-{{$technology->id}}" role="tabpanel" >
                                        <div class="card-body row mx-1 mt-0">
                                            <span class="mb-3 mt-3 w-100">
                                                <b><h1>
                                                    {{$technology->title}}
                                                    <button type="button" class="btn btn-primary float-right" onclick="location.href='{{ url('/'.$technology->id.'/printTechPDF') }}'">Save as PDF</button>
                                                </h1></b>
                                                <div class="dropdown-divider mt-4 mb-3"></div>
                                            </span>
                                            
                                            <div class="{{$technology->banner ? 'col-sm-7' : 'col-sm-12'}}">
                                                <small class="text-muted">
                                                    <i class="fas fa-map-marker-alt"></i> {{$technology->applicability_location}}
                                                    @if($technology->applicability_industry != null)<i class="far fa-calendar-alt ml-2"></i> {{App\ApplicabilityIndustry::where('id', '=', $technology->applicability_industry)->find(1)->name}}@endif
                                                </small>
                                                <br>
                                                @foreach($technology->commodities as $commodity)
                                                        {{ $commodity->sector->name }}
                                                        <i class="fas fa-angle-double-right"></i>
                                                        {{ $commodity->name }}<br>
                                                @endforeach
                                                <div class="dropdown-divider mt-3"></div>
                                                <b>Description</b><br>
                                                <span>{{$technology->description}}</span>
                                                <div class="dropdown-divider mt-3"></div>
                                                <b>Significance</b><br>
                                                <span>{{$technology->significance}}</span>
                                                <div class="dropdown-divider mt-3"></div>
                                                <b>Target Users</b><br>
                                                <span>{{$technology->target_users}}</span>
                                                <div class="dropdown-divider mt-3"></div>
                                                <b>Commodities</b><br>
                                                @foreach($technology->commodities as $commodity)
                                                    <span class="ml-3">• {{$commodity->name}} </span><br>
                                                @endforeach
                                            </div>
                                            @if($technology->banner != null)
                                            <div class="col-sm-5">
                                                <img src="/storage/page_images/{{$technology->banner}}" class="card-img-top" width="100%">
                                            </div>
                                            @endif
                                            
                                            <div class="dropdown-divider mt-3"></div>
                                            @if(!Auth::check())
                                            <a type="button" href="/login" class="btn btn-lg btn-block btn-primary mt-3 mx-5" style="font-size:20px">More Information</a>
                                            @endif
                                            @if(Auth::check())
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
                                                @if($technology->patents->count() != 0 || $technology->utility_models->count() != 0 || $technology->industrial_designs->count() != 0 || $technology->copyrights->count() != 0 || $technology->trademarks->count() != 0 || $technology->plant_variety_protections->count() != 0)
                                                <div class="col-sm-12">
                                                    <div class="card p-3" style="width:100%;">
                                                        <h3 class="mt-3 mb-3 font-weight-bold">Protection Type</h3>
                                                        <div class="dropdown-divider mb-3"></div>
                                                        <div class="card-body">
                                                            <table class="table table-bordered table-striped shadow-sm mb-3" id="user_table" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th width="20%">Application Number</th>
                                                                        <th width="50%">Type of Protection</th>
                                                                        <th width="20%">Status</th>
                                                                        <th width="20%">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($technology->patents as $patent)
                                                                        <tr>
                                                                            <td>{!! nl2br(e($patent->application_number)) !!}</td>
                                                                            <td>Patent</td>
                                                                            <td>{{$patent->status}}</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#viewPatentModal-{{$patent->id}}"><i class="far fa-eye"></i> View details</button></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    @foreach($technology->utility_models as $utility_model)
                                                                        <tr>
                                                                            <td>{!! nl2br(e($utility_model->application_number)) !!}</td>
                                                                            <td>Utility Model</td>
                                                                            <td>{{$utility_model->status}}</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#viewUtilityModelModal-{{$utility_model->id}}"><i class="far fa-eye"></i> View details</button></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    @foreach($technology->trademarks as $trademark)
                                                                        <tr>
                                                                            <td>{!! nl2br(e($trademark->application_number)) !!}</td>
                                                                            <td>Trademark</td>
                                                                            <td>{{$trademark->status}}</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#viewTrademarkModal-{{$trademark->id}}"><i class="far fa-eye"></i> View details</button></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    @foreach($technology->industrial_designs as $industrial_design)
                                                                        <tr>
                                                                            <td>{!! nl2br(e($industrial_design->application_number)) !!}</td>
                                                                            <td>Industrial Design</td>
                                                                            <td>{{$industrial_design->status}}</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#viewIndustrialDesignModal-{{$industrial_design->id}}"><i class="far fa-eye"></i> View details</button></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    @foreach($technology->copyrights as $copyright)
                                                                        <tr>
                                                                            <td>-------</td>
                                                                            <td>Copyright</td>
                                                                            <td>{{$copyright->status}}</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#viewCopyrightModal-{{$copyright->id}}"><i class="far fa-eye"></i> View details</button></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    @foreach($technology->plant_variety_protections as $plant_variety_protection)
                                                                        <tr>
                                                                            <td>{!! nl2br(e($plant_variety_protection->certificate_number)) !!}</td>
                                                                            <td>Plant Variety Protection</td>
                                                                            <td>-------</td>
                                                                            <td><button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#viewPlantVarietyProtectionModal-{{$plant_variety_protection->id}}"><i class="far fa-eye"></i> View details</button></td>
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
                                                @if($technology->r_d_results != null)
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
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card shadow ">
                            <div class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h5 class="font-weight-bold my-1 text-primary">Technology Map</h5>
                            </div>
                            <div class="card-body">
                                <div style="height:49.5em; overflow:hidden">
                                    <img src="https://i.imgur.com/y46LyiD.png" alt="" style="width:100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="col-sm-12 row mx-0 px-0">
                            <div class="col-sm-6 pl-0">
                                <div class="card shadow">
                                    <div class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-initial">
                                        <h5 class="font-weight-bold my-1 text-primary">Technology per&nbsp;</h5>
                                        <div class="dropdown" >
                                            <a class="row mx-0" style="color:rgb(24, 106, 248)" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php
                                                    $techBy = str_replace('_', ' ', request()->techBy)
                                                ?>
                                                <h4 class="font-weight-bold my-1">{{request()->techBy ? $techBy : 'Region'}}</h4>
                                                <i class="fas fa-caret-down fa-lg fa-fw" style=margin:auto></i>
                                            </a>
                                            <div id="techByDropdown" class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                                <div class="dropdown-header">Sort by:</div>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy, 'adoptersBy' == request()->adoptersBy ? '' : 'techBy=Sector'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Sector</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy, 'adoptersBy' == request()->adoptersBy ? '' : 'techBy=Commodity'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Commodity</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy, 'adoptersBy' == request()->adoptersBy ? '' : 'techBy=Year'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Year</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy, 'adoptersBy' == request()->adoptersBy ? '' : 'techBy=Implementing_Agency'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Implementing Agency</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy, 'adoptersBy' == request()->adoptersBy ? '' : 'techBy=Category'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Category</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy, 'adoptersBy' == request()->adoptersBy ? '' : 'techBy=Region'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Region</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="techBarChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-6 pr-0">
                                <div class="card shadow">
                                    <div class="card-header chart-header py-3 d-flex flex-row align-items-center">
                                        <h5 class="font-weight-bold my-1 text-primary">Adopters per&nbsp;</h5>
                                        <div class="dropdown">
                                            <a class="row mx-0" style="color:rgb(24, 106, 248)" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php
                                                    $adoptersBy = str_replace('_', ' ', request()->adoptersBy)
                                                ?>
                                                <h4 class="font-weight-bold my-1">{{request()->adoptersBy ? $adoptersBy : 'Sector'}}</h4>
                                                <i class="fas fa-caret-down fa-lg fa-fw" style=margin:auto></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                                <div class="dropdown-header">Sort by:</div>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'adoptersBy' == request()->adoptersBy ? '' : 'adoptersBy=Sector'])}}&view=dashboardView#posts-anchor"  class="dropdown-item" href="#">Sector</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'adoptersBy' == request()->adoptersBy ? '' : 'adoptersBy=Commodity'])}}&view=dashboardView#posts-anchor"  class="dropdown-item" href="#">Commodity</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'adoptersBy' == request()->adoptersBy ? '' : 'adoptersBy=Year'])}}&view=dashboardView#posts-anchor"  class="dropdown-item" href="#">Year</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'adoptersBy' == request()->adoptersBy ? '' : 'adoptersBy=Implementing_Agency'])}}&view=dashboardView#posts-anchor"  class="dropdown-item" href="#">Implementing Agency</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'adoptersBy' == request()->adoptersBy ? '' : 'adoptersBy=Category'])}}&view=dashboardView#posts-anchor"  class="dropdown-item" href="#">Category</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'adoptersBy' == request()->adoptersBy ? '' : 'adoptersBy=Region'])}}&view=dashboardView#posts-anchor"  class="dropdown-item" href="#">Region</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="adopterPieChart"></canvas>
                                    </div>   
                                </div>
                            </div>
                            <div class="col-sm-12 px-0">
                                <div class="card shadow">
                                    <div class="card-header chart-header py-3 d-flex flex-row align-items-center">
                                        <h5 class="font-weight-bold my-1 text-primary">Amount Funded per&nbsp;</h5>
                                        <div class="dropdown">
                                            <a class="row mx-0" style="color:rgb(24, 106, 248)" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php
                                                    $fundedBy = str_replace('_', ' ', request()->fundedBy)
                                                ?>
                                                <h4 class="font-weight-bold my-1">{{request()->fundedBy ? $fundedBy : 'Year'}}</h4>
                                                <i class="fas fa-caret-down fa-lg fa-fw" style=margin:auto></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                                <div class="dropdown-header">Sort by:</div>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Sector'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Sector</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Commodity'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Commodity</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Year'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Year</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Implementing_Agency'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Implementing Agency</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Category'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Category</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Region'])}}&view=dashboardView#posts-anchor" class="dropdown-item" href="#">Region</a>
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
                if(request()->techBy == 'Commodity'){
                    //foreach(>where('approved', '=', 2)->select('name', DB::raw('count(*) as total'))->groupBy('name')->orderBy('total', 'desc')->get() as $item){
                    foreach(App\Commodity::withCount(['technologies' => function($q){
                        $q->where('approved', '=', 2);
                    }])->where('approved', '=', 2)->orderBy('technologies_count', 'desc')->get() as $item)
                    {
                        if($counter < 5 && $item->technologies_count != 0){
                            array_push($techChartArray[0],$item->name);
                            array_push($techChartArray[1],$item->technologies_count);
                            $counter++;
                        } else {
                            $othersCount = $othersCount + $item->total;
                        }
                    }
                    if($othersCount!= 0){
                        array_push($techChartArray[0],'Others');
                        array_push($techChartArray[1],$othersCount);
                    }
                }
                else if(request()->techBy == 'Sector'){
                    foreach(App\Sector::where('approved', '=', 2)->get() as $itemSector){
                        $sectorCommodityCount = 0;
                        foreach(App\Commodity::withCount(['technologies' => function($q){
                            $q->where('approved', '=', 2);
                        }])->where('sector_id', '=', $itemSector->id)->orderBy('technologies_count', 'desc')->where('approved', '=', 2)->get() as $item)
                        {
                            $sectorCommodityCount = $sectorCommodityCount + $item->technologies_count;
                        }
                        if($counter < 5 && $sectorCommodityCount != 0){
                            array_push($techChartArray[0],$itemSector->name);
                            array_push($techChartArray[1],$sectorCommodityCount);
                            $counter++;
                        } else {
                            $othersCount = $othersCount + $item->total;
                        }
                    }
                    if($othersCount!= 0){
                        array_push($techChartArray[0],'Others');
                        array_push($techChartArray[1],$othersCount);
                    }
                }
                else if(request()->techBy == 'Category'){
                    foreach(App\TechnologyCategory::withCount(['technologies' => function($q){
                        $q->where('approved', '=', 2);
                    }])->where('approved', '=', 2)->orderBy('technologies_count', 'desc')->get() as $item)
                    {
                        if($counter < 5 && $item->technologies_count != 0){
                            array_push($techChartArray[0],$item->name);
                            array_push($techChartArray[1],$item->technologies_count);
                            $counter++;
                        } else {
                            $othersCount = $othersCount + $item->total;
                        }
                    }
                    if($othersCount!= 0){
                        array_push($techChartArray[0],'Others');
                        array_push($techChartArray[1],$othersCount);
                    }
                }
                else if(request()->techBy == 'Implementing_Agency'){
                    foreach(App\Agency::withCount(['technologies' => function($q){
                        $q->where('approved', '=', 2);
                    }])->where('approved', '=', 2)->orderBy('technologies_count', 'desc')->get() as $item)
                    {
                        if($counter < 5 && $item->technologies_count != 0){
                            array_push($techChartArray[0],$item->name);
                            array_push($techChartArray[1],$item->technologies_count);
                            $counter++;
                        } else {
                            $othersCount = $othersCount + $item->total;
                        }
                    }
                    if($othersCount!= 0){
                        array_push($techChartArray[0],'Others');
                        array_push($techChartArray[1],$othersCount);
                    }
                }
                else if(request()->techBy =='Year'){
                    foreach(DB::table('technologies')->where('approved', '=', 2)->select('year_developed', DB::raw('count(*) as total'))->groupBy('year_developed')->orderBy('total', 'desc')->get() as $item){
                        if($counter < 5){
                            if($item->year_developed == NULL){
                                $nullYears = $nullYears + $item->total;
                            } else {
                                array_push($techChartArray[0],$item->year_developed);
                                array_push($techChartArray[1],$item->total);
                            }
                            $counter++;
                        } else {
                            $othersCount = $othersCount + $item->total;
                        }
                    }
                    if($nullYears != 0){
                        array_push($techChartArray[0], 'No Year');
                        array_push($techChartArray[1],$nullYears);
                    }
                    if($othersCount!= 0){
                        array_push($techChartArray[0], 'Others');
                        array_push($techChartArray[1],$othersCount);
                    }
                }
                else{
                    foreach(DB::table('technologies')->where('approved', '=', 2)->select('applicability_location', DB::raw('count(*) as total'))->groupBy('applicability_location')->orderBy('total', 'desc')->get() as $item){
                        if($counter < 5){
                            array_push($techChartArray[0],$item->applicability_location);
                            array_push($techChartArray[1],$item->total);
                            $counter++;
                        } else {
                            $othersCount = $othersCount + $item->total;
                        }
                    }
                    if($othersCount!= 0){
                        array_push($techChartArray[0],'Others');
                        array_push($techChartArray[1],$othersCount);
                    }
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
                if(request()->adoptersBy == 'Region'){
                    //foreach(>where('approved', '=', 2)->select('name', DB::raw('count(*) as total'))->groupBy('name')->orderBy('total', 'desc')->get() as $item){
                    foreach(App\Adopter::where('approved', '=', 2)->select('region', DB::raw('count(*) as total'))->groupBy('region')->orderBy('total', 'desc')->get() as $item){
                        if($counter < 5){
                            array_push($adopterChartArray[0],$item->region);
                            array_push($adopterChartArray[1],$item->total);
                            $counter++;
                        } else {
                            $othersCount = $othersCount + $item->total;
                        }
                    }
                    if($othersCount!= 0){
                        array_push($adopterChartArray[0],'Others');
                        array_push($adopterChartArray[1],$othersCount);
                    }
                }
                elseif(request()->adoptersBy == 'Sector' || request()->adoptersBy == null){
                    $commodityTempArray = array();
                    $commodityTempArray[0] = array();
                    $commodityTempArray[1] = array();
                    foreach(DB::table('commodity_technology')->get() as $ct){
                        foreach(DB::table('adopter_technology')->get() as $at){
                            if($at->technology_id == $ct->technology_id){
                                foreach($commodityTempArray[0] as $key => $val){
                                    if(App\Commodity::where('id', '=', $ct->commodity_id)->first()->name == $val){
                                        $commodityTempArray[1][$key] = $commodityTempArray[1][$key] + 1;
                                        $stringCheck = 1;
                                    }
                                }
                                if($stringCheck == 0){
                                    array_push($commodityTempArray[0], App\Commodity::where('id', '=', $ct->commodity_id)->first()->name);
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
                                foreach($adopterChartArray[0] as $keySector => $valSector){
                                    if(App\Sector::where('id', '=', $sectorID)->first()->name == $valSector){
                                        $adopterChartArray[1][$keySector] = $adopterChartArray[1][$keySector] + $commodityTempArray[1][$keyComm];
                                        $stringCheck = 1;
                                    }
                                }
                                if($stringCheck == 0){
                                    if($counter < 5){
                                        array_push($adopterChartArray[0], App\Sector::where('id', '=', $sectorID)->first()->name);
                                        array_push($adopterChartArray[1], $commodityTempArray[1][$keyComm]);
                                        $counter++;
                                    } else {
                                        $othersCount++;
                                    }
                                }
                                $stringCheck = 0;
                            }
                        }
                    }
                    if($othersCount!= 0){
                        array_push($adopterChartArray[0],'Others');
                        array_push($adopterChartArray[1],$othersCount);
                    }
                }
                elseif(request()->adoptersBy == 'Year'){
                    //foreach(>where('approved', '=', 2)->select('name', DB::raw('count(*) as total'))->groupBy('name')->orderBy('total', 'desc')->get() as $item){
                    foreach(DB::table('adopter_technology')->get() as $at){
                        foreach(App\Technology::where('id', '=', $at->technology_id)->get() as $tech){
                            if($tech->year_developed != null){
                                foreach($adopterChartArray[0] as $key => $val){
                                    if((string)$tech->year_developed == $val){
                                        $adopterChartArray[1][$key] = $adopterChartArray[1][$key] + 1;
                                        $stringCheck = 1;
                                    }
                                }
                                if($stringCheck == 0){
                                    if($counter < 5){
                                        array_push($adopterChartArray[0], $tech->year_developed);
                                        array_push($adopterChartArray[1], 1);
                                        $counter++;
                                    } else {
                                        $othersCount++;
                                    }
                                }
                                $stringCheck = 0;
                            }
                        }
                    }
                    if($othersCount!= 0){
                        array_push($adopterChartArray[0],'Others');
                        array_push($adopterChartArray[1],$othersCount);
                    }
                } 
                elseif(request()->adoptersBy == 'Commodity'){
                    foreach(DB::table('commodity_technology')->get() as $ct){
                        foreach(DB::table('adopter_technology')->get() as $at){
                            if($at->technology_id == $ct->technology_id){
                                foreach($adopterChartArray[0] as $key => $val){
                                    if(App\Commodity::where('id', '=', $ct->commodity_id)->first()->name == $val){
                                        $adopterChartArray[1][$key] = $adopterChartArray[1][$key] + 1;
                                        $stringCheck = 1;
                                    }
                                }
                                if($stringCheck == 0){
                                    if($counter < 5){
                                        array_push($adopterChartArray[0], App\Commodity::where('id', '=', $ct->commodity_id)->first()->name);
                                        array_push($adopterChartArray[1], 1);
                                        $counter++;
                                    } else {
                                        $othersCount++;
                                    }
                                }
                                $stringCheck = 0;
                            }
                        }
                    }
                    if($othersCount!= 0){
                        array_push($adopterChartArray[0],'Others');
                        array_push($adopterChartArray[1],$othersCount);
                    }
                }
                elseif(request()->adoptersBy == 'Implementing_Agency'){
                    foreach(DB::table('agency_technology')->get() as $ot){
                        foreach(DB::table('adopter_technology')->get() as $at){
                            if($at->technology_id == $ot->technology_id){
                                foreach($adopterChartArray[0] as $key => $val){
                                    if(App\Agency::where('id', '=', $ot->agency_id)->first()->name == $val){
                                        $adopterChartArray[1][$key] = $adopterChartArray[1][$key] + 1;
                                        $stringCheck = 1;
                                    }
                                }
                                if($stringCheck == 0){
                                    if($counter < 5){
                                        array_push($adopterChartArray[0], App\Agency::where('id', '=', $ot->agency_id)->first()->name);
                                        array_push($adopterChartArray[1], 1);
                                        $counter++;
                                    } else {
                                        $othersCount++;
                                    }
                                }
                                $stringCheck = 0;
                            }
                        }
                    }
                    if($othersCount!= 0){
                        array_push($adopterChartArray[0],'Others');
                        array_push($adopterChartArray[1],$othersCount);
                    }
                }
                elseif(request()->adoptersBy == 'Category'){
                    foreach(DB::table('technology_technology_category')->get() as $tct){
                        foreach(DB::table('adopter_technology')->get() as $at){
                            if($at->technology_id == $tct->technology_id){
                                foreach($adopterChartArray[0] as $key => $val){
                                    if(App\TechnologyCategory::where('id', '=', $tct->technology_category_id)->first()->name == $val){
                                        $adopterChartArray[1][$key] = $adopterChartArray[1][$key] + 1;
                                        $stringCheck = 1;
                                    }
                                }
                                if($stringCheck == 0){
                                    if($counter < 5){
                                        array_push($adopterChartArray[0], App\TechnologyCategory::where('id', '=', $tct->technology_category_id)->first()->name);
                                        array_push($adopterChartArray[1], 1);
                                        $counter++;
                                    } else {
                                        $othersCount++;
                                    }
                                }
                                $stringCheck = 0;
                            }
                        }
                    }
                    if($othersCount!= 0){
                        array_push($adopterChartArray[0],'Others');
                        array_push($adopterChartArray[1],$othersCount);
                    }
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
                if(request()->fundedBy == 'Year' || request()->fundedBy == null){
                    foreach(DB::table('technologies')->where('approved', '=', 2)->get() as $tech){
                        foreach(DB::table('r_d_results')->where('technology_id', '=', $tech->id)->get() as $rd){
                            if($rd->cost != 0){
                                foreach($fundedChartArray[0] as $key => $val){
                                    if($tech->year_developed == $val){
                                        $fundedChartArray[1][$key] = $fundedChartArray[1][$key] + (int)$rd->cost/1000000;
                                        $stringCheck = 1;
                                    }
                                }
                                if($stringCheck == 0){
                                    if($counter < 5){
                                        array_push($fundedChartArray[0], $tech->year_developed);
                                        array_push($fundedChartArray[1], (int)$rd->cost/1000000);
                                        $counter++;
                                    } else {
                                        $othersCount++;
                                    }
                                }
                                $stringCheck = 0;
                            }
                        }
                        if($tech->basic_research_cost != 0 || $tech->applied_research_cost != 0){
                            foreach($fundedChartArray[0] as $key => $val){
                                if($tech->year_developed == $val){
                                    $fundedChartArray[1][$key] = $fundedChartArray[1][$key] + (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($counter < 5){
                                    array_push($fundedChartArray[0], $tech->year_developed);
                                    array_push($fundedChartArray[1], (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000);
                                    $counter++;
                                } else {
                                    $othersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                        if($othersCount!= 0){
                            array_push($fundedChartArray[0],'Others');
                            array_push($fundedChartArray[1],$othersCount);
                        }
                    }
                } elseif(request()->fundedBy == 'Commodity'){
                    foreach(DB::table('commodity_technology')->get() as $ct){
                        $tech = DB::table('technologies')->where('approved', '=', 2)->where('id', '=', $ct->technology_id)->first();
                        $comm = DB::table('commodities')->where('id', '=', $ct->commodity_id)->first();
                        foreach(DB::table('r_d_results')->where('technology_id', '=', $tech->id)->get() as $rd){
                            if($rd->cost != 0){
                                foreach($fundedChartArray[0] as $key => $val){
                                if($comm->name == $val){
                                    $fundedChartArray[1][$key] = $fundedChartArray[1][$key] + (int)$rd->cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($counter < 5){
                                    array_push($fundedChartArray[0], $comm->name);
                                    array_push($fundedChartArray[1], (int)$rd->cost/1000000);
                                    $counter++;
                                } else {
                                    $othersCount++;
                                }
                            }
                            $stringCheck = 0;
                            }
                        }
                        if($tech->basic_research_cost != 0 || $tech->applied_research_cost != 0){
                            foreach($fundedChartArray[0] as $key => $val){
                                if($comm->name == $val){
                                    $fundedChartArray[1][$key] = $fundedChartArray[1][$key] + (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($counter < 5){
                                    array_push($fundedChartArray[0], $comm->name);
                                    array_push($fundedChartArray[1], (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000);
                                    $counter++;
                                } else {
                                    $othersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                } elseif(request()->fundedBy == 'Sector'){
                    foreach(DB::table('commodity_technology')->get() as $ct){
                        $tech = DB::table('technologies')->where('approved', '=', 2)->where('id', '=', $ct->technology_id)->first();
                        $comm = DB::table('commodities')->where('id', '=', $ct->commodity_id)->first();
                        $sect = App\Sector::where('id', '=', $comm->sector_id)->first();
                        foreach(DB::table('r_d_results')->where('technology_id', '=', $tech->id)->get() as $rd){
                            if($rd->cost != 0){
                                foreach($fundedChartArray[0] as $key => $val){
                                if($sect->name == $val){
                                    $fundedChartArray[1][$key] = $fundedChartArray[1][$key] + (int)$rd->cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($counter < 5){
                                    array_push($fundedChartArray[0], $sect->name);
                                    array_push($fundedChartArray[1], (int)$rd->cost/1000000);
                                    $counter++;
                                } else {
                                    $othersCount++;
                                }
                            }
                            $stringCheck = 0;
                            }
                        }
                        if($tech->basic_research_cost != 0 || $tech->applied_research_cost != 0){
                            foreach($fundedChartArray[0] as $key => $val){
                                if($sect->name == $val){
                                    $fundedChartArray[1][$key] = $fundedChartArray[1][$key] + (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($counter < 5){
                                    array_push($fundedChartArray[0], $sect->name);
                                    array_push($fundedChartArray[1], (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000);
                                    $counter++;
                                } else {
                                    $othersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                } elseif(request()->fundedBy == 'Region'){
                    foreach(DB::table('technologies')->get() as $tech){
                        foreach(DB::table('r_d_results')->where('technology_id', '=', $tech->id)->get() as $rd){
                            if($rd->cost != 0){
                                foreach($fundedChartArray[0] as $key => $val){
                                if($tech->applicability_location == $val){
                                    $fundedChartArray[1][$key] = $fundedChartArray[1][$key] + (int)$rd->cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($counter < 5){
                                    array_push($fundedChartArray[0], $tech->applicability_location);
                                    array_push($fundedChartArray[1], (int)$rd->cost/1000000);
                                    $counter++;
                                } else {
                                    $othersCount++;
                                }
                            }
                            $stringCheck = 0;
                            }
                        }
                        if($tech->basic_research_cost != 0 || $tech->applied_research_cost != 0){
                            foreach($fundedChartArray[0] as $key => $val){
                                if($tech->applicability_location == $val){
                                    $fundedChartArray[1][$key] = $fundedChartArray[1][$key] + (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($counter < 5){
                                    array_push($fundedChartArray[0], $tech->applicability_location);
                                    array_push($fundedChartArray[1], (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000);
                                    $counter++;
                                } else {
                                    $othersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                        if($othersCount!= 0){
                            array_push($fundedChartArray[0],'Others');
                            array_push($fundedChartArray[1],$othersCount);
                        }
                    }
                } elseif(request()->fundedBy == 'Category'){
                    foreach(DB::table('technology_technology_category')->get() as $tct){
                        $tech = DB::table('technologies')->where('id', '=', $tct->technology_id)->first();
                        $categ = DB::table('technology_categories')->where('id', '=', $tct->technology_category_id)->first();
                        foreach(DB::table('r_d_results')->where('technology_id', '=', $tech->id)->get() as $rd){
                            if($rd->cost != 0){
                                foreach($fundedChartArray[0] as $key => $val){
                                if($categ->name == $val){
                                    $fundedChartArray[1][$key] = $fundedChartArray[1][$key] + (int)$rd->cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($counter < 5){
                                    array_push($fundedChartArray[0], $categ->name);
                                    array_push($fundedChartArray[1], (int)$rd->cost/1000000);
                                    $counter++;
                                } else {
                                    $othersCount++;
                                }
                            }
                            $stringCheck = 0;
                            }
                        }
                        if($tech->basic_research_cost != 0 || $tech->applied_research_cost != 0){
                            foreach($fundedChartArray[0] as $key => $val){
                                if($categ->name == $val){
                                    $fundedChartArray[1][$key] = $fundedChartArray[1][$key] + (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($counter < 5){
                                    array_push($fundedChartArray[0], $categ->name);
                                    array_push($fundedChartArray[1], (int)$tech->basic_research_cost/1000000 + (int)$tech->applied_research_cost/1000000);
                                    $counter++;
                                } else {
                                    $othersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                } elseif(request()->fundedBy == 'Implementing_Agency'){
                    foreach(DB::table('agency_technology')->get() as $at){
                        $tech = DB::table('technologies')->where('id', '=', $at->technology_id)->first();
                        $agenc = DB::table('agencies')->where('id', '=', $at->agency_id)->first();
                        foreach(DB::table('r_d_results')->where('technology_id', '=', $tech->id)->get() as $rd){
                            if($rd->cost != 0){
                                foreach($fundedChartArray[0] as $key => $val){
                                if($agenc->name == $val){
                                    $fundedChartArray[1][$key] = $fundedChartArray[1][$key] + (int)$rd->cost/1000000;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($counter < 5){
                                    array_push($fundedChartArray[0], $agenc->name);
                                    array_push($fundedChartArray[1], (int)$rd->cost/1000000);
                                    $counter++;
                                } else {
                                    $othersCount++;
                                }
                            }
                            $stringCheck = 0;
                            }
                        }
                        if($tech->basic_research_cost != 0 || $tech->applied_research_cost != 0){
                            foreach($fundedChartArray[0] as $key => $val){
                                if($agenc->name == $val){
                                    $fundedChartArray[1][$key] = $fundedChartArray[1][$key] + (int)$tech->basic_research_cost + (int)$tech->applied_research_cost;
                                    $stringCheck = 1;
                                }
                            }
                            if($stringCheck == 0){
                                if($counter < 5){
                                    array_push($fundedChartArray[0], $agenc->name);
                                    array_push($fundedChartArray[1], (int)$tech->basic_research_cost + (int)$tech->applied_research_cost);
                                    $counter++;
                                } else {
                                    $othersCount++;
                                }
                            }
                            $stringCheck = 0;
                        }
                    }
                }
            ?>
             <!-- END DYNAMIC DATA INPUT FOR AMOUNT FUNDED PER ____ --> 
        </div> 
    </div>

<!-- Agency View Modal -->
    @foreach(App\Agency::all() as $agency)
        <div class="modal fade" id="viewAgencyModal-{{$agency->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="font-weight:900" class="modal-title" id="exampleModalLabel">Technology Owner</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <b>Name</b><br>
                        {{$agency->name}}<br><br>
                        <div class="row">
                            <div class="col-sm-3">
                                <b>Region</b><br>
                                {{$agency->region}}
                            </div>
                            <div class="col-sm-3">
                                <b>Province</b><br>
                                {{$agency->province}}
                            </div>
                            <div class="col-sm-3">
                                <b>Municipality</b><br>
                                {{$agency->municipality}}
                            </div>
                            <div class="col-sm-3">
                                <b>District</b><br>
                                {{$agency->district}}
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-3">
                                <b>Phone</b><br>
                                {{$agency->phone}}
                            </div>
                            <div class="col-sm-3">
                                <b>fax</b><br>
                                {{$agency->fax}}
                            </div>
                            <div class="col-sm-4">
                                <b>Email</b><br>
                                {{$agency->email}}
                            </div>
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
    <div class="modal fade" id="viewGeneratorModal-{{$generator->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="font-weight:900" class="modal-title" id="exampleModalLabel">Technology Generator</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b>Name</b><br>
                    {{$generator->name}}<br><br>
                    <b>Latest Agency Affiliation</b><br>
                    {{$generator->agency->find(1)->name}}<br><br>
                    <b>Address</b><br>
                    {{$generator->address}}<br><br>
                    <div class="row">
                        <div class="col-sm-3">
                            <b>Phone</b><br>
                            {{$generator->phone}}
                        </div>
                        <div class="col-sm-3">
                            <b>Fax</b><br>
                            {{$generator->fax}}
                        </div>
                        <div class="col-sm-4">
                            <b>Email</b><br>
                            {{$generator->email}}
                        </div>
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
    <div class="modal fade" id="viewAdopterModal-{{$adopter->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 style="font-weight:900" class="modal-title" id="exampleModalLabel">Technology Adopter</h4>
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
                        <div class="col-sm-3">
                            <b>Region</b><br>
                            {{$adopter->region}}
                        </div>
                        <div class="col-sm-3">
                            <b>Province</b><br>
                            {{$adopter->province}}
                        </div>
                        <div class="col-sm-3">
                            <b>Municipality</b><br>
                            {{$adopter->municipality}}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-3">
                            <b>Phone</b><br>
                            {{$adopter->phone}}
                        </div>
                        <div class="col-sm-3">
                            <b>Fax</b><br>
                            {{$adopter->fax}}
                        </div>
                        <div class="col-sm-4">
                            <b>Email</b><br>
                            {{$adopter->email}}
                        </div>
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
        <div class="modal fade" id="viewRDResultModal-{{$r_d_result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="font-weight:900" class="modal-title" id="exampleModalLabel">Technology R&D Result</h4>
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
                            <div class="col-sm-6">
                                <b>Funding Agency</b><br>
                                {{$r_d_result->funding}}
                            </div>
                            <div class="col-sm-6">
                                <b>Implementing Agency</b><br>
                                {{$r_d_result->implementing}}
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-3">
                                <b>Project cost</b><br>
                                ₱{{number_format($r_d_result->cost, 2, '.', ',')}}
                            </div>
                            <div class="col-sm-3">
                                <b>Start Date</b><br>
                                {{$r_d_result->start_date}}
                            </div>
                            <div class="col-sm-4">
                                <b>End Date</b><br>
                                {{$r_d_result->end_date}}
                            </div>
                        </div><br>
                        <b>Type of Beneficiary</b><br>
                        {{$r_d_result->beneficiary_type}}<br><br>
                        <b>Name of Beneficiaries</b><br>
                        {{$r_d_result->beneficiary_name}}<br><br>
                        <div class="row">
                            <div class="col-sm-3">
                                <b>Beneficiary Address - Region</b><br>
                                {{$r_d_result->beneficiary_region}}
                            </div>
                            <div class="col-sm-3">
                                <b>Beneficiary Address - Province</b><br>
                                {{$r_d_result->beneficiary_province}}
                            </div>
                            <div class="col-sm-4">
                                <b>Beneficiary Address - Municipality</b><br>
                                {{$r_d_result->beneficiary_municipality}}
                            </div>
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
       
<!-- TECH VIEW MODAL -->
    @foreach(App\Technology::all() as $tech)
        <div class="modal fade" id="techModal-{{$tech->id}}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content pl-0 pr-0 pl-0">
                    <div id="popup-details-{{$tech->id}}" class="inner-modal pl-3 pr-3"> 
                        <div class="modal-header">
                            <span style="width:100%" class="mt-2">
                                <h4>{{$tech->title}} </h4>
                            <span>
                        </div>
                        <div class="modal-body">
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt"></i> {{$tech->applicability_location}}
                                @if($tech->applicability_industry != null)
                                    <i class="far fa-calendar-alt ml-2"></i> {{App\ApplicabilityIndustry::where('id', '=', $tech->applicability_industry)->find(1)->name}}
                                @endif
                            </small>
                            <br>
                            @foreach($tech->commodities as $commodity)
                                    {{ $commodity->sector->name }}
                                    <i class="fas fa-angle-double-right"></i>
                                    {{ $commodity->name }}<br>
                            @endforeach
                            <div class="dropdown-divider mt-3"></div>
                            <b>Description</b><br>
                            <span>{{$tech->description}}</span>
                            <div class="dropdown-divider mt-3"></div>
                            <b>Significance</b><br>
                            <span>{{$tech->significance}}</span>
                            <div class="dropdown-divider mt-3"></div>
                            <b>Target Users</b><br>
                            <span>{{$tech->target_users}}</span>
                            <div class="dropdown-divider mt-3"></div>
                            <b>Commodities</b><br>
                            @foreach($tech->commodities as $commodity)
                                <span class="ml-3">• {{$commodity->name}} </span><br>
                            @endforeach
                            <div class="dropdown-divider mt-3"></div>
                            <b>Technology Owner</b><br>
                            @foreach($tech->agencies as $agency)
                                <span class="ml-3">• {{$agency->name}} </span><br>
                            @endforeach
                            <div class="dropdown-divider mt-3"></div>
                            <b>Technology Generator</b><br>
                            @foreach($tech->generators as $generator)
                                <span class="ml-3">• {{$generator->name}} </span><br>
                            @endforeach
                            <div class="dropdown-divider mt-3"></div>
                            <b>Technology Adopters</b><br>
                            @foreach($tech->adopters as $adopter)
                                <span class="ml-3">• {{$adopter->name}} </span><br>
                            @endforeach
                            <div class="dropdown-divider mt-3"></div>
                            <b>Basic Research</b><br>
                            Project Title - {{$tech->basic_research_title}}<br>
                            Funding Agency - {{$tech->basic_research_funding}}<br>
                            Implementing Agency - {{$tech->basic_research_implementing}}<br>
                            Project Cost - {{$tech->basic_research_cost}}<br>
                            Start to end - {{$tech->basic_research_start_date}} - {{$tech->basic_research_end_date}}
                            <div class="dropdown-divider mt-3"></div>
                            <b>Applied Research</b><br>
                            Project Title - {{$tech->applied_research_title}}<br>
                            Funding Agency - {{$tech->applied_research_funding}}<br>
                            Implementing Agency - {{$tech->applied_research_implementing}}<br>
                            Project Cost - {{$tech->applied_research_cost}}<br>
                            Start to end - {{$tech->applied_research_start_date}} - {{$tech->applied_research_end_date}}
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="location.href='{{ url('/'.$tech->id.'/printTechPDF') }}'">Save as PDF</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
<!-- END OF TECH VIEW MODAL -->

<!-- Modal for filter by commodity -->
    <div class="modal fade" id="commodityFilterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filter by Commodities</h5>
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

<script>
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
    console.log("Cookie found. No action necessary");
    $(".clear-cookie").show();
    } else {
    console.log("No cookie found. Opening popup in 3 seconds");
    $(".clear-cookie").hide();
    setTimeout(function() {
        lastFocus = document.activeElement;
        displayPopup();
    }, 3000);
    }
</script>

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
</style>

<style> 
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

<script>
    $('.toggle-item').click(function() {
        $('.toggle-item').removeClass('active');
        $(this).addClass('active');
    });
    $(document).on('click', '.dropdown-menu li a', function() {
        $('#datebox').val($(this).html());
    }); 
    /*
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {
        myFunction();
        console.log(window.pageYOffset);
        console.log(window.pageYOffset > 750);
        };

    // Get the header
    var header = document.getElementById("dashboardHeader");
    var content = document.getElementById("content");

    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset >= 750) {
            header.classList.add("sticky");
            content.classList.add("content")
        } else {
            header.classList.remove("sticky");
            content.classList.remove("content")
        }
    }*/
    $('.dynamic_create').change(function(){
        if($(this).val() != ''){
            var select = $(this).attr('id');
            var select = select+'_id';
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var identifier = $(this).data('identifier');
            console.log(identifier);
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
</script>

<script>     
    //Global Options
    Chart.defaults.global.defaultFontFamily = 'Raleway';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';
    Chart.defaults.global.defaultFontStyle = 'bold';
    //Philippine Map Chart
    const country = fetch(
        'https://raw.githubusercontent.com/markmarkoh/datamaps/master/src/js/data/phl.topo.json'
    ).then((r) => r.json());
    const regions = fetch(
        'https://raw.githubusercontent.com/faeldon/philippines-json-maps/master/topojson/regions/lowres/regions.topo.0.001.json'
    ).then((r) => r.json());
    Promise.all([regions, country]).then((data) => {
            const regions = ChartGeo.topojson.feature(data[0], data[0].objects["regions.0.001"]).features;
            const country = ChartGeo.topojson.feature(data[1], data[1].objects.phl).features[0];

            const chart = new Chart(document.getElementById('mapChart').getContext('2d'), {
            type: 'choropleth',
            data: {
                labels: regions.map((d) => d.properties.ADM1_EN),
                datasets: [
                {
                    label: 'Regions',
                    outline: country,
                    data: regions.map((d) => ({
                    feature: d,
                    value: Math.random(),
                    })),
                },
                ],
            },
            options: {
                legend: {
                    display: false
                },
                scale: {
                    projection: 'equirectangular'
                },
                geo: {
                    colorScale: {
                    display: true,
                    position: 'bottom',
                    quantize: 5,
                    legend: {
                        position: 'bottom-right',
                    },
                    },
                },
                responsive:true,
                maintainAspectRatio: false
            },
            });
    });
    
    //Technology Per Region Bar Chart
    let techBarChart = new Chart(document.getElementById('techBarChart').getContext('2d'), {
            type:'bar',
            data:{
                labels: <?php echo json_encode($techChartArray[0]);?>,
                datasets:[{
                    label: 'Number of Technologies',
                    data: <?php echo json_encode($techChartArray[1]);?>,
                    backgroundColor:[
                        'rgba(255,99,132,1)',
                        'rgba(54,38,195,1)',
                        'rgba(108,21,105,1)',
                        'rgba(169,201,51,1)',
                        'rgba(20,21,20,1)',
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
    //Technology per sector doughnut chart
    let adopterPieChart = new Chart(document.getElementById('adopterPieChart').getContext('2d'), {
            type:'doughnut',
            data:{
                labels: <?php echo json_encode($adopterChartArray[0]);?>,
                datasets:[{
                    label: 'Number of Technologies',
                    data: <?php echo json_encode($adopterChartArray[1]);?>,
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
    //Total Amound Funded per Year
    let amountFundedYearChart = new Chart(document.getElementById('amountFundedYearChart').getContext('2d'), {
            type:'line',
            data:{
                labels: <?php echo json_encode($fundedChartArray[0]);?>,
                datasets:[{
                    label: 'Amount of Funds in Millions',
                    data: <?php echo json_encode($fundedChartArray[1]);?>,
                    backgroundColor:[
                        'rgba(85,32,200,1)',
                    ],
                    hoverBorderWidth:3,
                    hoverBorderColor:'rgb(0,0,0)'
                }]
            },
            options:{
                responsive:true,
                maintainAspectRatio: false
            }
    });
</script>


@endsection