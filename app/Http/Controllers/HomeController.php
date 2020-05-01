<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bug;
  use App\Priority;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $high = Bug::where('priority_id','1')->unresolved()->orderBy('created_at','desc')->paginate(2);
     $medium = Bug::where('priority_id','2')->unresolved()->orderBy('created_at','desc')->paginate(2);
     $low = Bug::where('priority_id','3')->unresolved()->orderBy('created_at','desc')->paginate(2);
  

    return view('home', compact('high','medium','low'));
    }
}
