<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Http\Requests\CreateValidationRequest;
use Illuminate\Support\Facades\Gate;



class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //SELECT * FROM Posts
        $posts = Posts::all();
        return view('posts.index', [
            'posts' => $posts
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
    public function store(CreateValidationRequest $request)
    {

        $request->validated();

        $post = Posts::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        if($post->user_id != auth()->id()) {
            return 'Nope.';
        } else {
            return view('posts.edit',compact('post'));
        }
              
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateValidationRequest $request, $id)
    {

        $request->validated();
        $post = Posts::where('id', $id)
        ->update([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {

        if($post->user_id != auth()->id()) {
            return 'Nope.';
        }
        else{
            $post->delete();
            return redirect('/posts');
        }
    }
}
