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
<?php
    $landing_page = App\LandingPage::first();
    $social_media = App\SocialMediaSticky::all();
?>
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
        <div class="col-sm-10 pb-4">
            <div class="text-center pt-3">
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
                                                <button type="button" class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addCarouselItem"><i class="fas fa-plus"></i></button>
                                            </td>
                                        </tr>
                                        <?php
                                            $carousel_items = App\CarouselItem::all();
                                        ?>
                                        @foreach($carousel_items as $carousel_item)
                                            <tr>
                                                <td width="5%">{{$carousel_item->position}}</td>
                                                <td width="40%"><img src="/storage/page_images/{{$carousel_item->banner}}" class="manage-image"></td>
                                                <td width="40%">{{$carousel_item->title}}</td>
                                                <td width="15%" class="text-center">
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
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <span style="font-size:23px; float:left">
                                    Header Links
                                </span>
                                <span class="text-muted float-right"><i>Manage the header links.</i></span>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="45%">Name</th>
                                            <th width="15%">Position</th>
                                            <th width="25%">Link</th>
                                            <th width="15%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="text-muted">-</span></td>
                                            <td><span class="text-muted">-</span></td>
                                            <td><span class="text-muted">-</span></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-success px-3 py-1" data-toggle="modal" data-target="#addHeaderLinkModal"><i class="fas fa-plus"></i></button>
                                            </td>
                                        </tr>
                                        @foreach($headerLinks as $header_link)
                                            <tr>
                                                <td width="45%">{{$header_link->name}}</td>
                                                <td width="15%">{{$header_link->position}}</td>
                                                <td width="25%">{{$header_link->link}}</td>
                                                <td width="15%" class="text-center">
                                                    <button type="button" class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editHeaderLinkModal-{{$header_link->id}}"><i class="fas fa-edit"></i></button>
                                                    <button type="button" class="btn btn-danger pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#deleteHeaderLinkModal-{{$header_link->id}}"><i class="fas fa-minus"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <span style="font-size:23px; float:left">
                                    Industry Profile Logos
                                </span>
                                <span class="text-muted float-right"><i>Manage the industry profile icons.</i></span>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped shadow-sm mb-5" id="user_table" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="45%">Name</th>
                                            <th width="40%">Thumbnail</th>
                                            <th width="15%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="text-muted">-</span></td>
                                            <td><span class="text-muted">-</span></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary px-3 py-1" data-toggle="modal" data-target="#editIndustryProfileModal"><i class="fas fa-edit"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Agricultural Technologies</span></td>
                                            <td><span class="text-muted"><img src="/storage/page_images/{{$landing_page->industry_profile_agri_icon}}" class="manage-image"></span></td>
                                            <td><span class="text-muted"></span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Aquatic Resources</span></td>
                                            <td><span class="text-muted"><img src="/storage/page_images/{{$landing_page->industry_profile_aqua_icon}}" class="manage-image"></span></td>
                                            <td><span class="text-muted"></span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Natural Resources</span></td>
                                            <td><span class="text-muted"><img src="/storage/page_images/{{$landing_page->industry_profile_natural_icon}}" class="manage-image"></span></td>
                                            <td><span class="text-muted"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <span style="font-size:23px; float:left">
                                    Social Media Icons
                                </span>
                                <span class="text-muted float-right"><i>Edit sticky social media icons.</i></span>
                            </div>
                            <div class="card-body">
                                <table class="table data-table tech-table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th width="10%">#</th>
                                            <th width="45%">Name</th>
                                            <th width="30%">Link</th>
                                            <th width="15%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="text-muted">-</span></td>
                                            <td><span class="text-muted">-</span></td>
                                            <td><span class="text-muted">-</span></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary px-3 py-1" data-toggle="modal" data-target="#addStickyModal"><i class="fas fa-edit"></i></button>
                                            </td>
                                        </tr>
                                        @foreach($social_media as $social)
                                        <tr>
                                            <td><span class="text-muted">{{$social->id}}</span></td>
                                            <td><span class="text-muted">{{$social->name}}</span></td>
                                            <td><span class="text-muted">{{$social->link}}</span></td>
                                            <td class="">
                                                <button class="btn btn-primary pl-1 pr-1 pt-0 pb-0" data-toggle="modal" data-target="#editStickyModal-{{$social->id}}"><i class="fas fa-edit"></i> Edit Details</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <span style="font-size:23px; float:left">
                                    Enable/Disable Landing Page Items
                                </span>
                                <span class="text-muted float-right"><i>Manage the landing page items.</i></span>
                            </div>
                            <div class="card-body">
                                <table class="table" id="user_table" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="40%">Thumbnail</th>
                                            <th width="40%">Landing Page Item</th>
                                            <th width="20%">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{ Form::open(['action' => ['LandingPageController@updateLandingPageItems'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                                        {{ method_field('GET') }}
                                        <tr>
                                            <td>
                                                <img src="/storage/page_images/landing_page_carousel.jpg" class="manage-image">
                                            </td>
                                            <td>
                                                <h2 class="landing-page-center">Carousel</h2>
                                            </td>
                                            <td class="landing-page-center">
                                                <label class="form-switch">
                                                    <input type="hidden" name="landing_page_item_carousel" value="0"/>
                                                    <input name="landing_page_item_carousel" type="checkbox" value="1" {{App\LandingPage::find(1)->landing_page_item_carousel == 1 ? 'checked' : ''}}>
                                                    <i></i>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="/storage/page_images/landing_page_social_media_buttons.jpg" class="manage-image">
                                            </td>
                                            <td>
                                                <h2 class="landing-page-center">Social Media Buttons</h2>
                                            </td>
                                            <td class="landing-page-center">
                                                <label class="form-switch">
                                                    <input type="hidden" name="landing_page_item_social_media_button" value="0"/>
                                                    <input name="landing_page_item_social_media_button" type="checkbox" value="1" {{App\LandingPage::find(1)->landing_page_item_social_media_button == 1 ? 'checked' : ''}}>
                                                    <i></i>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="/storage/page_images/landing_page_item_technology_counter.jpg" class="manage-image">
                                            </td>
                                            <td>
                                                <h2 class="landing-page-center">Technology Counter</h2>
                                            </td>
                                            <td class="landing-page-center">
                                                <label class="form-switch">
                                                    <input type="hidden" name="landing_page_item_technology_counter" value="0"/>
                                                    <input name="landing_page_item_technology_counter" type="checkbox" value="1" {{App\LandingPage::find(1)->landing_page_item_technology_counter == 1 ? 'checked' : ''}}>
                                                    <i></i>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="/storage/page_images/landing_page_grid_view.jpg" class="manage-image">
                                            </td>
                                            <td>
                                                <h2 class="landing-page-center">Technology Grid View</h2>
                                            </td>
                                            <td class="landing-page-center">
                                                <label class="form-switch">
                                                    <input type="hidden" name="landing_page_item_technology_grid_view" value="0"/>
                                                    <input name="landing_page_item_technology_grid_view" type="checkbox" value="1" {{App\LandingPage::find(1)->landing_page_item_technology_grid_view == 1 ? 'checked' : ''}}>
                                                    <i></i>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="/storage/page_images/landing_page_list_view.jpg" class="manage-image">
                                            </td>
                                            <td>
                                                <h2 class="landing-page-center">Technology Table View</h2>
                                            </td>
                                            <td class="landing-page-center">
                                                <label class="form-switch">
                                                    <input type="hidden" name="landing_page_dashboard_view" value="0"/>
                                                    <input name="landing_page_item_technology_table_view" type="checkbox" value="1" {{App\LandingPage::find(1)->landing_page_item_technology_table_view == 1 ? 'checked' : ''}}>
                                                    <i></i>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="/storage/page_images/landing_page_dashboard_view.jpg" class="manage-image">
                                            </td>
                                            <td>
                                                <h2 class="landing-page-center">Technology Dashboard View</h2>
                                            </td>
                                            <td class="landing-page-center">
                                                <label class="form-switch">
                                                    <input type="hidden" name="landing_page_item_technology_dashboard_view" value="0"/>
                                                    <input name="landing_page_item_technology_dashboard_view" type="checkbox" value="1" {{App\LandingPage::find(1)->landing_page_item_technology_dashboard_view == 1 ? 'checked' : ''}}>
                                                    <i></i>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="/storage/page_images/landing_page_commodity_view.jpg" class="manage-image">
                                            </td>
                                            <td>
                                                <h2 class="landing-page-center">Technology Commodity View</h2>
                                            </td>
                                            <td class="landing-page-center ">
                                                <label class="form-switch">
                                                    <input type="hidden" name="landing_page_item_technology_commodity_view" value="0"/>
                                                    <input name="landing_page_item_technology_commodity_view" type="checkbox" value="1" {{App\LandingPage::find(1)->landing_page_item_technology_commodity_view == 1 ? 'checked' : ''}}>
                                                    <i></i>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>{{Form::submit('Save changes', ['class' => 'btn btn-success float-right'])}}</td>
                                            {{ Form::close() }}
                                        </tr>
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


<!-- BANNERS -->
    <!-- Modal for add new banner for carousel -->
        <div class="modal fade" id="addCarouselItem" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true" style="z-index:9999">
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
                                {{Form::textarea('subtitle', '', ['class' => 'form-control',  'placeholder' => 'Add a subtitle for the banner'])}}
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
    @foreach(App\CarouselItem::all() as $carouselItem)
    <!-- Modal for edit banner for carousel -->
        <div class="modal fade" id="editCarouselItemModal-{{$carouselItem->id}}" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true" style="z-index:9999">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Edit Carousel Item</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ Form::open(['action' => ['CarouselItemsController@editCarouselItem', $carouselItem->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group">
                                {{Form::label('title', 'Title', ['class' => 'col-form-label'])}}
                                {{Form::text('title', $carouselItem->title, ['class' => 'form-control', 'placeholder' => 'Add a title for the banner'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('subtitle', 'Subtitle', ['class' => 'col-form-label'])}}
                                {{Form::textarea('subtitle', $carouselItem->subtitle, ['class' => 'form-control',  'placeholder' => 'Add a subtitle for the banner'])}}
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
                                {{Form::text('button_link', $carouselItem->button_link, ['class' => 'form-control',  'placeholder' => 'Add link for button redirect'])}}
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
        <div class="modal fade" id="deleteCarouselItemModal-{{$carouselItem->id}}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('deleteCarouselItem', $carouselItem->id) }}" id="deleteForm" method="POST">
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
                            Are you sure you want to delete: <b>{{$carouselItem->title}}</b>
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
    <!-- END modal add new banner for carousel -->
    @endforeach
<!-- END BANNERS -->

<!-- Modal for add header link -->
    <div class="modal fade" id="addHeaderLinkModal" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true" style="z-index:9999">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Add Header Link</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['action' => ['HeaderLinksController@addHeaderLink'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('link', 'Link to header', ['class' => 'col-form-label'])}}
                            {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('position', 'Position weight (lowest to highest, from left to right)', ['class' => 'col-form-label'])}}
                            {{Form::text('position', '', ['class' => 'form-control', 'placeholder' => 'Add a number'])}}
                        </div>
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
<!-- END modal header link -->

@foreach($headerLinks as $header)
<!-- Modal for EDIT header link -->
    <div class="modal fade" id="editHeaderLinkModal-{{$header->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-l" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => ['HeaderLinksController@editHeaderLink', $header->id], 'method' => 'POST']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Edit Header Links</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                        {{Form::text('name', $header->name, ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('link', 'Link to header', ['class' => 'col-form-label'])}}
                        {{Form::text('link', $header->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('position', 'Position weight (lowest to highest, from left to right)', ['class' => 'col-form-label'])}}
                        {{Form::text('position', $header->position, ['class' => 'form-control', 'placeholder' => 'Add a number'])}}
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

<!-- Modal for DELETE header link -->
    <div class="modal fade" id="deleteHeaderLinkModal-{{$header->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('carousel.deleteHeaderLink', $header->id)}}" method="POST">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Confirm Delete</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <span>
                        Are you sure you want to delete: <b>{{$header->name}}</b>?</br></br>
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
@endforeach
<!-- END of Header Links Modals -->

<!-- Social Media Modals -->
    <div class="modal fade" id="addStickyModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-l" role="document">
            <div class="modal-content">
                {{ Form::open(['action' => ['SocialMediaStickyController@addSocial'], 'method' => 'POST']) }}
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Edit Sticky</h6>
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
                        {{Form::label('link', 'Link to social', ['class' => 'col-form-label'])}}
                        {{Form::text('link', '', ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
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
    @foreach($social_media as $social)
        <!-- Modal for EDIT Headline -->
            <div class="modal fade" id="editStickyModal-{{$social->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-l" role="document">
                    <div class="modal-content">
                        {{ Form::open(['action' => ['SocialMediaStickyController@editSocial', $social->id], 'method' => 'POST']) }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel">Edit Sticky</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                                {{Form::text('name', $social->name, ['class' => 'form-control', 'disabled' => true, 'placeholder' => 'Add a name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('link', 'Link to social', ['class' => 'col-form-label'])}}
                                {{Form::text('link', $social->link, ['class' => 'form-control', 'placeholder' => 'Add a link'])}}
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
    @endforeach
<!-- END of Social Media Modals -->


<div class="modal fade" id="editIndustryProfileModal" tabindex="-1" role="dialog" aria-labelledby="imageLabel" aria-hidden="true" style="z-index:9999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Industry Profile</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(['action' => ['LandingPageController@editIndustryProfile'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <meta name="csrf-token" content="{{ csrf_token() }}">
            {{ method_field('GET') }}
            <div class="modal-body">
                <div class="form-group">
                    {{Form::label('image', 'Agriculture Icon', ['class' => 'col-form-label required'])}}
                    <br>
                    @if($landing_page->industry_profile_agri_icon!=null)
                    <img src="/storage/page_images/{{$landing_page->industry_profile_agri_icon}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:200px;border:1px solid rgba(100,100,100,0.25);background:rgb(0,0,0)" >
                    @else
                    <div class="card-img-top center-vertically px-3" style="height:200px; width:200px; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 250x250px logo for the icon.
                        </span>
                    </div>
                    @endif 
                    {{ Form::file('agri_icon', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                </div>
                <div class="form-group">
                    {{Form::label('image', 'Aquatic Icon', ['class' => 'col-form-label required'])}}
                    <br>
                    @if($landing_page->industry_profile_aqua_icon!=null)
                    <img src="/storage/page_images/{{$landing_page->industry_profile_aqua_icon}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:200px;border:1px solid rgba(100,100,100,0.25);background:rgb(0,0,0)" >
                    @else
                    <div class="card-img-top center-vertically px-3" style="height:200px; width:200px; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 250x250px logo for the icon.
                        </span>
                    </div>
                    @endif 
                    {{ Form::file('aqua_icon', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
                </div>
                <div class="form-group">
                    {{Form::label('image', 'Natural Resources Icon', ['class' => 'col-form-label required'])}}
                    <br>
                    @if($landing_page->industry_profile_natural_icon!=null)
                    <img src="/storage/page_images/{{$landing_page->industry_profile_natural_icon}}" class="card-img-top" style="object-fit: cover;overflow:hidden;width:200px;border:1px solid rgba(100,100,100,0.25);background:rgb(0,0,0)" >
                    @else
                    <div class="card-img-top center-vertically px-3" style="height:200px; width:200px; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 250x250px logo for the icon.
                        </span>
                    </div>
                    @endif 
                    {{ Form::file('natural_icon', ['class' => 'form-control mt-2 mb-3 pt-1'])}}
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

<style>
    .landing-page-center{
        line-height:200px
    }
    .form-switch {
        display: inline-block;
        cursor: pointer;
        -webkit-tap-highlight-color: transparent;
    }

    .form-switch i {
        position: relative;
        display: inline-block;
        margin-right: .5rem;
        width: 46px;
        height: 26px;
        background-color: #e6e6e6;
        border-radius: 23px;
        vertical-align: text-bottom;
        transition: all 0.3s linear;
    }

    .form-switch i::before {
        content: "";
        position: absolute;
        left: 0;
        width: 42px;
        height: 22px;
        background-color: #fff;
        border-radius: 11px;
        transform: translate3d(2px, 2px, 0) scale3d(1, 1, 1);
        transition: all 0.25s linear;
    }

    .form-switch i::after {
        content: "";
        position: absolute;
        left: 0;
        width: 22px;
        height: 22px;
        background-color: #fff;
        border-radius: 11px;
        box-shadow: 0 2px 2px rgba(0, 0, 0, 0.24);
        transform: translate3d(2px, 2px, 0);
        transition: all 0.2s ease-in-out;
    }

    .form-switch:active i::after {
        width: 28px;
        transform: translate3d(2px, 2px, 0);
    }

    .form-switch:active input:checked + i::after { transform: translate3d(16px, 2px, 0); }

    .form-switch input { display: none; }

    .form-switch input:checked + i { background-color: #4BD763; }

    .form-switch input:checked + i::before { transform: translate3d(18px, 2px, 0) scale3d(0, 0, 0); }

    .form-switch input:checked + i::after { transform: translate3d(22px, 2px, 0); }
</style>

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
