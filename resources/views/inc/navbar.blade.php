<!DOCTYPE html>

<div class="container-fluid px-0">
   <nav class="navbar shadow navbar-expand-lg navbar-dark bg-light pl-3 pt-0 pb-0" style="height:79px">
        <div class="navbar-header" style="margin-top:auto;margin-bottom:auto">
            <a href="/">
                <img src="/storage/page_images/pcaarrd-logo-invert.png" style="max-width:300px">
            </a>
        </div>
            
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <span style="left:50%">
            <h1 class="font-weight-bold">*ALPHA VERSION*</h1>
        </span>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto upper-nav">
                <li class="nav-item">
                    <a class="nav-links" href="http://aanr.ph">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-links" href="http://167.71.210.45/">FIESTA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-links active" href="http://167.71.210.45:8081">Technology</a>
                </li>
                <li class="nav-item">
                    <a class="nav-links" href="http://167.71.210.45:8080">Community</a>
                </li>
                <li class="nav-item">
                    <a class="nav-links" href="https://elibrary.pcaarrd.dost.gov.ph/slims/Main">eLib</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-links active" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-links active dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
        
        <style>
            .nav-links.active{
                color:black;
            }
            .nav-links{
                color: #606060;
                fill: #606060;
                padding-right: 0.5rem;
                padding-left: 0.5rem;
                display: block;
                text-decoration: none !important;
            } 
            .nav-links:hover{
                color: rgb(0,0,0) !important;
                background-color: inherit;
            }
        </style>
    </nav>
</div>

<style>
    .upper-nav .nav-item .nav-link {
        color: black !important;
    }
</style>
    

