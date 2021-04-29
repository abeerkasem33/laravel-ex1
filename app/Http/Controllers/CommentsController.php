<?php

namespace App\Http\Controllers;

use App\Post;

use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        // First way    
        //     Comment::create([
        //         'body' => request('body'),
        //        'post_id' => $post->id
        //   ]);
        
        // Second way

        $this->validate(request(), ['body' => 'required|min:2']);
        
        $post->addComment(request('body'));

        return back();

    }
}
