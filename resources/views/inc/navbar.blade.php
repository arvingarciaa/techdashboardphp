<!DOCTYPE html>

<div class="container-fluid px-0">
   <nav class="navbar shadow navbar-expand-lg navbar-dark bg-light pl-3 pt-0 pb-0" style="height:90px" class="px-3">
        <div class="navbar-header" style="margin-top:auto;margin-bottom:auto">
            <a href="https://aanr.ph/">
                <img alt="PCAARRD logo" src="/storage/page_images/pcaarrd-logo-invert.png" style="max-width:400px">
            </a>
        </div>
            
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto upper-nav">
                @foreach(App\HeaderLink::all()->sortBy('position') as $header_link)
                    <li class="nav-item">
                        <a class="nav-links" href="{{$header_link->link}}">{{$header_link->name}}</a>
                    </li>
                @endforeach
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
                            <a href="/admin" class="dropdown-item">Admin Settings</a>
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
    

