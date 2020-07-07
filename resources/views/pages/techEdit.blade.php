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
        <div class="col-sm-10">
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
                                    <a class="nav-link active" href="#main" data-toggle="tab">Main</a>
                                </li>
                                <li class="nav-item" role="tab">
                                    <a class="nav-link" href="#ip_protection" data-toggle="tab">IP Protection</a>
                                </li>
                                <li class="nav-item" role="tab">
                                    <a class="nav-link" href="#owners_and_generators" data-toggle="tab">Owners and Generators</a>
                                </li>
                                <li class="nav-item" role="tab">
                                    <a class="nav-link" href="#adopters" data-toggle="tab">Adopters</a>
                                </li>
                                <li class="nav-item" role="tab">
                                    <a class="nav-link" href="#technology_background" data-toggle="tab">Technology Background</a>
                                </li>
                                <li class="nav-item" role="tab">
                                    <a class="nav-link" href="#other_details" data-toggle="tab">Other Details</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="main" role="tabpanel">
                                    {{ Form::open(['action' => ['TechnologiesController@editTechnology', $tech->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                    <div class="form-group">
                                        {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                        {{Form::text('name', $tech->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
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
                                                                    ], $tech->region,['class' => 'form-control', 'placeholder' => '------------']) }}
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {{Form::label('category', 'Categories', ['class' => 'col-form-label'])}} 
                                            {{Form::select('technology_categories[]', $technologyCategories, null, ['class' => 'form-control multi-category', 'multiple' => 'multiple'])}}        
                                        </div>
                                        <div class="col-sm-3">
                                            {{Form::label('commodity', 'Commodities', ['class' => 'col-form-label'])}} 
                                            {{Form::select('commodities[]', $commodities, null, ['class' => 'form-control multi-commodity', 'multiple' => 'multiple'])}}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {{Form::label('protection', 'Protection Level', ['class' => 'col-form-label'])}}
                                            {{Form::select('protection', ['publicwithip' => 'Public Domain with IP', 
                                                                        'public' => 'Public Domain', 
                                                                        'ipprotected' => 'IP Protected', 
                                                                        ], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                        <div class="col-sm-2">
                                            {{Form::label('year_developed', 'Year Developed', ['class' => 'col-form-label'])}}
                                            <select name="year_developed" class="form-control" >
                                                <?php $last = Carbon\Carbon::now()->year-100; ?>
                                                <?php $now = Carbon\Carbon::now()->year; ?>
                                                <option disabled selected>------------</option> 
                                                @for($i = $now; $i >= $last; $i--)                               
                                                    <option value="{{$i}}" {{$i == $tech->year_developed ? 'selected' : ''}}>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            {{Form::label('ownership_cost', 'Estimated Ownership Cost (PHP)', ['class' => 'col-form-label'])}}
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                            <div class="input-group-text">₱</div>
                                            </div>
                                                {{Form::text('ownership_cost', '', ['class' => 'form-control', 'placeholder' => 'Add cost', 'aria-describedby' => 'passwordHelpBlock'])}}
                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                Separate with comma ex. ₱200,568,300
                                            </small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('description', 'Description', ['class' => 'col-form-label'])}}
                                        {{Form::textarea('description', $tech->description, ['class' => 'form-control', 'placeholder' => 'Add a description'])}}
                                    </div>

                                    <div class="form-group">
                                        <table class="table w-50">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Year Complied</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="field_testing">
                                                            <label class="form-check-label" for="field_testing">
                                                                <b>For Field-Testing</b>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select name="field_testing_year" class="form-control" >
                                                            <?php $last = Carbon\Carbon::now()->year-100; ?>
                                                            <?php $now = Carbon\Carbon::now()->year; ?>
                                                            <option disabled selected>------------</option> 
                                                            @for($i = $now; $i >= $last; $i--)                              
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="loc_trial">
                                                            <label class="form-check-label" for="loc_trial">
                                                                <b>For Multi-loc Trial</b>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select name="loc_trial_year" class="form-control" >
                                                            <?php $last = Carbon\Carbon::now()->year-100; ?>
                                                            <?php $now = Carbon\Carbon::now()->year; ?>
                                                            <option disabled selected>------------</option> 
                                                            @for($i = $now; $i >= $last; $i--)                               
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="pilot_testing">
                                                            <label class="form-check-label" for="pilot_testing">
                                                                <b>For Pilot Testing</b>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select name="pilot_testing_year" class="form-control" >
                                                            <?php $last = Carbon\Carbon::now()->year-100; ?>
                                                            <?php $now = Carbon\Carbon::now()->year; ?>
                                                            <option disabled selected>------------</option> 
                                                            @for($i = $now; $i >= $last; $i--)                               
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="econ_studies">
                                                            <label class="form-check-label" for="econ_studies">
                                                                <b>For Socio-Econ Studies</b>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select name="econ_studies_year" class="form-control" >
                                                            <?php $last = Carbon\Carbon::now()->year-100; ?>
                                                            <?php $now = Carbon\Carbon::now()->year; ?>
                                                            <option disabled selected>------------</option> 
                                                            @for($i = $now; $i >= $last; $i--)                               
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="ip_audit">
                                                            <label class="form-check-label" for="ip_audit">
                                                                <b>For IP Audit</b>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select name="ip_audit_year" class="form-control" >
                                                            <?php $last = Carbon\Carbon::now()->year-100; ?>
                                                            <?php $now = Carbon\Carbon::now()->year; ?>
                                                            <option disabled selected>------------</option> 
                                                            @for($i = $now; $i >= $last; $i--)                               
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="deployment_extension">
                                                            <label class="form-check-label" for="deployment_extension">
                                                                <b>For Deployment and Extension</b>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select name="deployment_extension_year" class="form-control" >
                                                            <?php $last = Carbon\Carbon::now()->year-100; ?>
                                                            <?php $now = Carbon\Carbon::now()->year; ?>
                                                            <option disabled selected>------------</option> 
                                                            @for($i = $now; $i >= $last; $i--)                               
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="pre_commercialization">
                                                            <label class="form-check-label" for="pre_commercialization">
                                                                <b>For Pre-Commercialization</b>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select name="pre_commercialization_year" class="form-control" >
                                                            <?php $last = Carbon\Carbon::now()->year-100; ?>
                                                            <?php $now = Carbon\Carbon::now()->year; ?>
                                                            <option disabled selected>------------</option> 
                                                            @for($i = $now; $i >= $last; $i--)                               
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="commercialization">
                                                            <label class="form-check-label" for="commercialization">
                                                                <b>For Commercialization</b>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <select name="commercialization_year" class="form-control" >
                                                            <?php $last = Carbon\Carbon::now()->year-100; ?>
                                                            <?php $now = Carbon\Carbon::now()->year; ?>
                                                            <option disabled selected>------------</option> 
                                                            @for($i = $now; $i >= $last; $i--)                               
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="ip_protection" role="tabpanel">
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
                                                        <td>{!! nl2br(e($copyright->application_number)) !!}</td>
                                                        <td>Copyright</td>
                                                        <td>{{$copyright->status}}</td>
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
                                <div class="tab-pane fade" id="owners_and_generators" role="tabpanel">
                                    <div class="card-body">
                                        <div class="form-group col-sm-4 pl-0">
                                            {{Form::label('owners', 'Owners', ['class' => 'col-form-label'])}} 
                                            {{Form::select('owners[]', $agencies, null, ['class' => 'form-control multi-agency', 'multiple' => 'multiple', 'style' => 'width:100%'])}}        
                                        </div>
                                        <div class="form-group col-sm-4 pl-0">
                                            {{Form::label('generators', 'Generators', ['class' => 'col-form-label'])}} 
                                            {{Form::select('generators[]', $generators, null, ['class' => 'form-control multi-generator', 'multiple' => 'multiple', 'style' => 'width:100%'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="adopters" role="tabpanel">
                                    <div class="card-body">
                                        <div class="form-group col-sm-4 pl-0">
                                            {{Form::label('potential_adopters', 'Potential Adopters', ['class' => 'col-form-label'])}} 
                                            {{Form::select('potential_adopters[]', $potentialAdopters, null, ['class' => 'form-control multi-potential-adopters', 'multiple' => 'multiple', 'style' => 'width:100%'])}}        
                                        </div>
                                        <div class="form-group col-sm-4 pl-0">
                                            {{Form::label('adopters', 'Adopters', ['class' => 'col-form-label'])}} 
                                            {{Form::select('adopters[]', $adopters, null, ['class' => 'form-control multi-adopters', 'multiple' => 'multiple', 'style' => 'width:100%'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="technology_background" role="tabpanel">
                                    <h3 class="my-3 font-weight-bold">Basic Research</h3>
                                    <div class="dropdown-divider mb-3"></div>
                                    <div class="form-group">
                                        {{Form::label('basic_research_name', 'Project Title', ['class' => 'col-form-label'])}}
                                        {{Form::text('basic_research_name','', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {{Form::label('basic_research_funding_agency', 'Funding Agency')}}
                                            {{Form::select('basic_research_funding_agency', [], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                        <div class="col-sm-6">
                                            {{Form::label('basic_research_agency', 'Implementing Agency')}}
                                            {{Form::select('basic_research_agency', [], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {{Form::label('basic_research_ownership_cost', 'Project Cost (PHP)', ['class' => 'col-form-label'])}}
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                            <div class="input-group-text">₱</div>
                                            </div>
                                                {{Form::text('basic_research_ownership_cost', '', ['class' => 'form-control', 'placeholder' => 'Add cost', 'aria-describedby' => 'passwordHelpBlock'])}}
                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                Separate with comma ex. ₱200,568,300
                                            </small>
                                        </div>
                                        <div class="col-sm-2">
                                            {{Form::label('basic_research_start_date', 'Start Date', ['class' => 'col-form-label'])}}
                                            {{ Form::date('basic_research_start_date', null,['class' => 'form-control']) }}
                                        </div>
                                        <div class="col-sm-2">
                                            {{Form::label('basic_research_end_date', 'End Date', ['class' => 'col-form-label'])}}
                                            {{ Form::date('basic_research_end_date', null,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    
                                    <h3 class="mt-5 mb-3 font-weight-bold">Applied Research</h3>
                                    <div class="dropdown-divider mb-3"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            {{Form::label('applied_research', 'Applied Research')}}
                                            {{Form::select('applied_research', [], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('applied_research_name', 'Project Title', ['class' => 'col-form-label'])}}
                                        {{Form::text('applied_research_name','', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {{Form::label('applied_research_funding_agency', 'Funding Agency')}}
                                            {{Form::select('applied_research_funding_agency', [], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                        <div class="col-sm-6">
                                            {{Form::label('applied_research_agency', 'Implementing Agency')}}
                                            {{Form::select('applied_research_agency', [], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {{Form::label('applied_research_ownership_cost', 'Project Cost (PHP)', ['class' => 'col-form-label'])}}
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                            <div class="input-group-text">₱</div>
                                            </div>
                                                {{Form::text('applied_research_ownership_cost', '', ['class' => 'form-control', 'placeholder' => 'Add cost', 'aria-describedby' => 'passwordHelpBlock'])}}
                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                Separate with comma ex. ₱200,568,300
                                            </small>
                                        </div>
                                        <div class="col-sm-2">
                                            {{Form::label('applied_research_start_date', 'Start Date', ['class' => 'col-form-label'])}}
                                            {{ Form::date('applied_research_start_date', null,['class' => 'form-control']) }}
                                        </div>
                                        <div class="col-sm-2">
                                            {{Form::label('applied_research_end_date', 'End Date', ['class' => 'col-form-label'])}}
                                            {{ Form::date('applied_research_end_date', null,['class' => 'form-control']) }}
                                        </div>
                                    </div>

                                    <h3 class="mt-5 mb-3 font-weight-bold">R&D Results Utilization</h3>
                                    <div class="dropdown-divider mb-3"></div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            {{Form::label('rrdu', 'R&D Results Utilization (RDRU)')}}
                                            {{Form::select('rrdu', [], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('rrdu_name', 'Project Title', ['class' => 'col-form-label'])}}
                                        {{Form::text('rrdu_name','', ['class' => 'form-control', 'placeholder' => 'Add a title'])}}
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            {{Form::label('rrdu_funding_agency', 'Funding Agency')}}
                                            {{Form::select('rrdu_funding_agency', [], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                        <div class="col-sm-6">
                                            {{Form::label('rrdu_implementing_agency', 'Implementing Agency')}}
                                            {{Form::select('rrdu_implementing_agency', [], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {{Form::label('rrdu_ownership_cost', 'Project Cost (PHP)', ['class' => 'col-form-label'])}}
                                            <div class="input-group">
                                                    <div class="input-group-prepend">
                                            <div class="input-group-text">₱</div>
                                            </div>
                                                {{Form::text('rrdu_ownership_cost', '', ['class' => 'form-control', 'placeholder' => 'Add cost', 'aria-describedby' => 'passwordHelpBlock'])}}
                                            </div>
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                Separate with comma ex. ₱200,568,300
                                            </small>
                                        </div>
                                        <div class="col-sm-2">
                                            {{Form::label('rrdu_start_date', 'Start Date', ['class' => 'col-form-label'])}}
                                            {{ Form::date('rrdu_start_date', null,['class' => 'form-control']) }}
                                        </div>
                                        <div class="col-sm-2">
                                            {{Form::label('rrdu_end_date', 'End Date', ['class' => 'col-form-label'])}}
                                            {{ Form::date('rrdu_end_date', null,['class' => 'form-control']) }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            {{Form::label('commercialization', 'Mode of Commercialization')}}
                                            {{Form::select('commercialization', [], '',['class' => 'form-control', 'placeholder' => '------------']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="other_details" role="tabpanel">
                                    <div class="card-body">
                                        Assets
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
                            @foreach($protectionTypes as $protectionType)
                                <option value="{{$protectionType->id}}">{{$protectionType->name}}</option>
                            @endforeach
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
                                <b>Patent</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('application_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('patent_number', 'Patent Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('patent_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                    {{ Form::date('date_of_filing', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                    {{Form::text('status', '', ['class' => 'form-control'])}}
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
                    <div class="ip_protection_choice" id="protection_type_form_3" style="display:none">
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
                                    {{Form::label('registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('registration_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                    {{ Form::date('date_of_filing', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                    {{Form::text('status', '', ['class' => 'form-control'])}}
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
                                    {{Form::label('registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('registration_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                    {{ Form::date('date_of_filing', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                    {{Form::text('status', '', ['class' => 'form-control'])}}
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
                        {{ Form::open(['action' => 'CopyrightsController@addCopyright', 'method' => 'POST']) }}
                        <div class="card">
                            <div class="card-header">
                                <b>Copyright</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('application_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('registration_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                    {{ Form::date('date_of_filing', null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-group">
                                    {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                    {{Form::text('status', '', ['class' => 'form-control'])}}
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
                        {{ Form::open(['action' => 'PlantVarietyProtectionsController@addPlantVarietyProtection', 'method' => 'POST']) }}
                        <div class="card">
                            <div class="card-header">
                                <b>Plant Variety Protection</b>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    {{Form::label('certificate_number', 'Certificate Number', ['class' => 'col-form-label'])}}
                                    {{Form::text('certificate_number', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('denomination', 'Denomination', ['class' => 'col-form-label'])}}
                                    {{Form::text('denomination', '', ['class' => 'form-control'])}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('crop_type', 'Crop Type', ['class' => 'col-form-label'])}}
                                    {{Form::text('crop_type', '', ['class' => 'form-control'])}}
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
                                {{Form::label('patent_number', 'Patent Number', ['class' => 'col-form-label'])}}
                                {{Form::text('patent_number', $patent->patent_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                {{ Form::date('date_of_filing', $patent->date_of_filing,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                {{Form::text('status', $patent->status, ['class' => 'form-control'])}}
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
                                {{Form::label('registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                {{Form::text('registration_number', $utility_model->registration_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                {{ Form::date('date_of_filing', $utility_model->date_of_filing,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                {{Form::text('status', $utility_model->status, ['class' => 'form-control'])}}
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
                                {{Form::label('registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                {{Form::text('registration_number', $industrial_design->registration_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                {{ Form::date('date_of_filing', $industrial_design->date_of_filing,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                {{Form::text('status', $industrial_design->status, ['class' => 'form-control'])}}
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
                                {{Form::label('application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                {{Form::text('application_number', $copyright->application_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                {{Form::text('registration_number', $copyright->registration_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                {{ Form::date('date_of_filing', $copyright->date_of_filing,['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{Form::label('status', 'Status', ['class' => 'col-form-label'])}}
                                {{Form::text('status', $copyright->status, ['class' => 'form-control'])}}
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
                        <span>enough cowoncy
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
                                {{Form::label('certificate_number', 'Certificate Number', ['class' => 'col-form-label'])}}
                                {{Form::text('certificate_number', $plant_variety_protection->certificate_number, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('denomination', 'Denomination', ['class' => 'col-form-label'])}}
                                {{Form::text('denomination', $plant_variety_protection->denomination, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('crop_type', 'Crop Type', ['class' => 'col-form-label'])}}
                                {{Form::text('crop_type', $plant_variety_protection->crop_type, ['class' => 'form-control'])}}
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
        $('.multi-potential-adopters').select2({
            placeholder: "Select potential adopters"
        }).val({!! json_encode($tech->potential_adopters()->allRelatedIds()) !!}).trigger('change');
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
