<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
Use App\Post;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(15);
        $data = ['posts' => $posts];
        return View('Admin/Post/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $data = ['tags' => $tags];
        return View('Admin/Post/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);
        $newPost = new Post();

        // $newPost = fill($data);
        $newPost->title = $data['title'];
        $newPost->content= $data['content'];
        $newPost->user_id = auth::id();
        $newPost->slung = Str::slug($data['title']);

        $cover_path = Storage::put('post_cover', $data['image']);
        $newPost->cover = $cover_path;

        $newPost->save();

        $newPost->tags()->sync($data['tags']);

        return redirect()-> route('post.show', $newPost->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $tags = Tag::all();
        $data = ['post' => $post, 'tags'=>$tags];
        return View('Admin/Post/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        $data = ['post' => $post, 'tags'=>$tags];
        return View('Admin/Post/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();
        $post->update($data);

        if(array_key_exists('tags', $data)){
            $post->tags()->sync($data['tags']);
        }

        return redirect()-> route('post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);
        $post->delete();
        return redirect()-> route('post.index');
    }
}
