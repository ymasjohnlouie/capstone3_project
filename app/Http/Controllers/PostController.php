<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.add_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $rules = array(
            'title' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'content' => 'required|profane',
            'category' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        );
        $this->validate($request, $rules);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->post_status_id = 1;
        $post->category_id = $request->category;

        $image = $request->file('image');   //gets the image from form
        $image_name = time().'.'.$image->getClientOriginalExtension();
        //ex. 12312356.jpg
        $destination = "img/post/";   //ex. "images/" -> file destination
        $image->move($destination, $image_name);

        $post->image = $destination.$image_name;

        $post->save();

        Session::flash('success_message', 'Post Added Successfully');

        return redirect("/admin/posts");
        // dd($request);
        // return "Hello from save item method";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $items = Item::all(); //SELECT * FROM items;
        $posts = Post::paginate(1);
        return view('posts/show_posts', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $id)
    {
        $post = Post::find($id);

        return view('posts.edit_post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, $id)
    {
        $rules = array(
            'title' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'content' => 'required|profane',
            'category' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        );

        $this->validate($request, $rules);

        //made rules for validation (back-end validation)

        $post = Post::find($id);
        $cat_id = $post->category_id;
        echo $cat_id;

        $post->title = $request->title;
        $post->content = $request->content;
        $post->post_status_id = 1;
        $post->category_id = $request->category;

        if($request->file('image')!=null){
            $image = $request->file('image');   //gets the image from form
            $image_name = time().'.'.$image->getClientOriginalExtension();
            //ex. 12312356.jpg
            $destination = "img/post/";   //ex. "images/" -> file destination
            $image->move($destination, $image_name);

            $post->image = $destination.$image_name;
        }

        $post->save();

        Session::flash('success_message', 'Post Updated Successfully');

        return redirect("/posts/categories/$cat_id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, $id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success_message', 'Post Deleted Successfully');

        return redirect('/admin/posts/');
    }
}