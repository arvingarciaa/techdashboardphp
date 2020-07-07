@extends('layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb pb-0" style="background-color:transparent">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">km4aanr</a></li>
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Technology Dashboard</a></li>
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/admin">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Technology</li>
    </ol>
@endsection
@section('content')
<div class="container-fluid px-0">
    <div class="row mr-0" style="max-height:inherit; min-height:40rem">
        <div class="col-sm-2 bg-dark pr-0">
            <div class="nav nav-tabs" style="border-bottom-width: 0px;">
                <a class="list-group-item active" data-toggle="tab" href="#edit">Add a Technology</a>
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
            @include('inc.messages')
            <div class="tab-content">
                <div class="tab-pane fade show active" id="edit">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <b style="font-size:25px">Technologies</b> <small>Create form</small>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item active" role="tab">
                                    <a class="nav-link active" href="#main" data-toggle="tab">Main</a>
                                </li>
                                <!--
                                <li class="nav-item" role="tab">
                                    <a class="nav-link" href="#ip_protection" data-toggle="tab">IP Protection</a>
                                </li>
                                <li class="nav-item" role="tab">
                                    <a class="nav-link" href="#owners_and_generators" data-toggle="tab">Owners and Generators</a>
                                </li>
                                <li class="nav-item" role="tab">
                                    <a class="nav-link" href="#funding" data-toggle="tab">Funding</a>
                                </li>
                                <li class="nav-item" role="tab">
                                    <a class="nav-link" href="#adopters" data-toggle="tab">Adopters</a>
                                </li>
                                <li class="nav-item" role="tab">
                                    <a class="nav-link" href="#assets" data-toggle="tab">Assets</a>
                                </li>
                            -->
                            </ul>
                        </div>
                        
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="main" role="tabpanel">
                                <div class="card-body">
                                    {{ Form::open(['action' => ['TechnologiesController@addTechnology'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                    <div class="form-group">
                                        {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
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
                                                    <option value="{{$i}}">{{$i}}</option>
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
                                        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Add a description'])}}
                                    </div>
                                    <!--
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
                                                            @for($i = $now; $i >= $last; $i--)                               
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                -->
                                </div>
                            </div>
                            <!--
                            <div class="tab-pane fade" id="ip_protection" role="tabpanel">
                                <div class="card-body">
                                    <div class="form-group">
                                        {{Form::label('protection_type_select', 'Type of IP Protection', ['class' => 'col-form-label'])}}
                                        <select id="protection_type_select" class="form-control" data-live-search="true" name="protection_type_select">
                                            <option value="" disabled selected>------------</option>
                                            @foreach($protectionTypes as $protectionType)
                                                <option value="{{$protectionType->id}}">{{$protectionType->name}}</option>
                                            @endforeach
                                        </select>    
                                        
                                    </div>
                                    <div class="card ip_protection_choice" id="protection_type_form_1" style="display:none">
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
                                    <div class="card ip_protection_choice" id="protection_type_form_2" style="display:none">
                                        <div class="card-header">
                                            <b>Patent</b>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                {{Form::label('patent_application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                                {{Form::text('patent_application_number', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('patent_number', 'Patent Number', ['class' => 'col-form-label'])}}
                                                {{Form::text('patent_number', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('patent_date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                                {{Form::text('patent_date_of_filing', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('patent_status', 'Status', ['class' => 'col-form-label'])}}
                                                {{Form::text('patent_status', '', ['class' => 'form-control'])}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card ip_protection_choice" id="protection_type_form_3" style="display:none">
                                        <div class="card-header">
                                            <b>Utility Model</b>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                {{Form::label('utility_model_application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                                {{Form::text('utility_model_application_number', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('utility_model_registration_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                                {{Form::text('utility_model_registration_number', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('utility_model_date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                                {{Form::text('utility_model_date_of_filing', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('utility_model_status', 'Status', ['class' => 'col-form-label'])}}
                                                {{Form::text('utility_model_status', '', ['class' => 'form-control'])}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card ip_protection_choice" id="protection_type_form_4" style="display:none">
                                        <div class="card-header">
                                            <b>Industrial Design</b>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                {{Form::label('industrial_design_application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                                {{Form::text('industrial_design_application_number', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('industrial_design_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                                {{Form::text('industrial_design_number', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('industrial_design_date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                                {{Form::text('industrial_design_date_of_filing', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('industrial_design_status', 'Status', ['class' => 'col-form-label'])}}
                                                {{Form::text('industrial_design_status', '', ['class' => 'form-control'])}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card ip_protection_choice" id="protection_type_form_5" style="display:none">
                                        <div class="card-header">
                                            <b>Copyright</b>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                {{Form::label('copyright_application_number', 'Application Number', ['class' => 'col-form-label'])}}
                                                {{Form::text('copyright_application_number', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('copyright_number', 'Registration Number', ['class' => 'col-form-label'])}}
                                                {{Form::text('copyright_number', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('copyright_date_of_filing', 'Date of Filing', ['class' => 'col-form-label'])}}
                                                {{Form::text('copyright_date_of_filing', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('copyright_status', 'Status', ['class' => 'col-form-label'])}}
                                                {{Form::text('copyright_status', '', ['class' => 'form-control'])}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card ip_protection_choice" id="protection_type_form_6" style="display:none">
                                        <div class="card-header">
                                            <b>Plant Variety Protection</b>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                {{Form::label('plant_variety_certificate_number', 'Certificate Number', ['class' => 'col-form-label'])}}
                                                {{Form::text('plant_variety_certificate_number', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('plant_variety_denomination', 'Denomination', ['class' => 'col-form-label'])}}
                                                {{Form::text('plant_variety_denomination', '', ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('plant_variety_crop_type', 'Crop Type', ['class' => 'col-form-label'])}}
                                                {{Form::text('plant_variety_crop_type', '', ['class' => 'form-control'])}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="owners_and_generators" role="tabpanel">
                                <div class="card-body">
                                    <div class="form-group col-sm-4 pl-0">
                                        {{Form::label('owners', 'Owners', ['class' => 'col-form-label'])}} 
                                        {{Form::select('owners[]', $technologyCategories, null, ['class' => 'form-control multi-tech-category', 'multiple' => 'multiple', 'style' => 'width:100%'])}}        
                                    </div>
                                    <div class="form-group col-sm-4 pl-0">
                                        {{Form::label('generators', 'Generators', ['class' => 'col-form-label'])}} 
                                        {{Form::select('generators[]', $generators, null, ['class' => 'form-control multi-generator', 'multiple' => 'multiple', 'style' => 'width:100%'])}}
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="funding" role="tabpanel">
                                <div class="card-body">
                                    Funding
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
                            <div class="tab-pane fade" id="assets" role="tabpanel">
                                <div class="card-body">
                                    Assets
                                </div>
                            </div>
                        -->
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
                                    $('$trade_secret').prop('checked', false);
                                });
                            });
                            
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.multi-commodity').select2({
            placeholder: "Select commodity"
        });
        $('.multi-category').select2({
            placeholder: "Select category"
        });
        $('.multi-tech-category').select2({
            placeholder: "Select tech category"
        });
        $('.multi-generator').select2({
            placeholder: "Select generator"
        });
        $('.multi-potential-adopters').select2({
            placeholder: "Select potential adopters"
        });
        $('.multi-adopters').select2({
            placeholder: "Select adopters"
        });
        $('body').on('click', '.list-group a', function (e) {
            $(this).addClass('active');
            $(this).siblings().removeClass('active');
            
            //do any other button related things
        });
        $('#tech_tabs a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        });

    });
</script>
@endsection
