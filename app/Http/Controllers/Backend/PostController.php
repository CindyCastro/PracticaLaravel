<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =Post::latest()->get();
        return view('posts.index',[
            'posts'=>$posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
       
        //salvar
        $post = Post::create([
            'user_id' => auth() ->user()->id
        ] + $request ->all());

        //image

        if($request->file('file')){
            $post->image = $request->file('file')->store('posts','public');
            $post->save();
        }

        // retornar
        return back()->with('status',"Creado con exito");

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        if($request->file('file')){
            //eliminar imagen
            Storage::disk('public')->delete($post->image);
            $post->image = $request->file('file')->store('posts','public');
            $post->save();
        }

        return back()->with('status',"Actualizado con exito");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        //eliminacion imagen
        Storage::disk('public')->delete($post->image);

        $post->delete();

        return back()->with('status',"Eliminado con exito");
    }
}
