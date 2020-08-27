<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        // $this->authorizeResource(Post::class, 'post');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with('user')->where('approved',1)->orderBy('created_at', 'desc')->paginate(5);
        dd($posts);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Post::class);

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $request->validate([
            'title'=>'required|min:5'
        ]);
        
        $post = new Post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->approved=true;
        $post->user_id=auth()->user()->id;

        if($post->save()){
            return redirect('/posts')->with('success', 'Sualınız uğurla paylaşıldı!');
        }

        return redirect('/posts')->with('error', 'Saulınız paylaşılmadı!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::with(['user','comments.user'])->find($id);

        // $this->authorize('view', $post);
    
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        $this->authorize('update', $post);

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $post=Post::find($id);

        $this->authorize('update', $post);

        $request->validate([
            'title'=>'required|min:5',
        ]);

        $post->title=$request->input('title');
        $post->body=$request->input('body');
        
        if($post->save()){
            return redirect('/posts/'.$id)->with('success', 'Sualınız uğurla yeniləndi!');
        }

        return redirect('/posts/'.$id)->with('error', 'Saulınız yenilənmədi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);

        $this->authorize('delete', $post);
        
        $post->comments()->delete();

        $post->delete();

        return redirect('/posts')->with('success','Sualınız silindi!');
    }
}
