<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('img/dms.jpg')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DvMS') }}</title>

    
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/notif.css')}}">
    <link rel="stylesheet" href="{{asset('css/icon.css')}}">
    <link rel="stylesheet" href="{{asset('css/font.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.css')}}">

    {{-- chart --}}
    <script type="text/javascript" src="{{ asset('js/fusioncharts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fusioncharts.charts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fusioncharts.theme.fint.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/fusioncharts.theme.fusion.js') }}"></script>
    

</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="green" >
        
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{ url('/progress') }}" class="simple-text">
                   <i class="pe-7s-home"></i>
                </a>
            </div>
                <ul class="nav">
                    <li class="{{ Request::is('progress') ? 'active' : '' }}">
                            <a href="{{ url('/progress') }}" class="simple-text">
                            {{-- <i class="pe-7s-graph2"></i> --}}
                            <p class="text-left">Progress<p>
                        </a>
                    </li> 
             
                    <li class="{{ Request::is('home') ? 'active' : '' }}">
                        <a href="{{ url('/home') }}" class="simple-text">
                            {{-- <i class="pe-7s-graph"></i> --}}
                            <p class="text-left">Status</p>
                        </a>
                    </li>
                   
                    <li class=" {{ Request::is('summary') ? 'active' : '' }}
                                {{ Request::is('summary1') ? 'active' : '' }}
                                {{ Request::is('summary2') ? 'active' : '' }}
                                {{ Request::is('summary3') ? 'active' : '' }}
                                {{ Request::is('summary4') ? 'active' : '' }}
                                {{ Request::is('summary5') ? 'active' : '' }}
                                {{ Request::is('summary6') ? 'active' : '' }}
                                {{ Request::is('summary7') ? 'active' : '' }}
                                {{ Request::is('summary8') ? 'active' : '' }}
                                {{ Request::is('summary9') ? 'active' : '' }}
                                {{ Request::is('summary10') ? 'active' : '' }}
                                {{ Request::is('summary11') ? 'active' : '' }}
                                {{ Request::is('summary12') ? 'active' : '' }}
                                {{ Request::is('summary13') ? 'active' : '' }}
                                {{ Request::is('summary14') ? 'active' : '' }}
                                {{ Request::is('summary15') ? 'active' : '' }}
                                {{ Request::is('summary16') ? 'active' : '' }}
                                {{ Request::is('summary17') ? 'active' : '' }}
                                {{ Request::is('summary18') ? 'active' : '' }}
                                {{ Request::is('summary19') ? 'active' : '' }}
                                {{ Request::is('summary20') ? 'active' : '' }}
                                {{ Request::is('summary21') ? 'active' : '' }}
                                {{ Request::is('summary22') ? 'active' : '' }}
                                {{ Request::is('summary23') ? 'active' : '' }}
                                {{ Request::is('summary24') ? 'active' : '' }}
                                {{ Request::is('summary25') ? 'active' : '' }}
                                {{ Request::is('summary26') ? 'active' : '' }}
                                {{ Request::is('summary27') ? 'active' : '' }}
                                {{ Request::is('summary28') ? 'active' : '' }}
                                {{ Request::is('summary29') ? 'active' : '' }}
                                {{ Request::is('summary30') ? 'active' : '' }}
                                {{ Request::is('summary31') ? 'active' : '' }}
                                {{ Request::is('summary32') ? 'active' : '' }}
                                {{ Request::is('summary33') ? 'active' : '' }}
                                {{ Request::is('summary34') ? 'active' : '' }}
                                {{ Request::is('summary35') ? 'active' : '' }}
                                {{ Request::is('summary36') ? 'active' : '' }}
                                {{ Request::is('summary37') ? 'active' : '' }}
                                {{ Request::is('summary38') ? 'active' : '' }}
                                {{ Request::is('summary39') ? 'active' : '' }}"> 
                        <a href="{{ url('/summary') }}" class="simple-text">
                            {{-- <i class="pe-7s-cloud-upload"></i> --}}
                            <p class="text-left">Areas</p>
                        </a>
                    </li>
                   
                    <li class="{{ Request::is('transmission') ? 'active' : '' }}">
                        <a href="{{ url('/transmission') }}" class="simple-text">
                            {{-- <i class="pe-7s-note"></i> --}}
                            <p class="text-left">Log</p>
                        </a>
                    </li> 
                   
                    <li class="{{ Request::is('foodrecord') ? 'active' : '' }}
                                {{ Request::is('foodrecord/*') ? 'active' : '' }} 
                                {{ Request::is('searchfoodrecord') ? 'active' : '' }}">
                        <a href="{{ url('/foodrecord') }}" class="simple-text">
                            {{-- <i class="pe-7s-pen"></i> --}}
                            <p class="text-left">Update</p>
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
                    <a class="navbar-brand" href="{{ url('/home') }}">Dietary Validation & Monitoring System <i class="pe-7s-coffee"></i></a>
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
                                <a href="{{ url('/count') }}" style="padding: 0 !important; margin:0 !important;">
                                    <button type="submit" class="btn btn-secondary" >
                                        Export Count
                                    </button>
                                </a>
                            </li>  
                            <li class="nav-item">
                                <a id="datetime"></a>
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

<div>
    @include('inc.modal')
    @include('inc.membership')
</div>

    <!-- Scripts -->

    <!-- Core -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>

    <script src="{{ asset('js/date.js') }}"></script>

    <!-- Delete -->
    <script src="{{ asset('js/delete.js') }}"></script>

    <!-- Update -->
    <script src="{{ asset('js/update.js') }}"></script>

    <!-- Insert -->
    <script src="{{ asset('js/insert.js') }}"></script>

    {{-- Check if connected script --}}
    <script type="text/javascript" src="{{ asset('js/check_conn.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/refresh.js') }}"></script>

</body>
</html>


