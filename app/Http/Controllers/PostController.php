<?php

namespace I9T\Http\Controllers;

use I9T\Models\Post;
use Illuminate\Http\Request;

use I9T\Http\Requests;
use I9T\Http\Controllers\Controller;

class PostController extends Controller
{
    public function getAll()
    {
        $posts = Post::all();

        return view('posts.community')->with('posts', $posts);
    }
}
