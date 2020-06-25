<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    //Archivio posts
    public function index() 
    {
        $posts = Post::orderby('created_at', 'desc')->paginate(5);

        return view('guest.posts.index', compact('posts'));
    }
}
