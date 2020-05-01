

@extends ('layouts.master')


@section ('content')

<div class="col-sm-10 col-sm-offset-1" >
       <div class="row">
        <div class="col-sm-10">
          <input  class="form-control input-lg" placeholder=" Search Bugs" type="text" >
        </div>
        <div class="text-left">
          <span class="btn btn-primary btn-lg pull-left">
            Search
          </span>
        </div>
       </div>               
     </div>



<div class="col-sm-10 col-sm-offset-1" >
<ul>
	
	@foreach ($bugs as $bug)

	<li>
		<a href="/bugs/{{$bug->id}}">
		{{$bug -> id}} -
		{{$bug -> title}}
		</a>
	</li>

	@endforeach
</ul>
</div>

@endsection