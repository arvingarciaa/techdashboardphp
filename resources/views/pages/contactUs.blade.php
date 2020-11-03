@extends('layouts.app')
@section('breadcrumb')
    <ol class="breadcrumb pb-0" style="background-color:transparent">
        <li class="breadcrumb-item"><a class="breadcrumb-link" href="/">km4aanr</a></li>
        <li class="breadcrumb-item" style="color:white" aria-current="page">Technology Dashboard</li>
    </ol>
@endsection
@section('content')

<style>
    .box{
        border: 2px solid #ced4da;
        border-radius: 10px;
        margin-top: 1rem;
        margin-bottom: 2rem;
        background-color:white;
    }
    .box-header{
        padding:3rem 3rem 2rem;
        background-color:rgb(23,174,239);
    }
    .box-body{
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem;
    }
    .box-footer{
        padding: 0.75rem 1.25rem;
        background-color: rgba(0, 0, 0, 0.03);
        border-top: 1px solid rgba(0, 0, 0, 0.125);
    }
    @media(min-width:1200px) {
        .container{
            max-width:960px !important;
        }
    }
</style>
<div class="container" style="">
    @include('inc.messages')
    <div class="box shadow">
        <div class="box-header">
            <h1 class="text-center text-white" style="font-weight:900">Contact Us</h1>
        </div>
        <div class="box-body">
            <h4 class="text-center">
                Questions? Requests? <br>
                Send us a message.

                <div class="dropdown-divider mt-3"></div>
            </h4>
            <div class="form-group row">
                <div class="col-sm-5">
                    {{ Form::open(['action' => 'UserMessagesController@send', 'method' => 'POST']) }}
                    {{csrf_field()}}
                    {{Form::label('name', 'Name', ['class' => 'col-form-label'])}}
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Add a name'])}}
                    {{Form::label('email', 'Email', ['class' => 'col-form-label'])}}
                    {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Add email'])}}
                    {{Form::label('concern', 'Your concern', ['class' => 'col-form-label'])}}
                    <select name="concern" class="form-control">
                        <option disabled selected> ------------- </option>
                        <option value="1">I am requesting for data</option>
                        <option value="2">I want to report a bug</option>
                        <option value="3">I have a question</option>
                        <option value="4">Others</option>
                    </select> 
                </div>
                <div class="col-sm-7">
                    {{Form::label('message', 'Message', ['class' => 'col-form-label'])}}
                    {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Add message'])}}
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            {{Form::submit('Send Message', ['class' => 'btn btn-success'])}}
            {{Form::close()}}
        </div>
    </div>
</div>


@endsection