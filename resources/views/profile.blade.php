
@extends ('layouts.app')

@section('links')
<li>
                           <a href="{{ url('/bugs/create') }}">New Bug Report</a> </li>
                  <li > <a href="{{ url('/bugs') }}">All Bugs</a> </li>
                  <li > <a href="{{ url('/my_bugs') }}">My Bugs</a> </li>
  @endsection

@section ('content')


<div class="col-sm-6">
<div class="col-md-8 col-md-offset-2">
	<div class="form-group">
	@if(!empty($avatar))
	<img src="public/storage/uploads/avatars/{{ $user->avatar }}" style="width: 200px; height: 200px; float: left;border-radius: 100%; margin-right: 25px; ">
	@else
	<img src="/storage/uploads/avatars/default.jpg" style="width: 200px; height: 200px; float: left;border-radius: 100%; margin-right: 25px; ">
	@endif
	<h2>{{$user->name}}'s Profile</h2>
	<form enctype="multipart/form-data" action="{{  url('/profile')}}" method="POST">
		<label>Update Profile Image</label>
		<input type="file" name="avatar">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="submit" class="pull-right btn btn-sm btn-primary" >
</form>
</div>
<br>
<div class="form-group">
	 @include ('layouts.errors')
</div>
</div>
<br>

</div>
<div class="col-sm-6">
	
	  </div>
  
@endsection
