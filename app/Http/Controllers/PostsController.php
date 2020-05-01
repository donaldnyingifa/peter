<?php

namespace App\Http\Controllers;

 //use Illuminate\Http\Request;

 use App\Post;   

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
    	return view('posts.index',compact('posts'));
    }

    public function show(Post $post)
    {
    	return view('posts.show');
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store()
    {
       // dd(request('title'));
        // create a new post using the request data
       // $post = new Post;

       /* $post-> title = request('title');
       $post-> description = request('description');
        $post-> projecttitle = request('projecttitle');
        $post-> supervisor = request('supervisor');
        $post-> priority = request('priority');
        $post-> status = request('status');
        $post-> comment = request('comment');

          // save it to thedatabase
        $post->save(); */

        $this->validate(request(),[
        'title' => 'required',
        'description' => 'required',
        'projecttitle' => 'required',
        'supervisor' => 'required',
        'comment' => 'required'

            ]);

        Post::create([
    
        'title' => request('title'),
        'description' => request('description'),
        'projecttitle' => request('projecttitle'),
        'supervisor' => request('supervisor'),
        'priority' => request('priority'),
        'status' => request('status'),
        'comment' => request('comment')
            ]);
              
        // and then redirect to the home page
        return redirect('/');
    }
}
