
@extends ('layouts.app')

@section('links')
                   
                  <li class="active"><a href="{{ url('/bugs/create') }}">New Bug Report</a> </li>
                  <li > <a href="{{ url('/bugs') }}">All Bugs</a> </li>
                  <li > <a href="{{ url('/my_bugs') }}">My Bugs</a> </li>
  @endsection

@section ('content')

       <div class="row">
    
                    <form method="POST" enctype="multipart/form-data" action="/bugs">
                    {{ csrf_field()}}
                    <div class="col-sm-6">
                   <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                     
                    <div class="form-group">

                        <label for="title"  >Title</label>
                          <input id="title" class="form-control"  type="text" name="title" placeholder="Enter Bug title (Eg: login not working)" > 
                          </div>

                           <div class="form-group">
                        <label for="description" >Bug Description</label>
                          <textarea id="comment" class="form-control"  type="text" name="description" placeholder = "Enter bug description" required></textarea> 
                          </div>

                              <div class="form-group">
                          <label for="screenshot" >Screenshot</label>
                        
                         <input type="file" name="screenshot" id="screenshot" class="form-control">
                       
                          </div>

                           <div class="form-group">
                          <label for="projecttitle" >Project title</label>
                          <input id="projecttitle" class="form-control"  type="text" name="projecttitle" placeholder="Name of Project..." required>
                          </div>

                                <div class="form-group">
                        <label for="supervisor" >Supervisor</label>
                          <select id="supervisor" class="form-control"  name="supervisor" >
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
              <select class="form-control" id="assigned_user" name="assigned_user">
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
              <select class="form-control" id="status" name="status">
                 <option>New</option>
                  <option>Inprogress</option>
                   <option>Completed</option>
                
                 </select>
                         </div>
           
                          <div class="form-group">
                          <label for="comment" >Comment</label> 
                          <textarea id="comment" class="form-control"  name="comment"   placeholder="Any Other Comments" required></textarea> 
                          </div>
                          
                           <div class="form-group">
                        <button type="submit" class="btn btn-primary" >Submit</button> <br>
                        </div>

                    @include ('layouts.errors')
                    </div>
                    </div>
                  </div>
                    </form>
             
               
                
           
            </div>

@endsection