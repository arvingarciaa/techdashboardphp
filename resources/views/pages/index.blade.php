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
          <div class="carousel-inner" style="max-height:750px">
            <div class="carousel-item active">
                <img class="card-img-top" src="/storage/page_images/banner1.jpg" width="100%" style="object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img class="card-img-top" src="/storage/page_images/banner2.jpg" width="100%" style="object-fit: cover;">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
    <nav class="navbar navbar-light bg-white topbar shadow" id="dashboardHeader">
        <!-- Sidebar Toggle (Topbar) -->
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

    

    <div class="pb-5" id="content" style="background-image:linear-gradient(rgb(255,255,255),rgb(230,230,230),rgb(200, 210, 210));">
        <div class="container">
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
            <div class="tab-content mb-5">
                <div class="tab-pane fade" id="card">
                    <div class="row w-100">
                        <div class="col-sm-4">
                            <div class="card front-card h-auto shadow rounded">
                                <img src="http://via.placeholder.com/640x360" class="card-img-top" height="175" style="object-fit: cover;">
                                <div class="card-body">
                                    <h4 class="card-title trail-end">Hoya Plant Mutations by Gamma Irradiation (Process of Producing Mutant Spathoglottis Plants by Gamma Irradiation of Different Planting Materials)</h4>
                                    <div class="card-text trail-end" style="line-height: 120%;">
                                        <p class="mb-2"><b>November 11-13, 2019</b></p>
                                        <small>Region 10 · Robinson's Place, Valencia City, Bukidnon<br>
                                                                                                
                                                    ILAARRDEC 
                                                
                                                                                                                                                        · SMAARRDEC
                                                
                                                                                                                                                        · CVAARRDEC
                                                
                                                                                                                                                        · NOMCAARRD
                                                
                                                                                            <br>
                                                                                        </small>
                                    </div>
                                </div>
                                <a href="/posts/76" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card front-card h-auto shadow rounded">
                                <img src="http://via.placeholder.com/640x360" class="card-img-top" height="175" style="object-fit: cover;">
                                <div class="card-body">
                                    <h4 class="card-title trail-end">BIOGROE (Microbial Inoculants from Plant Growth Promoting Rhizobacteria)</h4>
                                    <div class="card-text trail-end" style="line-height: 120%;">
                                        <p class="mb-2"><b>November 11-13, 2019</b></p>
                                        <small>Region 10 · Robinson's Place, Valencia City, Bukidnon<br>
                                                                                                
                                                    ILAARRDEC 
                                                
                                                                                                                                                        · SMAARRDEC
                                                
                                                                                                                                                        · CVAARRDEC
                                                
                                                                                                                                                        · NOMCAARRD
                                                
                                                                                            <br>
                                                                                        </small>
                                    </div>
                                </div>
                                <a href="/posts/76" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card front-card h-auto shadow rounded">
                                <img src="http://via.placeholder.com/640x360" class="card-img-top" height="175" style="object-fit: cover;">
                                <div class="card-body">
                                    <h4 class="card-title trail-end">SPATHOGLOTTIS KARYOTYPING OF MITOTIC CHROMOSOMES (PROCESS FOR KARYOTYPING MITOTIC CHROMOSOMES OF SPATHOGLOTTIS SPP. AND OTHER ORCHIDS)</h4>
                                    <div class="card-text trail-end" style="line-height: 120%;">
                                        <p class="mb-2"><b>November 11-13, 2019</b></p>
                                        <small>Region 10 · Robinson's Place, Valencia City, Bukidnon<br>
                                                                                                
                                                    ILAARRDEC 
                                                
                                                                                                                                                        · SMAARRDEC
                                                
                                                                                                                                                        · CVAARRDEC
                                                
                                                                                                                                                        · NOMCAARRD
                                                
                                                                                            <br>
                                                                                        </small>
                                    </div>
                                </div>
                                <a href="/posts/76" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card front-card h-auto shadow rounded">
                                <img src="http://via.placeholder.com/640x360" class="card-img-top" height="175" style="object-fit: cover;">
                                <div class="card-body">
                                    <h4 class="card-title trail-end">HERBAL DEWORMER AGAINST ROUNDWORMS OF SMALL RUMINANTS (HERBAL DEWORMER COMPOSITION AGAINST STRONGYLE WORMS OF SMALL RUMINANTS)</h4>
                                    <div class="card-text trail-end" style="line-height: 120%;">
                                        <p class="mb-2"><b>November 11-13, 2019</b></p>
                                        <small>Region 10 · Robinson's Place, Valencia City, Bukidnon<br>
                                                                                                
                                                    ILAARRDEC 
                                                
                                                                                                                                                        · SMAARRDEC
                                                
                                                                                                                                                        · CVAARRDEC
                                                
                                                                                                                                                        · NOMCAARRD
                                                
                                                                                            <br>
                                                                                        </small>
                                    </div>
                                </div>
                                <a href="/posts/76" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card front-card h-auto shadow rounded">
                                <img src="http://via.placeholder.com/640x360" class="card-img-top" height="175" style="object-fit: cover;">
                                <div class="card-body">
                                    <h4 class="card-title trail-end">ETHNOBOTANICAL ANTHELMINTIC FOR FREE RANGE NATIVE CHICKEN ( ETHNOBOTANICAL DEWORMER COMPOSITION FOR NATIVE CHICKEN)</h4>
                                    <div class="card-text trail-end" style="line-height: 120%;">
                                        <p class="mb-2"><b>November 11-13, 2019</b></p>
                                        <small>Region 10 · Robinson's Place, Valencia City, Bukidnon<br>
                                                                                                
                                                    ILAARRDEC 
                                                
                                                                                                                                                        · SMAARRDEC
                                                
                                                                                                                                                        · CVAARRDEC
                                                
                                                                                                                                                        · NOMCAARRD
                                                
                                                                                            <br>
                                                                                        </small>
                                    </div>
                                </div>
                                <a href="/posts/76" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card front-card h-auto shadow rounded">
                                <img src="http://via.placeholder.com/640x360" class="card-img-top" height="175" style="object-fit: cover;">
                                <div class="card-body">
                                    <h4 class="card-title trail-end">Rubber Production Using High Yielding Rubber Clones (Hyrc)</h4>
                                    <div class="card-text trail-end" style="line-height: 120%;">
                                        <p class="mb-2"><b>November 11-13, 2019</b></p>
                                        <small>Region 10 · Robinson's Place, Valencia City, Bukidnon<br>
                                                                                                
                                                    ILAARRDEC 
                                                
                                                                                                                                                        · SMAARRDEC
                                                
                                                                                                                                                        · CVAARRDEC
                                                
                                                                                                                                                        · NOMCAARRD
                                                
                                                                                            <br>
                                                                                        </small>
                                    </div>
                                </div>
                                <a href="/posts/76" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade extra mt-3 show active" id="dashboard">
                    
                    <div class="mx-5">
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
</style>

<script>

    $('.toggle-item').click(function() {
        $('.toggle-item').removeClass('active');
        $(this).addClass('active');
    });
    $(document).on('click', '.dropdown-menu li a', function() {
        $('#datebox').val($(this).html());
    }); 

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
    }
</script>



@endsection