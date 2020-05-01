<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Peter's login</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{url('assets/css/bootstrap-theme.css')}}"/>
        <script src="{{url('assets/js/jquery.js')}}"></script>
        <script src="{{url('assets/js/bootstrap.js')}}"></script>
        <script src="{{url('assets/js/bootstrap.min.js')}}"></script>

    </head>
    <body class = "container">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/index') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
               <div class = "page-header">
        <h1>Peter</h1>
    </div>

                <div >
                    <form class="btn-login m-b-md" >

               <div class="col-sm-4 col-sm-offset-4">
                <input type="text" class="form-control" placeholder="User ID" autofocus>
                <input type="password" class="form-control" placeholder="Password">
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right">
                        <a data-toggle="modal" href="#"> Forgot Password?</a>

                    </span>
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit"  href="{{ url('/index') }}">Sign in</button>  
                        </form>
                </div>
            </div>
        </div>
    </body>
</html>
