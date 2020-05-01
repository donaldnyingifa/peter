	<?php use \App\Http\Controllers\BugsController; 
	?>
	
<div class = "card">
	 <div class = "card-block">
    <hr>
		<h4><b>Title:</b> <a href="/bugs/{{$bug->id}}"> 
		{{$bug -> title}}</a> <br> <br>
		<b>Description:</b> {{$bug -> description}} <br> <br>
      <b>Reported by:</b> {{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}
		</h4>
[ {{$bug ->created_at -> diffForHumans()}} ]
 

</div>
</div>
	
