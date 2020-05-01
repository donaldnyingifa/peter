
@extends ('layouts.app')

@section('links')
        
                <li>  <a href="{{ url('/bugs/create') }}">New Bug Report</a> </li>
                  <li > <a href="{{ url('/bugs') }}">All Bugs</a> </li>
                  <li class="active"> <a href="{{ url('/my_bugs') }}">My Bugs</a> </li>
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

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item show active">
    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-expanded="true">Bugs Reported By Me </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Bugs Assigned to Me</a>
  </li>

</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade in active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
    <div class="col-sm-3">
<ul class="nav nav-pills nav-stacked" >
   <br>
    <li class="active"><a data-toggle="pill" href="#new">Newly Reported</a></li>
   
    <li><a data-toggle="pill" href="#inprogress">Unresolved</a></li>
    <li><a data-toggle="pill" href="#completed">Resolved</a></li>
  </ul>
  </div>
  
  <div class="col-sm-9">
  <div class="tab-content">
    <div id="new" class="tab-pane fade in active">
      <h3>New</h3>
      <p>All newly reported bugs show up here</p>

<div>
  <table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
      <tr>
        <th> Title</th>
        <th>Description</th>
        <th>Reported by</th>
        <th>Time Stamp</th>
         <th>Actions</th>
         <th>Change Status</th>
      </tr>
    </thead>
    <tbody>
  @foreach ($bugs1 as $bug)
<div>
    <tr>
        <td>
    {{$bug -> title}} </td>
        <td>{{str_limit($bug -> description,15)}}</td>
        <td>{{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}</td>
        <td>{{$bug ->created_at -> diffForHumans()}}</td>
         <td>
          <ul class="nav nav-pills">
         <li> <a href="/bugs/{{$bug->id}}"><span class="fa fa-eye"> View </span></a> </li>
         <li> <a href="/bugs/edit/{{$bug->id}}">   <span class="fa fa-pencil-square-o"> Edit </span></a>  </li>
        <li> <a href="/deleteBug/{{$bug->id}}"><span class="fa fa-trash"> Delete </span></a> </li> 
         </ul>
      </td> 
      <td>  
              <form method="POST" action="{{  url('/resolve',array($bug->id))}}">
               {{ csrf_field()}}
               
      <select class="form-control" id="resolve" name="resolve">
             <option > </option>
         <ul> 
             <li>
              <option value="1" >resolved</option>
             <option value="0" >unresolved</option>
             </li>
          
         </ul>     
      </select>
<br>
<button type="submit" class="btn btn-secondary btn-sm" >Update</button> 

            </form>
               </td>       

      </tr>
</div>
 @endforeach

    </tbody>
  </table>
</div>
    </div>
 
    <div id="inprogress" class="tab-pane fade">
      <h3>In progress</h3>
      <p>All bugs you are working on shows up here</p>
      <div>
      <table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
      <tr>
        <th> Title</th>
        <th>Description</th>
        <th>Reported by</th>
        <th>Time Stamp</th>
         <th>Actions</th>
         <th>Change Status</th>
      </tr>
    </thead>
    <tbody>
  @foreach ($bugs2 as $bug)
<div>
    <tr>
        <td>
    {{$bug -> title}}</td>
        <td>{{str_limit($bug -> description,15)}}</td>
        <td>{{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}</td>
        <td>{{$bug ->created_at -> diffForHumans()}}</td>
         <td><ul class="nav nav-pills">
         <li> <a href="/bugs/{{$bug->id}}"><span class="fa fa-eye"> View </span></a> </li>
         <li> <a href="/bugs/edit/{{$bug->id}}">   <span class="fa fa-pencil-square-o"> Edit </span></a>  </li>
        <li> <a href="/deleteBug/{{$bug->id}}"><span class="fa fa-trash"> Delete </span></a> </li> 
         </ul></td>
         <td>  
              <form method="POST" action="{{  url('/resolve',array($bug->id))}}">
               {{ csrf_field()}}
               
      <select class="form-control" id="resolve" name="resolve">
             <option > </option>
         <ul> 
             <li>
              <option value="1" >resolved</option>
             <option value="0" >unresolved</option>
             </li>
          
         </ul>     
      </select>
<br>
<button type="submit" class="btn btn-secondary btn-sm" >Update</button> 

            </form>
               </td>

      </tr>
</div>
 @endforeach

    </tbody>
  </table>
  </div>
    </div>
    <div id="completed" class="tab-pane fade">
      <h3>Completed</h3>
      <p>All resolved bugs show up here</p>
      <div>
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
    <thead>
      <tr>
        <th> Title</th>
        <th>Description</th>
        <th>Reported by</th>
        <th>Time Stamp</th>
         <th>Actions</th>
         <th>Change Status</th>
      </tr>
    </thead>
    <tbody>
  @foreach ($bugs3 as $bug)
<div>
    <tr>
        <td>
    {{$bug -> title}}</td>
        <td>{{str_limit($bug -> description,15)}}</td>
        <td>{{ $bug -> user -> name}} on 
      {{ $bug -> created_at -> toFormattedDateString() }}</td>
        <td>{{$bug ->created_at -> diffForHumans()}}</td>
        <td><ul class="nav nav-pills">
         <li> <a href="/bugs/{{$bug->id}}"><span class="fa fa-eye"> View </span></a> </li>
         <li> <a href="/bugs/edit/{{$bug->id}}">   <span class="fa fa-pencil-square-o"> Edit </span></a>  </li>
        <li> <a href="/deleteBug/{{$bug->id}}"><span class="fa fa-trash"> Delete </span></a> </li> 
         </ul></td>
         <td>  
              <form method="POST" action="{{  url('/resolve',array($bug->id))}}">
               {{ csrf_field()}}
               
      <select class="form-control" id="resolve" name="resolve">
             <option > </option>
         <ul> 
             <li>
              <option value="1" >resolved</option>
             <option value="0" >unresolved</option>
             </li>
          
         </ul>     
      </select>
<br>
<button type="submit" class="btn btn-secondary btn-sm" >Update</button> 

            </form>
               </td>

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
  
    <div class="tab-pane fade" id="profile" role="profilepanel" aria-labelledby="profile-tab">
      <div class="col-sm-3">
  <ul class="nav nav-pills nav-stacked" >
<br>
      <li class="active"><a data-toggle="pill" href="#new1">Newly Reported</a></li>  
      <li><a data-toggle="pill" href="#inprogress1">Unresolved</a></li>
      <li><a data-toggle="pill" href="#completed1">Resolved</a></li>
    </ul>
    </div>
        <div class="col-sm-9">
    <div class="tab-content">
      <div id="new1" class="tab-pane fade in active">
        <h3>New</h3>
        <p>All newly reported bugs show up here</p>

  <div>
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
      <thead>
        <tr>
          <th> Title</th>
          <th>Description</th>
          <th>Reported by</th>
          <th>Time Stamp</th>
           <th>Actions</th>
           <th>Change Status</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($bugs4 as $bug)
  <div>
      <tr>
          <td>
      {{$bug -> title}} </td>
          <td>{{str_limit($bug -> description,15)}}</td>
          <td>{{ $bug -> user -> name}} on 
        {{ $bug -> created_at -> toFormattedDateString() }}</td>
          <td>{{$bug ->created_at -> diffForHumans()}}</td>
           <td>
            <ul class="nav nav-pills">
           <li> <a href="/bugs/{{$bug->id}}"><span class="fa fa-eye"> View </span></a> </li>
           <li> <a href="/bugs/edit/{{$bug->id}}">   <span class="fa fa-pencil-square-o"> Edit </span></a>  </li>
         
           </ul>
        </td> 
            <td>  
              <form method="POST" action="{{  url('/resolve',array($bug->id))}}">
               {{ csrf_field()}}
               
      <select class="form-control" id="resolve" name="resolve">
             <option > </option>
         <ul> 
             <li>
              <option value="1" >resolved</option>
             <option value="0" >unresolved</option>
             </li>
          
         </ul>     
      </select>
<br>
<button type="submit" class="btn btn-secondary btn-sm" >Update</button> 

            </form>
               </td>

        </tr>
  </div>
   @endforeach

      </tbody>
    </table>
  </div>
      </div>
   
      <div id="inprogress1" class="tab-pane fade" role="tabpanel">
        <h3>In progress</h3>
        <p>All bugs you are working on shows up here</p>

        <div>
        <table class="table table-striped table-bordered bootstrap-datatable datatable">
      <thead>
        <tr>
          <th> Title</th>
          <th>Description</th>
          <th>Reported by</th>
          <th>Time Stamp</th>
           <th>Actions</th>
           <th>Change Status</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($bugs5 as $bug)
  <div>
      <tr>
          <td>
      {{$bug -> title}}</td>
          <td>{{str_limit($bug -> description,15)}}</td>
          <td>{{ $bug -> user -> name}} on 
        {{ $bug -> created_at -> toFormattedDateString() }}</td>
          <td>{{$bug ->created_at -> diffForHumans()}}</td>
           <td><ul class="nav nav-pills">
           <li> <a href="/bugs/{{$bug->id}}"><span class="fa fa-eye"> View </span></a> </li>
           <li> <a href="/bugs/edit/{{$bug->id}}">   <span class="fa fa-pencil-square-o"> Edit </span></a>  </li>
         
           </ul></td>
           <td>  
              <form method="POST" action="{{  url('/resolve',array($bug->id))}}">
               {{ csrf_field()}}
               
      <select class="form-control" id="resolve" name="resolve">
             <option > </option>
         <ul> 
             <li>
              <option value="1" >resolved</option>
             <option value="0" >unresolved</option>
             </li>
          
         </ul>     
      </select>
<br>
<button type="submit" class="btn btn-secondary btn-sm" >Update</button> 

            </form>
               </td>

        </tr>

  </div>
   @endforeach

      </tbody>
    </table>
    </div>
   
    
      </div>
      <div id="completed1" class="tab-pane fade">
        <h3>Completed</h3>
        <p>All resolved bugs show up here</p>
        <div>
      <table class="table table-striped table-bordered bootstrap-datatable datatable">
      <thead>
        <tr>
          <th> Title</th>
          <th>Description</th>
          <th>Reported by</th>
          <th>Time Stamp</th>
           <th>Actions</th>
           <th>Change Status</th>
        </tr>
      </thead>
      <tbody>
    @foreach ($bugs6 as $bug)
  <div>
      <tr>
          <td>
      {{$bug -> title}}</td>
          <td>{{str_limit($bug -> description,15)}}</td>
          <td>{{ $bug -> user -> name}} on 
        {{ $bug -> created_at -> toFormattedDateString() }}</td>
          <td>{{$bug ->created_at -> diffForHumans()}}</td>
          <td><ul class="nav nav-pills">
           <li> <a href="/bugs/{{$bug->id}}"><span class="fa fa-eye"> View </span></a> </li>
           <li> <a href="/bugs/edit/{{$bug->id}}">   <span class="fa fa-pencil-square-o"> Edit </span></a>  </li>
         
           </ul></td>
           <td>  
              <form method="POST" action="{{  url('/resolve',array($bug->id))}}">
               {{ csrf_field()}}
               
      <select class="form-control" id="resolve" name="resolve">
      
               <option > </option>
         
         <ul> 
             <li>
              <option value="1" >resolved</option>
             <option value="0" >unresolved</option>
             </li>
          
         </ul>     
      </select>
<br>
<button type="submit" class="btn btn-secondary btn-sm" >Update</button> 

            </form>
               </td>

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

</div>
@endsection
