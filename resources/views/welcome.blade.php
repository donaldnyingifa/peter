<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width = device-width, initial-scale =1">

 <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.css')}}"/>
  <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.min.css')}}"/>
 <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap-theme.css')}}"/>
 <link rel="stylesheet" type="text/css" href="{{url('assets/css/main.css')}}"/>

 <script src="{{url('assets/js/jquery.js')}}"></script>
<script src="{{url('assets/js/bootstrap.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/main.js')}}"></script>
</head>


 
    <body>
        <div class="header">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <div class="col-sm-4 col-sm-offset-4">
                            
             <div class="panel-body"> <b>Welcome to Peter</b>  </div>
               <button> <a href="{{ route('login') }}">Login</a> </button> 
                <button> <a href="{{ route('register') }}">Register</a> </button> 
        
        </div>

                    @endauth
                </div>
            @endif

 

                    
    </body>
</html>
