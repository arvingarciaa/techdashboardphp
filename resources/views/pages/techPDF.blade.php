<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   
    @yield('top_scripts')
</head>
<style>
    @page {
        margin: 0cm 0cm;
    }
    /** Define now the real margins of every page in the PDF **/
    body {
        margin-top: 2cm;
        margin-left: 2cm;
        margin-right: 2cm;
        margin-bottom: 2cm;
    }
    header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 3cm;
    }
    footer {
        position: fixed; 
        bottom: 0px; 
        left: 10px; 
        right: 0px;
        height: 50px; 
    }
</style>
<body>
    <header>
        <img src="{{ public_path("storage/page_images/dost_banner.png") }}" alt="" style="width:100%">
    </header>
    <footer>
        <small style="color: #6c757d !important">Date Downloaded: {{Carbon\Carbon::now()}}</small>
    </footer>
    <main style="">
        <div id="app" style="
            width: 100%;
            max-width:1140px;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;">
            <div class="content">
                <div class="" style="
                        display:flex;
                        border-bottom: 1px solid #dee2e6;
                        border-top-left-radius: calc(0.3rem - 1px);
                        border-top-right-radius: calc(0.3rem - 1px);">
                    <span style="width:100%">
                        <h2>{{$tech->title}} </h2>
                    <span>
                </div>
                <div style="">
                    <small style="color: #6c757d !important;">
                        @if($tech->applicability_location != null)
                        Technology Applicability Location -  {{$tech->applicability_location}} <br>
                        @endif
                        @if($tech->applicability_industry != null)
                        Technology Applicability Industry - {{App\ApplicabilityIndustry::find($tech->applicability_industry)->name}}
                        @endif
                    </small>
                    <br>
                    @if(count($tech->commodities) != null)
                    @foreach($tech->commodities as $commodity)
                            {{ $commodity->sector->name }} >
                            {{ $commodity->name }}<br>
                    @endforeach
                    @endif
                    @if($tech->description != null)
                    <div style="margin-top: 1rem !important;    height: 0;
        margin: 0.5rem 0;
        overflow: hidden;
        border-top: 1px solid #e9ecef;"></div>
                    <b>Description</b><br>
                    <span>{{$tech->description}}</span>
                    @endif
                    @if($tech->significance != null)
                    <div style="margin-top: 1rem !important;    height: 0;
        margin: 0.5rem 0;
        overflow: hidden;
        border-top: 1px solid #e9ecef;"></div>
                    <b>Significance</b><br>
                    <span>{{$tech->significance}}</span>
                    @endif
                    @if($tech->target_users != null)
                    <div style="margin-top: 1rem !important;    height: 0;
        margin: 0.5rem 0;
        overflow: hidden;
        border-top: 1px solid #e9ecef;"></div>
                    <b>Target Users</b><br>
                    <span>{{$tech->target_users}}</span>
                    @endif
                    @if(count($tech->commodities) != null)
                    <div style="margin-top: 1rem !important;    height: 0;
        margin: 0.5rem 0;
        overflow: hidden;
        border-top: 1px solid #e9ecef;"></div>
                    <b>Commodities</b><br>
                    @foreach($tech->commodities as $commodity)
                        <span class="ml-3">• {{$commodity->name}} </span><br>
                    @endforeach
                    @endif
                    @if(count($tech->agencies) != null)
                    <div style="margin-top: 1rem !important;    height: 0;
        margin: 0.5rem 0;
        overflow: hidden;
        border-top: 1px solid #e9ecef;"></div>
                    <b>Technology Owner</b><br>
                    @foreach($tech->agencies as $agency)
                        <span class="ml-3">• {{$agency->name}} </span><br>
                    @endforeach
                    @endif
                    @if(count($tech->generators) != null)
                    <div style="margin-top: 1rem !important;    height: 0;
        margin: 0.5rem 0;
        overflow: hidden;
        border-top: 1px solid #e9ecef;"></div>
                    <b>Technology Generator</b><br>
                    @foreach($tech->generators as $generator)
                        <span class="ml-3">• {{$generator->name}} </span><br>
                    @endforeach
                    @endif
                    @if(count($tech->adopters) != null)
                    <div style="margin-top: 1rem !important;    height: 0;
        margin: 0.5rem 0;
        overflow: hidden;
        border-top: 1px solid #e9ecef;"></div>
                    <b>Technology Adopters</b><br>
                    @foreach($tech->adopters as $adopter)
                        <span class="ml-3">• {{$adopter->name}} </span><br>
                    @endforeach
                    @endif
                    @if($tech->basic_research_title != null)
                    <div style="margin-top: 1rem !important;    height: 0;
        margin: 0.5rem 0;
        overflow: hidden;
        border-top: 1px solid #e9ecef;"></div>
                    <b>Basic Research</b><br>
                    Project Title - {{$tech->basic_research_title}}<br>
                    Funding Agency - {{$tech->basic_research_funding}}<br>
                    Implementing Agency - {{$tech->basic_research_implementing}}<br>
                    Project Cost - {{$tech->basic_research_cost}}<br>
                    Start to end - {{$tech->basic_research_start_date}} - {{$tech->basic_research_end_date}}
                    @endif
                    @if($tech->applied_research_title != null)
                    <div style="margin-top: 1rem !important;    height: 0;
        margin: 0.5rem 0;
        overflow: hidden;
        border-top: 1px solid #e9ecef;"></div>
                    <b>Applied Research</b><br>
                    Project Title - {{$tech->applied_research_title}}<br>
                    Funding Agency - {{$tech->applied_research_funding}}<br>
                    Implementing Agency - {{$tech->applied_research_implementing}}<br>
                    Project Cost - {{$tech->applied_research_cost}}<br>
                    Start to end - {{$tech->applied_research_start_date}} - {{$tech->applied_research_end_date}}
                    @endif
                </div>
            </div>
        </div>
    </main>
</body>
</html>



