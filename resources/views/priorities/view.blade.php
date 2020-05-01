
@extends ('layouts.app')

@section('links')
<li>
                           <a href="{{ url('/bugs/create') }}">New Bug Report</a> </li>
                  <li > <a href="{{ url('/bugs') }}">View Bugs</a> </li>
                  <li class="active"> <a href="{{ url('/my_bugs') }}">My Bugs</a> </li>
  @endsection

@section ('content')

  <div class="col-sm-6 col-sm-offset-3" >
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
<div class="row">
<div class="col-sm-4">
<ul class="nav nav-pills nav-stacked" >
   <br>
    <li class="active"><a data-toggle="pill" href="#new">High</a></li>
   
    <li><a data-toggle="pill" href="#inprogress">Medium</a></li>
    <li><a data-toggle="pill" href="#completed">Low</a></li>
  </ul>
  </div>
  
  <div class="col-sm-8">
  <div class="tab-content">
    <div id="new" class="tab-pane fade in active">
      <h3>High</h3>
      <p>Bugs reported with high priority</p>

<div>
  <table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
      <tr>
        <th> Title</th>
        <th>Description</th>
        <th>Reported by</th>
        <th>Time Stamp</th>
      </tr>
    </thead>
    <tbody>
  @foreach ($high as $bug)
<div>
    <tr>
        <td><a href="/bugs/{{$bug->id}}"> 
    {{$bug -> title}}</a></td>
        <td>{{$bug -> description}}</td>
        <td>{{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}</td>
        <td>[ {{$bug ->created_at -> diffForHumans()}} ]</td>

      </tr>
</div>
 @endforeach

    </tbody>
  </table>
</div>
    </div>
 
    <div id="inprogress" class="tab-pane fade">
      <h3>Medium</h3>
      <p>Bugs reported with medium priority</p>
      <div>
      <table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
      <tr>
        <th> Title</th>
        <th>Description</th>
        <th>Reported by</th>
        <th>Time Stamp</th>
      </tr>
    </thead>
    <tbody>
  @foreach ($medium as $bug)
<div>
    <tr>
        <td><a href="/bugs/{{$bug->id}}"> 
    {{$bug -> title}}</a></td>
        <td>{{$bug -> description}}</td>
        <td>{{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}</td>
        <td>[ {{$bug ->created_at -> diffForHumans()}} ]</td>

      </tr>
</div>
 @endforeach

    </tbody>
  </table>
  </div>
    </div>
    <div id="completed" class="tab-pane fade">
      <h3>Low</h3>
      <p>Bugs Reported with low priority</p>
      <div>
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
      <tr>
        <th> Title</th>
        <th>Description</th>
        <th>Reported by</th>
        <th>Time Stamp</th>
      </tr>
    </thead>
    <tbody>
  @foreach ($low as $bug)
<div>
    <tr>
        <td><a href="/bugs/{{$bug->id}}"> 
    {{$bug -> title}}</a></td>
        <td>{{$bug -> description}}</td>
        <td>{{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}</td>
        <td>[ {{$bug ->created_at -> diffForHumans()}} ]</td>

      </tr>
</div>
 @endforeach

    </tbody>
  </table>
    </div>
    </div>
  </div>
  </div>
  </div>

@endsection
