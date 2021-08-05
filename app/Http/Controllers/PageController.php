<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\post;

class PageController extends Controller
{
    public function posts(){
        return view('posts',[
            'posts'=> Post::with('user')->latest()->paginate()

        ]);
    }

    public function post(Post $post){
        return view('post',['post'=>$post]);
    }
}
