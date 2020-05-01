
  		 <ul class="nav-justified">
  		 		   <li>   <form class="form-inline my-2 my-lg-0">
   				   <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    			   <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    				</form> </li> 
                  <li class="dropdown"> <a href="{{ url('/home') }}"><h1>Peter</h1></a> </li>
                  <li class="dropdown"> <a href="{{ url('/bugs/create') }}">New Bug Report</a> </li>
                  <li class="dropdown"> <a href="{{ url('/bugs') }}">View Bugs</a> </li>
                  <li class="active"> <a href="{{ url('/my_bugs') }}">My Bugs</a> </li> 
                  <li>   <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-lg-0" type="submit">Search</button>
    </form>
                </li> 
           </ul>
         
   