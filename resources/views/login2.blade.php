<!doctype html>
<html>
<head>
<meta charset="UTF-8">
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

<body>
<div class = "container">
	<div class = "page-header">
		<h1>Peter</h1>
	</div>
		       <form  action="" method = "post">

		            <div class="col-sm-4 col-sm-offset-4">
                <input type="text" class="form-control" id = "username" name = "username" placeholder="User ID" autofocus required>
                <input type="password" class="form-control" id = "password" name = "password" placeholder="Password" required>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right">
                        <a data-toggle="modal" href="#"> Forgot Password?</a>

                    </span>
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit" <a href="{{ url('/index') }}">login</a> </button>  
						</form>
                   
            </div>	
	
</div>


</body>
</html>
