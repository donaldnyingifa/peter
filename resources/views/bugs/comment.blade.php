 <div class="row">
   <div class = "col-md-5">
 <div class="comments">

  @foreach ($bug ->comments as $comment)
  <li class ="list-group-item">
  <b>{{ $comment->user->name}}:</b>

   {{ $comment->body}} <br>
  
     {{ $comment->created_at->diffForHumans()}} 

  
   
  </li>
    
  @endforeach
  </div >

   
   <div class = "card-block">
   	<form method="POST" action="/bugs/{{ $bug -> id }}/comments">
   		{{ csrf_field()}}

   		<div class="form-group">
   			<input name ="body" placeholder="Suggestions on how to solve bug" class="form-control" required>
   				
   			</input>
   		</div>
   		
   		<div class="form-group">
                        <button type="submit" class="btn btn-primary" >suggest</button> <br>
                        </div>
                      
                        @include ('layouts.errors')
   	</form>
   	</div>
   </div>
  <div class = "col-md-7">
 
  </div>
   </div>