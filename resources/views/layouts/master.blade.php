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

<div class = "container">
<!--header start-->
 <div id = "header">

	
 </div>
	 <!--header end-->
<div>
   @yield('content')
</div>
  
</div>
</body>

<footer>
	<p>Powered by Afridash</p>
</footer>
</html>
