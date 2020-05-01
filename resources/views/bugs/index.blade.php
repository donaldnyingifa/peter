
@extends ('layouts.app')

@section('links')
      
              <li> <a href="{{ url('/bugs/create') }}">New Bug Report</a> </li>
                  <li class="active"> <a href="{{ url('/bugs') }}">All Bugs</a> </li>
                  <li > <a href="{{ url('/my_bugs') }}">My Bugs</a> </li>
  @endsection

@section ('content')
  <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
 <form class="form-inline my-2 my-lg-0" method="POST" action='{{ url("/search") }}' >
       {{ csrf_field() }}
              <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search Bugs" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-lg-0" type="submit">Search</button>
               </form>
             </div>
               </div> 

<div class="col-sm-10 col-sm-offset-1" >

  <h2><i>Bugs Table</i></h2>
  <p>This table shows a list of all Bugs. View a Bug for more information.</p>  
  <br>          
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
        <td>{{ str_limit( $bug -> description,15) }}</td>
        <td>{{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}</td>
        <td>{{$bug ->created_at -> diffForHumans()}} </td>
         <td><ul class="nav nav-pills">
         <li> <a href="/bugs/{{$bug->id}}"><span class="fa fa-eye"> View </span></a> </li>
         
         </ul></td>
      </tr>
</div>
 @endforeach
         
    </tbody>
  </table>

 

 {{$bugs ->links()}}

</div>

@endsection