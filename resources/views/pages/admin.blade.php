@extends('layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb pb-0" style="background-color:transparent">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">km4aanr</a></li>
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Technology Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Admin</li>
    </ol>
@endsection
@section('content')
<div class="container-fluid px-0">
    <div class="row mr-0" style="max-height:inherit; min-height:40rem">
        <div class="col-sm-2 bg-dark pr-0" style="min-height:777px">
            <div class="nav nav-tabs" style="border-bottom-width: 0px;">
                <?php 
                    $techApprovalCount = App\Technology::all()->where('approved', '==', '1')->count() + Victorlap\Approvable\Approval::open()->ofClass(App\Technology::class)->get()->count();
                    $applicabilityIndustryApprovalCount = App\ApplicabilityIndustry::all()->where('approved', '==', '1')->count() + Victorlap\Approvable\Approval::open()->ofClass(App\ApplicabilityIndustry::class)->get()->count();
                    $industryApprovalCount = App\Industry::all()->where('approved', '==', '1')->count() + Victorlap\Approvable\Approval::open()->ofClass(App\Industry::class)->get()->count();
                    $sectorApprovalCount = App\Sector::all()->where('approved', '==', '1')->count() + Victorlap\Approvable\Approval::open()->ofClass(App\Sector::class)->get()->count();
                    $commoditiesApprovalCount = App\Commodity::all()->where('approved', '==', '1')->count() + Victorlap\Approvable\Approval::open()->ofClass(App\Commodity::class)->get()->count();
                    $techCategoriesApprovalCount = App\TechnologyCategory::all()->where('approved', '==', '1')->count() + Victorlap\Approvable\Approval::open()->ofClass(App\TechnologyCategory::class)->get()->count();
                    $adopterTypesApprovalCount = App\AdopterType::all()->where('approved', '==', '1')->count() + Victorlap\Approvable\Approval::open()->ofClass(App\AdopterType::class)->get()->count();
                    $adoptersApprovalCount = App\Adopter::all()->where('approved', '==', '1')->count() + Victorlap\Approvable\Approval::open()->ofClass(App\Adopter::class)->get()->count();
                    $agencyApprovalCount = App\Agency::all()->where('approved', '==', '1')->count() + Victorlap\Approvable\Approval::open()->ofClass(App\Agency::class)->get()->count();
                    $generatorsApprovalCount = App\Generator::all()->where('approved', '==', '1')->count() + Victorlap\Approvable\Approval::open()->ofClass(App\Generator::class)->get()->count();
                    $administrationCount =  $applicabilityIndustryApprovalCount +
                                            $industryApprovalCount +
                                            $sectorApprovalCount +
                                            $commoditiesApprovalCount +
                                            $techCategoriesApprovalCount +
                                            $adopterTypesApprovalCount +
                                            $adoptersApprovalCount +
                                            $agencyApprovalCount +
                                            $generatorsApprovalCount;

                ?>
                <a class="list-group-item active" data-toggle="tab" href="#technology">Technologies <span class="badge badge-danger" style="{{$techApprovalCount > 0 ? '' : 'display:none'}}">{{$techApprovalCount}}</span></a>
                <div id="data-management-accordion" class="w-100">
                    <a class="list-group-item accordion-toggle collapsed" data-toggle="collapse" data-target="#data-management-collapse" aria-expanded="false" href="#">Administration <span class="badge badge-danger" style="{{$administrationCount > 0 ? '' : 'display:none'}}{{auth()->user()->user_level == 5 ? '' : 'display:none'}}">!</span></a>
                    <div id="data-management-collapse" class="collapse" data-parent="#data-management-accordion">
                        <a class="list-group-item ml-3" data-toggle="tab" href="#applicabilityIndustry">Technology Applicability - Industry <span class="badge badge-danger" style="{{$applicabilityIndustryApprovalCount > 0 ? '' : 'display:none'}}{{auth()->user()->user_level == 5 ? '' : 'display:none'}}">{{$applicabilityIndustryApprovalCount}}</span></a>
                        <a class="list-group-item ml-3" data-toggle="tab" href="#industry">Industries <span class="badge badge-danger" style="{{$industryApprovalCount > 0 ? '' : 'display:none'}}{{auth()->user()->user_level == 5 ? '' : 'display:none'}}">{{$industryApprovalCount}}</span></a>
                        <a class="list-group-item ml-3" data-toggle="tab" href="#sector">Sectors <span class="badge badge-danger" style="{{$sectorApprovalCount > 0 ? '' : 'display:none'}}{{auth()->user()->user_level == 5 ? '' : 'display:none'}}">{{$sectorApprovalCount}}</span></a>
                        <a class="list-group-item ml-3" data-toggle="tab" href="#commodity">Commodities <span class="badge badge-danger" style="{{$commoditiesApprovalCount > 0 ? '' : 'display:none'}}{{auth()->user()->user_level == 5 ? '' : 'display:none'}}">{{$commoditiesApprovalCount}}</span></a>
                        <a class="list-group-item ml-3" data-toggle="tab" href="#technologyCategory">Technology Categories <span class="badge badge-danger" style="{{$techCategoriesApprovalCount > 0 ? '' : 'display:none'}}{{auth()->user()->user_level == 5 ? '' : 'display:none'}}">{{$techCategoriesApprovalCount}}</span></a>
                        <a class="list-group-item ml-3" data-toggle="tab" href="#adopterType">Adopter Types <span class="badge badge-danger" style="{{$adopterTypesApprovalCount > 0 ? '' : 'display:none'}}{{auth()->user()->user_level == 5 ? '' : 'display:none'}}">{{$adopterTypesApprovalCount}}</span></a>
                        <a class="list-group-item ml-3" data-toggle="tab" href="#adopter">Adopters <span class="badge badge-danger" style="{{$adoptersApprovalCount > 0 ? '' : 'display:none'}}{{auth()->user()->user_level == 5 ? '' : 'display:none'}}">{{$adoptersApprovalCount}}</span></a>
                        <a class="list-group-item ml-3" data-toggle="tab" href="#agency">Agencies (Owner) <span class="badge badge-danger" style="{{$agencyApprovalCount > 0 ? '' : 'display:none'}}{{auth()->user()->user_level == 5 ? '' : 'display:none'}}">{{$agencyApprovalCount}}</span></a>
                        <a class="list-group-item ml-3" data-toggle="tab" href="#generator">Generators <span class="badge badge-danger" style="{{$generatorsApprovalCount > 0 ? '' : 'display:none'}}{{auth()->user()->user_level == 5 ? '' : 'display:none'}}">{{$generatorsApprovalCount}}</span></a>
                    </div>
                </div>
                @if(auth()->user()->user_level == 5)
                <div id="manage-users-accordion" class="w-100">
                    <a class="list-group-item accordion-toggle collapsed" data-toggle="collapse" data-target="#manage-users-collapse" aria-expanded="false" href="#">Manage Users</a>
                    <div id="manage-users-collapse" class="collapse" data-parent="#manage-users-accordion">
                        <a class="list-group-item ml-3" data-toggle="tab" href="#access_levels">Manage Access Levels</a>
                        <a class="list-group-item ml-3" data-toggle="tab" href="#manageUsers">Manage Users</a>
                        <a class="list-group-item ml-3" data-toggle="tab" href="#userMessages">User Messages</a>
                    </div>
                </div>
                <div id="manage-page-accordion" class="w-100">
                    <a class="list-group-item accordion-toggle collapsed" data-toggle="collapse" data-target="#manage-page-collapse" aria-expanded="false" href="#">Manage Page</a>
                    <div id="manage-page-collapse" class="collapse" data-parent="#manage-page-accordion">
                        <a class="list-group-item ml-3" href="/admin/manageLandingPage">Manage Landing Page</a>
                    </div>
                </div>
                @endif
                <a class="list-group-item" data-toggle="tab" href="#activity">Activity Logs</a>
            </div>
            <style>
                .list-group-item{
                    width:100%;
                    border: 0px;
                }
                .accordion-toggle:after {
                    /* symbol for "opening" panels */
                    font-family: "Font Awesome 5 Free";
                    display: inline-block;
                    padding-right: 3px;
                    vertical-align: middle;
                    font-weight:900;
                    content: "\f078";    /* adjust as needed, taken from bootstrap.css */
                    float: right;        /* adjust as needed */
                    color: white;         /* adjust as needed */
                }
                .accordion-toggle.collapsed:after {
                    /* symbol for "collapsed" panels */
                    content: "\f054";    /* adjust as needed, taken from bootstrap.css */
                }
            </style>
            <script>
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    // gets activated tab
                    var target = $(e.target).attr("href");
                    // remove active from all other menu items
                    $(".nav a").removeClass("active");
                    // set active for current menu item
                    $('a[href="' + target + '"]').addClass('active');
                    $('a[href="' + target + '"]').parent('div').addClass('show');
                    $('a[href="' + target + '"]').parent('div').prev().removeClass('collapsed');
                });

                $(function() {
                    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                        localStorage.setItem('lastTab', $(this).attr('href'));
                    });
                    var lastTab = localStorage.getItem('lastTab');
                    if (lastTab) {
                        $('[href="' + lastTab + '"]').tab('show');
                    }
                });
            </script>
        </div>
        
        <div class="col-sm-10">
            <div class="mt-3">
                @include('inc.messages')
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="technology">
                    <div class="row mt-3">
                        <a href="{{ route('pages.getAdmin', ['showTechnologies' => 'all'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showTechnologies=='all' || !request()->showTechnologies ? 'chosen' : ''}}" autocomplete="off">
                                All Technologies <span class="badge badge-primary">{{App\Technology::all()->where('approved', '=', '2')->count()}}</span>
                            </button>
                        </a>
                        <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                        <a href="{{ route('pages.getAdmin', ['showTechnologies' => 'user'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showTechnologies=='user' ? 'chosen' : ''}}" autocomplete="off">
                                My Items <span class="badge badge-{{App\Technology::all()->where('user_id','=',auth()->user()->id)->count() > 0 ? 'primary' : 'secondary'}}">{{App\Technology::all()->where('user_id','=',auth()->user()->id)->count()}}</span>
                            </button>
                        </a>
                        @if(auth()->user()->user_level == 5)
                            <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                            <a href="{{ route('pages.getAdmin', ['showTechnologies' => 'approval'])}}" style="padding-left:15px">
                                <button type="button" class="btn btn-flat {{ request()->showTechnologies=='approval' ? 'chosen' : ''}}" autocomplete="off">
                                    Awaiting Approval <span class="badge badge-{{$techApprovalCount > 0 ? 'danger' : 'secondary'}}">{{$techApprovalCount}}</span>
                                </button>
                            </a>
                        @endif
                    </div>
                    @if(request()->showTechnologies=='user')
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>My Technologies 
                                <a type="button" class="btn btn-default text-right float-right" href="/admin/tech/add"><i class="fas fa-plus"></i> Add</a> 
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="5%">Tech ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="60%">Title</th>
                                        <th class="text-center" width="10%">Status</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Technology::where('user_id', '=', Auth::user()->id)->get() as $tech)
                                        <tr>
                                            <td>{{ $tech->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($tech->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $tech->title }}</td>
                                            <td>
                                                <div class="d-none d-sm-block status-pill {{$tech->approved == 2 ? 'approved-pill' : ''}} {{$tech->approved == 1 ? 'pending-pill' : ''}} {{$tech->approved == 0 ? 'inactive-pill' : ''}} text-center">
                                                    <h5 class="text-white" style="font-weight:800">{{$tech->approved == 2 ? 'Published' : ''}} {{$tech->approved == 1 ? 'Pending' : ''}} {{$tech->approved == 0 ? 'Inactive' : ''}}</h5>
                                                </div>
                                            </td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['TechnologiesController@togglePublishTechnology', $tech->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-primary px-1 py-1" style="font-weight:800">{{$tech->approved == 0 ? 'Publish' : 'Unpublish'}}</button> 
                                                {{ Form::close() }}
                                                <a href="/admin/tech/{{$tech->id}}/edit" class="btn btn-secondary px-2 py-1"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger px-2 py-1" data-toggle="modal" data-target="#deleteTechnologyModal-{{$tech->id}}"><i class="fas fa-minus"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @elseif(request()->showTechnologies=='approval')
                    <div class="card">
                        <div class="card-header">
                            <h2>Technologies Awaiting Approval 
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="10%">User</th>
                                        <th width="5%">Tech ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="60%">Title</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Technology::where('approved', '=', '1')->get() as $techNewPending)
                                        <tr>
                                            <?php $technologyUser = App\User::where('id', '=', $techNewPending->user_id)->get()->pluck('name')?>
                                            <td>{{ $technologyUser->first() }}</td>
                                            <td>{{ $techNewPending->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($techNewPending->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $techNewPending->title }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['TechnologiesController@approveTechnology', $techNewPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['TechnologiesController@rejectTechnology', $techNewPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <a href="/admin/tech/{{$techNewPending->id}}/edit" class="btn btn-secondary px-2 py-1"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger px-2 py-1" data-toggle="modal" data-target="#deleteTechnologyModal-{{$techNewPending->id}}"><i class="fas fa-minus"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach(Victorlap\Approvable\Approval::open()->ofClass(App\Technology::class)->get() as $techEditApproval)
                                        <tr>
                                            <?php $technologyUser = App\User::where('id', '=', $techEditApproval->user_id)->get()->pluck('name')?>
                                            <td>{{ $technologyUser->first() }}</td>
                                            <td>{{ $techEditApproval->approvable_id }}</td>
                                            <td>{{ Carbon\Carbon::parse($techEditApproval->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $techEditApproval->title }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['TechnologiesController@approveTechnology', $techEditApproval->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['TechnologiesController@rejectTechnology', $techEditApproval->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <a href="/admin/tech/{{$techEditApproval->approvable_id}}/edit" class="btn btn-secondary px-2 py-1"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-danger px-2 py-1" data-toggle="modal" data-target="#deleteTechnologyModal-{{$techEditApproval->approvable_id}}"><i class="fas fa-minus"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <h2>All Technologies
                            <span class="float-right">
                                <a href="/admin/tech/add" class="btn btn-default"><i class="fas fa-plus"></i> Add</a>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table tech-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Technology Applicability - Region</th>
                                            <th>Technology Applicability - Industry</th>
                                            <th>Category</th>
                                            <th>Industry</th>
                                            <th>Sector</th>
                                            <th>Commodity</th>
                                            <th>Year</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(App\Technology::where('approved', '=', '2')->get() as $tech)
                                            <tr data-toggle="modal" data-id="2" data-target="#techModal-{{$tech->id}}">
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$tech->id}}</td>
                                                <td>{{$tech->title}}</td>
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
                                                            <i>{{ $commodity->sector->industry->name }} </i>
                                                            @else
                                                            <i> <br>{{ $commodity->sector->industry->name }} </i>
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
                                                            <i><br> {{ $commodity->name }} </i>
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
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="access_levels">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <h2>Access Levels
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createTechFieldModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="10%">#</th>
                                            <th width="40%">Name</th>
                                            <th width="20%">Slug</th>
                                            <th width="20%">Access Level</th>
                                            <th width="10%" class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(App\TechField::all() as $tech_field)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$tech_field->name}}</td>
                                                <td>{{$tech_field->slug}}</td>
                                                <td>{{$tech_field->level}}</td>
                                                <td class="text-right">
                                                    @if(auth()->user()->user_level == 5)
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editTechFieldModal-{{$tech_field->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteTechFieldModal-{{$tech_field->id}}"><i class="fas fa-trash"></i></button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="applicabilityIndustry">
                    <div class="row mt-3">
                        <a href="{{ route('pages.getAdmin', ['showApplicabilityIndustry' => 'all'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showApplicabilityIndustry=='all' || !request()->showApplicabilityIndustry ? 'chosen' : ''}}" autocomplete="off">
                                All Technology Applicability - Industries <span class="badge badge-primary">{{App\ApplicabilityIndustry::all()->where('approved', '=', '2')->count()}}</span>
                            </button>
                        </a>
                        <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                        <a href="{{ route('pages.getAdmin', ['showApplicabilityIndustry' => 'user'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showApplicabilityIndustry=='user' ? 'chosen' : ''}}" autocomplete="off">
                                My Items <span class="badge badge-{{App\ApplicabilityIndustry::all()->where('user_id','=',auth()->user()->id)->count() > 0 ? 'primary' : 'secondary'}}">{{App\ApplicabilityIndustry::all()->where('user_id','=',auth()->user()->id)->count()}}</span>
                            </button>
                        </a>
                        @if(auth()->user()->user_level == 5)
                            <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                            <a href="{{ route('pages.getAdmin', ['showApplicabilityIndustry' => 'approval'])}}" style="padding-left:15px">
                                <button type="button" class="btn btn-flat {{ request()->showApplicabilityIndustry=='approval' ? 'chosen' : ''}}" autocomplete="off">
                                    Awaiting Approval <span class="badge badge-{{$applicabilityIndustryApprovalCount > 0 ? 'danger' : 'secondary'}}">{{$applicabilityIndustryApprovalCount}}</span>
                                </button>
                            </a>
                        @endif
                    </div>
                    @if(request()->showApplicabilityIndustry == "user")
                        <div class="card shadow">
                            <div class="card-header">
                                <h2>
                                My Technology Applicability - Industries
                                <span class="float-right">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createApplicabilityIndustryModal"><i class="fas fa-plus"></i> Add</button>
                                </span></h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="10%">#</th>
                                                <th width="70%">Name</th>
                                                <th width="10%">Status</th>
                                                <th width="10%" class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(App\ApplicabilityIndustry::all()->where('user_id','=',auth()->user()->id) as $applicabilityIndustry)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$applicabilityIndustry->name}}</td>
                                                    <td>
                                                        <div class="d-none d-sm-block status-pill {{$applicabilityIndustry->approved == 2 ? 'approved-pill' : ''}} {{$applicabilityIndustry->approved == 1 ? 'pending-pill' : ''}} {{$applicabilityIndustry->approved == 0 ? 'inactive-pill' : ''}} text-center">
                                                            <h5 class="text-white" style="font-weight:800">{{$applicabilityIndustry->approved == 2 ? 'Published' : ''}} {{$applicabilityIndustry->approved == 1 ? 'Pending' : ''}} {{$applicabilityIndustry->approved == 0 ? 'Inactive' : ''}}</h5>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        {{ Form::open(['action' => ['ApplicabilityIndustriesController@togglePublishApplicabilityIndustry', $applicabilityIndustry->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                            <button class="btn btn-primary px-1 py-1" style="font-weight:800">{{$applicabilityIndustry->approved == 0 ? 'Publish' : 'Unpublish'}}</button> 
                                                        {{ Form::close() }}
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editApplicabilityIndustryModal-{{$applicabilityIndustry->id}}"><i class="fas fa-edit"></i></button>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteApplicabilityIndustryModal-{{$applicabilityIndustry->id}}"><i class="fas fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @elseif(request()->showApplicabilityIndustry == "approval")
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>
                            Technology Applicability - Industries Awaiting Approval
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createApplicabilityIndustryModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="10%">User</th>
                                        <th width="15%">Applicability - Industry ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="50%">Title</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\ApplicabilityIndustry::where('approved', '=', '1')->get() as $applicabilityIndustryPending)
                                        <tr>
                                            <?php $industryUser = App\User::where('id', '=', $applicabilityIndustryPending->user_id)->get()->pluck('name')?>
                                            <td>{{ $industryUser->first() }}</td>
                                            <td>{{ $applicabilityIndustryPending->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($applicabilityIndustryPending->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $applicabilityIndustryPending->name }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['ApplicabilityIndustriesController@approveApplicabilityIndustry', $applicabilityIndustryPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['ApplicabilityIndustriesController@rejectApplicabilityIndustry', $applicabilityIndustryPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editApplicabilityIndustryModal-{{$applicabilityIndustry->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteApplicabilityIndustryModal-{{$applicabilityIndustry->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach(Victorlap\Approvable\Approval::ofClass(App\ApplicabilityIndustry::class)->open()->get() as $applicabilityIndustryApprovals)
                                        <tr>
                                            <?php $industryUser = App\User::where('id', '=', $applicabilityIndustryApprovals->user_id)->get()->pluck('name')?>
                                            <td>{{ $industryUser->first() }}</td>
                                            <td>{{ $applicabilityIndustryApprovals->approvable_id }}</td>
                                            <td>{{ Carbon\Carbon::parse($applicabilityIndustryApprovals->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $applicabilityIndustryApprovals->title }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['ApplicabilityIndustriesController@approveApplicabilityIndustry', $applicabilityIndustryApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['ApplicabilityIndustriesController@rejectApplicabilityIndustry', $applicabilityIndustryApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editApplicabilityIndustryModal-{{$applicabilityIndustry->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteApplicabilityIndustryModal-{{$applicabilityIndustry->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <h2>
                            All Technology Applicability - Industry
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createApplicabilityIndustryModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="10%">#</th>
                                            <th width="80%">Name</th>
                                            <th width="10%" class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(App\ApplicabilityIndustry::where('approved', '=', '2')->get() as $applicabilityIndustry)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$applicabilityIndustry->name}}</td>
                                                <td class="text-right">
                                                    @if(auth()->user()->user_level == 5)
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editApplicabilityIndustryModal-{{$applicabilityIndustry->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteApplicabilityIndustryModal-{{$applicabilityIndustry->id}}"><i class="fas fa-trash"></i></button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="industry">
                    <div class="row mt-3">
                        <a href="{{ route('pages.getAdmin', ['showIndustry' => 'all'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showIndustry=='all' || !request()->showIndustry ? 'chosen' : ''}}" autocomplete="off">
                                All Industries <span class="badge badge-primary">{{App\Industry::all()->where('approved', '=', '2')->count()}}</span>
                            </button>
                        </a>
                        <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                        <a href="{{ route('pages.getAdmin', ['showIndustry' => 'user'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showIndustry=='user' ? 'chosen' : ''}}" autocomplete="off">
                                My Items <span class="badge badge-{{App\Industry::all()->where('user_id','=',auth()->user()->id)->count() > 0 ? 'primary' : 'secondary'}}">{{App\Industry::all()->where('user_id','=',auth()->user()->id)->count()}}</span>
                            </button>
                        </a>
                        @if(auth()->user()->user_level == 5)
                            <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                            <a href="{{ route('pages.getAdmin', ['showIndustry' => 'approval'])}}" style="padding-left:15px">
                                <button type="button" class="btn btn-flat {{ request()->showIndustry=='approval' ? 'chosen' : ''}}" autocomplete="off">
                                    Awaiting Approval <span class="badge badge-{{$industryApprovalCount > 0 ? 'danger' : 'secondary'}}">{{$industryApprovalCount}}</span>
                                </button>
                            </a>
                        @endif
                    </div>
                    @if(request()->showIndustry=='user')
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>My Industries 
                                <a type="button" class="btn btn-default text-right float-right" data-toggle="modal" data-target="#createIndustryModal"><i class="fas fa-plus"></i> Add</a> 
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="5%">Industry ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="60%">Name</th>
                                        <th class="text-center" width="10%">Status</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Industry::where('user_id', '=', Auth::user()->id)->get() as $industry)
                                        <tr>
                                            <td>{{ $industry->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($industry->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $industry->title }}</td>
                                            <td>
                                                <div class="d-none d-sm-block status-pill {{$industry->approved == 2 ? 'approved-pill' : ''}} {{$industry->approved == 1 ? 'pending-pill' : ''}} {{$industry->approved == 0 ? 'inactive-pill' : ''}} text-center">
                                                    <h5 class="text-white" style="font-weight:800">{{$industry->approved == 2 ? 'Published' : ''}} {{$industry->approved == 1 ? 'Pending' : ''}} {{$industry->approved == 0 ? 'Inactive' : ''}}</h5>
                                                </div>
                                            </td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['IndustriesController@togglePublishIndustry', $industry->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-primary px-1 py-1" style="font-weight:800">{{$industry->approved == 0 ? 'Publish' : 'Unpublish'}}</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editIndustryModal-{{$industry->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteIndustryModal-{{$industry->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @elseif(request()->showIndustry=='approval')
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>
                            Industries Awaiting Approval
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createIndustryModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="10%">User</th>
                                        <th width="15%">Industry ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="50%">Title</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Industry::where('approved', '=', '1')->get() as $industryPending)
                                        <tr>
                                            <?php $industryUser = App\User::where('id', '=', $industryPending->user_id)->get()->pluck('name')?>
                                            <td>{{ $industryUser->first() }}</td>
                                            <td>{{ $industryPending->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($industryPending->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $industryPending->name }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['IndustriesController@approveIndustry', $industryPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['IndustriesController@rejectIndustry', $industryPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editIndustryModal-{{$industryPending->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteIndustryModal-{{$industryPending->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach(Victorlap\Approvable\Approval::ofClass(App\Industry::class)->open()->get() as $industryApprovals)
                                        <tr>
                                            <?php $industryUser = App\User::where('id', '=', $industryApprovals->user_id)->get()->pluck('name')?>
                                            <td>{{ $industryUser->first() }}</td>
                                            <td>{{ $industryApprovals->approvable_id }}</td>
                                            <td>{{ Carbon\Carbon::parse($industryApprovals->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $industryApprovals->title }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['IndustriesController@approveIndustry', $industryApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['IndustriesController@rejectIndustry', $industryApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editIndustryModal-{{$industryApprovals->approvable_id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteIndustryModal-{{$industryApprovals->approvable_id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <h2>
                            All Industries
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createIndustryModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="10%">#</th>
                                            <th width="80%">Industry</th>
                                            <th width="10%" class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(App\Industry::all()->where('approved', '=', '2') as $industry)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$industry->name}}</td>
                                                <td class="text-right">
                                                    @if(auth()->user()->user_level == 5)
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editIndustryModal-{{$industry->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteIndustryModal-{{$industry->id}}"><i class="fas fa-trash"></i></button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="sector">
                    <div class="row mt-3">
                        <a href="{{ route('pages.getAdmin', ['showSector' => 'all'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showSector=='all' || !request()->showSector ? 'chosen' : ''}}" autocomplete="off">
                                All Sectors <span class="badge badge-primary">{{App\Sector::all()->where('approved', '=', '2')->count()}}</span>
                            </button>
                        </a>
                        <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                        <a href="{{ route('pages.getAdmin', ['showSector' => 'user'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showSector=='user' ? 'chosen' : ''}}" autocomplete="off">
                                My Items <span class="badge badge-{{App\Sector::all()->where('user_id','=',auth()->user()->id)->count() > 0 ? 'primary' : 'secondary'}}">{{App\Sector::all()->where('user_id','=',auth()->user()->id)->count()}}</span>
                            </button>
                        </a>
                        @if(auth()->user()->user_level == 5)
                            <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                            <a href="{{ route('pages.getAdmin', ['showSector' => 'approval'])}}" style="padding-left:15px">
                                <button type="button" class="btn btn-flat {{ request()->showSector=='approval' ? 'chosen' : ''}}" autocomplete="off">
                                    Awaiting Approval <span class="badge badge-{{$sectorApprovalCount > 0 ? 'danger' : 'secondary'}}">{{$sectorApprovalCount}}</span>
                                </button>
                            </a>
                        @endif
                    </div>
                    @if(request()->showSector == 'user')
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>My Sectors 
                                <a type="button" class="btn btn-default text-right float-right" data-toggle="modal" data-target="#createSectorModal"><i class="fas fa-plus"></i> Add</a> 
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="5%">Sector ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="60%">Name</th>
                                        <th class="text-center" width="10%">Status</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Sector::where('user_id', '=', Auth::user()->id)->get() as $sector)
                                        <tr>
                                            <td>{{ $sector->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($sector->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $sector->title }}</td>
                                            <td>
                                                <div class="d-none d-sm-block status-pill {{$sector->approved == 2 ? 'approved-pill' : ''}} {{$sector->approved == 1 ? 'pending-pill' : ''}} {{$sector->approved == 0 ? 'inactive-pill' : ''}} text-center">
                                                    <h5 class="text-white" style="font-weight:800">{{$sector->approved == 2 ? 'Published' : ''}} {{$sector->approved == 1 ? 'Pending' : ''}} {{$sector->approved == 0 ? 'Inactive' : ''}}</h5>
                                                </div>
                                            </td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['SectorsController@togglePublishSector', $sector->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-primary px-1 py-1" style="font-weight:800">{{$sector->approved == 0 ? 'Publish' : 'Unpublish'}}</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSectorModal-{{$sector->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteSectorModal-{{$sector->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @elseif(request()->showSector == 'approval')
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>
                            Sectors Awaiting Approval
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createSectorModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="10%">User</th>
                                        <th width="15%">Sector ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="50%">Title</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Sector::where('approved', '=', '1')->get() as $sectorPending)
                                        <tr>
                                            <?php $sectorUser = App\User::where('id', '=', $sectorPending->user_id)->get()->pluck('name')?>
                                            <td>{{ $sectorUser->first() }}</td>
                                            <td>{{ $sectorPending->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($sectorPending->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $sectorPending->name }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['SectorsController@approveSector', $sectorPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['SectorsController@rejectSector', $sectorPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSectorModal-{{$sectorPending->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteSectorModal-{{$sectorPending->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach(Victorlap\Approvable\Approval::ofClass(App\Sector::class)->open()->get() as $sectorApprovals)
                                        <tr>
                                            <?php $sectorUser = App\User::where('id', '=', $sectorApprovals->user_id)->get()->pluck('name')?>
                                            <td>{{ $sectorUser->first() }}</td>
                                            <td>{{ $sectorApprovals->approvable_id }}</td>
                                            <td>{{ Carbon\Carbon::parse($sectorApprovals->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $sectorApprovals->title }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['SectorsController@approveSector', $sectorApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['SectorsController@rejectSector', $sectorApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSectorModal-{{$sectorApprovals->approvable_id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteSectorModal-{{$sectorApprovals->approvable_id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <h2>
                            All Sectors
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createSectorModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th width="40%">Sector</th>
                                        <th width="40%">Industry</th>
                                        <th width="10%" class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\Sector::all()->where('approved', '=', '2') as $sector)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$sector->name}}</td>
                                            <td>{{$sector->industry->name}}</td>
                                            <td class="text-right">
                                                @if(auth()->user()->user_level == 5)
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSectorModal-{{$sector->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteSectorModal-{{$sector->id}}"><i class="fas fa-trash"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="commodity">
                    <div class="row mt-3">
                        <a href="{{ route('pages.getAdmin', ['showCommodity' => 'all'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showCommodity=='all' || !request()->showCommodity ? 'chosen' : ''}}" autocomplete="off">
                                All Commodities <span class="badge badge-primary">{{App\Commodity::all()->where('approved', '=', '2')->count()}}</span>
                            </button>
                        </a>
                        <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                        <a href="{{ route('pages.getAdmin', ['showCommodity' => 'user'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showCommodity=='user' ? 'chosen' : ''}}" autocomplete="off">
                                My Items <span class="badge badge-{{App\Commodity::all()->where('user_id','=',auth()->user()->id)->count() > 0 ? 'primary' : 'secondary'}}">{{App\Commodity::all()->where('user_id','=',auth()->user()->id)->count()}}</span>
                            </button>
                        </a>
                        @if(auth()->user()->user_level == 5)
                            <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                            <a href="{{ route('pages.getAdmin', ['showCommodity' => 'approval'])}}" style="padding-left:15px">
                                <button type="button" class="btn btn-flat {{ request()->showCommodity=='approval' ? 'chosen' : ''}}" autocomplete="off">
                                    Awaiting Approval <span class="badge badge-{{$commoditiesApprovalCount > 0 ? 'danger' : 'secondary'}}">{{$commoditiesApprovalCount}}</span>
                                </button>
                            </a>
                        @endif
                    </div>
                    @if(request()->showCommodity == 'user')
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>My Commodities 
                                <a type="button" class="btn btn-default text-right float-right" data-toggle="modal" data-target="#createCommodityModal"><i class="fas fa-plus"></i> Add</a> 
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="5%">Commodity ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="60%">Name</th>
                                        <th class="text-center" width="10%">Status</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Commodity::where('user_id', '=', Auth::user()->id)->get() as $commodity)
                                        <tr>
                                            <td>{{ $commodity->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($commodity->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $commodity->name }}</td>
                                            <td>
                                                <div class="d-none d-sm-block status-pill {{$commodity->approved == 2 ? 'approved-pill' : ''}} {{$commodity->approved == 1 ? 'pending-pill' : ''}} {{$commodity->approved == 0 ? 'inactive-pill' : ''}} text-center">
                                                    <h5 class="text-white" style="font-weight:800">{{$commodity->approved == 2 ? 'Published' : ''}} {{$commodity->approved == 1 ? 'Pending' : ''}} {{$commodity->approved == 0 ? 'Inactive' : ''}}</h5>
                                                </div>
                                            </td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['CommoditiesController@togglePublishCommodity', $commodity->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-primary px-1 py-1" style="font-weight:800">{{$commodity->approved == 0 ? 'Publish' : 'Unpublish'}}</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editCommodityModal-{{$commodity->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteCommodityModal-{{$commodity->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @elseif(request()->showCommodity == 'approval')
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>
                            Commodities Awaiting Approval
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createCommodityModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="10%">User</th>
                                        <th width="15%">Commodity ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="50%">Title</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Commodity::where('approved', '=', '1')->get() as $commodityPending)
                                        <tr>
                                            <?php $commodityUser = App\User::where('id', '=', $commodityPending->user_id)->get()->pluck('name')?>
                                            <td>{{ $commodityUser->first() }}</td>
                                            <td>{{ $commodityPending->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($commodityPending->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $commodityPending->name }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['CommoditiesController@approveCommodity', $commodityPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['CommoditiesController@rejectCommodity', $commodityPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editCommodityModal-{{$commodityPending->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteCommodityModal-{{$commodityPending->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach(Victorlap\Approvable\Approval::ofClass(App\Commodity::class)->open()->get() as $commodityApprovals)
                                        <tr>
                                            <?php $commodityUser = App\User::where('id', '=', $commodityApprovals->user_id)->get()->pluck('name')?>
                                            <td>{{ $commodityUser->first() }}</td>
                                            <td>{{ $commodityApprovals->approvable_id }}</td>
                                            <td>{{ Carbon\Carbon::parse($commodityApprovals->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $commodityApprovals->title }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['CommoditiesController@approveCommodity', $commodityApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['CommoditiesController@rejectCommodity', $commodityApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editCommodityModal-{{$commodityApprovals->approvable_id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteCommodityModal-{{$commodityApprovals->approvable_id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <h2>
                            All Commodities
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createCommodityModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th width="40%">Commodity</th>
                                        <th width="40%">Industry - Sector</th>
                                        <th width="10%" class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\Commodity::all()->where('approved', '=', '2') as $commodity)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$commodity->name}}</td>
                                            <td>{{$commodity->sector->industry->name}} - {{$commodity->sector->name}}</td>
                                            <td class="text-right">
                                                @if(auth()->user()->user_level == 5)
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editCommodityModal-{{$commodity->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteCommodityModal-{{$commodity->id}}"><i class="fas fa-trash"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="technologyCategory">
                    <div class="row mt-3">
                        <a href="{{ route('pages.getAdmin', ['showTechCategory' => 'all'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showTechCategory=='all' || !request()->showTechCategory ? 'chosen' : ''}}" autocomplete="off">
                                All Technology Categories <span class="badge badge-primary">{{App\TechnologyCategory::all()->where('approved', '=', '2')->count()}}</span>
                            </button>
                        </a>
                        <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                        <a href="{{ route('pages.getAdmin', ['showTechCategory' => 'user'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showTechCategory=='user' ? 'chosen' : ''}}" autocomplete="off">
                                My Items <span class="badge badge-{{App\TechnologyCategory::all()->where('user_id','=',auth()->user()->id)->count() > 0 ? 'primary' : 'secondary'}}">{{App\TechnologyCategory::all()->where('user_id','=',auth()->user()->id)->count()}}</span>
                            </button>
                        </a>
                        @if(auth()->user()->user_level == 5)
                            <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                            <a href="{{ route('pages.getAdmin', ['showTechCategory' => 'approval'])}}" style="padding-left:15px">
                                <button type="button" class="btn btn-flat {{ request()->showTechCategory=='approval' ? 'chosen' : ''}}" autocomplete="off">
                                    Awaiting Approval <span class="badge badge-{{$techCategoriesApprovalCount > 0 ? 'danger' : 'secondary'}}">{{$techCategoriesApprovalCount}}</span>
                                </button>
                            </a>
                        @endif
                    </div>
                    @if(request()->showTechCategory == "user")
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>My Technology Categories 
                                <a type="button" class="btn btn-default text-right float-right" data-toggle="modal" data-target="#createTechnologyCategoryModal"><i class="fas fa-plus"></i> Add</a> 
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="5%">Technology Category ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="45%">Name</th>
                                        <th class="text-center" width="25%">Status</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\TechnologyCategory::where('user_id', '=', Auth::user()->id)->get() as $technologyCategory)
                                        <tr>
                                            <td>{{ $technologyCategory->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($technologyCategory->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td width="45%">{{ $technologyCategory->name }}</td>
                                            <td width="25%">
                                                <div class="d-none d-sm-block status-pill {{$technologyCategory->approved == 2 ? 'approved-pill' : ''}} {{$technologyCategory->approved == 1 ? 'pending-pill' : ''}} {{$technologyCategory->approved == 0 ? 'inactive-pill' : ''}} text-center">
                                                    <h5 class="text-white" style="font-weight:800">{{$technologyCategory->approved == 2 ? 'Published' : ''}} {{$technologyCategory->approved == 1 ? 'Pending' : ''}} {{$technologyCategory->approved == 0 ? 'Inactive' : ''}}</h5>
                                                </div>
                                            </td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['TechnologyCategoriesController@togglePublishTechnologyCategory', $technologyCategory->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-primary px-1 py-1" style="font-weight:800">{{$technologyCategory->approved == 0 ? 'Publish' : 'Unpublish'}}</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editTechnologyCategoryModal-{{$technologyCategory->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteTechnologyCategoryModal-{{$technologyCategory->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @elseif(request()->showTechCategory == "approval")
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>
                            Technology Categories Awaiting Approval
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createTechnologyCategoryModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="10%">User</th>
                                        <th width="15%">Technology Category ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="50%">Title</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\TechnologyCategory::where('approved', '=', '1')->get() as $technologyCategoryPending)
                                        <tr>
                                            <?php $technologyCategoryUser = App\User::where('id', '=', $technologyCategoryPending->user_id)->get()->pluck('name')?>
                                            <td>{{ $technologyCategoryUser->first() }}</td>
                                            <td>{{ $technologyCategoryPending->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($technologyCategoryPending->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $technologyCategoryPending->name }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['TechnologyCategoriesController@approveTechnologyCategory', $technologyCategoryPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['TechnologyCategoriesController@rejectTechnologyCategory', $technologyCategoryPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editTechnologyCategoryModal-{{$technologyCategoryPending->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteTechnologyCategoryModal-{{$technologyCategoryPending->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach(Victorlap\Approvable\Approval::ofClass(App\TechnologyCategory::class)->open()->get() as $technologyCategoryApprovals)
                                        <tr>
                                            <?php $technologyCategoryUser = App\User::where('id', '=', $technologyCategoryApprovals->user_id)->get()->pluck('name')?>
                                            <td>{{ $technologyCategoryUser->first() }}</td>
                                            <td>{{ $technologyCategoryApprovals->approvable_id }}</td>
                                            <td>{{ Carbon\Carbon::parse($technologyCategoryApprovals->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $technologyCategoryApprovals->title }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['TechnologyCategoriesController@approveTechnologyCategory', $technologyCategoryApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['TechnologyCategoriesController@rejectTechnologyCategory', $technologyCategoryApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editTechnologyCategoryModal-{{$technologyCategoryApprovals->approvable_id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteTechnologyCategoryModal-{{$technologyCategoryApprovals->approvable_id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <h2>
                            All Technology Categories
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createTechnologyCategoryModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th width="80%">Name</th>
                                        <th width="10%" class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\TechnologyCategory::all()->where('approved', '=', '2') as $technologyCategory)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$technologyCategory->name}}</td>
                                            <td class="text-right">
                                                @if(auth()->user()->user_level == 5)
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editTechnologyCategoryModal-{{$technologyCategory->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteTechnologyCategoryModal-{{$technologyCategory->id}}"><i class="fas fa-trash"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="adopterType">
                    <div class="row mt-3">
                        <a href="{{ route('pages.getAdmin', ['showAdopterType' => 'all'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showAdopterType=='all' || !request()->showAdopterType ? 'chosen' : ''}}" autocomplete="off">
                                All Adopter Types <span class="badge badge-primary">{{App\AdopterType::all()->where('approved', '=', '2')->count()}}</span>
                            </button>
                        </a>
                        <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                        <a href="{{ route('pages.getAdmin', ['showAdopterType' => 'user'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showAdopterType=='user' ? 'chosen' : ''}}" autocomplete="off">
                                My Items <span class="badge badge-{{App\AdopterType::all()->where('user_id','=',auth()->user()->id)->count() > 0 ? 'primary' : 'secondary'}}">{{App\AdopterType::all()->where('user_id','=',auth()->user()->id)->count()}}</span>
                            </button>
                        </a>
                        @if(auth()->user()->user_level == 5)
                            <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                            <a href="{{ route('pages.getAdmin', ['showAdopterType' => 'approval'])}}" style="padding-left:15px">
                                <button type="button" class="btn btn-flat {{ request()->showAdopterType=='approval' ? 'chosen' : ''}}" autocomplete="off">
                                    Awaiting Approval <span class="badge badge-{{$adopterTypesApprovalCount > 0 ? 'danger' : 'secondary'}}">{{$adopterTypesApprovalCount}}</span>
                                </button>
                            </a>
                        @endif
                    </div>
                    @if(request()->showAdopterType == "user")
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>My Adopter Types 
                                <a type="button" class="btn btn-default text-right float-right" data-toggle="modal" data-target="#createAdopterTypeModal"><i class="fas fa-plus"></i> Add</a> 
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="5%">Adopter Type ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="60%">Name</th>
                                        <th class="text-center" width="10%">Status</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\AdopterType::where('user_id', '=', Auth::user()->id)->get() as $adopterType)
                                        <tr>
                                            <td>{{ $adopterType->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($adopterType->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $adopterType->name }}</td>
                                            <td>
                                                <div class="d-none d-sm-block status-pill {{$adopterType->approved == 2 ? 'approved-pill' : ''}} {{$adopterType->approved == 1 ? 'pending-pill' : ''}} {{$adopterType->approved == 0 ? 'inactive-pill' : ''}} text-center">
                                                    <h5 class="text-white" style="font-weight:800">{{$adopterType->approved == 2 ? 'Published' : ''}} {{$adopterType->approved == 1 ? 'Pending' : ''}} {{$adopterType->approved == 0 ? 'Inactive' : ''}}</h5>
                                                </div>
                                            </td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['AdopterTypesController@togglePublishAdopterType', $adopterType->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-primary px-1 py-1" style="font-weight:800">{{$adopterType->approved == 0 ? 'Publish' : 'Unpublish'}}</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAdopterTypeModal-{{$adopterType->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAdopterTypeModal-{{$adopterType->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @elseif(request()->showAdopterType == "approval")
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>
                            Adopter Types Awaiting Approval
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAdopterTypeModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="10%">User</th>
                                        <th width="15%">Adopter Type ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="50%">Title</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\AdopterType::where('approved', '=', '1')->get() as $adopterTypePending)
                                        <tr>
                                            <?php $adopterTypeUser = App\User::where('id', '=', $adopterTypePending->user_id)->get()->pluck('name')?>
                                            <td>{{ $adopterTypeUser->first() }}</td>
                                            <td>{{ $adopterTypePending->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($adopterTypePending->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $adopterTypePending->name }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['AdopterTypesController@approveAdopterType', $adopterTypePending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['AdopterTypesController@rejectAdopterType', $adopterTypePending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAdopterTypeModal-{{$adopterTypePending->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAdopterTypeModal-{{$adopterTypePending->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach(Victorlap\Approvable\Approval::ofClass(App\AdopterType::class)->open()->get() as $adopterTypeApprovals)
                                        <tr>
                                            <?php $adopterTypeUser = App\User::where('id', '=', $adopterTypeApprovals->user_id)->get()->pluck('name')?>
                                            <td>{{ $adopterTypeUser->first() }}</td>
                                            <td>{{ $adopterTypeApprovals->approvable_id }}</td>
                                            <td>{{ Carbon\Carbon::parse($adopterTypeApprovals->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $adopterTypeApprovals->title }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['AdopterTypesController@approveAdopterType', $adopterTypeApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['AdopterTypesController@rejectAdopterType', $adopterTypeApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAdopterTypeModal-{{$adopterTypeApprovals->approvable_id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAdopterTypeModal-{{$adopterTypeApprovals->approvable_id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <h2>
                            All Adopter Types
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAdopterTypeModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%">#</th>
                                        <th width="80%">Name</th>
                                        <th width="10%" class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\AdopterType::all()->where('approved', '=', '2') as $adopterType)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$adopterType->name}}</td>
                                            <td class="text-right">
                                                @if(auth()->user()->user_level == 5)
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAdopterTypeModal-{{$adopterType->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAdopterTypeModal-{{$adopterType->id}}"><i class="fas fa-trash"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div> 
                <div class="tab-pane fade" id="adopter">
                    <div class="row mt-3">
                        <a href="{{ route('pages.getAdmin', ['showAdopter' => 'all'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showAdopter=='all' || !request()->showAdopter ? 'chosen' : ''}}" autocomplete="off">
                                All Adopters <span class="badge badge-primary">{{App\Adopter::all()->where('approved', '=', '2')->count()}}</span>
                            </button>
                        </a>
                        <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                        <a href="{{ route('pages.getAdmin', ['showAdopter' => 'user'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showAdopter=='user' ? 'chosen' : ''}}" autocomplete="off">
                                My Items <span class="badge badge-{{App\Adopter::all()->where('user_id','=',auth()->user()->id)->count() > 0 ? 'primary' : 'secondary'}}">{{App\Adopter::all()->where('user_id','=',auth()->user()->id)->count()}}</span>
                            </button>
                        </a>
                        @if(auth()->user()->user_level == 5)
                            <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                            <a href="{{ route('pages.getAdmin', ['showAdopter' => 'approval'])}}" style="padding-left:15px">
                                <button type="button" class="btn btn-flat {{ request()->showAdopter=='approval' ? 'chosen' : ''}}" autocomplete="off">
                                    Awaiting Approval <span class="badge badge-{{$adoptersApprovalCount > 0 ? 'danger' : 'secondary'}}">{{$adoptersApprovalCount}}</span>
                                </button>
                            </a>
                        @endif
                    </div>
                    @if(request()->showAdopter == "user")
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>My Adopters
                                <a type="button" class="btn btn-default text-right float-right" data-toggle="modal" data-target="#createAdopterModal"><i class="fas fa-plus"></i> Add</a> 
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="5%">Adopter ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="60%">Name</th>
                                        <th class="text-center" width="10%">Status</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Adopter::where('user_id', '=', Auth::user()->id)->get() as $adopter)
                                        <tr>
                                            <td>{{ $adopter->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($adopter->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $adopter->name }}</td>
                                            <td>
                                                <div class="d-none d-sm-block status-pill {{$adopter->approved == 2 ? 'approved-pill' : ''}} {{$adopter->approved == 1 ? 'pending-pill' : ''}} {{$adopter->approved == 0 ? 'inactive-pill' : ''}} text-center">
                                                    <h5 class="text-white" style="font-weight:800">{{$adopter->approved == 2 ? 'Published' : ''}} {{$adopter->approved == 1 ? 'Pending' : ''}} {{$adopter->approved == 0 ? 'Inactive' : ''}}</h5>
                                                </div>
                                            </td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['Adopters@togglePublishAdopter', $adopter->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-primary px-1 py-1" style="font-weight:800">{{$adopter->approved == 0 ? 'Publish' : 'Unpublish'}}</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAdopterModal-{{$adopter->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAdopterModal-{{$adopter->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @elseif(request()->showAdopter == "approval")
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>
                            Adopters Awaiting Approval
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAdopterModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="10%">User</th>
                                        <th width="15%">Adopter ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="50%">Title</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Adopter::where('approved', '=', '1')->get() as $adopterPending)
                                        <tr>
                                            <?php $adopterUser = App\User::where('id', '=', $adopterPending->user_id)->get()->pluck('name')?>
                                            <td>{{ $adopterUser->first() }}</td>
                                            <td>{{ $adopterPending->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($adopterPending->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $adopterPending->name }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['AdoptersController@approveAdopter', $adopterPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['AdoptersController@rejectAdopter', $adopterPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAdopterModal-{{$adopterPending->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAdopterModal-{{$adopterPending->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach(Victorlap\Approvable\Approval::ofClass(App\Adopter::class)->open()->get() as $adopterApprovals)
                                        <tr>
                                            <?php $adopterUser = App\User::where('id', '=', $adopterApprovals->user_id)->get()->pluck('name')?>
                                            <td>{{ $adopterUser->first() }}</td>
                                            <td>{{ $adopterApprovals->approvable_id }}</td>
                                            <td>{{ Carbon\Carbon::parse($adopterApprovals->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $adopterApprovals->title }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['AdoptersController@approveAdopter', $adopterApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['AdoptersController@rejectAdopter', $adopterApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAdopterModal-{{$adopterApprovals->approvable_id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAdopterModal-{{$adopterApprovals->approvable_id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <h2>
                            All Adopters
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAdopterModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="15%">Name</th>
                                        <th width="10%">Adopter Type</th>
                                        <th width="10%">Region</th>
                                        <th width="10%">Province</th>
                                        <th width="10%">City/Municipality</th>
                                        <th width="10%">Phone Number</th>
                                        <th width="10%">Fax Number</th>
                                        <th width="10%">Email Address</th>
                                        <th width="10%" class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\Adopter::all()->where('approved', '=', '2') as $adopter)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$adopter->name ? $adopter->name : '-'}}</td>
                                            <td>{{$adopter->adopter_type->name ? $adopter->adopter_type->name : '-'}}</td>
                                            <td>{{$adopter->region ? $adopter->region : '-'}}</td>
                                            <td>{{$adopter->province ? $adopter->province : '-'}}</td>
                                            <td>{{$adopter->municipality ? $adopter->municipality : '-'}}</td>
                                            <td>{{$adopter->phone ? $adopter->phone : '-'}}</td>
                                            <td>{{$adopter->fax ? $adopter->fax : '-'}}</td>
                                            <td>{{$adopter->email ? $adopter->email : '-'}}</td>
                                            <td class="text-right">
                                                @if(auth()->user()->user_level == 5)
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAdopterModal-{{$adopter->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAdopterModal-{{$adopter->id}}"><i class="fas fa-trash"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="agency">
                    <div class="row mt-3">
                        <a href="{{ route('pages.getAdmin', ['showAgency' => 'all'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showAgency=='all' || !request()->showAgency ? 'chosen' : ''}}" autocomplete="off">
                                All Agencies <span class="badge badge-primary">{{App\Agency::all()->where('approved', '=', '2')->count()}}</span>
                            </button>
                        </a>
                        <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                        <a href="{{ route('pages.getAdmin', ['showAgency' => 'user'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showAgency=='user' ? 'chosen' : ''}}" autocomplete="off">
                                My Items <span class="badge badge-{{App\Agency::all()->where('user_id','=',auth()->user()->id)->count() > 0 ? 'primary' : 'secondary'}}">{{App\Agency::all()->where('user_id','=',auth()->user()->id)->count()}}</span>
                            </button>
                        </a>
                        @if(auth()->user()->user_level == 5)
                            <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                            <a href="{{ route('pages.getAdmin', ['showAgency' => 'approval'])}}" style="padding-left:15px">
                                <button type="button" class="btn btn-flat {{ request()->showAgency=='approval' ? 'chosen' : ''}}" autocomplete="off">
                                    Awaiting Approval <span class="badge badge-{{$agencyApprovalCount > 0 ? 'danger' : 'secondary'}}">{{$agencyApprovalCount}}</span>
                                </button>
                            </a>
                        @endif
                    </div>
                    @if(request()->showAgency == "user")
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>My Agencies
                                <a type="button" class="btn btn-default text-right float-right" data-toggle="modal" data-target="#createAgencyModal"><i class="fas fa-plus"></i> Add</a> 
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="5%">Agency ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="60%">Name</th>
                                        <th class="text-center" width="10%">Status</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Agency::where('user_id', '=', Auth::user()->id)->get() as $agency)
                                        <tr>
                                            <td>{{ $agency->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($agency->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $agency->name }}</td>
                                            <td>
                                                <div class="d-none d-sm-block status-pill {{$agency->approved == 2 ? 'approved-pill' : ''}} {{$agency->approved == 1 ? 'pending-pill' : ''}} {{$agency->approved == 0 ? 'inactive-pill' : ''}} text-center">
                                                    <h5 class="text-white" style="font-weight:800">{{$agency->approved == 2 ? 'Published' : ''}} {{$agency->approved == 1 ? 'Pending' : ''}} {{$agency->approved == 0 ? 'Inactive' : ''}}</h5>
                                                </div>
                                            </td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['Agencies@togglePublishAgency', $agency->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-primary px-1 py-1" style="font-weight:800">{{$agency->approved == 0 ? 'Publish' : 'Unpublish'}}</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAgencyModal-{{$agency->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAgencyModal-{{$agency->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @elseif(request()->showAgency == "approval")
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>
                            Agencies Awaiting Approval
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAgencyModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="10%">User</th>
                                        <th width="15%">Agency ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="50%">Title</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Agency::where('approved', '=', '1')->get() as $agencyPending)
                                        <tr>
                                            <?php $agencyUser = App\User::where('id', '=', $agencyPending->user_id)->get()->pluck('name')?>
                                            <td>{{ $agencyUser->first() }}</td>
                                            <td>{{ $agencyPending->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($agencyPending->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $agencyPending->name }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['AgenciesController@approveAgency', $agencyPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['AgenciesController@rejectAgency', $agencyPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAgencyModal-{{$agencyPending->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAgencyModal-{{$agencyPending->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach(Victorlap\Approvable\Approval::ofClass(App\Agency::class)->open()->get() as $agencyApprovals)
                                        <tr>
                                            <?php $agencyUser = App\User::where('id', '=', $agencyApprovals->user_id)->get()->pluck('name')?>
                                            <td>{{ $agencyUser->first() }}</td>
                                            <td>{{ $agencyApprovals->approvable_id }}</td>
                                            <td>{{ Carbon\Carbon::parse($agencyApprovals->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $agencyApprovals->title }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['AgenciesController@approveAgency', $agencyApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['AgenciesController@rejectAgency', $agencyApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAgencyModal-{{$agencyApprovals->approvable_id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAgencyModal-{{$agencyApprovals->approvable_id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <h2>
                            All Agencies
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAgencyModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="15%">Name</th>
                                        <th width="10%">Region</th>
                                        <th width="10%">Province</th>
                                        <th width="10%">Municipality</th>
                                        <th width="10%">Congressional District</th>
                                        <th width="10%">Phone Number</th>
                                        <th width="10%">Fax Number</th>
                                        <th width="10%">Email</th>
                                        <th width="10%" class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\Agency::all()->where('approved', '=', '2') as $agency)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$agency->name}}</td>
                                            <td>{{$agency->region ? $agency->region : '-'}}</td>
                                            <td>{{$agency->province ? $agency->province : '-'}}</td>
                                            <td>{{$agency->municipality ? $agency->municipality : '-'}}</td>
                                            <td>{{$agency->district ? $agency->district : '-'}}</td>
                                            <td>{{$agency->phone ? $agency->phone : '-'}}</td>
                                            <td>{{$agency->fax ? $agency->fax : '-'}}</td>
                                            <td>{{$agency->email ? $agency->email : '-'}}</td>
                                            <td class="text-right">
                                                @if(auth()->user()->user_level == 5)
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAgencyModal-{{$agency->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAgencyModal-{{$agency->id}}"><i class="fas fa-trash"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="generator">
                    <div class="row mt-3">
                        <a href="{{ route('pages.getAdmin', ['showGenerator' => 'all'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showGenerator=='all' || !request()->showGenerator ? 'chosen' : ''}}" autocomplete="off">
                                All Generators <span class="badge badge-primary">{{App\Generator::all()->where('approved', '=', '2')->count()}}</span>
                            </button>
                        </a>
                        <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                        <a href="{{ route('pages.getAdmin', ['showGenerator' => 'user'])}}" style="padding-left:15px">
                            <button type="button" class="btn btn-flat {{ request()->showGenerator=='user' ? 'chosen' : ''}}" autocomplete="off">
                                My Items <span class="badge badge-{{App\Generator::all()->where('user_id','=',auth()->user()->id)->count() > 0 ? 'primary' : 'secondary'}}">{{App\Generator::all()->where('user_id','=',auth()->user()->id)->count()}}</span>
                            </button>
                        </a>
                        @if(auth()->user()->user_level == 5)
                            <span style="font-size:1.5em">&nbsp;&nbsp;|</span>
                            <a href="{{ route('pages.getAdmin', ['showGenerator' => 'approval'])}}" style="padding-left:15px">
                                <button type="button" class="btn btn-flat {{ request()->showGenerator=='approval' ? 'chosen' : ''}}" autocomplete="off">
                                    Awaiting Approval <span class="badge badge-{{$generatorsApprovalCount > 0 ? 'danger' : 'secondary'}}">{{$generatorsApprovalCount}}</span>
                                </button>
                            </a>
                        @endif
                    </div>
                    @if(request()->showGenerator == "user")
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>My Generators
                                <a type="button" class="btn btn-default text-right float-right" data-toggle="modal" data-target="#createGeneratorModal"><i class="fas fa-plus"></i> Add</a> 
                            </h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="5%">Generator ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="60%">Name</th>
                                        <th class="text-center" width="10%">Status</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Generator::where('user_id', '=', Auth::user()->id)->get() as $generator)
                                        <tr>
                                            <td>{{ $generator->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($generator->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $generator->name }}</td>
                                            <td>
                                                <div class="d-none d-sm-block status-pill {{$generator->approved == 2 ? 'approved-pill' : ''}} {{$generator->approved == 1 ? 'pending-pill' : ''}} {{$generator->approved == 0 ? 'inactive-pill' : ''}} text-center">
                                                    <h5 class="text-white" style="font-weight:800">{{$generator->approved == 2 ? 'Published' : ''}} {{$generator->approved == 1 ? 'Pending' : ''}} {{$generator->approved == 0 ? 'Inactive' : ''}}</h5>
                                                </div>
                                            </td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['Generators@togglePublishGenerator', $generator->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-primary px-1 py-1" style="font-weight:800">{{$generator->approved == 0 ? 'Publish' : 'Unpublish'}}</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editGeneratorModal-{{$generator->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteGeneratorModal-{{$generator->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @elseif(request()->showGenerator == "approval")
                    <div class="card shadow">
                        <div class="card-header">
                            <h2>
                            Generators Awaiting Approval
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createGeneratorModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width="10%">User</th>
                                        <th width="15%">Generator ID</th>
                                        <th width="10%">Date Created</th>
                                        <th width="50%">Title</th>
                                        <th class="text-center" width="15%">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(App\Generator::where('approved', '=', '1')->get() as $generatorPending)
                                        <tr>
                                            <?php $generatorUser = App\User::where('id', '=', $generatorPending->user_id)->get()->pluck('name')?>
                                            <td>{{ $generatorUser->first() }}</td>
                                            <td>{{ $generatorPending->id }}</td>
                                            <td>{{ Carbon\Carbon::parse($generatorPending->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $generatorPending->name }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['GeneratorsController@approveGenerator', $generatorPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['GeneratorsController@rejectGenerator', $generatorPending->id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editGeneratorModal-{{$generatorPending->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteGeneratorModal-{{$generatorPending->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach(Victorlap\Approvable\Approval::ofClass(App\Generator::class)->open()->get() as $generatorApprovals)
                                        <tr>
                                            <?php $generatorUser = App\User::where('id', '=', $generatorApprovals->user_id)->get()->pluck('name')?>
                                            <td>{{ $generatorUser->first() }}</td>
                                            <td>{{ $generatorApprovals->approvable_id }}</td>
                                            <td>{{ Carbon\Carbon::parse($generatorApprovals->created_at)->format('M d,Y g:i:s A') }}</td>
                                            <td>{{ $generatorApprovals->title }}</td>
                                            <td style="text-align:center">
                                                {{ Form::open(['action' => ['GeneratorsController@approveGenerator', $generatorApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-success px-1 py-1" style="font-weight:800">Accept</button> 
                                                {{ Form::close() }}
                                                {{ Form::open(['action' => ['GeneratorsController@rejectGenerator', $generatorApprovals->approvable_id], 'method' => 'POST', 'style="display:inline"']) }}
                                                    <button class="btn btn-danger px-1 py-1" style="font-weight:800">Reject</button> 
                                                {{ Form::close() }}
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editGeneratorModal-{{$generatorApprovals->approvable_id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteGeneratorModal-{{$generatorApprovals->approvable_id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <h2>
                            All Generators
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createGeneratorModal"><i class="fas fa-plus"></i> Add</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="25%">Name</th>
                                        <th width="10%">Latest Agency Affiliation</th>
                                        <th width="20%">Address</th>
                                        <th width="10%">Phone</th>
                                        <th width="10%">Fax</th>
                                        <th width="10%">Email</th>
                                        <th width="10%" class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\Generator::all()->where('approved', '=', '2') as $generator)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$generator->name}}</td>
                                            <td>{{$generator->agency->name ? $generator->agency->name : '-'}}</td>
                                            <td>{{$generator->address ? $generator->address : '-'}}</td>
                                            <td>{{$generator->phone ? $generator->phone : '-'}}</td>
                                            <td>{{$generator->fax ? $generator->fax : '-'}}</td>
                                            <td>{{$generator->email ? $generator->email : '-'}}</td>
                                            <td class="text-right">
                                                @if(auth()->user()->user_level == 5)
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editGeneratorModal-{{$generator->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteGeneratorModal-{{$generator->id}}"><i class="fas fa-trash"></i></button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="activity">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <h2>
                            Activity Logs
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createGeneratorModal"><i class="fas fa-plus"></i> Download Excel</button>
                            </span></h2>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="15%">Timestamp</th>
                                        <th width="5%">User ID</th>
                                        <th width="10%">User Name</th>
                                        <th width="5%">User Level</th>
                                        <th width="10%">IP Address</th>
                                        <th width="10%">Resource</th>
                                        <th width="40%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\Log::orderBy('id', 'desc')->get(); as $log)
                                        <tr>
                                            <td>{{$log->id}}</td>
                                            <td>{{Carbon\Carbon::parse($log->created_at)->format('M d,Y g:i:s A')}}</td>
                                            <td>{{$log->user_id}}</td>
                                            <td>{{$log->user_name}}</td>
                                            <td>{{$log->user_level}}</td>
                                            <td>{{$log->IP_address}}</td>
                                            <td>{{$log->resource}}</td>
                                            <td>{{$log->action}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="manageUsers">
                    <div class="card shadow">
                        <div class="card-header">
                            <i class="fas fa-users" style="font-size:25px;"></i>
                            <span style="font-size:22px;">Users 
                                <button type="button" class="btn btn-primary text-right float-right" data-toggle="modal" data-target="#createUserModal">Create User</button> 
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>User Level</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\User::all() as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <form action="{{ route('changeUserLevel', $user->id) }}" method="POST" id="roles-form-{{$user->id}}">
                                                    <select name="user_level" class="form-control" onchange="document.getElementById('roles-form-{{$user->id}}').submit()">
                                                        <option value="5" {{$user->user_level == 5 ? 'selected' : ''}}>Superadmin (5)</option>
                                                        <option value="4" {{$user->user_level == 4 ? 'selected' : ''}}>User from TTPD (4)</option>
                                                        <option value="3" {{$user->user_level == 3 ? 'selected' : ''}}>User from PCAARRD (3)</option>
                                                        <option value="2" {{$user->user_level == 2 ? 'selected' : ''}}>Standard User (2)</option>
                                                    </select>
                                                    {{ csrf_field() }} 
                                                </form>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger px-2 py-1" data-toggle="modal" data-target="#deleteUserModal-{{$user->id}}"><i class="fas fa-minus"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="userMessages">
                    <div class="card shadow">
                        <div class="card-header">
                            <i class="far fa-envelope" style="font-size:25px;"></i>
                            <span style="font-size:22px;">User Messages 
                                <button type="button" class="btn btn-primary text-right float-right" data-toggle="modal" data-target="#createUserModal">Create User</button> 
                            </span>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Concern</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\UserMessage::all() as $userMessage)
                                        <tr>
                                            <td>{{ $userMessage->name }}</td>
                                            <td>{{ $userMessage->email }}</td>
                                            <td>
                                                @if($userMessage->concern == 1)
                                                <span class="badge badge-light" style="font-size:15px">Request</span>
                                                @elseif($userMessage->concern == 2)
                                                <span class="badge badge-info" style="font-size:15px">Bug Report</span>
                                                @elseif($userMessage->concern == 3)
                                                <span class="badge badge-warning" style="font-size:15px">Question</span>
                                                @elseif($userMessage->concern == 4)
                                                <span class="badge badge-secondary" style="font-size:15px">Others</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($userMessage->status == 0)
                                                <span class="badge badge-danger" style="font-size:15px">Pending</span> 
                                                <span class="badge badge-warning" style="font-size:15px">Unread</span>
                                                @elseif($userMessage->status == 1)
                                                <span class="badge badge-danger" style="font-size:15px">Pending</span> <span class="badge badge-secondary" style="font-size:15px">Read</span>
                                                @elseif($userMessage->status == 2)
                                                <span class="badge badge-success" style="font-size:15px">Resolved</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-primary px-2 py-1" id="viewUserMessageButton" data-toggle="modal" data-target="#viewUserMessageModal-{{$userMessage->id}}">View Message <i class="far fa-eye"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Users -->
    <!-- Modal for create User -->
        <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new User</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('createUser') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">User Role</label>

                                <div class="col-md-8">
                                    <select name="user_level" class="form-control">
                                        <option value="5">Superadmin (5)</option>
                                        <option value="4">User from TTPD (4)</option>
                                        <option value="3">User from PCAARRD (3)</option>
                                        <option value="2" selected>Standard User (2)</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- END MODAL FOR CREATE User -->

    @foreach(App\User::all() as $user)
        <!-- Delete USER modal -->
            <div class="modal fade" id="deleteUserModal-{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['UsersController@deleteUser', $user->id], 'method' => "DELETE"]) }} 
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <span>
                                Are you sure you want to delete: <b> {{$user->name}} </b>
                            </span>
                            <br>
                            <small class="text-muted">
                                This action will delete all inputs from this user.
                            </small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        <!-- End Delete USER modal --> 
    @endforeach
<!-- Users END -->

<!-- Sectors -->
    <!-- modal for create sector -->
        <div class="modal fade" id="createSectorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'SectorsController@addSector', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Sector</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('industry', 'Industry')}}
                            {{Form::select('industry', $industries, null,['class' => 'form-control', 'placeholder' => 'Select Industry']) }}
                        </div>
                        <div class="form-group">
                            {{Form::label('name', 'Sector Name', ['class' => 'col-form-label'])}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Create Sector', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- end of modal for create sector -->

    @foreach(App\Sector::all() as $sector)
        <!-- edit sector -->
            <div class="modal fade" id="editSectorModal-{{$sector->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['SectorsController@editSector', $sector->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Sector</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('industry', 'Industry')}}
                                {{Form::select('industry', $industries, $sector->industry_id,['class' => 'form-control', 'placeholder' => 'Select Industry']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('name', 'Sector Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $sector->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        <!-- edit sector end -->

        <!-- confirm delete sector -->
            <div class="modal fade" id="deleteSectorModal-{{$sector->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteSector', $sector->id) }}" id="deleteForm" method="POST">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <span>
                                <?php $sectors = App\Sector::with('commodities')->find($sector->id); ?>
                                @if($sectors->commodities->where('approved', '=', '2')->count() > 0)
                                    You cannot delete: <b>{{$sector->name}}</b></br></br>
                                    The following commodities needs to be deleted before deleting this sector:
                                    <ul>
                                        @foreach($sectors->commodities as $comms)
                                            <li>{{$comms->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    Are you sure you want to delete: <b>{{$sector->name}}</b>?</br></br>
                                @endif
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            @if($sectors->commodities->where('approved','=','2')->where('approved', '=', '2')->count() == 0)
                            <input class="btn btn-danger" type="submit" value="Yes, Delete">
                            @endif
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- confirm delete sector -->
    @endforeach
<!-- Sectors END -->

<!-- Industries -->
    <!-- create industry -->
        <div class="modal fade" id="createIndustryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'IndustriesController@addIndustry', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Industry</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Add Industry', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- create industry end -->
    @foreach(App\Industry::all() as $industry)
        <!-- edit industry -->
            <div class="modal fade" id="editIndustryModal-{{$industry->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['IndustriesController@editIndustry', $industry->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Industry</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $industry->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        <!-- edit industry end -->

        <!-- confirm delete industry -->
            <div class="modal fade" id="deleteIndustryModal-{{$industry->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteIndustry', $industry->id) }}" id="deleteForm" method="POST">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <span>
                                <?php $industries = App\Industry::with('sectors')->find($industry->id); ?>
                                @if($industries->sectors->where('approved', '=', '2')->count() > 0)
                                    You cannot delete: <b>{{$industry->name}}</b></br></br>
                                    The following sectors needs to be deleted before deleting this industry:
                                    <ul>
                                        @foreach($industries->sectors as $sects)
                                            <li>{{$sects->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    Are you sure you want to delete: <b>{{$industry->name}}</b>?</br></br>
                                @endif
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            @if($industries->sectors->where('approved','=','2')->where('approved', '=', '2')->count() == 0)
                            <input class="btn btn-danger" type="submit" value="Yes, Delete">
                            @endif
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- confirm delete industry -->
    @endforeach
<!-- Industries END -->

<!-- Technology Applicability - Industries -->
    <!-- create applicability industry -->
        <div class="modal fade" id="createApplicabilityIndustryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'ApplicabilityIndustriesController@addApplicabilityIndustry', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Technology Applicability - Industry</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Add Technology Applicability - Industry', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- create applicability industry end -->
    @foreach(App\ApplicabilityIndustry::all() as $applicabilityIndustry)
        <!-- edit applicability applicability industry -->
            <div class="modal fade" id="editApplicabilityIndustryModal-{{$applicabilityIndustry->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['ApplicabilityIndustriesController@editApplicabilityIndustry', $applicabilityIndustry->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Industry</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $applicabilityIndustry->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        <!-- edit applicability industry end -->

        <!-- confirm delete applicability industry -->
            <div class="modal fade" id="deleteApplicabilityIndustryModal-{{$applicabilityIndustry->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteApplicabilityIndustry', $applicabilityIndustry->id) }}" id="deleteForm" method="POST">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <span>
                                <?php $techApp = App\Technology::where('applicability_industry', '=', $applicabilityIndustry->id)->get(); ?>
                                Are you sure you want to delete: <b>{{$applicabilityIndustry->name}}</b>?</br></br>
                                @if($techApp->where('approved','=','2')->count() > 0)
                                    The following technologies using this Applicability Industry will be affected:
                                    <ul>
                                        @foreach($techApp->where('approved','=','2') as $tech)
                                            <li>{{$tech->title}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- confirm applicability delete industry -->
    @endforeach
<!-- Technology Applicability - Industries END -->

<!-- Commodities -->
    <!-- modal for create commodity -->
        <div class="modal fade" id="createCommodityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'CommoditiesController@addCommodity', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Commodity</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                            {{Form::label('name', 'Commodity Name', ['class' => 'col-form-label'])}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                        </div>
                        {{ csrf_field() }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Create Commodity', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- end of modal for create commodity -->

    @foreach(App\Commodity::all() as $commodity)
        <!-- edit commodity -->
            <div class="modal fade" id="editCommodityModal-{{$commodity->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['CommoditiesController@editCommodity', $commodity->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Commodity</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('industry', 'Industry')}}
                                <select name="industry" class="form-control dynamic_select" id="industry" data-dependent="sector" data-identifier="{{$commodity->id}}">
                                    <option value=""> Select Industry </option>
                                    @foreach(App\Industry::all() as $industry)
                                        <option value="{{$industry->id}}" {{$industry->id == $commodity->sector->industry_id ? 'selected' : ''}}>{{$industry->name}}</option>
                                    @endforeach
                                </select> 
                            </div>
                            <div class="form-group">
                                {{Form::label('sector', 'Sector')}}
                                <select name="sector" class="form-control" id="sector-edit-{{$commodity->id}}">
                                    @foreach(App\Sector::all()->where('industry_id', $commodity->sector->industry_id) as $sector)
                                        <option value="{{$sector->id}}" {{$sector->id == $commodity->sector_id ? 'selected' : ''}}> {{$sector->name}} </option>
                                    @endforeach
                                </select> 
                            </div>
                            <div class="form-group">
                                {{Form::label('name', 'Commodity Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $commodity->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        <!-- edit commodity end -->

        <!-- confirm delete commodity -->
            <div class="modal fade" id="deleteCommodityModal-{{$commodity->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteCommodity', $commodity->id) }}" id="deleteForm" method="POST">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <span>
                                <?php $comms = App\Commodity::with('technologies')->find($commodity->id); ?>
                                Are you sure you want to delete: <b>{{$commodity->name}}</b>?</br></br>
                                @if($comms->technologies->where('approved','=','2')->count() > 0)
                                    The following technologies using this commodity will be affected:
                                    <ul>
                                        @foreach($comms->technologies as $tech)
                                            <li>{{$tech->title}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- confirm delete sector -->
    @endforeach
<!-- Commodities END -->

<!-- Technology Categories -->
    <!-- modal for create technology category -->
        <div class="modal fade" id="createTechnologyCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'TechnologyCategoriesController@addTechnologyCategory', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Technology Category</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                        </div>
                        {{ csrf_field() }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Create Technology Category', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- end of modal for create technology category -->

    @foreach(App\TechnologyCategory::all() as $technologyCategory)
        <!-- edit technology category -->
            <div class="modal fade" id="editTechnologyCategoryModal-{{$technologyCategory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['TechnologyCategoriesController@editTechnologyCategory', $technologyCategory->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Technology Category</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $technologyCategory->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        <!-- edit technology category end -->

        <!-- confirm delete technology category -->
            <div class="modal fade" id="deleteTechnologyCategoryModal-{{$technologyCategory->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteTechnologyCategory', $technologyCategory->id) }}" id="deleteForm" method="POST">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <span>
                                <?php $techCategory = App\TechnologyCategory::with('technologies')->find($technologyCategory->id); ?>
                                Are you sure you want to delete: <b>{{$technologyCategory->name}}</b>?</br></br>
                                @if($techCategory->technologies->where('approved','=','2')->count() > 0)
                                    The following technologies using this Technology Category will be affected:
                                    <ul>
                                        @foreach($techCategory->technologies as $tech)
                                            <li>{{$tech->title}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- confirm delete technology category -->
    @endforeach
<!-- Technology Categories END -->

<!-- Technologies -->
    <!-- TECH VIEW MODAL -->
        @foreach(App\Technology::all() as $tech)
            <div class="modal fade" id="techModal-{{$tech->id}}" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content pl-0 pr-0 pl-0">
                        <div class="inner-modal pl-3 pr-3"> 
                            <div class="modal-header">
                                <span style="width:100%" class="mt-2">
                                    <h4>{{$tech->title}} </h4>
                                <span>
                            </div>
                            <div class="modal-body">
                                <small class="text-muted">
                                    <i class="fas fa-map-marker-alt"></i> {{$tech->region}}
                                    <i class="far fa-calendar-alt ml-2"></i> {{$tech->year_developed}}
                                </small>
                                <br>
                                @foreach($tech->commodities as $commodity)
                                    @if( $loop->first ) 
                                        {{ $commodity->sector->name }}
                                        <i class="fas fa-angle-double-right"></i>
                                        {{ $commodity->name }}
                                    @else
                                        · {{ $commodity->sector->name }}
                                        <i class="fas fa-angle-double-right"></i>
                                    @endif
                                @endforeach
                                <div class="dropdown-divider mt-3"></div>
                                <b>Description</b><br>
                                <span>{{$tech->description}}</span>
                                <div class="dropdown-divider mt-3"></div>
                                <b>Commodities</b><br>
                                @foreach($tech->commodities as $commodity)
                                    <span class="ml-3">• {{$commodity->name}} </span>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                @if(auth()->user()->user_level == 5)
                                <a href="/admin/tech/{{$tech->id}}/edit" class="btn btn-secondary">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteTechnologyModal-{{$tech->id}}">Delete</button>
                                @endif
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- confirm delete technology -->
                <div class="modal fade" id="deleteTechnologyModal-{{$tech->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('deleteTechnology', $tech->id) }}" id="deleteForm" method="POST">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <span>
                                    Are you sure you want to delete: <b>{{$tech->title}}</b>
                                </span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                                <input class="btn btn-danger" type="submit" value="Yes, Delete">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- confirm delete technology -->
        @endforeach
    <!-- END OF TECH VIEW MODAL -->
<!-- Technologies END -->

<!-- Adopter Types -->
    <!-- create adopter type -->
        <div class="modal fade" id="createAdopterTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'AdopterTypesController@addAdopterType', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Adopter Type</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Add Adopter Type', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- create adopter type end -->
    @foreach(App\AdopterType::all() as $adopterType)
        <!-- edit adopter type -->
            <div class="modal fade" id="editAdopterTypeModal-{{$adopterType->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['AdopterTypesController@editAdopterType', $adopterType->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Adopter Type</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $adopterType->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        <!-- edit adopter type end -->

        <!-- confirm delete adopter type -->
            <div class="modal fade" id="deleteAdopterTypeModal-{{$adopterType->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteAdopterType', $adopterType->id) }}" id="deleteForm" method="POST">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <span>
                                <?php $adopterTypes = App\AdopterType::with('adopters')->find($adopterType->id); ?>
                                @if($adopterTypes->adopters->where('approved', '=', '2')->count() > 0)
                                    You cannot delete: <b>{{$adopterType->name}}</b></br></br>
                                    The following adopters needs to be deleted before deleting this adopter type:
                                    <ul>
                                        @foreach($adopterTypes->adopters as $adopts)
                                            <li>{{$adopts->name}}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    Are you sure you want to delete: <b>{{$adopterType->name}}</b>?</br></br>
                                @endif
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            @if($adopterTypes->adopters->where('approved', '=', '2')->count() == 0)
                            <input class="btn btn-danger" type="submit" value="Yes, Delete">
                            @endif
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- confirm delete adopter type -->
    @endforeach
<!-- Adopter Types End -->

<!-- Adopter -->
    <!-- create adopter -->
        <div class="modal fade" id="createAdopterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'AdoptersController@addAdopter', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Adopter</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('adopter_type', 'Adopter Type')}}
                            <select name="adopter_type" class="form-control" id="adopter_type">
                                <option value=""> Select Adopter Type </option>
                                @foreach(App\AdopterType::all() as $adopterType)
                                    <option value="{{$adopterType->id}}">{{$adopterType->name}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="form-group">
                            {{Form::label('region', 'Region', ['class' => 'col-form-label'])}}
                            {{Form::select('region', ['ARMM' => 'ARMM - Autonomous Region in Muslim Mindanao', 
                                                        'CAR' => 'CAR - Cordillera Adminisitrative Region', 
                                                        'NCR' => 'NCR - National Capital Region', 
                                                        'Region 1' => 'Region 1 - Ilocos Region', 
                                                        'Region 2' => 'Region 2 - Cagayan Valley', 
                                                        'Region 3' => 'Region 3 - Central Luzon', 
                                                        'Region 4A' => 'Region 4A - CALABARZON', 
                                                        'Region 4B' => 'Region 4B - MIMAROPA', 
                                                        'Region 5' => 'Region 5 - Bicol Region', 
                                                        'Region 6' => 'Region 6 - Western Visayas', 
                                                        'Region 7' => 'Region 7 - Central Visayas', 
                                                        'Region 8' => 'Region 8 - Eastern Visayas', 
                                                        'Region 9' => 'Region 9 - Zamboanga Peninsula', 
                                                        'Region 10' => 'Region 10 - Northern Mindanao', 
                                                        'Region 11' => 'Region 11 - Davao Region', 
                                                        'Region 12' => 'Region 12 - SOCCKSARGEN', 
                                                        'Region 13' => 'Region 13 - Caraga Region'
                                                        ], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                        </div>
                        <div class="form-group">
                            {{Form::label('province', 'Province', ['class' => 'col-form-label'])}}
                            {{Form::text('province', '', ['class' => 'form-control', 'placeholder' => 'Add province'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('municipality', 'City/Municipality', ['class' => 'col-form-label'])}}
                            {{Form::text('municipality', '', ['class' => 'form-control', 'placeholder' => 'Add city or municipality'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('phone', 'Phone Number', ['class' => 'col-form-label'])}}
                            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Add phone number'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('fax', 'Fax Number', ['class' => 'col-form-label'])}}
                            {{Form::text('fax', '', ['class' => 'form-control', 'placeholder' => 'Add fax number'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Email Address', ['class' => 'col-form-label'])}}
                            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Add email address'])}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Add Adopter', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- create adopter end -->

    @foreach(App\Adopter::all() as $adopter)
        <!-- edit adopter -->
            <div class="modal fade" id="editAdopterModal-{{$adopter->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['AdoptersController@editAdopter', $adopter->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Adopter</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $adopter->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('adopter_type', 'Adopter Type')}}
                                <select name="adopter_type" class="form-control" id="adopter_type">
                                    <option value=""> Select Adopter Type </option>
                                    @foreach(App\AdopterType::all() as $adopterType)
                                        <option value="{{$adopterType->id}}" {{$adopterType->id == $adopter->adopter_type_id ? 'selected' : ''}}>{{$adopterType->name}}</option>
                                    @endforeach
                                </select> 
                            </div><div class="form-group">
                                {{Form::label('region', 'Region', ['class' => 'col-form-label'])}}
                                {{Form::select('region', ['ARMM' => 'ARMM - Autonomous Region in Muslim Mindanao', 
                                                            'CAR' => 'CAR - Cordillera Adminisitrative Region', 
                                                            'NCR' => 'NCR - National Capital Region', 
                                                            'Region 1' => 'Region 1 - Ilocos Region', 
                                                            'Region 2' => 'Region 2 - Cagayan Valley', 
                                                            'Region 3' => 'Region 3 - Central Luzon', 
                                                            'Region 4A' => 'Region 4A - CALABARZON', 
                                                            'Region 4B' => 'Region 4B - MIMAROPA', 
                                                            'Region 5' => 'Region 5 - Bicol Region', 
                                                            'Region 6' => 'Region 6 - Western Visayas', 
                                                            'Region 7' => 'Region 7 - Central Visayas', 
                                                            'Region 8' => 'Region 8 - Eastern Visayas', 
                                                            'Region 9' => 'Region 9 - Zamboanga Peninsula', 
                                                            'Region 10' => 'Region 10 - Northern Mindanao', 
                                                            'Region 11' => 'Region 11 - Davao Region', 
                                                            'Region 12' => 'Region 12 - SOCCKSARGEN', 
                                                            'Region 13' => 'Region 13 - Caraga Region'
                                                            ], $adopter->region,['class' => 'form-control', 'placeholder' => '------------']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('province', 'Province', ['class' => 'col-form-label'])}}
                                {{Form::text('province', $adopter->province, ['class' => 'form-control', 'placeholder' => 'Add province'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('municipality', 'City/Municipality', ['class' => 'col-form-label'])}}
                                {{Form::text('municipality', $adopter->municipality, ['class' => 'form-control', 'placeholder' => 'Add city or municipality'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('phone', 'Phone Number', ['class' => 'col-form-label'])}}
                                {{Form::text('phone', $adopter->phone, ['class' => 'form-control', 'placeholder' => 'Add phone number'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('fax', 'Fax Number', ['class' => 'col-form-label'])}}
                                {{Form::text('fax', $adopter->fax, ['class' => 'form-control', 'placeholder' => 'Add fax number'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('email', 'Email Address', ['class' => 'col-form-label'])}}
                                {{Form::text('email', $adopter->email, ['class' => 'form-control', 'placeholder' => 'Add email address'])}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        <!-- edit adopter end -->

        <!-- confirm delete adopter -->
            <div class="modal fade" id="deleteAdopterModal-{{$adopter->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteAdopter', $adopter->id) }}" id="deleteForm" method="POST">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <span>
                                <?php $adops = App\Adopter::with('technologies')->find($adopter->id); ?>
                                Are you sure you want to delete: <b>{{$adopter->name}}</b>?</br></br>
                                @if($adops->technologies->where('approved','=','2')->count() > 0)
                                    The following technologies using this adopter will be affected:
                                    <ul>
                                        @foreach($adops->technologies as $tech)
                                            <li>{{$tech->title}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- confirm delete adopter -->
    @endforeach
<!-- Adopter End -->

<!-- Agency -->
    <!-- create agency -->
        <div class="modal fade" id="createAgencyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'AgenciesController@addAgency', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Agency</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('name', 'Technology Owner', ['class' => 'col-form-label'])}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('region', 'Region')}}
                            {{Form::select('region', ['ARMM' => 'ARMM - Autonomous Region in Muslim Mindanao', 
                                                                        'CAR' => 'CAR - Cordillera Adminisitrative Region', 
                                                                        'NCR' => 'NCR - National Capital Region', 
                                                                        'Region 1' => 'Region 1 - Ilocos Region', 
                                                                        'Region 2' => 'Region 2 - Cagayan Valley', 
                                                                        'Region 3' => 'Region 3 - Central Luzon', 
                                                                        'Region 4A' => 'Region 4A - CALABARZON', 
                                                                        'Region 4B' => 'Region 4B - MIMAROPA', 
                                                                        'Region 5' => 'Region 5 - Bicol Region', 
                                                                        'Region 6' => 'Region 6 - Western Visayas', 
                                                                        'Region 7' => 'Region 7 - Central Visayas', 
                                                                        'Region 8' => 'Region 8 - Eastern Visayas', 
                                                                        'Region 9' => 'Region 9 - Zamboanga Peninsula', 
                                                                        'Region 10' => 'Region 10 - Northern Mindanao', 
                                                                        'Region 11' => 'Region 11 - Davao Region', 
                                                                        'Region 12' => 'Region 12 - SOCCKSARGEN', 
                                                                        'Region 13' => 'Region 13 - Caraga Region'
                                                                        ], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                        </div>
                        <div class="form-group">
                            {{Form::label('province', 'Province', ['class' => 'col-form-label'])}}
                            {{Form::text('province', '', ['class' => 'form-control', 'placeholder' => 'Add province'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('municipality', 'Municipality', ['class' => 'col-form-label'])}}
                            {{Form::text('municipality', '', ['class' => 'form-control', 'placeholder' => 'Add municipality'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('district', 'District', ['class' => 'col-form-label'])}}
                            {{Form::text('district', '', ['class' => 'form-control', 'placeholder' => 'Add district'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('phone', 'Phone Number', ['class' => 'col-form-label'])}}
                            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Add phone number'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('fax', 'Fax Number', ['class' => 'col-form-label'])}}
                            {{Form::text('fax', '', ['class' => 'form-control', 'placeholder' => 'Add fax number'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Email', ['class' => 'col-form-label'])}}
                            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Add email'])}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Add Agency', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- create agency end -->

    @foreach(App\Agency::all() as $agency)
        <!-- edit agency -->
            <div class="modal fade" id="editAgencyModal-{{$agency->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['AgenciesController@editAgency', $agency->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Agency</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('name', 'Technology Owner', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $agency->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('region', 'Region')}}
                                {{Form::select('region', ['ARMM' => 'ARMM - Autonomous Region in Muslim Mindanao', 
                                                                            'CAR' => 'CAR - Cordillera Adminisitrative Region', 
                                                                            'NCR' => 'NCR - National Capital Region', 
                                                                            'Region 1' => 'Region 1 - Ilocos Region', 
                                                                            'Region 2' => 'Region 2 - Cagayan Valley', 
                                                                            'Region 3' => 'Region 3 - Central Luzon', 
                                                                            'Region 4A' => 'Region 4A - CALABARZON', 
                                                                            'Region 4B' => 'Region 4B - MIMAROPA', 
                                                                            'Region 5' => 'Region 5 - Bicol Region', 
                                                                            'Region 6' => 'Region 6 - Western Visayas', 
                                                                            'Region 7' => 'Region 7 - Central Visayas', 
                                                                            'Region 8' => 'Region 8 - Eastern Visayas', 
                                                                            'Region 9' => 'Region 9 - Zamboanga Peninsula', 
                                                                            'Region 10' => 'Region 10 - Northern Mindanao', 
                                                                            'Region 11' => 'Region 11 - Davao Region', 
                                                                            'Region 12' => 'Region 12 - SOCCKSARGEN', 
                                                                            'Region 13' => 'Region 13 - Caraga Region'
                                                                            ], $agency->region,['class' => 'form-control', 'placeholder' => '------------']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('province', 'Province', ['class' => 'col-form-label'])}}
                                {{Form::text('province', $agency->province, ['class' => 'form-control', 'placeholder' => 'Add province'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('municipality', 'Municipality', ['class' => 'col-form-label'])}}
                                {{Form::text('municipality', $agency->municipality, ['class' => 'form-control', 'placeholder' => 'Add municipality'])}}
                            </div>
    
                            <div class="form-group">
                                {{Form::label('district', 'District', ['class' => 'col-form-label'])}}
                                {{Form::text('district', $agency->district, ['class' => 'form-control', 'placeholder' => 'Add district'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('phone', 'Phone Number', ['class' => 'col-form-label'])}}
                                {{Form::text('phone', $agency->phone, ['class' => 'form-control', 'placeholder' => 'Add phone number'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('fax', 'Fax Number', ['class' => 'col-form-label'])}}
                                {{Form::text('fax', $agency->fax, ['class' => 'form-control', 'placeholder' => 'Add fax number'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('email', 'Email', ['class' => 'col-form-label'])}}
                                {{Form::text('email', $agency->email, ['class' => 'form-control', 'placeholder' => 'Add email'])}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        <!-- edit agency end -->

        <!-- confirm delete agency -->
            <div class="modal fade" id="deleteAgencyModal-{{$agency->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteAgency', $agency->id) }}" id="deleteForm" method="POST">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <span>
                                <?php $agens = App\Agency::with('technologies')->find($agency->id); ?>
                                Are you sure you want to delete: <b>{{$agency->name}}</b>?</br></br>
                                @if($agens->technologies->where('approved','=','2')->count() > 0)
                                    The following technologies using this agency will be affected:
                                    <ul>
                                        @foreach($agens->technologies as $tech)
                                            <li>{{$tech->title}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- confirm delete agency -->
    @endforeach
<!-- Agency End -->

<!-- Generator -->
    <!-- create generator -->
        <div class="modal fade" id="createGeneratorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'GeneratorsController@addGenerator', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Generator</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add generator name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('agency', 'Latest Agency Affiliation', ['class' => 'col-form-label'])}} 
                            {{Form::select('agency', $agencies, null, ['class' => 'form-control', 'placeholder' => 'Add agency'])}}        
                        </div>
                        <div class="form-group">
                            {{Form::label('address', 'Address', ['class' => 'col-form-label'])}}
                            {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Add address'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('phone', 'Phone Number', ['class' => 'col-form-label'])}}
                            {{Form::text('phone', '', ['class' => 'form-control', 'placeholder' => 'Add phone number'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('fax', 'Fax Number', ['class' => 'col-form-label'])}}
                            {{Form::text('fax', '', ['class' => 'form-control', 'placeholder' => 'Add fax number'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('email', 'Email Address', ['class' => 'col-form-label'])}}
                            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Add email address'])}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Add Generator', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- create generator end -->

    @foreach(App\Generator::all() as $generator)
        <!-- edit generator -->
            <div class="modal fade" id="editGeneratorModal-{{$generator->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['GeneratorsController@editGenerator', $generator->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Generator</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group ">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $generator->name, ['class' => 'form-control', 'placeholder' => 'Add generator name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('agency', 'Latest Agency Affiliation', ['class' => 'col-form-label'])}} 
                                {{Form::select('agency', $agencies, $generator->agency, ['class' => 'form-control'])}}        
                            </div>
                            <div class="form-group">
                                {{Form::label('address', 'Address', ['class' => 'col-form-label'])}}
                                {{Form::text('address', $generator->address, ['class' => 'form-control', 'placeholder' => 'Add address'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('phone', 'Phone Number', ['class' => 'col-form-label'])}}
                                {{Form::text('phone', $generator->phone, ['class' => 'form-control', 'placeholder' => 'Add phone number'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('fax', 'Fax Number', ['class' => 'col-form-label'])}}
                                {{Form::text('fax', $generator->fax, ['class' => 'form-control', 'placeholder' => 'Add fax number'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('email', 'Email Address', ['class' => 'col-form-label'])}}
                                {{Form::text('email', $generator->email, ['class' => 'form-control', 'placeholder' => 'Add email address'])}}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        <!-- edit generator end -->

        <!-- confirm delete generator -->
            <div class="modal fade" id="deleteGeneratorModal-{{$generator->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteGenerator', $generator->id) }}" id="deleteForm" method="POST">
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <span>
                                <?php $gens = App\Generator::with('technologies')->find($generator->id); ?>
                                Are you sure you want to delete: <b>{{$generator->name}}</b>?</br></br>
                                @if($gens->technologies->where('approved','=','2')->count() > 0)
                                    The following technologies using this generator will be affected:
                                    <ul>
                                        @foreach($gens->technologies as $tech)
                                            <li>{{$tech->title}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <input class="btn btn-danger" type="submit" value="Yes, Delete">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- confirm delete generator -->
    @endforeach
<!-- Generator End -->

<!-- User Messages -->
    @foreach(App\UserMessage::all() as $userMessage)
        <div class="modal fade" id="viewUserMessageModal-{{$userMessage->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 style="font-weight:900" class="modal-title" id="exampleModalLabel">User Message</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-5">
                                <b>Name</b><br>
                                {{$userMessage->name}}<br><br>
                                <b>Email</b><br>
                                {{$userMessage->email}}<br><br>
                                <b>Concern</b><br>
                                <select name="concern" class="form-control" disabled>
                                    <option value="1" {{$userMessage->concern == 1 ? 'selected' : ''}}>I am requesting for data</option>
                                    <option value="2" {{$userMessage->concern == 2 ? 'selected' : ''}}>I want to report a bug</option>
                                    <option value="3" {{$userMessage->concern == 3 ? 'selected' : ''}}>I have a question</option>
                                    <option value="4" {{$userMessage->concern == 4 ? 'selected' : ''}}>Others</option>
                                </select><br><br>
                            </div>
                            <div class="col-sm-7">
                                <b>Message</b><br>
                                {{$userMessage->message}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @if($userMessage->status!=2)
                        {{ Form::open(['action' => ['UserMessagesController@resolveMessage', $userMessage->id], 'method' => 'POST']) }}
                        {{Form::submit('Resolve', ['class' => 'btn btn-success'])}}
                        {{ Form::close() }}
                        @endif
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
<!-- User Messages end -->

<style>
    .status-pill{
        border-radius:24px;
        height:2.5em;
        margin:auto;
        padding-top:.5em;
    }
    .approved-pill{
        background-color:rgb(106,168,78);
    }
    .pending-pill{
        background-color:rgb(241,194,50);
    }
    .inactive-pill{
        background-color:rgb(200,200,200);
    }
    button.chosen {
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
    }
</style>

<script>
    $(document).ready(function(){
        $('body').on('click', '.list-group a', function (e) {
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            
            //do any other button related things
        });

        $('.dynamic_select').change(function(){
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
                        $('#'+dependent+'-edit-'+identifier).html(result);
                    }
                })
            }
        });

       

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

        $('.table').DataTable();
    });
</script>
@endsection
