<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179383304-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-179383304-1');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
   
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/storage/page_images/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/storage/page_images/favicon-16x16.png" sizes="16x16" />

   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


   <!-- Styles -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" rel="stylesheet">
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">

   <!-- Scripts
   <script src="https://kit.fontawesome.com/e0784f1094.js"></script>
   -->


   <script src="{{ asset('js/html2canvas.min.js') }}"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.1.1/jspdf.umd.min.js"></script>

    <!-- ChartJS -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
	<script src="{{ asset('js/Chart.Geo.min.js') }}" defer></script>
   
   <!-- Datatables -->
   <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
   <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>

   <script src="{{ asset('js/lightbox.js') }}" defer></script>
   
   
   <script src="{{ asset('js/app.js') }}"></script>
   <script src="{{ asset('js/select2.min.js') }}"></script>
   <script src="{{ asset('js/dropzone.js') }}"></script>
   
   <!-- x-editable -->
   <link href="{{ asset('css/bootstrap-editable.css') }}" rel="stylesheet">
   <script src="{{ asset('js/bootstrap-editable.js') }}"></script>

   <script src="{{ asset('js/popper.min.js') }}"></script>
   
   <!-- bootstrap toggle -->
    <link href="{{ asset('css/bootstrap4-toggle.min.css') }}" rel="stylesheet">  
    <script src="{{ asset('js/bootstrap4-toggle.min.js') }}"></script>

   <!--Select2 -->
   <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
   

    <!-- Bootstrap select -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.3/js.cookie.min.js"></script>
    <script src="https://cdn.rawgit.com/jackmoore/colorbox/master/jquery.colorbox-min.js"></script>
    <link rel="stylesheet" href="https://cdn.rawgit.com/jackmoore/colorbox/master/example1/colorbox.css" />
   
    @yield('top_scripts')
</head>
<body style="width:100vw">
    <div id="app">
        <section class="sticky-top">
            @include('inc.navbar')
            <nav class="navbar navbar-expand-lg navbar-dark p-0" style="background-color:#216d9e; height:52px">
                <div class="col-auto">
                    @yield('breadcrumb')
                </div>
                <div class="float-right mr-2" style="margin-left:auto">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#2ndnavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse pr-4" id="2ndnavbar">
                        <ul class="navbar-nav ml-auto">
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
            @yield('content')
        @include('inc.footer')
    </div>
</body>
@yield ('scripts')
</html>

<style>
    body {
        font-family:"Raleway", sans-serif;
    }
</style>
