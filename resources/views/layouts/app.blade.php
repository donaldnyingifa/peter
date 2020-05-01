<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Peter') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
 <link rel="stylesheet" type="text/css" href="{{url('assets/css/main.css')}}"/>
 <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.css')}}">
  <!--  
  <link rel="stylesheet" type="text/css" href="{{url('assets/css/style.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.min.css')}}"/>
 <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap-theme.css')}}"/>
   <link rel="stylesheet" type="text/css" href="{{url('assets/css/style-forms')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/glyphicons.css')}}"/>
   <link rel="stylesheet" type="text/css" href="{{url('assets/css/halflings.css')}}"/>
 -->
 
   
</head>
<body>
 
    <div id="app">
         <div class="container"> 
           
               <nav class="navbar navbar-default navbar-static-top">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        {{ config('app.name', 'Peter') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                             
                  @yield('links')
                
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position: relative;padding-left: 50px;">
                                    @if(!empty(Auth::user()->avatar))
                                    <img src="/storage/uploads/avatars/{{ Auth::user()->avatar }}" style="width: 32px; height: 32px; position: absolute; top:10px; left:10px;border-radius: 50%; ">
                                    @else
                                     <img src="/storage/uploads/avatars/default.jpg" style="width: 32px; height: 32px; position: absolute; top:10px; left:10px;border-radius: 50%; ">
                                     @endif
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/profile') }}"><i class="fa fa-user-circle" aria-hidden="true"></i> Profile</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-btn fa-sign-out" aria-hidden="true"> </i>
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                </nav>
              
        @yield('content')
            </div>
        

    </div>
    
</body>

    <div class="container"  > 
        <div id="footer">
        <div class="panel-footer">
                <p >Powered by Afridash</p>
       </div>
        </div>
        </div>
   

   <!-- Scripts -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
  <!--   <script src="{{ asset('js/app.js') }}"></script>
<script src="{{url('assets/js/jquery.js')}}"></script>
<script src="{{url('assets/js/bootstrap.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>  -->
<script src="{{url('assets/js/main.js')}}"></script>





</html>
