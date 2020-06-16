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
          <div class="carousel-inner" style="max-height:550px">
            <div class="carousel-item active">
                <img class="card-img-top" src="/storage/page_images/banner1.jpg" width="100%" style="object-fit: cover;height:550px">
            </div>
            <div class="carousel-item">
                <img class="card-img-top" src="/storage/page_images/banner2.jpg" width="100%" style="object-fit: cover;height:550px">
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
    <div class="container">
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
        <div class="float-right row mr-0 nav">
            <span class="mt-1">View as:&nbsp;</span>
            <a data-toggle="tab" href="#list">
                <button type="button" id="list-view" style="border: 1px solid" class="btn btn-light toggle-item active" autocomplete="off">
                    List
                </button>
            </a>
            <a data-toggle="tab" href="#card">
                <button type="button" id="card-view" style="border: 1px solid" class="btn btn-light toggle-item" autocomplete="off">
                    Card View
                </button>
            </a>
            <a data-toggle="tab" href="#dashboard">
                <button type="button" id="dash-view" style="border: 1px solid" class="btn btn-light toggle-item" autocomplete="off">
                    Dashboard View
                </button>
            </a>
        </div>
        <script>
            $('.toggle-item').click(function() {
                $('.toggle-item').removeClass('active');
                $(this).addClass('active');
            });
        </script>   
        
        <div class="dropdown-divider"></div> 
        <div class="tab-content mb-5">
            <div class="tab-pane fade show active" id="list">
                <div class="card shadow mb-5">
                    <div style="padding-left:20px;padding-top:15px;padding-right:25px"> 
                        <span style="font-size:27px">Technologies</span>              
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
            <div class="tab-pane fade" id="dashboard">
                <div class="row">
                    <iframe src="https://76d743ccca0d401c8b4c15e47c49f6a1.asia-northeast1.gcp.cloud.es.io:9243/goto/6716b14448844e0a66928cb0a422244f?embed=true" height="1500" width="100%"></iframe>
                </div>
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

@endsection