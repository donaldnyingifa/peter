<?php

namespace App\Http\Controllers;
use App\Bug;
  use App\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
     public function priority(){
    	return view('priorities.priority');
    }

     public function addPriority(Request $request)
    {
    	$this->validate($request, [
            'priority'=> 'required']);
        $priority = new Priority;
        $priority->priority = $request->input('priority');
    }

     public function index($priorityName)
    {
        $priorityId = Priority::where('name', $priorityName)->first()->id;
        $bugs = Bug::where('priority_id', $priorityId) -> latest()->get();
      
   
   return view('priorities.index', compact('priorities') );
    }


     public function view()
    {
      // $id1 = 1;
     $high = Bug::where('priority_id','1')->unresolved()->orderBy('created_at','desc')->take('3')->get();
     $medium = Bug::where('priority_id','2')->unresolved()->orderBy('created_at','desc')->get();
     $low = Bug::where('priority_id','3')->unresolved()->orderBy('created_at','desc')->get();
      

    return view('priorities.view', compact('high','medium','low'));
    }
}
