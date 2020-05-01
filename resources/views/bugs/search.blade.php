

 @extends ('layouts.app')
 @section('links')
    
                  <li>    <a href="{{ url('/bugs/create') }}">New Bug Report</a> </li>
                  <li > <a href="{{ url('/bugs') }}">All Bugs</a> </li>
                  <li > <a href="{{ url('/my_bugs') }}">My Bugs</a> </li>
  @endsection

@section ('content')
       

<div class="row">

<div class="col-sm-6 col-sm-offset-3">

<form class="form-inline my-2 my-lg-0" method="POST" action='{{ url("/search") }}' >
       {{ csrf_field() }}
              <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-lg-0" type="submit">Search</button>
               </form>

  </div>
  </div>
<div class="row">
  <div class="col-sm-6">
<ul class="nav nav-pills nav-tabs" >
   <br>
    
    <li class="active"><a data-toggle="pill" href="#new">Search Results</a></li>
    <br>
  </ul>


  <br>
 
  <div class="tab-content">
    <div id="new" class="tab-pane fade in active">

<div>
  <table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
      <tr>
        <th> Title</th>
        <th>Description</th>
        <th>Reported by</th>
        <th>Time Stamp</th>
         <th>Actions</th>
      </tr>
    </thead>
    <tbody>
  @foreach ($bugs as $bug)
<div>
    <tr>
        <td>
    {{$bug -> title}}</td>
        <td>{{$bug -> description}}</td>
        <td>{{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}</td>
        <td>{{$bug ->created_at -> diffForHumans()}} </td>
        <td><a href="/bugs/{{$bug->id}}"><span class="fa fa-eye"> View </span></a> </td>

      </tr>
</div>
 @endforeach
  
    </tbody>
  </table>
</div>
    </div>
 
  </div>
   </div>
     <div class="col-sm-6">
     </div>
  </div>

  
@endsection
