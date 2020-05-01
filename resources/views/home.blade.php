

 @extends ('layouts.app')
 @section('links')
    
                  <li>    <a href="{{ url('/bugs/create') }}">New Bug Report</a> </li>
                  <li > <a href="{{ url('/bugs') }}">All Bugs</a> </li>
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



<div class="row">
   
<div class="col-sm-6">
  <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
        <h4><i>All bugs filtered by Priority</i></h4>
      </div>
    </div>
<ul class="nav nav-pills nav-tabs" >
   <br>
    <li class="active"><a data-toggle="pill" href="#new">High</a></li>
   
    <li><a data-toggle="pill" href="#inprogress">Medium</a></li>
    <li><a data-toggle="pill" href="#completed">Low</a></li>
  </ul>

  
 
  <div class="tab-content">
    <div id="new" class="tab-pane fade in active">
      <h3>Bugs reported with high priority</h3>
      

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
  @foreach ($high as $bug)
<div>
    <tr>
        <td>
    {{$bug -> title}}</td>
        <td>{{str_limit($bug -> description,15)}}</td>
        <td>{{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}</td>
        <td>{{$bug ->created_at -> diffForHumans()}} </td>
        <td><a href="/bugs/{{$bug->id}}"><span class="fa fa-eye"> View </span></a> </td>

      </tr>
</div>
 
 @endforeach

    </tbody>
  </table>
  <div class="text-center">
    {!!$high->links()!!}
  </div>
</div>

    </div>
 
    <div id="inprogress" class="tab-pane fade">
      <h3>Bugs reported with medium priority</h3>
      
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
  @foreach ($medium as $bug)
<div>
    <tr>
        <td> 
    {{$bug -> title}}</td>
        <td>{{str_limit($bug -> description,15)}}</td>
        <td>{{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}</td>
        <td>[ {{$bug ->created_at -> diffForHumans()}} ]</td>
       <td><a href="/bugs/{{$bug->id}}"><span class="fa fa-eye"> View </span></a> </td>

      </tr>
</div>
 @endforeach

    </tbody>
  </table>
    <div class="text-center">
    {!!$medium->links()!!}
  </div>
  </div>
    </div>
    <div id="completed" class="tab-pane fade">
      <h3>Bugs Reported with low priority</h3>
      @if (count($low) > 0)
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
      
  @foreach ($low as $bug)
<div>
    <tr>
        <td>
    {{$bug -> title}}</td>
        <td>{{str_limit($bug -> description,15)}}</td>
        <td>{{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}</td>
        <td>[ {{$bug ->created_at -> diffForHumans()}} ]</td>
        <td><a href="/bugs/{{$bug->id}}"><span class="fa fa-eye"> View </span></a> <a href=" "> </a></td>

      </tr>
</div>
 @endforeach
 
    </tbody>

  </table>
 
    <div class="text-center">
    {!!$low->links()!!}
  </div>
    </div>
    @else
<p>No bug to display :)</p>
@endif
    </div>
  </div>
 
  </div>
  <div class="col-sm-6">
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<div class="row">
          <div class="col-sm-6 col-sm-offset-3">
        <h4><i>Report a bug</i></h4>
      </div>
    </div>
          <form method="POST" enctype="multipart/form-data" action="/continueCreate">
                    {{ csrf_field()}}
                    <div class="form-group">

                        <label for="title"  >Title</label>
                          <input id="title" class="form-control"  type="text" name="title" placeholder="Enter Bug title (Eg: login not working)" > 
                          </div>

                           <div class="form-group">
                        <label for="description" >Bug Description</label>
                          <textarea id="comment" class="form-control"  type="text" name="description" placeholder = "Enter bug description" required></textarea> 
                          </div>

                              <div class="form-group">
                        <button type="submit" class="btn btn-primary" >Continue</button> <br>
                        </div>

                        </form>

  </div>
</div>
</div>
</div>
<br>
  <br>
@endsection
