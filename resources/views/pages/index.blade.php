@extends('layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb pb-0" style="background-color:transparent">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">km4aanr</a></li>
        <li class="breadcrumb-item active" aria-current="page">Technology Dashboard</li>
    </ol>
@endsection
@section('content')
    @include('inc.messages')
    <div class="container-fluid px-0">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1" class=""></li>
            </ol>
          <div class="carousel-inner" style="max-height:500px;">
            <div class="carousel-item active">
                <img class="card-img-top" src="/storage/page_images/banner1.jpg" width="100%" style="object-fit: cover; max-height:500px">
                <div class="carousel-overlay px-5">
                    <span>
                        <h1 class="font-weight-bold" style="color:white;">
                            DOST-PCAARRD program distributes duck eggs; supplements duck farmers' livelihood
                        </h1>
                        <h2 style="color:white">
                            Addressing the impact of COVID-19 pandemic in the country
                        </h2>
                        <button type="button" class="btn btn-primary btn-lg font-weight-bold">Read More</button>
                    </span>
                </div>
            </div>
            <div class="carousel-item">
                <img class="card-img-top" src="/storage/page_images/banner2.jpg" width="100%" style="object-fit: cover; max-height:500px">
                <div class="carousel-overlay px-5">
                    <span>
                        <h1 class="font-weight-bold" style="color:white;">
                            Furrow and drip irrigation system effective in sugarcane production
                        </h1>
                        <h2 style="color:white">
                            Addressing the impact of COVID-19 pandemic in the country
                        </h2>
                        <button type="button" class="btn btn-primary btn-lg font-weight-bold">Read More</button>
                    </span>
                </div>
            </div>
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
            background-color:rgba(112, 92, 77,0.97);
            position:absolute;
            top:0;
            height:100%;
            width:40%;
            display: flex;
            justify-content: center;
            align-items: center;
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
            <!--
            <div class="dropdown-divider"></div> 
            <div class="btn-group">
                <span style="margin-top:6px">Filter:&nbsp;</span>
                <div class="dropdown mr-1">
                    <button class="btn btn-default dropdown-toggle" style="border: 1px solid" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                        <span class="caret">{!!request()->consortium ? '<b>'.request()->consortium.'</b>' : 'Any Industry'!!}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/#posts-anchor">Any Industry</a>
                    </div>
                </div>  
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" style="border: 1px solid" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret">{!!request()->location ? '<b>'.request()->location.'</b>' : 'Any Sector'!!}</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="/#posts-anchor">Any Sector</a>
                        </div>
                    <script>
                        $(".dropdown-menu a").click(function(){
                            $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
                            $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
                        });
                    </script>
                </div>
            </div>

            <div class="dropdown-divider"></div> 
            -->
            <a id="dashboard-anchor" style="top:-250px;position:relative"></a>
            <div class="mx-5 px-5 pt-4">
                <form action="/search" method="GET" role="search" class="mb-2">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="search"
                            placeholder="Search Technology Title" value={{ isset($results) ? $query : ''}}> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default" style="border:1px solid #ced4da">
                                <i class="fas fa-search" ></i>
                            </button>
                        </span>
                    </div>
                </form>   
                <div class="btn-group">
                    <span style="font-size:15px; margin-top:6px" >Filter:</span>
                    <div class="dropdown">  
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret">{!!request()->location ? '<b>'.request()->location.'</b>' : 'Any Region'!!}</span>
                        </button>
                        <?php 
                            $regions_filter = App\Technology::select(DB::raw('region as region'))->groupBy(DB::raw('region'))->orderBy('region','asc')->get();
                        ?>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/#posts-anchor">Any Region</a>
                            @foreach($regions_filter as $region)
                                <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium,'sort' => request()->sort, 'sortOrder' => request()->sortOrder, 'year' => request()->year, 'location' => $region->location])}}#posts-anchor">{{$region->region}}</a>
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
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#commodityFilterModal">{!! request()->commodities ? '<b>Filtered by Commodity</b>' : 'Any Commodity'!!}</button> 
                    <a href="/#posts-anchor" class="btn btn-default" role="button">Clear Filters</a><a href="#" data-toggle="tooltip" data-placement="top" title="Clear filters by pressing this button"><i class="far fa-question-circle"></i></a>
                </div>
                <div class="float-right row">
                    <a href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'sort' => request()->sort, 'year' => request()->year, 'sortOrder' => request()->sortOrder, 'commodities' => request()->commodities, 'view' => 'gridView'])}}#posts-anchor">
                        <button type="button" class="btn btn-light {{ request()->view == 'gridView' || !request()->view  ? 'active' : ''}}" autocomplete="off">
                            <i class="fas fa-grip-horizontal"></i>
                        </button>
                    </a>
                    <a href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'sort' => request()->sort, 'year' => request()->year, 'sortOrder' => request()->sortOrder, 'commodities' => request()->commodities, 'view' => 'listView'])}}#posts-anchor">
                        <button type="button" class="btn btn-light {{ request()->view == 'listView' ? 'active' : ''}}" autocomplete="off">
                            <i class="fas fa-bars"></i>
                        </button>
                    </a>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret {{ request()->sort ? '':'text-muted' }}">{!!request()->sort ? '<b>'.request()->sort.'</b>' : 'SORT BY'!!}</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'year' => request()->year, 'view' => request()->view, 'sortOrder' => request()->sortOrder, 'commodities' => request()->commodities, 'title' == request()->sort ? '' : 'sort=Title'])}}#posts-anchor">TITLE</a>
                            <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'year' => request()->year, 'view' => request()->view, 'sortOrder' => request()->sortOrder, 'commodities' => request()->commodities, 'start' == request()->sort ? '' : 'sort=Start'])}}#posts-anchor">START DATE</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownSortBy" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret text-muted">ASC</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownSortBy">
                            <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'year' => request()->year, 'view' => request()->view, 'sort' => request()->sort, 'asc' == request()->sortOrder ? '' : 'sortOrder=Asc'])}}#posts-anchor">ASC</a>
                            <a class="dropdown-item" href="{{ route('pages.index', ['consortium' => request()->consortium, 'location' => request()->location, 'year' => request()->year, 'view' => request()->view, 'sort' => request()->sort, 'desc' == request()->sortOrder ? '' : 'sortOrder=Desc'])}}#posts-anchor">DESC</a>
                        </div>
                    </div>
                </div>    
                <div class="dropdown-divider"></div> 
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
                                        <th>Region</th>
                                        <th>Category</th>
                                        <th>Industry</th>
                                        <th>Sector</th>
                                        <th>Commodity</th>
                                        <th>Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($technologies as $tech)
                                        <tr data-toggle="modal" data-id="2" data-target="#techModal-{{$tech->id}}">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$tech->name}}</td>
                                            <td>{{$tech->region}}</td>
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
                                                        <i>{{ $commodity->sector->industry->name }} </i>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($tech->commodities as $commodity)
                                                    @if( $loop->first ) 
                                                        <i>{{ $commodity->sector->name }} </i>
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
                                            <td>
                                                {{$tech->year_developed}}
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
                @else
                <div id="techCards" class="row">
                    @foreach($technologies as $tech)
                    <div class="col-sm-4 tech-card-container">
                        <div class="card card-overlay-container front-card h-auto shadow rounded">
                            <div class="card-img-top center-vertically px-3 tech-card-color" style="height:200px">
                                <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                    {{$tech->name}}
                                </span>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title trail-end font-weight-bold">{{$tech->name}}</h4>
                                <div class="card-text trail-end" style="line-height: 120%;">
                                    <p class="mb-2"><b>{{$tech->year_developed}} · {{$tech->region}} {{$tech->province ? '· '.$tech->province : ''}}</b></p>
                                    <small>
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
                                    </small>
                                </div>
                            </div>
                            <a href="/posts/76" class="stretched-link"></a>
                            <div class="card-hover-overlay px-4">
                                <span style="color:white">
                                    <h4 class="font-weight-bold card-overlay-content">
                                        {{$tech->name}}
                                    </h4>
                                    <h6 class="card-overlay-content">
                                        {{$tech->description}}
                                    </h6>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="center pt-4">
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#" class="active">1</a>
                        <a href="#" >2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>
                <style>
                    .center {
                    text-align: center;
                    }

                    .pagination {
                    display: inline-block;
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

                    .pagination a.active {
                    color: black;
                    border: 1px solid black;
                    }

                    .pagination a:hover:not(.active) {
                        background-color: #ddd;
                        color:rgb(25,25,25)
                        }
                </style>
                @endif
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card text-white bg-success mb-3 shadow" style="height:170px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h1 class="mt-3 mb-4">2975</h1>
                                        <h5 class="font-weight-bold">Total Number of Technologies</h5>
                                    </div>
                                    <div class="col-sm-3" style="margin:auto">
                                        <i class="mt-2 fas fa-microchip" style="font-size:65px"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-white bg-info mb-3 shadow" style="height:170px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h1 class="mt-3 mb-4">₱613,965,000</h1>
                                        <h5 class="font-weight-bold">Total Amount Funded</h5>
                                    </div>
                                    <div class="col-sm-3 pl-0" style="margin:auto">
                                        <i class="mt-2 fas fa-money-bill-wave-alt mr-5" style="font-size:65px"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-white bg-danger mb-3 shadow" style="height:170px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h1 class="mt-3 mb-4">513</h1>
                                        <h5 class="font-weight-bold">Total Number of Adoptors</h5>
                                    </div>
                                    <div class="col-sm-3 pl-0" style="margin:auto">
                                        <i class="mt-2 fas fa-user-friends" style="font-size:65px"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-light bg-primary mb-3 shadow" style="height:170px">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <h1 class="mt-3 mb-4">June 22, 2020</h1>
                                        <h5 class="font-weight-bold">Database Last Updated</h5>
                                    </div>
                                    <div class="col-sm-3 pl-0" style="margin:auto">
                                        <i class="mt-2 far fa-calendar-check" style="font-size:65px"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card shadow ">
                            <div class="card-header chart-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h5 class="font-weight-bold my-1 text-primary">Technology Map</h5>
                            </div>
                            <div class="card-body">
                                <div style="height:45rem">
                                    <canvas id="mapChart" style="margin:auto"></canvas>
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
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy ? '' : 'techBy=Sector'])}}#dashboard-anchor" class="dropdown-item" href="#">Sector</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy ? '' : 'techBy=Commodity'])}}#dashboard-anchor" class="dropdown-item" href="#">Commodity</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy ? '' : 'techBy=Year'])}}#dashboard-anchor" class="dropdown-item" href="#">Year</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy ? '' : 'techBy=Implementing_Agency'])}}#dashboard-anchor" class="dropdown-item" href="#">Implementing Agency</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy ? '' : 'techBy=Category'])}}#dashboard-anchor" class="dropdown-item" href="#">Category</a>
                                                <a href="{{ route( 'pages.index', ['fundedBy' == request()->fundedBy, 'techBy' == request()->techBy ? '' : 'techBy=Region'])}}#dashboard-anchor" class="dropdown-item" href="#">Region</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="techPerRegionChart"></canvas>
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
                                                    $adoptorsBy = str_replace('_', ' ', request()->adoptorsBy)
                                                ?>
                                                <h4 class="font-weight-bold my-1">{{request()->adoptorsBy ? $adoptorsBy : 'Sector'}}</h4>
                                                <i class="fas fa-caret-down fa-lg fa-fw" style=margin:auto></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                                <div class="dropdown-header">Sort by:</div>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'adoptorsBy' == request()->adoptorsBy ? '' : 'adoptorsBy=Region'])}}#dashboard-anchor"  class="dropdown-item" href="#">Region</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'adoptorsBy' == request()->adoptorsBy ? '' : 'adoptorsBy=Commodity'])}}#dashboard-anchor"  class="dropdown-item" href="#">Commodity</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'adoptorsBy' == request()->adoptorsBy ? '' : 'adoptorsBy=Year'])}}#dashboard-anchor"  class="dropdown-item" href="#">Year</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'adoptorsBy' == request()->adoptorsBy ? '' : 'adoptorsBy=Implementing_Agency'])}}#dashboard-anchor"  class="dropdown-item" href="#">Implementing Agency</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'adoptorsBy' == request()->adoptorsBy ? '' : 'adoptorsBy=Category'])}}#dashboard-anchor"  class="dropdown-item" href="#">Category</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy, 'adoptorsBy' == request()->adoptorsBy ? '' : 'adoptorsBy=Region'])}}#dashboard-anchor"  class="dropdown-item" href="#">Region</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="techPerSectorChart"></canvas>
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
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Sector'])}}#dashboard-anchor" class="dropdown-item" href="#">Sector</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Commodity'])}}#dashboard-anchor" class="dropdown-item" href="#">Commodity</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Year'])}}#dashboard-anchor" class="dropdown-item" href="#">Year</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Implementing_Agency'])}}#dashboard-anchor" class="dropdown-item" href="#">Implementing Agency</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Category'])}}#dashboard-anchor" class="dropdown-item" href="#">Category</a>
                                                <a href="{{ route( 'pages.index', ['techBy' == request()->techBy, 'fundedBy' == request()->fundedBy ? '' : 'fundedBy=Region'])}}#dashboard-anchor" class="dropdown-item" href="#">Region</a>
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
                <div class="row text-center w-100 mt-4" style="justify-content: center;">
                    <a href="/dashboard"><button type="button" class="btn btn-light font-weight-bold px-4 py-3" style="border:0.5px solid black; font-size:17px;letter-spacing:0.1em">MORE INFORMATION</button></a>
                </div>
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
                let techPerRegionChart = new Chart(document.getElementById('techPerRegionChart').getContext('2d'), {
                        type:'bar',
                        data:{
                            labels:['NCR', 'Region IV', 'Region III', 'Soccsksargen'],
                            datasets:[{
                                label: 'Number of Technologies',
                                data: [
                                    264,
                                    105,
                                    58,
                                    32
                                ],
                                backgroundColor:[
                                    'rgba(255,99,132,1)',
                                    'rgba(54,38,195,1)',
                                    'rgba(108,21,105,1)',
                                    'rgba(169,201,51,1)',
                                ],
                                hoverBorderWidth:3,
                                hoverBorderColor:'rgb(0,0,0)'
                            }]
                        },
                        options:{
                            responsive:true,
                        }
                });
                //Technology per sector doughnut chart
                let techPerSectorChart = new Chart(document.getElementById('techPerSectorChart').getContext('2d'), {
                        type:'doughnut',
                        data:{
                            labels:['Crops', 'Livestock', 'Feeds', 'Inland Fisheries', 'Marine Resources', 'Others'],
                            datasets:[{
                                label: 'Number of Technologies',
                                data: [
                                    103,
                                    51,
                                    18,
                                    21,
                                    31,
                                    85
                                ],
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
                            labels:['1990', '1995', '2000', '2005', '2010', '2015', '2020'],
                            datasets:[{
                                label: 'Amount of Funds in Millions',
                                data: [
                                    33,
                                    48,
                                    36,
                                    75,
                                    66,
                                    105,
                                    104
                                ],
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
        </div> 
    </div>
       
<!-- TECH VIEW MODAL -->
    @foreach(App\Technology::all() as $tech)
        <div class="modal fade" id="techModal-{{$tech->id}}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content pl-0 pr-0 pl-0">
                    <div class="inner-modal pl-3 pr-3"> 
                        <div class="modal-header">
                            <span style="width:100%" class="mt-2">
                                <h4>{{$tech->name}} </h4>
                            <span>
                        </div>
                        <div class="modal-body">
                            <small class="text-muted">
                                <i class="fas fa-map-marker-alt"></i> {{$tech->region}}
                                <i class="far fa-calendar-alt ml-2"></i> {{$tech->year_developed}}
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
                            <b>Commodities</b><br>
                            @foreach($tech->commodities as $commodity)
                                <span class="ml-3">• {{$commodity->name}} </span><br>
                            @endforeach
                        </div>
                        <div class="modal-footer">
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
                    <h6 class="modal-title" id="exampleModalLabel">Filter by Commodities</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['action' => ['PagesController@index'], 'method' => 'GET']) }}
                <div class="modal-body">
                    <div class="form-group">
                        <select name="commodities[]" class="selectpicker form-control" multiple data-actions-box="true" data-live-search="true" title="Choose Commodities">
                            @foreach($sectors as $sector)
                                <optgroup label={{$sector->name}}>
                                    @foreach($commodities->where('sector_id','=',$sector->id) as $commodity)
                                        <option>{{$commodity->name}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
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
</script>



@endsection