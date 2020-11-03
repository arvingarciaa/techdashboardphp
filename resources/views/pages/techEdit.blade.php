@extends('layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb pb-0" style="background-color:transparent">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">km4aanr</a></li>
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Technology Dashboard</a></li>
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/admin">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Technology</li>
    </ol>
@endsection
@section('content')
<div class="container-fluid px-0">
    <div class="row mr-0" style="max-height:inherit; min-height:40rem">
        <div class="col-sm-2 bg-dark pr-0">
            <div class="nav nav-tabs" style="border-bottom-width: 0px;">
                <a class="list-group-item active" data-toggle="tab" href="#edit">Edit</a>
                <a class="list-group-item" data-toggle="" href="/admin"><i class="fas fa-angle-left"></i> Back</a>
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
        <div class="col-sm-10 pb-4">
            <div class="m-3">
                @include('inc.messages')
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="edit">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <b style="font-size:25px">Technologies</b> <small>Edit form</small>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item active" role="tab">
                                    <a class="nav-link active" href="#main" data-toggle="tab">Basic Information</a>
                                </li>
                                <li class="nav-item" role="tab">
                                    <a class="nav-link" href="#technology_background" data-toggle="tab">Technology Background</a>
                                </li>
                                <li class="nav-item" role="tab">
                                    <a class="nav-link" href="#other_details" data-toggle="tab">Other Details</a>
                                </li>
                            </ul>
                        </div>
                        <style>
                            .nav-link{
                                color:#495057 !important;
                            }
                            .nav-link.active{
                                color:black !important;
                            }
                        </style>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="main" role="tabpanel">
                                    {{ Form::open(['action' => ['TechnologiesController@editTechnology', $tech->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                    <h3 class="mt-3 mb-3 font-weight-bold">Basic Information</h3>
                                    <div class="dropdown-divider mb-3"></div>
                                    <div class="form-group">
                                        {{Form::label('title', 'Technology Title', ['class' => 'col-form-label'])}}
                                        {{Form::text('title', $tech->title, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                        <div class="row mt-3">
                                            <div class="col-sm-4">
                                                {{Form::label('banner', 'Technology Banner')}}
                                                @if($tech->banner!=null)
                                                <img src="/storage/page_images/{{$tech->banner}}" class="card-img-top" style="object-fit: cover;overflow:hidden;max-height:200px;border:1px solid rgba(100,100,100,0.25)" >
                                                @else
                                                <div class="card-img-top center-vertically px-3" style="height:200px; background-color: rgb(227, 227, 227);">
                                                    <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                                                        Upload a 510x200px banner for your technology.
                                                    </span>
                                                </div>
                                                @endif
                                                {{ Form::file('banner', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                                            </div>
                                            <style>
                                                .center-vertically{
                                                    display: flex;
                                                    justify-content: center;
                                                    align-items: center;
                                                }
                                            </style>
                                            <div class="col-sm-4 p-0" style="margin:auto">
                                                <dl class="row">
                                                    <dt class="col-sm-6 text-right">Created At:</dt>
                                                    <dd class="col-sm-6">{{ date('F d, Y  g:iA' ,strtotime($tech->created_at)) }}</dd>
                                                </dl>
                                                <dl class="row">
                                                    <dt class="col-sm-6 text-right">Last Updated:</dt>
                                                    <dd class="col-sm-6">{{ date('F d, Y  g:iA' ,strtotime($tech->updated_at)) }} </dd>
                                                </dl> 
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-5">
                                            {{Form::label('significance', 'Technology Significance', ['class' => 'col-form-label'])}}
                                            {{Form::text('significance', $tech->significance, ['class' => 'form-control', 'placeholder' => ''])}}
                                        </div>
                                        <div class="col-sm-5">
                                            {{Form::label('target_users', 'Technology Users', ['class' => 'col-form-label'])}}
                                            {{Form::text('target_users', $tech->target_users, ['class' => 'form-control', 'placeholder' => ''])}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            {{Form::label('applicability_location', 'Technology Applicability - Location', ['class' => 'col-form-label'])}}
                                            {{Form::select('applicability_location', ['ARMM' => 'ARMM - Autonomous Region in Muslim Mindanao', 
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
                                                                        ], $tech->applicability_location,['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                        <div class="col-sm-3">
                                            {{Form::label('applicability_industry', 'Technology Applicability - Industry', ['class' => 'col-form-label'])}}
                                            {{Form::select('applicability_industry', $applicabilityIndustries, $tech->applicability_industry,['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                        <div class="col-sm-2">
                                            {{Form::label('year_developed', 'Year Developed', ['class' => 'col-form-label'])}}
                                            <select name="year_developed" id="year_developed" value="year_developed" class="form-control" >
                                                <?php $last = Carbon\Carbon::now()->year-100; ?>
                                                <?php $now = Carbon\Carbon::now()->year; ?>
                                                <option disabled {{$tech->year_developed == null ? 'selected' : ''}}>------------</option> 
                                                @for($i = $now; $i >= $last; $i--)                               
                                                    <option value="{{$i}}" {{$tech->year_developed == $i ? 'selected' : ''}}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            {{Form::label('category', 'Technology Categories', ['class' => 'col-form-label'])}} 
                                            {{Form::select('technology_categories[]', $technologyCategories, null, ['class' => 'form-control multi-category', 'multiple' => 'multiple'])}}        
                                        </div>
                                        <div class="col-sm-3">
                                            {{Form::label('commodity', 'Technology Commodities', ['class' => 'col-form-label'])}} 
                                            {{Form::select('commodities[]', $commodities, null, ['class' => 'form-control multi-commodity', 'multiple' => 'multiple'])}}
                                        </div>
                                        <div class="col-sm-4">
                                            {{Form::label('commercialization_mode', 'Mode of Commercialization', ['class' => 'col-form-label'])}} 
                                            {{Form::select('commercialization_mode', ['Licensing Agreement' => 'Licensing Agreement', 
                                                                        'Outright Sale' => 'Outright Sale', 
                                                                        'Joint Venture' => 'Joint Venture', 
                                                                        'Start-Up' => 'Start-Up', 
                                                                        'Spin-Off' => 'Spin-Off'
                                                                        ], $tech->commercialization_mode,['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                                        {{Form::textarea('description', $tech->description, ['class' => 'form-control', 'placeholder' => 'Add a description'])}}
                                    </div>
                                    <div class="form-group mt-4">
                                        <h3 class="mt-5 mb-3 font-weight-bold">Technology Owner, Generator, and Adopter</h3>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="card-body">
                                            <div class="form-group col-sm-4 pl-0">
                                                {{Form::label('owners', 'Owners', ['class' => 'col-form-label'])}} 
                                                {{Form::select('owners[]', $agencies, null, ['class' => 'form-control multi-agency', 'multiple' => 'multiple', 'style' => 'width:100%'])}}        
                                            </div>
                                            <div class="form-group col-sm-4 pl-0">
                                                {{Form::label('generators', 'Generators', ['class' => 'col-form-label'])}} 
                                                {{Form::select('generators[]', $generators, null, ['class' => 'form-control multi-generator', 'multiple' => 'multiple', 'style' => 'width:100%'])}}
                                            </div>
                                            <div class="form-group col-sm-4 pl-0">
                                                {{Form::label('adopters', 'Adopters', ['class' => 'col-form-label'])}} 
                                                {{Form::select('adopters[]', $adopters, null, ['class' => 'form-control multi-adopters', 'multiple' => 'multiple', 'style' => 'width:100%'])}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-4">
                                        <h3 class="mt-5 mb-3 font-weight-bold">Protection Type</h3>
                                        <div class="dropdown-divider mb-3"></div>
                                        <div class="card-body">
                                            <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="20%">Application Number</th>
                                                        <th width="45%">Type of Protection</th>
                                                        <th width="20%">Status</th>
                                                        <th width="15%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                            <td><span class="text-muted">-</span></td>
                                                            <td><span class="text-muted">-</span></td>
                                                            <td><span class="text-muted">-</span></td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addProtectionModal"><i class="fas fa-plus"></i></button>
                                                            </td>
                                                        </tr>
                                                    @foreach($tech->patents as $patent)
                                                        <tr>
                                                            <td>{!! nl2br(e($patent->application_number)) !!}</td>
                                                            <td>Patent</td>
                                                            <td>{{$patent->status}}</td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editPatentModal-{{$patent->id}}"><i class="fas fa-edit"></i></button>
                                                                <button type="button" class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deletePatentModal-{{$patent->id}}"><i class="fas fa-minus"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach($tech->trademarks as $trademark)
                                                        <tr>
                                                            <td>{!! nl2br(e($trademark->application_number)) !!}</td>
                                                            <td>Trademark</td>
                                                            <td>{{$trademark->status}}</td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editTrademarkModal-{{$trademark->id}}"><i class="fas fa-edit"></i></button>
                                                                <button type="button" class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteTrademarkModal-{{$trademark->id}}"><i class="fas fa-minus"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach($tech->utility_models as $utility_model)
                                                        <tr>
                                                            <td>{!! nl2br(e($utility_model->application_number)) !!}</td>
                                                            <td>Utility Model</td>
                                                            <td>{{$utility_model->status}}</td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editUtilityModelModal-{{$utility_model->id}}"><i class="fas fa-edit"></i></button>
                                                                <button type="button" class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteUtilityModelModal-{{$utility_model->id}}"><i class="fas fa-minus"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach($tech->industrial_designs as $industrial_design)
                                                        <tr>
                                                            <td>{!! nl2br(e($industrial_design->application_number)) !!}</td>
                                                            <td>Industrial Design</td>
                                                            <td>{{$industrial_design->status}}</td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editIndustrialDesignModal-{{$industrial_design->id}}"><i class="fas fa-edit"></i></button>
                                                                <button type="button" class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteIndustrialDesignModal-{{$industrial_design->id}}"><i class="fas fa-minus"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach($tech->copyrights as $copyright)
                                                        <tr>
                                                            <td>-------</td>
                                                            <td>Copyright</td>
                                                            <td>-------</td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editCopyrightModal-{{$copyright->id}}"><i class="fas fa-edit"></i></button>
                                                                <button type="button" class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteCopyrightModal-{{$copyright->id}}"><i class="fas fa-minus"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    @foreach($tech->plant_variety_protections as $plant_variety_protection)
                                                        <tr>
                                                            <td>{!! nl2br(e($plant_variety_protection->certificate_number)) !!}</td>
                                                            <td>Plant Variety Protection</td>
                                                            <td>-------</td>
                                                            <td class="text-center">
                                                                <button type="button" class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editPlantVarietyProtectionModal-{{$plant_variety_protection->id}}"><i class="fas fa-edit"></i></button>
                                                                <button type="button" class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deletePlantVarietyProtectionModal-{{$plant_variety_protection->id}}"><i class="fas fa-minus"></i></button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="technology_background" role="tabpanel">
                                    <h3 class="my-3 font-weight-bold">Basic Research</h3>
                                    <div class="dropdown-divider mb-3"></div>
                                    <div class="form-group">
                                        {{Form::label('basic_research_title', 'Project Title', ['class' => 'col-form-label'])}}
                                        {{Form::text('basic_research_title',$tech->basic_research_title, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {{Form::label('basic_research_funding', 'Funding Agency')}}
                                            {{Form::text('basic_research_funding', $tech->basic_research_funding,['class' => 'form-control']) }}
                                        </div>
                                        <div class="col-sm-6">
                                            {{Form::label('basic_research_implementing', 'Implementing Agency')}}
                                            {{Form::text('basic_research_implementing', $tech->basic_research_implementing,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {{Form::label('basic_research_cost', 'Project Cost (PHP)', ['class' => 'col-form-label'])}}
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                            <div class="input-group-text">₱</div>
                                            </div>
                                                {{Form::text('basic_research_cost', number_format($tech->basic_research_cost, 2, '.', ','), ['class' => 'form-control', 'placeholder' => 'Add cost', 'aria-describedby' => 'passwordHelpBlock'])}}
                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                Separate with comma ex. ₱200,568,300
                                            </small>
                                        </div>
                                        <div class="col-sm-2">
                                            {{Form::label('basic_research_start_date', 'Start Date', ['class' => 'col-form-label'])}}
                                            {{ Form::date('basic_research_start_date', $tech->basic_research_start_date,['class' => 'form-control']) }}
                                        </div>
                                        <div class="col-sm-2">
                                            {{Form::label('basic_research_end_date', 'End Date', ['class' => 'col-form-label'])}}
                                            {{ Form::date('basic_research_end_date', $tech->basic_research_end_date,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    
                                    <h3 class="mt-5 mb-3 font-weight-bold">Applied Research</h3>
                                    <div class="dropdown-divider mb-3"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            {{Form::label('applied_research_type', 'Applied Research')}}
                                            {{Form::select('applied_research_type', ['Published' => 'Published', 
                                                                        'Field testing' => 'Field testing', 
                                                                        'Multi-location trial' => 'Multi-location trial', 
                                                                        'Pilot testing' => 'Pilot testing', 
                                                                        'Socio-economic studies' => 'Socio-economic studies', 
                                                                        ], $tech->applied_research_type,['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('applied_research_title', 'Project Title', ['class' => 'col-form-label'])}}
                                        {{Form::text('applied_research_title',$tech->applied_research_title, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {{Form::label('applied_research_funding', 'Funding Agency')}}
                                            {{Form::text('applied_research_funding', $tech->applied_research_funding,['class' => 'form-control']) }}
                                        </div>
                                        <div class="col-sm-6">
                                            {{Form::label('applied_research_implementing', 'Implementing Agency')}}
                                            {{Form::text('applied_research_implementing',$tech->applied_research_implementing,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {{Form::label('applied_research_cost', 'Project Cost (PHP)', ['class' => 'col-form-label'])}}
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                            <div class="input-group-text">₱</div>
                                            </div>
                                                {{Form::text('applied_research_cost', number_format($tech->applied_research_cost, 2, '.', ','), ['class' => 'form-control', 'placeholder' => 'Add cost', 'aria-describedby' => 'passwordHelpBlock'])}}
                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                Separate with comma ex. ₱200,568,300
                                            </small>
                                        </div>
                                        <div class="col-sm-2">
                                            {{Form::label('applied_research_start_date', 'Start Date', ['class' => 'col-form-label'])}}
                                            {{ Form::date('applied_research_start_date', $tech->applied_research_start_date,['class' => 'form-control']) }}
                                        </div>
                                        <div class="col-sm-2">
                                            {{Form::label('applied_research_end_date', 'End Date', ['class' => 'col-form-label'])}}
                                            {{ Form::date('applied_research_end_date', $tech->applied_research_end_date,['class' => 'form-control']) }}
                                        </div>
                                    </div>

                                    <h3 class="mt-5 mb-3 font-weight-bold">R&D Results Utilization</h3>
                                    <div class="dropdown-divider mb-3"></div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Utilization</th>
                                                    <th width="65%">Title</th>
                                                    <th width="15%" class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td><span class="text-muted">-</span></td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addRDResultModal"><i class="fas fa-plus"></i></button>
                                                        </td>
                                                    </tr>
                                                @foreach($tech->r_d_results as $r_d_result)
                                                    <tr>
                                                        <td>{{$r_d_result->utilization}}</td>
                                                        <td>{{$r_d_result->title}}</td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editRDResultModal-{{$r_d_result->id}}"><i class="fas fa-edit"></i></button>
                                                            <button type="button" class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteRDResultModal-{{$r_d_result->id}}"><i class="fas fa-minus"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="other_details" role="tabpanel">
                                    <h3 class="text-muted mt-3 mb-3">
                                        Application of Technology
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadFileModal" data-category="application_of_technology">Add PDF</button> 
                                    </h3>
                                    <div class="dropdown-divider-2 mb-3"></div>  
                                    <div class="row ml-1 mr-1" style="width:60%">
                                        {{Form::text('application_of_technology', $tech->application_of_technology,['class' => 'form-control my-3', 'placeholder' => 'Enter application of technology']) }}
                                        @foreach($tech->files->where('category', '=', 'application_of_technology') as $file)
                                        <div class="col-sm-3 mx-3 px-0 pdf-card overlay-container">
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
                                            <div class="hover-overlay" style="width:100%">    
                                                <button type="button" class="btn btn-xs btn-danger" data-target="#confirmDeleteFileModal-{{$file->id}}" data-toggle="modal"><i class="far fa-trash-alt"></i></button>      
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <h3 class="text-muted mt-3 mb-3">
                                        Limitation of Technology
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadFileModal" data-category="limitation_of_technology">Add PDF</button> 
                                    </h3>
                                    <div class="dropdown-divider-2 mb-3"></div>  
                                    <div class="row ml-1 mr-1" style="width:60%">
                                        {{Form::text('limitation_of_technology', $tech->limitation_of_technology,['class' => 'form-control my-3', 'placeholder' => 'Enter limitation of technology']) }}
                                        @foreach($tech->files->where('category', '=', 'limitation_of_technology') as $file)
                                        <div class="col-sm-3 mx-3 px-0 pdf-card overlay-container">
                                            <a class="pdf-card-link" href="#" target="_blank">
                                                <span class="pdf-card-title">
                                                    {{$file->filename}}.{{$file->filetype}}
                                                </span>
                                                <span class="pdf-card-type">
                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                    <span class="pdf-card-size">
                                                        {{$file->filesize}} KB
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="hover-overlay" style="width:100%">    
                                                <button type="button" class="btn btn-xs btn-danger" data-target="#confirmDeleteFileModal-{{$file->id}}" data-toggle="modal"><i class="far fa-trash-alt"></i></button>      
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <h3 class="text-muted mt-3 mb-3">
                                        Market Study Summary
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadFileModal" data-category="market_study_summary">Add PDF</button> 
                                    </h3>
                                    <div class="dropdown-divider-2 mb-3"></div>  
                                    <div class="row ml-1 mr-1" style="width:60%">
                                        @foreach($tech->files->where('category', '=', 'market_study_summary') as $file)
                                        <div class="col-sm-3 mx-3 px-0 pdf-card overlay-container">
                                            <a class="pdf-card-link" href="#" target="_blank">
                                                <span class="pdf-card-title">
                                                    {{$file->filename}}.{{$file->filetype}}
                                                </span>
                                                <span class="pdf-card-type">
                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                    <span class="pdf-card-size">
                                                        {{$file->filesize}} KB
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="hover-overlay" style="width:100%">    
                                                <button type="button" class="btn btn-xs btn-danger" data-target="#confirmDeleteFileModal-{{$file->id}}" data-toggle="modal"><i class="far fa-trash-alt"></i></button>      
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <h3 class="text-muted mt-3 mb-3">
                                        Technology Valuation Summary
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadFileModal" data-category="technology_valuation_summary">Add PDF</button> 
                                    </h3>
                                    <div class="dropdown-divider-2 mb-3"></div>  
                                    <div class="row ml-1 mr-1" style="width:60%">
                                        @foreach($tech->files->where('category', '=', 'technology_valuation_summary') as $file)
                                        <div class="col-sm-3 mx-3 px-0 pdf-card overlay-container">
                                            <a class="pdf-card-link" href="#" target="_blank">
                                                <span class="pdf-card-title">
                                                    {{$file->filename}}.{{$file->filetype}}
                                                </span>
                                                <span class="pdf-card-type">
                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                    <span class="pdf-card-size">
                                                        {{$file->filesize}} KB
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="hover-overlay" style="width:100%">    
                                                <button type="button" class="btn btn-xs btn-danger" data-target="#confirmDeleteFileModal-{{$file->id}}" data-toggle="modal"><i class="far fa-trash-alt"></i></button>      
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <h3 class="text-muted mt-3 mb-3">
                                        Freedom to Operate Summary
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadFileModal" data-category="freedom_to_operate_summary">Add PDF</button> 
                                    </h3>
                                    <div class="dropdown-divider-2 mb-3"></div>  
                                    <div class="row ml-1 mr-1" style="width:60%">
                                        @foreach($tech->files->where('category', '=', 'freedom_to_operate_summary') as $file)
                                        <div class="col-sm-3 mx-3 px-0 pdf-card overlay-container">
                                            <a class="pdf-card-link" href="#" target="_blank">
                                                <span class="pdf-card-title">
                                                    {{$file->filename}}.{{$file->filetype}}
                                                </span>
                                                <span class="pdf-card-type">
                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                    <span class="pdf-card-size">
                                                        {{$file->filesize}} KB
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="hover-overlay" style="width:100%">    
                                                <button type="button" class="btn btn-xs btn-danger" data-target="#confirmDeleteFileModal-{{$file->id}}" data-toggle="modal"><i class="far fa-trash-alt"></i></button>      
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <h3 class="text-muted mt-3 mb-3">
                                        Proposed Term Sheet
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadFileModal" data-category="proposed_term_sheet">Add PDF</button> 
                                    </h3>
                                    <div class="dropdown-divider-2 mb-3"></div>  
                                    <div class="row ml-1 mr-1" style="width:60%">
                                        @foreach($tech->files->where('category', '=', 'proposed_term_sheet') as $file)
                                        <div class="col-sm-3 mx-3 px-0 pdf-card overlay-container">
                                            <a class="pdf-card-link" href="#" target="_blank">
                                                <span class="pdf-card-title">
                                                    {{$file->filename}}.{{$file->filetype}}
                                                </span>
                                                <span class="pdf-card-type">
                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                    <span class="pdf-card-size">
                                                        {{$file->filesize}} KB
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="hover-overlay" style="width:100%">    
                                                <button type="button" class="btn btn-xs btn-danger" data-target="#confirmDeleteFileModal-{{$file->id}}" data-toggle="modal"><i class="far fa-trash-alt"></i></button>      
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <h3 class="text-muted mt-3 mb-3">
                                        Fairness Opinion Report
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadFileModal" data-category="fairness_opinion_report">Add PDF</button> 
                                    </h3>
                                    <div class="dropdown-divider-2 mb-3"></div>  
                                    <div class="row ml-1 mr-1" style="width:60%">
                                        @foreach($tech->files->where('category', '=', 'fairness_opinion_report') as $file)
                                        <div class="col-sm-3 mx-3 px-0 pdf-card overlay-container">
                                            <a class="pdf-card-link" href="#" target="_blank">
                                                <span class="pdf-card-title">
                                                    {{$file->filename}}.{{$file->filetype}}
                                                </span>
                                                <span class="pdf-card-type">
                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                    <span class="pdf-card-size">
                                                        {{$file->filesize}} KB
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="hover-overlay" style="width:100%">    
                                                <button type="button" class="btn btn-xs btn-danger" data-target="#confirmDeleteFileModal-{{$file->id}}" data-toggle="modal"><i class="far fa-trash-alt"></i></button>      
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <h3 class="text-muted mt-3 mb-3">
                                        Process Flow
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadFileModal" data-category="process_flow">Add PDF</button> 
                                    </h3>
                                    <div class="dropdown-divider-2 mb-3"></div>  
                                    <div class="row ml-1 mr-1" style="width:60%">
                                        @foreach($tech->files->where('category', '=', 'process_flow') as $file)
                                        <div class="col-sm-3 mx-3 px-0 pdf-card overlay-container">
                                            <a class="pdf-card-link" href="#" target="_blank">
                                                <span class="pdf-card-title">
                                                    {{$file->filename}}.{{$file->filetype}}
                                                </span>
                                                <span class="pdf-card-type">
                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                    <span class="pdf-card-size">
                                                        {{$file->filesize}} KB
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="hover-overlay" style="width:100%">    
                                                <button type="button" class="btn btn-xs btn-danger" data-target="#confirmDeleteFileModal-{{$file->id}}" data-toggle="modal"><i class="far fa-trash-alt"></i></button>      
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <h3 class="text-muted mt-3 mb-3">
                                        Materials/Equipment
                                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#uploadFileModal" data-category="materials_equipment">Add PDF</button> 
                                    </h3>
                                    <div class="dropdown-divider-2 mb-3"></div>  
                                    <div class="row ml-1 mr-1" style="width:60%">
                                        @foreach($tech->files->where('category', '=', 'materials_equipment') as $file)
                                        <div class="col-sm-3 mx-3 px-0 pdf-card overlay-container">
                                            <a class="pdf-card-link" href="#" target="_blank">
                                                <span class="pdf-card-title">
                                                    {{$file->filename}}.{{$file->filetype}}
                                                </span>
                                                <span class="pdf-card-type">
                                                    <i class="fas fa-file-pdf" style="font-size:18px"></i>
                                                    <span class="pdf-card-size">
                                                        {{$file->filesize}} KB
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="hover-overlay" style="width:100%">    
                                                <button type="button" class="btn btn-xs btn-danger" data-target="#confirmDeleteFileModal-{{$file->id}}" data-toggle="modal"><i class="far fa-trash-alt"></i></button>      
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{Form::submit('Save changes', ['class' => 'btn btn-success float-right'])}}
                            {{ Form::close() }}
                        </div>
                        <script>
                            var value;
                            $(function() {
                                $('#protection_type_select').change(function(){
                                    var e = document.getElementById("protection_type_select");
                                    var value = e.options[e.selectedIndex].value;
                                    $('.ip_protection_choice').hide();
                                    $('.ip_protection_choice').find('input:text').val('');
                                    $('#protection_type_form_'+value).show();
                                    $('#trade_secret').prop('checked', false);
                                });
                            });
                            
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for add Protection -->
    <div class="modal fade" id="addProtectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Protection</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('protection_type_select', 'Type of IP Protection', ['class' => 'col-form-label'])}}
                        <select id="protection_type_select" class="form-control" data-live-search="true" name="protection_type_select">
                            <option value="1">Trade Secret</option>
                            <option value="2">Invention</option>
                            <option value="3">Patent</option>
                            <option value="4">Utility Model</option>
                            <option value="5">Industrial Design</option>
                            <option value="6">Trademark</option>
                            <option value="7">Copyright</option>
                            <option value="8">Plant Variety Protection</option>
                        </select>    
                    </div>
                    <div class="ip_protection_choice" id="protection_type_form_1">
                        <div class="card">
                            {{ Form::open(['action' => 'PatentsController@addPatent', 'method' => 'POST']) }}
                            <div class="card-header">
                                <b>Trade Secret</b>
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="trade_secret" name="trade_secret">
                                    <label class="form-check-label" for="trade_secret">
                                        Is Trade Secret?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Add Protection', ['class' => 'btn btn-success'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="ip_protection_choice" id="protection_type_form_2" style="display:none">
                        <div class="card">
                            {{ Form::open(['action' => 'PatentsController@addPatent', 'method' => 'POST']) }}
                            <div class="card-header">
                                <b>Invention</b>
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="trade_secret" name="trade_secret">
                                    <label class="form-check-label" for="trade_secret">
                                        Is Invention?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Add Protection', ['class' => 'btn btn-success'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="ip_protection_choice" id="protection_type_form_3" style="display:none">
                        <div class="card">
                            {{ Form::open(['action' => 'PatentsController@addPatent', 'method' => 'POST']) }}
                            <div class="card-header">
                                <b>Patent</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('application_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                    {{ Form::date('date_of_filing', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('patent_number', 'Patent Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('patent_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('registration_date', 'Registration Date', ['class' => 'col-form-label'])}}
                                    {{ Form::date('registration_date', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                    {{Form::select('status', ['Published' => 'Published', 
                                                                            'Unpublished' => 'Unpublished', 
                                                                            'Granted' => 'Granted', 
                                                                            'Withdrawn' => 'Withdrawn', 
                                                                            'Pending' => 'Pending', 
                                                                            'Expired' => 'Expired'
                                                                            ], null,['class' => 'form-control', 'placeholder' => '------------']) }}
                                </div>
                                {{ Form::hidden('tech_id', $tech->id)}}
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Add Protection', ['class' => 'btn btn-success'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="ip_protection_choice" id="protection_type_form_4" style="display:none">
                        {{ Form::open(['action' => 'UtilityModelsController@addUtilityModel', 'method' => 'POST']) }}
                        <div class="card">
                            <div class="card-header">
                                <b>Utility Model</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('application_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                    {{ Form::date('date_of_filing', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('um_number', 'Utility Model Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('um_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('registration_date', 'Registration Date', ['class' => 'col-form-label'])}}
                                    {{ Form::date('registration_date', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                    {{Form::select('status', ['Published' => 'Published', 
                                                                            'Unpublished' => 'Unpublished', 
                                                                            'Granted' => 'Granted', 
                                                                            'Withdrawn' => 'Withdrawn', 
                                                                            'Pending' => 'Pending', 
                                                                            'Expired' => 'Expired'
                                                                            ], null,['class' => 'form-control', 'placeholder' => '------------']) }}
                                </div>
                                {{ Form::hidden('tech_id', $tech->id)}}
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Add Protection', ['class' => 'btn btn-success'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="ip_protection_choice" id="protection_type_form_5" style="display:none">
                        {{ Form::open(['action' => 'IndustrialDesignsController@addIndustrialDesign', 'method' => 'POST']) }}
                        <div class="card">
                            <div class="card-header">
                                <b>Industrial Design</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('application_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                    {{ Form::date('date_of_filing', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('registration_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('registration_date', 'Date of Filing', ['class' => 'col-form-label'])}}
                                    {{ Form::date('registration_date', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                    {{Form::select('status', ['Published' => 'Published', 
                                                                            'Unpublished' => 'Unpublished', 
                                                                            'Granted' => 'Granted', 
                                                                            'Withdrawn' => 'Withdrawn', 
                                                                            'Pending' => 'Pending', 
                                                                            'Expired' => 'Expired'
                                                                            ], null,['class' => 'form-control', 'placeholder' => '------------']) }}
                                </div>
                                {{ Form::hidden('tech_id', $tech->id)}}
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Add Protection', ['class' => 'btn btn-success'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="ip_protection_choice" id="protection_type_form_6" style="display:none">
                        {{ Form::open(['action' => 'TrademarksController@addTrademark', 'method' => 'POST']) }}
                        <div class="card">
                            <div class="card-header">
                                <b>Trademark</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('application_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                    {{ Form::date('date_of_filing', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('registration_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('registration_date', 'Date of Filing', ['class' => 'col-form-label'])}}
                                    {{ Form::date('registration_date', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('expiration_date', 'Expiration Date', ['class' => 'col-form-label'])}}
                                    {{ Form::date('expiration_date', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('status', 'Status of Trademark', ['class' => 'col-form-label'])}}
                                    {{Form::select('status', ['Published' => 'Published', 
                                                                            'Unpublished' => 'Unpublished', 
                                                                            'Granted' => 'Granted', 
                                                                            'Withdrawn' => 'Withdrawn', 
                                                                            'Pending' => 'Pending', 
                                                                            'Expired' => 'Expired'
                                                                            ], null,['class' => 'form-control', 'placeholder' => '------------']) }}
                                </div>
                                {{ Form::hidden('tech_id', $tech->id)}}
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Add Protection', ['class' => 'btn btn-success'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="ip_protection_choice" id="protection_type_form_7" style="display:none">
                        {{ Form::open(['action' => 'CopyrightsController@addCopyright', 'method' => 'POST']) }}
                        <div class="card">
                            <div class="card-header">
                                <b>Copyright</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{Form::label('owners', 'Copyright Owners', ['class' => 'col-form-label'])}}
                                    {{Form::text('owners', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('publishers', 'Publishers', ['class' => 'col-form-label'])}}
                                    {{Form::text('publishers', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('date_of_creation', 'Date of Creation', ['class' => 'col-form-label'])}}
                                    {{ Form::date('date_of_creation', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('registration_date', 'Date Registered', ['class' => 'col-form-label'])}}
                                    {{ Form::date('registration_date', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('classes', 'Classes', ['class' => 'col-form-label'])}}
                                    {{Form::textarea('classes', '', ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Separate multiple entries with semi-colons.'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('registration_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('date_of_issuance', 'Date of Issuance', ['class' => 'col-form-label'])}}
                                    {{ Form::date('date_of_issuance', null,['class' => 'form-control']) }}
                                </div>
                                {{ Form::hidden('tech_id', $tech->id)}}
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Add Protection', ['class' => 'btn btn-success'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="ip_protection_choice" id="protection_type_form_8" style="display:none">
                        {{ Form::open(['action' => 'PlantVarietyProtectionsController@addPlantVarietyProtection', 'method' => 'POST']) }}
                        <div class="card">
                            <div class="card-header">
                                <b>Plant Variety Protection</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('application_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('applicant', 'Applicant', ['class' => 'col-form-label'])}}
                                    {{Form::text('applicant', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('crop', 'Crop', ['class' => 'col-form-label'])}}
                                    {{Form::text('crop', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('denomination', 'Proposed Denomination', ['class' => 'col-form-label'])}}
                                    {{Form::text('denomination', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('description_of_variety', 'Description of Variety', ['class' => 'col-form-label'])}}
                                    {{Form::textarea('description_of_variety', '', ['class' => 'form-control', 'rows' => 2])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('certificate_number', 'Certificate Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('certificate_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('date_of_issuance', 'Date of Issuance', ['class' => 'col-form-label'])}}
                                    {{ Form::date('date_of_issuance', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('duration_of_protection', 'Duration of Protection', ['class' => 'col-form-label'])}}
                                    {{Form::text('duration_of_protection', '', ['class' => 'form-control'])}}
                                </div>
                                {{ Form::hidden('tech_id', $tech->id)}}
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            {{Form::submit('Add Protection', ['class' => 'btn btn-success'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END modal for add Protection -->

@foreach($tech->patents as $patent)
    <!-- Modal for edit Patents -->
    <div class="modal fade" id="editPatentModal-{{$patent->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Edit Protection</h6>
                </div>
                <div class="modal-body">
                    <div class="card">
                        {{ Form::open(['action' => ['PatentsController@editPatent', $tech->id], 'method' => 'POST']) }}
                        <div class="card-header">
                            <b>Patent</b>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                {{Form::text('application_number', $patent->application_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                {{ Form::date('date_of_filing', $patent->date_of_filing,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('patent_number', 'Patent Number', ['class' => 'col-form-label'])}}
                                {{Form::text('patent_number', $patent->patent_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('registration_date', 'Registration Date', ['class' => 'col-form-label'])}}
                                {{ Form::date('registration_date', $patent->registration_date,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                {{Form::select('status', ['Published' => 'Published', 
                                                                        'Unpublished' => 'Unpublished', 
                                                                        'Granted' => 'Granted', 
                                                                        'Withdrawn' => 'Withdrawn', 
                                                                        'Pending' => 'Pending', 
                                                                        'Expired' => 'Expired'
                                                                        ], $patent->status,['class' => 'form-control', 'placeholder' => '------------']) }}
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END modal for edit Patents -->

    <!-- Modal for delete Patents -->
    <div class="modal fade" id="deletePatentModal-{{$patent->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('deletePatent', $patent->id) }}" id="deleteForm" method="POST">
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
                            Are you sure you want to delete patent?
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
    <!-- END modal for delete Patents -->
@endforeach

@foreach($tech->utility_models as $utility_model)
    <!-- Modal for edit Utility Model -->
    <div class="modal fade" id="editUtilityModelModal-{{$utility_model->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Edit Protection</h6>
                </div>
                <div class="modal-body">
                    <div class="card">
                        {{ Form::open(['action' => ['UtilityModelsController@editUtilityModel', $utility_model->id], 'method' => 'POST']) }}
                        <div class="card-header">
                            <b>Utility Model</b>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                {{Form::text('application_number', $utility_model->application_number, ['class' => 'form-control'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                {{ Form::date('date_of_filing', $utility_model->date_of_filing,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('um_number', 'Utility Model Number', ['class' => 'col-form-label'])}}
                                {{Form::text('um_number', $utility_model->um_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('registration_date', 'Registration Date', ['class' => 'col-form-label'])}}
                                {{ Form::date('registration_date', $utility_model->registration_date,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                {{Form::select('status', ['Published' => 'Published', 
                                                                        'Unpublished' => 'Unpublished', 
                                                                        'Granted' => 'Granted', 
                                                                        'Withdrawn' => 'Withdrawn', 
                                                                        'Pending' => 'Pending', 
                                                                        'Expired' => 'Expired'
                                                                        ], $utility_model->status,['class' => 'form-control', 'placeholder' => '------------']) }}
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END modal for edit Utility Model -->

    <!-- Modal for delete Utility Model -->
    <div class="modal fade" id="deleteUtilityModelModal-{{$utility_model->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('deleteUtilityModel', $utility_model->id) }}" id="deleteForm" method="POST">
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
                            Are you sure you want to delete utility model?
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
    <!-- END modal for delete Utility Model -->
@endforeach

@foreach($tech->trademarks as $trademark)
    <!-- Modal for edit Trademark -->
    <div class="modal fade" id="editTrademarkModal-{{$trademark->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Edit Protection</h6>
                </div>
                <div class="modal-body">
                    <div class="card">
                        {{ Form::open(['action' => ['TrademarksController@editTrademark', $trademark->id], 'method' => 'POST']) }}
                        <div class="card-header">
                            <b>Trademark</b>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                {{Form::text('application_number', $trademark->application_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                {{ Form::date('date_of_filing', $trademark->date_of_filing,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                {{Form::text('registration_number', $trademark->registration_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('registration_date', 'Date of Filing', ['class' => 'col-form-label'])}}
                                {{ Form::date('registration_date', $trademark->registration_date,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('expiration_date', 'Expiration Date', ['class' => 'col-form-label'])}}
                                {{ Form::date('expiration_date', $trademark->expiration_date,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('status', 'Status of Trademark', ['class' => 'col-form-label'])}}
                                {{Form::select('status', ['Published' => 'Published', 
                                                                        'Unpublished' => 'Unpublished', 
                                                                        'Granted' => 'Granted', 
                                                                        'Withdrawn' => 'Withdrawn', 
                                                                        'Pending' => 'Pending', 
                                                                        'Expired' => 'Expired'
                                                                        ], $trademark->status,['class' => 'form-control', 'placeholder' => '------------']) }}
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END modal for edit Trademark -->

    <!-- Modal for delete Trademark -->
    <div class="modal fade" id="deleteTrademarkModal-{{$trademark->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('deleteTrademark', $trademark->id) }}" id="deleteForm" method="POST">
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
                            Are you sure you want to delete trademark?
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
    <!-- END modal for delete Trademark -->
@endforeach

@foreach($tech->industrial_designs as $industrial_design)
    <!-- Modal for edit Industrial Design -->
    <div class="modal fade" id="editIndustrialDesignModal-{{$industrial_design->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Edit Protection</h6>
                </div>
                <div class="modal-body">
                    <div class="card">
                        {{ Form::open(['action' => ['IndustrialDesignsController@editIndustrialDesign', $industrial_design->id], 'method' => 'POST']) }}
                        <div class="card-header">
                            <b>Industrial Design</b>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                {{Form::text('application_number', $industrial_design->application_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                {{ Form::date('date_of_filing', $industrial_design->date_of_filing,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                {{Form::text('registration_number', $industrial_design->registration_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('registration_date', 'Date of Filing', ['class' => 'col-form-label'])}}
                                {{ Form::date('registration_date', $industrial_design->registration_date,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                {{Form::select('status', ['Published' => 'Published', 
                                                                        'Unpublished' => 'Unpublished', 
                                                                        'Granted' => 'Granted', 
                                                                        'Withdrawn' => 'Withdrawn', 
                                                                        'Pending' => 'Pending', 
                                                                        'Expired' => 'Expired'
                                                                        ], $industrial_design->status,['class' => 'form-control', 'placeholder' => '------------']) }}
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END modal for edit Industrial Design -->

    <!-- Modal for delete Industrial Design -->
    <div class="modal fade" id="deleteIndustrialDesignModal-{{$industrial_design->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('deleteIndustrialDesign', $industrial_design->id) }}" id="deleteForm" method="POST">
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
                            Are you sure you want to delete industrial design?
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
    <!-- END modal for delete Industrial Design -->
@endforeach

@foreach($tech->copyrights as $copyright)
    <!-- Modal for edit Copyright -->
    <div class="modal fade" id="editCopyrightModal-{{$copyright->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Edit Protection</h6>
                </div>
                <div class="modal-body">
                    <div class="card">
                        {{ Form::open(['action' => ['CopyrightsController@editCopyright', $copyright->id], 'method' => 'POST']) }}
                        <div class="card-header">
                            <b>Copyright</b>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {{Form::label('owners', 'Copyright Owners', ['class' => 'col-form-label'])}}
                                {{Form::text('owners', $copyright->owners, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('publishers', 'Publishers', ['class' => 'col-form-label'])}}
                                {{Form::text('publishers', $copyright->publishers, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('date_of_creation', 'Date of Creation', ['class' => 'col-form-label'])}}
                                {{ Form::date('date_of_creation', $copyright->date_of_creation,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('registration_date', 'Date Registered', ['class' => 'col-form-label'])}}
                                {{ Form::date('registration_date', $copyright->registration_date,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('classes', 'Classes', ['class' => 'col-form-label'])}}
                                {{Form::textarea('classes', $copyright->classes, ['class' => 'form-control', 'rows' => 2, 'placeholder' => 'Separate multiple entries with semi-colons.'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                {{Form::text('registration_number', $copyright->registration_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('date_of_issuance', 'Date of Issuance', ['class' => 'col-form-label'])}}
                                {{ Form::date('date_of_issuance', $copyright->date_of_issuance,['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END modal for edit Copyright -->

    <!-- Modal for delete Copyright -->
    <div class="modal fade" id="deleteCopyrightModal-{{$copyright->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('deleteCopyright', $copyright->id) }}" id="deleteForm" method="POST">
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
                            Are you sure you want to delete copyright?
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
    <!-- END modal for delete Copyright -->
@endforeach

@foreach($tech->plant_variety_protections as $plant_variety_protection)
    <!-- Modal for edit Plant Variety Protection -->
    <div class="modal fade" id="editPlantVarietyProtectionModal-{{$plant_variety_protection->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Edit Protection</h6>
                </div>
                <div class="modal-body">
                    <div class="card">
                        {{ Form::open(['action' => ['PlantVarietyProtectionsController@editPlantVarietyProtection', $plant_variety_protection->id], 'method' => 'POST']) }}
                        <div class="card-header">
                            <b>Plant Variety Protection</b>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                {{Form::text('application_number', $plant_variety_protection->application_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('applicant', 'Applicant', ['class' => 'col-form-label'])}}
                                {{Form::text('applicant', $plant_variety_protection->applicant, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('crop', 'Crop', ['class' => 'col-form-label'])}}
                                {{Form::text('crop', $plant_variety_protection->crop, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('denomination', 'Proposed Denomination', ['class' => 'col-form-label'])}}
                                {{Form::text('denomination', $plant_variety_protection->denomination, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('description_of_variety', 'Description of Variety', ['class' => 'col-form-label'])}}
                                {{Form::textarea('description_of_variety', $plant_variety_protection->description_of_variety, ['class' => 'form-control', 'rows' => 2])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('certificate_number', 'Certificate Number', ['class' => 'col-form-label'])}}
                                {{Form::text('certificate_number', $plant_variety_protection->certificate_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('date_of_issuance', 'Date of Issuance', ['class' => 'col-form-label'])}}
                                {{ Form::date('date_of_issuance', $plant_variety_protection->date_of_issuance,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('duration_of_protection', 'Duration of Protection', ['class' => 'col-form-label'])}}
                                {{Form::text('duration_of_protection', $plant_variety_protection->duration_of_protection, ['class' => 'form-control'])}}
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END modal for edit Plant Variety Protection -->

    <!-- Modal for delete Plant Variety Protection -->
    <div class="modal fade" id="deletePlantVarietyProtectionModal-{{$plant_variety_protection->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('deletePlantVarietyProtection', $plant_variety_protection->id) }}" id="deleteForm" method="POST">
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
                            Are you sure you want to delete plant variety protection?
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
    <!-- END modal for delete Plant Variety Protection -->
@endforeach

<!-- Modal for add R&D Result -->
    <div class="modal fade" id="addRDResultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add R&D Result</h6>
                </div>
                <div class="modal-body">
                    {{ Form::open(['action' => 'RDResultsController@addRDResult', 'method' => 'POST']) }}
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{Form::label('utilization', 'R&D Results Utilization (RDRU)')}}
                                {{Form::select('utilization', ['Pre-Commercialization Market Study' => 'Pre-Commercialization Market Study', 
                                                            'Pre-Commercialization IP' => 'Pre-Commercialization IP', 
                                                            'Pre-Commercialization FTO and Valuation' => 'Pre-Commercialization FTO and Valuation', 
                                                            'Pre-Commercialization Business Plan' => 'Pre-Commercialization Business Plan', 
                                                            'Pre-Commercialization Extension' => 'Pre-Commercialization Extension', 
                                                            'Pre-Commercialization Deployment' => 'Pre-Commercialization Deployment', 
                                                            'IP Audit' => 'IP Audit', 
                                                            'Extension/Deployment' => 'Extension/Deployment', 
                                                            'Commercialization' => 'Commercialization',
                                                            ], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('title', 'Project Title', ['class' => 'col-form-label'])}}
                            {{Form::text('title','', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                {{Form::label('funding', 'Funding Agency')}}
                                {{Form::text('funding', '',['class' => 'form-control']) }}
                            </div>
                            <div class="col-sm-6">
                                {{Form::label('implementing', 'Implementing Agency')}}
                                {{Form::text('implementing', '',['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                {{Form::label('cost', 'Project Cost (PHP)', ['class' => 'col-form-label'])}}
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                <div class="input-group-text">₱</div>
                                </div>
                                    {{Form::text('cost', '', ['class' => 'form-control', 'placeholder' => 'Add cost', 'aria-describedby' => 'passwordHelpBlock'])}}
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Separate with comma ex. ₱200,568,300
                                </small>
                            </div>
                            <div class="col-sm-3">
                                {{Form::label('start_date', 'Start Date', ['class' => 'col-form-label'])}}
                                {{ Form::date('start_date', '',['class' => 'form-control']) }}
                            </div>
                            <div class="col-sm-3">
                                {{Form::label('end_date', 'End Date', ['class' => 'col-form-label'])}}
                                {{ Form::date('end_date', '',['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{Form::label('beneficiary_type', 'Type of Beneficiary')}}
                                {{Form::select('beneficiary_type', ['Individual' => 'Individual', 
                                                            'Organization' => 'Organization'
                                                            ], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                {{Form::label('beneficiary_name', 'Name of Project Beneficiary/ies')}}
                                {{Form::textarea('beneficiary_name', '',['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Separate multiple entries with commas']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                {{Form::label('beneficiary_region', 'Beneficiary Address - Region')}}
                                {{Form::select('beneficiary_region', ['ARMM' => 'ARMM - Autonomous Region in Muslim Mindanao', 
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
                                                            ], null,['class' => 'form-control', 'placeholder' => '------------']) }}
                            </div>
                            <div class="col-sm-4">
                                {{Form::label('beneficiary_province', 'Beneficiary Address - Province')}}
                                {{Form::text('beneficiary_province', '',['class' => 'form-control']) }}
                            </div>
                            <div class="col-sm-4">
                                {{Form::label('beneficiary_municipality', 'Beneficiary Address - Municipality')}}
                                {{Form::text('beneficiary_municipality', '',['class' => 'form-control']) }}
                            </div>
                        </div>
                        {{ Form::hidden('tech_id', $tech->id)}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Add R&D Result', ['class' => 'btn btn-success'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
<!-- END modal for add R&D Result -->

@foreach($tech->r_d_results as $r_d_result)
    <!-- Modal for edit R&D Results -->
    <div class="modal fade" id="editRDResultModal-{{$r_d_result->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Edit R&D Result</h6>
                </div>
                <div class="modal-body">
                    {{ Form::open(['action' => ['RDResultsController@editRDResult', $r_d_result->id], 'method' => 'POST']) }}
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{Form::label('utilization', 'R&D Results Utilization (RDRU)')}}
                                {{Form::select('utilization', ['Pre-Commercialization Market Study' => 'Pre-Commercialization Market Study', 
                                                            'Pre-Commercialization IP' => 'Pre-Commercialization IP', 
                                                            'Pre-Commercialization FTO and Valuation' => 'Pre-Commercialization FTO and Valuation', 
                                                            'Pre-Commercialization Business Plan' => 'Pre-Commercialization Business Plan', 
                                                            'Pre-Commercialization Extension' => 'Pre-Commercialization Extension', 
                                                            'Pre-Commercialization Deployment' => 'Pre-Commercialization Deployment', 
                                                            'IP Audit' => 'IP Audit', 
                                                            'Extension/Deployment' => 'Extension/Deployment', 
                                                            'Commercialization' => 'Commercialization',
                                                            ], $r_d_result->utilization,['class' => 'form-control', 'placeholder' => '------------']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('title', 'Project Title', ['class' => 'col-form-label'])}}
                            {{Form::text('title',$r_d_result->title, ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                {{Form::label('funding', 'Funding Agency')}}
                                {{Form::text('funding', $r_d_result->funding,['class' => 'form-control']) }}
                            </div>
                            <div class="col-sm-6">
                                {{Form::label('implementing', 'Implementing Agency')}}
                                {{Form::text('implementing', $r_d_result->implementing,['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                {{Form::label('cost', 'Project Cost (PHP)', ['class' => 'col-form-label'])}}
                                <div class="input-group">
                                        <div class="input-group-prepend">
                                <div class="input-group-text">₱</div>
                                </div>
                                    {{Form::text('cost', number_format($r_d_result->cost, 2, '.', ','), ['class' => 'form-control', 'placeholder' => 'Add cost', 'aria-describedby' => 'passwordHelpBlock'])}}
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Separate with comma ex. ₱200,568,300
                                </small>
                            </div>
                            <div class="col-sm-3">
                                {{Form::label('start_date', 'Start Date', ['class' => 'col-form-label'])}}
                                {{ Form::date('start_date', $r_d_result->start_date,['class' => 'form-control']) }}
                            </div>
                            <div class="col-sm-3">
                                {{Form::label('end_date', 'End Date', ['class' => 'col-form-label'])}}
                                {{ Form::date('end_date', $r_d_result->end_date,['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{Form::label('beneficiary_type', 'Type of Beneficiary')}}
                                {{Form::select('beneficiary_type', ['Individual' => 'Individual', 
                                                            'Organization' => 'Organization'
                                                            ], $r_d_result->beneficiary_type,['class' => 'form-control', 'placeholder' => '------------']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                {{Form::label('beneficiary_name', 'Name of Project Beneficiary/ies')}}
                                {{Form::textarea('beneficiary_name', $r_d_result->beneficiary_name,['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Separate multiple entries with commas']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                {{Form::label('beneficiary_region', 'Beneficiary Address - Region')}}
                                {{Form::select('beneficiary_region', ['ARMM' => 'ARMM - Autonomous Region in Muslim Mindanao', 
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
                                                            ], $r_d_result->beneficiary_region,['class' => 'form-control', 'placeholder' => '------------']) }}
                            </div>
                            <div class="col-sm-4">
                                {{Form::label('beneficiary_province', 'Beneficiary Address - Province')}}
                                {{Form::text('beneficiary_province', $r_d_result->beneficiary_province,['class' => 'form-control']) }}
                            </div>
                            <div class="col-sm-4">
                                {{Form::label('beneficiary_municipality', 'Beneficiary Address - Municipality')}}
                                {{Form::text('beneficiary_municipality', $r_d_result->beneficiary_municipality,['class' => 'form-control']) }}
                            </div>
                        </div>
                        {{ Form::hidden('tech_id', $tech->id)}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <!-- END modal for edit R&D Results -->

    <!-- Modal for delete R&D Results -->
    <div class="modal fade" id="deleteRDResultModal-{{$r_d_result->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('deleteRDResult', $r_d_result->id) }}" id="deleteForm" method="POST">
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
                            Are you sure you want to delete R&D result?
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
    <!-- END modal for delete R&D Results -->
@endforeach

<!-- Modal for upload file -->
    <div class="modal fade" id="uploadFileModal" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true" style="z-index:9999">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Upload a PDF</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['action' => ['FilesController@uploadFile', $tech->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                        {{ Form::file('file', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                        <input id="addFileCategory" name="category" type="hidden" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{Form::submit('Done', ['class' => 'btn btn-primary'])}}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#uploadFileModal').on('show.bs.modal', function (event) {
                var button     = $(event.relatedTarget),
                    modal    = $(this),
                    category       = button.data('category');

                modal.find("#addFileCategory").val(category);
            });
    </script>
    <!-- END modal for upload file-->
    @foreach($tech->files as $file)
    <!-- Modal for confirm delete file -->
    <div class="modal fade" id="confirmDeleteFileModal-{{$file->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => ['FilesController@deleteFile', $file->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
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
                        Are you sure you want to delete: <b>{{$file->filename}}</b>
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
    <!-- end modal for confirm delete file-->
@endforeach

<script>
    $(document).ready(function(){
        $('.multi-commodity').select2({
            placeholder: "Select commodity",
        }).val({!! json_encode($tech->commodities()->allRelatedIds()) !!}).trigger('change');
        $('.multi-category').select2({
            placeholder: "Select category",
        }).val({!! json_encode($tech->technology_categories()->allRelatedIds()) !!}).trigger('change');
        $('.multi-agency').select2({
            placeholder: "Select agency",
        }).val({!! json_encode($tech->agencies()->allRelatedIds()) !!}).trigger('change');
        $('.multi-generator').select2({
            placeholder: "Select generator"
        }).val({!! json_encode($tech->generators()->allRelatedIds()) !!}).trigger('change');
        $('.multi-adopters').select2({
            placeholder: "Select adopters"
        }).val({!! json_encode($tech->adopters()->allRelatedIds()) !!}).trigger('change');
        $('#tech_tabs a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        });
        
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
    });
</script>
@endsection
