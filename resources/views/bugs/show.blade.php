@extends ('layouts.bootstrap')
@extends ('layouts.app')

@section('links')
				<li> <a href="{{ url('/bugs/create') }}">New Bug Report</a> </li>
                  <li > <a href="{{ url('/bugs') }}">All Bugs</a> </li>
                  <li > <a href="{{ url('/my_bugs') }}">My Bugs</a> </li>
  @endsection
@section ('content')
<div class="form-group">
	<u>Reported by {{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}</u>  <br>
</div>

<div class="col-sm-10 col-sm-offset-1" >
	
	<div class="row">

	<div class="col-sm-6">
		<p><b>Project title : </b>{{$bug->projecttitle}}</p>
		<p><b>Bug Title : </b>{{$bug->title}}</p>
		<p><b>Priority : </b>{{$bug->priority_id}}</p>
	</div>
	
	<div class="col-sm-6">
		<p><b>Supervisor : </b>{{$bug->supervisor}}</p>
		<p><b>Assigned to : </b>{{$bug->assigned_user}}</p>
		<p><b>Status : </b>{{$bug->status}}</p>
	</div>

	</div>
<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
	<i>Screenshot </i> 
		<br> <img src="/storage/uploads/{{$bug -> screenshot }}" style="width: 450px;margin-left: : 25px; ">  
		</div>
</div>
	<p><b>Detailed Description: </b>{{$bug->description}}</p>
	<p><b>Additional Comment: </b>{{$bug->comment}}</p>


<b> Suggestions : </b> 
 <ul class = "list-group">
 @include('bugs.comment')
  </ul>


</div>

@endsection