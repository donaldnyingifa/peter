<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Bug;
use App\Comment;
class CommentsController extends Controller
{
    public function store(Bug $bug)
    {
    	Comment::create([
    	'body' => request('body'),
    	'bug_id' => $bug->id,
    	'user_id' => auth() ->id()
    	]);
    	return back();
    }
}
