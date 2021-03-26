<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        $posts = Post::all();
        
        $data = [
            'posts' => $posts
        ];
        
        return view( 'guest.post.index', $data );
    }

    public function show(){

        $posts = Post::all();
        
        $data = [
            'posts' => $posts
        ];
        
        return view( 'guest.post.index', $data );
    }
}
