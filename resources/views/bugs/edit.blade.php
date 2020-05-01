
@extends ('layouts.app')

@section('links')
                  <li > <a href="{{ url('/bugs/create') }}">New Bug Report</a> </li>
                  <li > <a href="{{ url('/bugs') }}">All Bugs</a> </li>
                  <li > <a href="{{ url('/my_bugs') }}">My Bugs</a> </li>
  @endsection

@section ('content')

       <div class="row">
    
                    <form method="POST" enctype="multipart/form-data" action="{{  url('/editBug',array($bug->id))}}">
                    {{ csrf_field()}}
                  <div class="col-sm-6">
                   <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                    <div class="form-group">


                        <label for="title"  >Title</label>
                          <input id="title" class="form-control"  type="text" name="title" placeholder="Enter Bug title (Eg: login not working)" value="{{$bug -> title}}"> 
                          </div>

                           <div class="form-group">
                        <label for="description" >Bug Description</label>
                          <textarea id="comment" class="form-control"  type="text" name="description" placeholder = "Enter bug description" required>{{$bug -> description}}</textarea> 
                          </div>

                              <div class="form-group">
                          <label for="screenshot" >Screenshot</label>
                        
                         <input type="file" name="screenshot" id="screenshot" class="form-control" value="{{$bug -> screenshot}}">
                       
                          </div>

                           <div class="form-group">
                          <label for="projecttitle" >Project title</label>
                          <input id="projecttitle" class="form-control"  type="text" name="projecttitle" placeholder="Name of Project..." value="{{$bug -> title}}" required>
                          </div>
                          
                           <div class="form-group">
                        <label for="supervisor" >Supervisor</label>
                    


                       <select class="form-control" id="supervisor" name="supervisor" >
                         <option >{{$bug -> supervisor}}</option>
                          <ul>
                            @foreach ($user as $users)
                           <li>
                           <option >{{$users -> name}}</option>
                           </li>
                             @endforeach
                          </ul>
                    
                       </select>
                          </div>

                            </div>
                          </div>
                       </div>

                       <div class="col-sm-6 ">
                     <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                           <div class="form-group">
                          
                           <label for="priority_id" >Priority</label>
              <select class="form-control" id="priority_id" name="priority_id">
            <option value="{{$bug -> priority_id}}" >{{$priority_ -> name}}</option>
                <ul>
                  @foreach ($priority as $priorities)
                 <li>

                 <option value="{{$priorities -> id}}" >{{$priorities -> name}}</option>
                 </li>
                   @endforeach

                </ul>
                
                 </select>
                 </div>

                          <div class="form-group">
                          
                           <label for="assigned_user" >Assigned to Engineer</label>
              <select class="form-control" id="assigned_user" name="assigned_user" value="{{$bug -> assigned_user}}" >
                 <option >{{$bug -> assigned_user}}</option>
                <ul>
                  @foreach ($user as $users)
                 <li>
                 <option >{{$users -> name}}</option>
                 </li>
                   @endforeach
                </ul>
                
                 </select>
                 </div>
                       
                        <div class="form-group"> 
                          <label for="status" >Status</label>
              <select class="form-control" id="status" name="status"  >
                <option value="{{$bug -> status}}"> {{$bug -> status}} </option>
                 <option >New</option>
                  <option>Inprogress</option>
                   <option>Completed</option>
          
                 </select>
                         </div>
           
                          <div class="form-group">
                          <label for="comment" >Comment</label> 
                          <textarea id="comment" class="form-control"  name="comment"   placeholder="Any Other Comments"  required>{{$bug -> comment}} </textarea> 
                          </div>
                          
                           <div class="form-group">
                        <button type="submit" class="btn btn-primary" >Update</button> <br>
                        </div>

                    @include ('layouts.errors')
                     </div>
                    </div>
                  </div>
                    </form>
             
               
                
           
            </div>

@endsection