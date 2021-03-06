<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Message;
use Carbon\Carbon;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $posts= Post::orderBy('created_at', 'desc')->paginate(1);

        return view('posts.index')->with('posts', $posts);}

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
    public function store(Request $request)
    {

        $this->validate($request, [

            'title' => 'required',
            'body' => 'required',
            'image' => 'file|image|max:10000',

        ]);




        $post = new Post;

        $this->storeImage($post);

        $post->title = $request->input('title');
      //  $post->title = 'title na';

        $post->body = $request->input('body');
        //$post->image = '9XwxUpfVNadalZ7v9G9iB7hbcBfQ2ev1HLm5avcl.png';
        
        $post->image = $request->input('image');
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    public function messages()
    {
        $messages= Message::all();
        return view('pages.messages')->with('messages', $messages);
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
        $this->storeImage($post);
        return view ('posts.edit')->with('post', $post);


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

        $this->validate($request, [

            'title' => 'required',
            'body' => 'required'

        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Successfully Edited!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted');

    }

    private function storeImage($post){


        if (request()->has('image')){

            $post->update([

                'image' =>request()->image->store('uploads', 'public'),


            ]);


        }

    }
}
