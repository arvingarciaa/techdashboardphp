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
            @include('inc.messages')
            <div class="tab-content">
                <div class="tab-pane fade show active" id="edit">
                    <div class="card shadow mb-5">
                        <div class="card-header">
                            <b style="font-size:25px">Technologies</b> <small>Edit form</small>
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" data-toggle="tab" role="tab">
                                    <a class="nav-link active" href="#">Main</a>
                                </li>
                                <li class="nav-item" data-toggle="tab" role="tab">
                                    <a class="nav-link" href="#">IP Protection</a>
                                </li>
                                <li class="nav-item"data-toggle="tab" role="tab">
                                    <a class="nav-link" href="#">Owners and Generators</a>
                                </li>
                                <li class="nav-item" data-toggle="tab" role="tab">
                                    <a class="nav-link" href="#">Funding</a>
                                </li>
                                <li class="nav-item" data-toggle="tab" role="tab">
                                    <a class="nav-link" href="#">Adopters</a>
                                </li>
                                <li class="nav-item" data-toggle="tab" role="tab">
                                    <a class="nav-link" href="#">Assets</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
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
                        <div class="card-footer">
                            {{Form::submit('Save changes', ['class' => 'btn btn-success float-right'])}}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function(){
        $('.multi-commodity').select2({
            placeholder: "Select commodity",
        }).val({!! json_encode($tech->commodities()->allRelatedIds()) !!}).trigger('change');
        $('.multi-category').select2({
            placeholder: "Select category",
        }).val({!! json_encode($tech->technology_categories()->allRelatedIds()) !!}).trigger('change');
        
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
