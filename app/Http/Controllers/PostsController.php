<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()
            ->filter(request()->only(['month', 'year']))
            ->get();

        //$archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        //    ->orderByRaw('min(created_at)')
        //    ->groupby('year', 'month')
        //    ->get()
        //    ->toArray();

        return view('posts.index' , compact('posts'));
    }

    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.show', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //dd(request()->all());
        //create a new post using the request data $post = new Post;
        //$post->title = request('title');
        //$post->body = request('body');

        //save it to the database $post->save();
            
        //     Post::create([
        //         'title' => request('title'),
        //       'body' => request('body')
        //   ]);

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );


        //redirect to the home page
        return redirect('/');




    }
}
