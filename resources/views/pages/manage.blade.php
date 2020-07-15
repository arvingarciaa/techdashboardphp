@extends('layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb pb-0" style="background-color:transparent">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">km4aanr</a></li>
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">Technology Dashboard</a></li>
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/admin">Admin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Manage Landing Page</li>
    </ol>
@endsection
@section('content')
<div class="container-fluid px-0">
    <div class="row mr-0" style="max-height:inherit; min-height:40rem">
        <div class="col-sm-2 bg-dark pr-0">
            <div class="nav nav-tabs" style="border-bottom-width: 0px;">
                <a class="list-group-item active" data-toggle="tab" href="#edit">Manage Landing Page</a>
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
            <div class="text-center pt-5">
                @include('inc.messages')
                <h2 class="font-weight-bold">Manage Landing Page</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <span style="font-size:23px; float:left">
                                    Carousel Items
                                </span>
                                <span class="text-muted float-right"><i>Manage the carousel items.</i></span>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5%">Position</th>
                                            <th width="40%">Thumbnail</th>
                                            <th width="40%">Title</th>
                                            <th width="15%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="text-muted">-</span></td>
                                            <td><span class="text-muted">-</span></td>
                                            <td><span class="text-muted">-</span></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addTopBannerModal"><i class="fas fa-plus"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                                            $carousel_items = App\CarouselItem::all();
                                        ?>
                                        @foreach($carousel_items as $carousel_item)
                                            <tr>
                                                <td>{{$carousel_item->position}}</td>
                                                <td>{{$carousel_item->banner}}</td>
                                                <td>{{$carousel_item->title}}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editCarouselItemModal-{{$carousel_item->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteCarouselItemModal-{{$carousel_item->id}}"><i class="fas fa-minus"></i></button>
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
</div>

<!-- Modal for add new banner for carousel -->
    <div class="modal fade" id="addTopBannerModal" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true" style="z-index:9999">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Carousel Item</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['action' => ['CarouselItemsController@addCarouselItem'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Add a title for the banner'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('subtitle', 'Subtitle', ['class' => 'col-form-label'])}}
                            {{Form::text('subtitle', '', ['class' => 'form-control',  'placeholder' => 'Add a subtitle for the banner'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('banner', 'Banner', ['class' => 'col-form-label'])}}
                            <div class="custom-file">
                                {{ Form::file('image', ['class' => 'custom-file-input', 'id' => 'customFile'])}}
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                {{ csrf_field() }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('button_link', 'Button Link', ['class' => 'col-form-label'])}}
                            {{Form::text('button_link', '', ['class' => 'form-control',  'placeholder' => 'Add link for button redirect'])}}
                        </div>

                        <script>
                            // Add the following code if you want the name of the file appear on select
                            $(".custom-file-input").on("change", function() {
                            var fileName = $(this).val().split("\\").pop();
                            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                            });
                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
<!-- END modal add new banner for carousel -->

<script>
    $(document).ready(function(){
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
