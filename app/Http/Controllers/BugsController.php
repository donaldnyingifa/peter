<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\Mail\assignedBug;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
//use Illuminate\Support\Facades\DB;
use App\Bug;
use App\Priority;
use App\User;
use Image;



class BugsController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$bugs = Bug::orderBy('created_at','desc')->get();
	//return $bugs;
   return view('bugs.index',['bugs'=> Bug::paginate(5)], compact('bugs') );
    }

     public function view()
    {
       $id = Auth()->user()->id;
       $name = Auth()->user()->name;
     $bugs1 = Bug::where('user_id',$id)->unresolved()->orderBy('created_at','desc')->take('3')->get();
     $bugs2 = Bug::where('user_id',$id)->unresolved()->orderBy('created_at','desc')->get();
     $bugs3 = Bug::where('user_id',$id)->resolved()->orderBy('created_at','desc')->get();

     $bugs4 = Bug::where('assigned_user',$name)->unresolved()->orderBy('created_at','desc')->take('3')->get();
     $bugs5 = Bug::where('assigned_user',$name)->unresolved()->orderBy('created_at','desc')->get();
     $bugs6 = Bug::where('assigned_user',$name)->resolved()->orderBy('created_at','desc')->get();
      

    return view('my_bugs', compact('bugs1','bugs2','bugs3','bugs4','bugs5','bugs6'));
    }

    public function show(Bug $bug)
    {
    	//$bugs = DB::table('bugs')->find($id);
	//$bugs = Bug::find($id);
	//dd($bug);
    	//$bug = Bug::find($id);
    	//return $bug;
       
   return view('bugs.show', compact('bug') );
    }


    public function search(Request $request)
    {
    $keyword =  $request->input('search');
    $bugs = Bug::where('title','LIKE', '%'.$keyword.'%')
    ->orWhere('description','LIKE', '%'.$keyword.'%')
     ->orWhere('projecttitle','LIKE', '%'.$keyword.'%')
      ->orWhere('comment','LIKE', '%'.$keyword.'%')
     ->get();
   
     return view('bugs.search', compact('bugs') );
    }

    public function continueCreate()
      {
      $priority = Priority::all();
       $user = User::all();
       $input = Input::all();

        $this->validate(request(),[
        'title' => 'required',
        'description' => 'required',
            ]);

     $title = request('title');
     $description = request('description');

      //session(['title'=>$title, 'description'=> $description]);


        return view('bugs.continueCreate',['title' => $title,'description' => $description, 'user' => $user,'priority' => $priority]);
    }

    public function create()
    {
      $priority = Priority::all();
       $user = User::all();

        return view('bugs.create',['priority' => $priority,'user' => $user]);
    }

      public function edit($id)
    {
      $priority = Priority::all();
      $bug = Bug::find($id);
      $priority_ = Priority::find($bug->priority_id);
       $user = User::all();
      //$priority_name = Priority::where('id',$priority_id)->get();
     // $bug -> update($id-get());
      //return $bug;
       //  return $priority;
        return view('bugs.edit',['priority' => $priority, 'priority_'=>$priority_,'user' => $user],compact('bug'));
    }

      public function editBug(Request $request, $id)
    {
        $this->validate(request(),[
        'title' => 'required',
        'description' => 'required',
        'screenshot' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'priority_id' => 'required',
        'assigned_user' => 'required',
        'projecttitle' => 'required',
        'supervisor' => 'required',
        'comment' => 'required'
 
            ]);
       

        $bug = Bug::where('id',$id);
        if (Input::hasFile('screenshot')){
         $file = Input::file('screenshot');
         $filename = time() . '.'. $file->getClientOriginalExtension();
       //  $url = URL::to("/") . '/uploads/' . $file->getClientOriginalName();
     Image::make($file)->resize(300,300)->save(public_path('/storage/uploads/' . $filename));  
        $bug->update([
        'title' => request('title'),
        'description' => request('description'),
        'projecttitle' => request('projecttitle'),
        'supervisor' => request('supervisor'),
        'assigned_user' => request('assigned_user'),
        'screenshot' => $filename,
        'status' => request('status'),
        'comment' => request('comment'),
        'user_id' => auth() ->id(),
        'priority_id' => request('priority_id')
            ]); 
     }

   return redirect('/bugs')->with('response','Bug Updated Successfully');

    }

      public function deleteBug($id)
    {
        Bug::where('id', $id)->delete();
        return redirect('/my_bugs')->with('response','Bug Deleted Successfully');
    }

    public function resolved()
    {
    	$bugs = Bug::resolved()->get();
	//return $bugs;
      return view('bugs.resolved', compact('bugs') );
    } 

     public function resolve(Request $request, $id)
    {
        $this->validate(request(),[
        'resolve' => 'required'
            ]);
       
        $bug = Bug::where('id',$id); 

        $bug->update([
        'resolved' => request('resolve')
        
            ]); 
    

   return redirect('/my_bugs')->with('response','Bug Updated Successfully');

    }

   

    public function store(Request $request)
    {
        $this->validate(request(),[
        'title' => 'required',
        'description' => 'required',
        'screenshot' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'priority_id' => 'required',
        'projecttitle' => 'required',
        'assigned_user' => 'required',
        'supervisor' => 'required',
        'comment' => 'required'
 
            ]);

      $bug =  Bug::create([
    
        'title' => request('title'),
        'description' => request('description'),
        'projecttitle' => request('projecttitle'),
        'supervisor' => request('supervisor'),
        'screenshot' => request('screenshot'),
        'status' => request('status'),
        'assigned_user' => request('assigned_user'),
        'comment' => request('comment'),
        'user_id' => auth() ->id(),
        'priority_id' => request('priority_id')
            ]);

if (Input::hasFile('screenshot')){
         $file = Input::file('screenshot');
         $filename = time() . '.'. $file->getClientOriginalExtension();
       //  $url = URL::to("/") . '/uploads/' . $file->getClientOriginalName();
     Image::make($file)->resize(300,300)->save(public_path('/storage/uploads/' . $filename));  
     $bug->update(['screenshot' => $filename]);
     }
     //$assigned_user = request('assigned_user');
     //$assigned_user_mail = User::where('name',$assigned_user)->get()->first(); 
   

   // Mail::to($assigned_user_mail)->send(new assignedBug($assigned_user_mail));

  return redirect('/home');

  }

}
