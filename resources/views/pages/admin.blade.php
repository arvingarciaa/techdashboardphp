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
                <a class="list-group-item" data-toggle="tab" href="#technology">Technologies</a>
                <a class="list-group-item" data-toggle="tab" href="#">Data Management</a>
                <!--<a class="list-group-item" data-toggle="tab" href="#industry">Industries</a>-->
                <a class="list-group-item" data-toggle="tab" href="#sector">Sectors</a>
                <a class="list-group-item" data-toggle="tab" href="#commodity">Commodities</a>
                <a class="list-group-item" data-toggle="tab" href="#technologyCategory">Technology Categories</a>
                <a class="list-group-item" data-toggle="tab" href="#protectionType">Protection Types</a>
                <a class="list-group-item" data-toggle="tab" href="#adopterType">Adopter Types</a>
                <a class="list-group-item" data-toggle="tab" href="#adopter">Adopters</a>
                <a class="list-group-item" data-toggle="tab" href="#potentialAdopter">Potential Adopters</a>
                <a class="list-group-item" data-toggle="tab" href="#fundingType">Funding Types</a>
                <a class="list-group-item" data-toggle="tab" href="#agencyType">Agency Types</a>
                <a class="list-group-item" data-toggle="tab" href="#agency">Agencies</a>
                <a class="list-group-item" data-toggle="tab" href="#generator">Generators</a>
                <a class="list-group-item active" data-toggle="tab" href="#activity">Activity Logs</a>
            </div>
            <style>
                .list-group-item{
                    width:100%;
                    border: 0px;
                }
            </style>
            <script>
                $('.list-group-item').on('shown.bs.tab', 'a', function (e) {
                    if (e.relatedTarget) {
                        $(e.relatedTarget).removeClass('active');
                    }
                })
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
            @include('inc.messages')
            <div class="tab-content">
                <div class="tab-pane fade" id="technology">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Technologies
                            <span class="float-right">
                                <a href="/admin/tech/add" class="btn btn-default"><i class="fas fa-plus"></i> Add</a>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table tech-table">
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
                                    @foreach(App\Technology::all() as $tech)
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
                </div>
                <div class="tab-pane fade" id="industry">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Industries
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createIndustryModal"><i class="fas fa-plus"></i> Add</button>
                            </span>
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
                                        @foreach(App\Industry::all() as $industry)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$industry->name}}</td>
                                                <td class="text-right">
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
                </div>
                <div class="tab-pane fade" id="sector">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Sectors
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createSectorModal"><i class="fas fa-plus"></i> Add</button>
                            </span>
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
                                    @foreach(App\Sector::all() as $sector)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$sector->name}}</td>
                                            <td>{{$sector->industry->name}}</td>
                                            <td class="text-right">
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
                </div>
                <div class="tab-pane fade" id="commodity">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Commodities
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createCommodityModal"><i class="fas fa-plus"></i> Add</button>
                            </span>
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
                                    @foreach(App\Commodity::all() as $commodity)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$commodity->name}}</td>
                                            <td>{{$commodity->sector->industry->name}} - {{$commodity->sector->name}}</td>
                                            <td class="text-right">
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
                </div>
                <div class="tab-pane fade" id="technologyCategory">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Technology Categories
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createTechnologyCategoryModal"><i class="fas fa-plus"></i> Add</button>
                            </span>
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
                                    @foreach(App\TechnologyCategory::all() as $technologyCategory)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$technologyCategory->name}}</td>
                                            <td class="text-right">
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
                </div>
                <div class="tab-pane fade" id="protectionType">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Protection Types
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createProtectionTypeModal"><i class="fas fa-plus"></i> Add</button>
                            </span>
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
                                    @foreach(App\ProtectionType::all() as $protectionType)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$protectionType->name}}</td>
                                            <td class="text-right">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editProtectionTypeModal-{{$protectionType->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteProtectionTypeModal-{{$protectionType->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="adopterType">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Adopter Types
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAdopterTypeModal"><i class="fas fa-plus"></i> Add</button>
                            </span>
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
                                    @foreach(App\AdopterType::all() as $adopterType)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$adopterType->name}}</td>
                                            <td class="text-right">
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
                </div> 
                <div class="tab-pane fade" id="adopter">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Adopters
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAdopterModal"><i class="fas fa-plus"></i> Add</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="20%">Name</th>
                                        <th width="10%">Adopter Type</th>
                                        <th width="15%">Address</th>
                                        <th width="10%">Phone Number</th>
                                        <th width="10%">Fax Number</th>
                                        <th width="10%">Email Address</th>
                                        <th width="10%" class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\Adopter::all() as $adopter)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$adopter->name}}</td>
                                            <td>{{$adopter->adopter_type->name}}</td>
                                            <td>{{$adopter->address}}</td>
                                            <td>{{$adopter->phone}}</td>
                                            <td>{{$adopter->fax ? '$adopter->fax' : '-'}}</td>
                                            <td>{{$adopter->email}}</td>
                                            <td class="text-right">
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
                </div>
                <div class="tab-pane fade" id="potentialAdopter">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Potential Adopters
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createPotentialAdopterModal"><i class="fas fa-plus"></i> Add</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="20%">Name</th>
                                        <th width="10%">Adopter Type</th>
                                        <th width="10%" class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\PotentialAdopter::all() as $potentialAdopter)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$potentialAdopter->name}}</td>
                                            <td>{{$potentialAdopter->adopter_type->name}}</td>
                                            <td class="text-right">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editPotentialAdopterModal-{{$potentialAdopter->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deletePotentialAdopterModal-{{$potentialAdopter->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>    
                <div class="tab-pane fade" id="fundingType">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Funding Types
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createFundingTypeModal"><i class="fas fa-plus"></i> Add</button>
                            </span>
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
                                    @foreach(App\FundingType::all() as $fundingType)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$fundingType->name}}</td>
                                            <td class="text-right">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editFundingTypeModal-{{$fundingType->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteFundingTypeModal-{{$fundingType->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="agencyType">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Agency Types
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAgencyTypeModal"><i class="fas fa-plus"></i> Add</button>
                            </span>
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
                                    @foreach(App\AgencyType::all() as $agencyType)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$agencyType->name}}</td>
                                            <td class="text-right">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editAgencyTypeModal-{{$agencyType->id}}"><i class="fas fa-edit"></i></button>
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#deleteAgencyTypeModal-{{$agencyType->id}}"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="tab-pane fade" id="agency">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Agencies
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createAgencyModal"><i class="fas fa-plus"></i> Add</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="25%">Name</th>
                                        <th width="10%">Agency Type</th>
                                        <th width="20%">Address</th>
                                        <th width="10%">Phone Number</th>
                                        <th width="10%">Fax Number</th>
                                        <th width="10%" class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\Agency::all() as $agency)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$agency->name}}</td>
                                            <td>{{$agency->agency_type->name}}</td>
                                            <td>{{$agency->address ? $agency->address : '-'}}</td>
                                            <td>{{$agency->phone ? $agency->phone : '-'}}</td>
                                            <td>{{$agency->fax ? $agency->fax : '-'}}</td>
                                            <td class="text-right">
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
                </div>
                <div class="tab-pane fade" id="generator">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            Generators
                            <span class="float-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createGeneratorModal"><i class="fas fa-plus"></i> Add</button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="10%">Title</th>
                                        <th width="25%">Name</th>
                                        <th width="10%">Availability</th>
                                        <th width="20%">Agency</th>
                                        <th width="20%">Field of Expertise</th>
                                        <th width="10%" class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(App\Generator::all() as $generator)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$generator->title ? $generator->title : '---'}}</td>
                                            <td>{{$generator->name}}</td>
                                            <td>{{$generator->availability}}</td>
                                            <td>{{$generator->agency->name}}</td>
                                            <td>{{$generator->expertise}}</td>
                                            <td class="text-right">
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
                </div>
                <div class="tab-pane fade active show" id="activity">
                    <div class="card pl-3 pr-3 shadow">
                        <div class="form-header ml-5">
                            <h4 class="text-muted">ACTIVITY</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
                                Are you sure you want to delete: <b>{{$sector->name}}</b>
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
        <!-- create industry end -->

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
                                Are you sure you want to delete: <b>{{$industry->name}}</b>
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
        <!-- confirm delete industry -->
    @endforeach
<!-- Industries END -->

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
                                Are you sure you want to delete: <b>{{$commodity->name}}</b>
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
                                Are you sure you want to delete: <b>{{$technologyCategory->name}}</b>
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
                                <a href="/admin/tech/{{$tech->id}}/edit" class="btn btn-secondary">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteTechnologyModal-{{$tech->id}}">Delete</button>
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
                                    Are you sure you want to delete: <b>{{$tech->name}}</b>
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

<!-- Protection Types -->
    <!-- create protection type -->
        <div class="modal fade" id="createProtectionTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'ProtectionTypesController@addProtectionType', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Protection Type</h6>
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
                        {{Form::submit('Add Protection Type', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- create protection type end -->
    @foreach(App\ProtectionType::all() as $protectionType)
        <!-- edit protection type -->
            <div class="modal fade" id="editProtectionTypeModal-{{$protectionType->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['ProtectionTypesController@editProtectionType', $protectionType->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Protection Type</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $protectionType->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
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
        <!-- edit protection type end -->

        <!-- confirm delete protection type -->
            <div class="modal fade" id="deleteProtectionTypeModal-{{$protectionType->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteProtectionType', $protectionType->id) }}" id="deleteForm" method="POST">
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
                                Are you sure you want to delete: <b>{{$protectionType->name}}</b>
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
        <!-- confirm delete protection type -->
    @endforeach
<!-- Protection Types End -->

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
                                Are you sure you want to delete: <b>{{$adopterType->name}}</b>
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
                            {{Form::select('adopter_type', $adopterTypes, null,['class' => 'form-control', 'placeholder' => 'Select Adopter Type']) }}
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
                                {{Form::select('adopter_type', $adopterTypes, $adopter->adopter_type_id,['class' => 'form-control', 'placeholder' => 'Select Adopter Type']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('address', 'Address', ['class' => 'col-form-label'])}}
                                {{Form::text('address', $adopter->address, ['class' => 'form-control', 'placeholder' => 'Add address'])}}
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
                                Are you sure you want to delete: <b>{{$adopter->name}}</b>
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

<!-- Agency Types -->
    <!-- create agency type -->
        <div class="modal fade" id="createAgencyTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'AgencyTypesController@addAgencyType', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Agency Type</h6>
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
                        {{Form::submit('Add Agency Type', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- create agency type end -->
    @foreach(App\AgencyType::all() as $agencyType)
        <!-- edit agency type -->
            <div class="modal fade" id="editAgencyTypeModal-{{$agencyType->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['AgencyTypesController@editAgencyType', $agencyType->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Agency Type</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $agencyType->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
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
        <!-- edit agency type end -->

        <!-- confirm delete agency type -->
            <div class="modal fade" id="deleteAgencyTypeModal-{{$agencyType->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteAgencyType', $agencyType->id) }}" id="deleteForm" method="POST">
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
                                Are you sure you want to delete: <b>{{$agencyType->name}}</b>
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
        <!-- confirm delete agency type -->
    @endforeach
<!-- Agency Types End -->

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
                            {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('agency_type', 'Agency Type')}}
                            {{Form::select('agency_type', $agencyTypes, null,['class' => 'form-control', 'placeholder' => 'Select Agency Type']) }}
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
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $agency->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('agency_type', 'Agency Type')}}
                                {{Form::select('agency_type', $agencyTypes, $agency->agency_type_id,['class' => 'form-control', 'placeholder' => 'Select Agency Type']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('address', 'Address', ['class' => 'col-form-label'])}}
                                {{Form::text('address', $agency->address, ['class' => 'form-control', 'placeholder' => 'Add address'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('phone', 'Phone Number', ['class' => 'col-form-label'])}}
                                {{Form::text('phone', $agency->phone, ['class' => 'form-control', 'placeholder' => 'Add phone number'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('fax', 'Fax Number', ['class' => 'col-form-label'])}}
                                {{Form::text('fax', $agency->fax, ['class' => 'form-control', 'placeholder' => 'Add fax number'])}}
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
                                Are you sure you want to delete: <b>{{$agency->name}}</b>
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
                        <div class="form-group row">
                            <div class="form-group col-sm-3">
                                {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                                <select name="title" class="form-control" id="title">
                                    <option value="" disabled selected>-----------</option>
                                    <option value="Mr.">Mr.</option>
                                    <option value="Ms.">Ms.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Dr.">Dr.</option>
                                    <option value="Prof.">Prof.</option>
                                </select> 
                            </div>
                            <div class="form-group col-sm-9 pl-0">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('availability', 'Availability')}}
                            <select name="availability" class="form-control" id="availability">\
                                <option value="Active" selected>Active</option>
                                <option value="Retired">Retired</option>
                                <option value="Deceased">Deceased</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            {{Form::label('agency', 'Agency')}}
                            {{Form::select('agency', $agencies, null,['class' => 'form-control', 'placeholder' => '-----------']) }}
                        </div>
                        <div class="form-group">
                            {{Form::label('expertise', 'Field of Expertise', ['class' => 'col-form-label'])}}
                            {{Form::text('expertise', '', ['class' => 'form-control', 'placeholder' => 'Add expertise'])}}
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
                            <div class="form-group row">
                                <div class="form-group col-sm-3">
                                    {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                                    <select name="title" class="form-control" id="title">
                                        <option value="" disabled>-----------</option>
                                        <option value="Mr." {{$generator->title == "Mr." ? 'selected' : ''}}>Mr.</option>
                                        <option value="Ms." {{$generator->title == "Ms." ? 'selected' : ''}}>Ms.</option>
                                        <option value="Mrs." {{$generator->title == "Mrs." ? 'selected' : ''}}>Mrs.</option>
                                        <option value="Dr." {{$generator->title == "Dr." ? 'selected' : ''}}>Dr.</option>
                                        <option value="Prof." {{$generator->title == "Prof." ? 'selected' : ''}}>Prof.</option>
                                    </select> 
                                </div>
                                <div class="form-group col-sm-9 pl-0">
                                    {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                    {{Form::text('name', $generator->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                                </div>
                            </div>
                            <div class="form-group">
                                {{Form::label('availability', 'Availability')}}
                                <select name="availability" class="form-control" id="availability">
                                    <option value="Active" {{$generator->availability == "active" ? 'selected' : ''}}>Active</option>
                                    <option value="Retired" {{$generator->availability == "active" ? 'retired' : ''}}>Retired</option>
                                    <option value="Deceased" {{$generator->availability == "active" ? 'deceased' : ''}}>Deceased</option>
                                </select> 
                            </div>
                            <div class="form-group">
                                {{Form::label('agency', 'Agency')}}
                                {{Form::select('agency', $agencies, $generator->agency_id,['class' => 'form-control', 'placeholder' => '-----------']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('expertise', 'Field of Expertise', ['class' => 'col-form-label'])}}
                                {{Form::text('expertise', $generator->expertise, ['class' => 'form-control', 'placeholder' => 'Add expertise'])}}
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
                                Are you sure you want to delete: <b>{{$generator->name}}</b>
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

<!-- Potential Adopter -->
    <!-- create potential adopter -->
        <div class="modal fade" id="createPotentialAdopterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'PotentialAdoptersController@addPotentialAdopter', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Potential Adopter</h6>
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
                            {{Form::select('adopter_type', $adopterTypes, null,['class' => 'form-control', 'placeholder' => 'Select Adopter Type']) }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Add Potential Adopter', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- create potential adopter end -->

    @foreach(App\Adopter::all() as $potentialAdopter)
        <!-- edit potential Adopter -->
            <div class="modal fade" id="editPotentialAdopterModal-{{$potentialAdopter->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['PotentialAdoptersController@editPotentialAdopter', $potentialAdopter->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Potential Adopter</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $potentialAdopter->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('adopter_type', 'Adopter Type')}}
                                {{Form::select('adopter_type', $adopterTypes, $potentialAdopter->adopter_type_id,['class' => 'form-control', 'placeholder' => 'Select Adopter Type']) }}
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
        <!-- edit potential Adopter end -->

        <!-- confirm delete potential Adopter -->
            <div class="modal fade" id="deletePotentialAdopterModal-{{$potentialAdopter->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deletePotentialAdopter', $potentialAdopter->id) }}" id="deleteForm" method="POST">
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
                                Are you sure you want to delete: <b>{{$potentialAdopter->name}}</b>
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
        <!-- confirm delete potential Adopter -->
    @endforeach
<!-- Potential Adopter End -->

<!-- Funding Type -->
    <!-- create funding type -->
        <div class="modal fade" id="createFundingTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{ Form::open(['action' => 'FundingTypesController@addFundingType', 'method' => 'POST']) }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Create new Funding Type</h6>
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
                        {{Form::submit('Add Funding Type', ['class' => 'btn btn-success'])}}
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    <!-- create funding type end -->

    @foreach(App\FundingType::all() as $fundingType)
        <!-- edit funding type -->
            <div class="modal fade" id="editFundingTypeModal-{{$fundingType->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['FundingTypesController@editFundingType', $fundingType->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Funding Type</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $fundingType->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
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
        <!-- edit funding type end -->

        <!-- confirm delete funding type -->
            <div class="modal fade" id="deleteFundingTypeModal-{{$fundingType->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="{{ route('deleteFundingType', $fundingType->id) }}" id="deleteForm" method="POST">
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
                                Are you sure you want to delete: <b>{{$fundingType->name}}</b>
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
        <!-- confirm delete funding type -->
    @endforeach
<!-- Funding Type End -->

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
