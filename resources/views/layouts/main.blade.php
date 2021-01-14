<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('img/dms.jpg')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DVMS-2019') }}</title>

    
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/notif.css')}}">
    <link rel="stylesheet" href="{{asset('css/icon.css')}}">
    <link rel="stylesheet" href="{{asset('css/font.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="green" >
        
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ route('home') }}" class="simple-text">
                   <i class="pe-7s-home"></i>
                </a>
            </div>
                <ul class="nav">

                    <li class="{{ Request::is('get') ? 'active' : '' }}">
                        <a href="{{ url('/get') }}" class="simple-text">
                            <p class="text-left">Get Data</p>
                        </a>
                    </li>
                               
                    <li class="{{ Request::is('foodrecord') ? 'active' : '' || Request::is('foodrecord/*') ? 'active' : '' || Request::is('searchfoodrecord') ? 'active' : '' }}">
                        <a href="{{ url('/foodrecord') }}" class="simple-text">
                            <p class="text-left">Update</p>
                        </a>
                    </li>

                    <li class="{{ Request::is('trans') ? 'active' : '' }}">
                        <a href="{{ url('/trans') }}" class="simple-text">
                            <p class="text-left">Transmit</p>
                        </a>
                    </li>
                    
                </ul>
    	    </div>
        </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/home') }}">DVMS-2019 <i class="pe-7s-coffee"></i></a>
                </div>
                <div class="collapse navbar-collapse">
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <div style="padding-right:8vmin !important; padding-top:1vmin !important;">
                                  <a id="status" class="nav-link text-success" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-wifi fa-3x"></i>
                                  </a>
                                </div>
                            </li>  
                            <li class="nav-item">
                                <p class="text-muted" style="padding-right:5vmin; padding-top:2vmin;">Version 1.0.1</p>
                            </li>
                            <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                   
                                    <ul class="dropdown-menu">
                                       
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>
    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                        @endguest      
                    </ul>
                </div>
            </div>
        </nav>  

     @yield('content')

</div>


    @include('inc.modal')



    <!-- Scripts -->

    <!-- Core -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    <!-- Delete -->
    <script src="{{ asset('js/delete.js') }}"></script>

    <!-- Update -->
    <script src="{{ asset('js/update.js') }}"></script>

    <!-- Insert -->
    <script src="{{ asset('js/insert.js') }}"></script>

    <!-- Loading -->
    <script src="{{ asset('js/loading.js') }}"></script>

    <!-- if connected -->
    <script type="text/javascript" src="{{ asset('js/check_conn.js') }}"></script>

    <!-- disabled f5 -->
    <script type="text/javascript" src="{{ asset('js/refresh.js') }}"></script>

    <!-- Modal -->
    <script src="{{ asset('js/open-modal.js') }}"></script>
    
</body>
</html>


