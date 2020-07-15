<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
   
   
    @yield('top_scripts')
</head>
<body>
    <div id="app">
        <div class="icon-bar" style="z-index:1000">
            <a href="#" class="sarai"><img src="https://i.imgur.com/TRr6O4s.png" height="30" width="30"></a> 
            <a href="#" class="facebook"><i class="fab fa-facebook"></i></a> 
            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a> 
            <a href="#" class="email"><i class="fas fa-envelope"></i></a>
            <a href="#" class="youtube"><i class="fab fa-youtube"></i></a> 
        </div>
        <section class="sticky-top">
            @include('inc.navbar')
            <nav class="navbar navbar-expand-lg navbar-dark p-0" style="background-color:#2478af;">
                <div class="col-auto">
                    @yield('breadcrumb')
                </div>
                <div class="float-right mr-2" style="margin-left:auto">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#2ndnavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse pr-4" id="2ndnavbar">
                        <ul class="navbar-nav ml-auto">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
                                </li>
                            @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="/admin" class="dropdown-item">Admin Dashboard</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
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
