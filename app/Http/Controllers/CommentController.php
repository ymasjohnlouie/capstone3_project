<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Category;
use App\postsCategory;
use Session;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category = postsCategory::find($id);
        // $category = postsCategory::all();
        
        // $category_posts = Post::where('category_id', $id)->get();
        $category_posts = Post::where('category_id', $category->id)->get();
        // dd($category_posts);

        return view('posts.post_details', compact('category_posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $rules = array(
            'content' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|profane',
            'author_id' => 'required|numeric',
            'post_id' => 'required|numeric',
        );
        $this->validate($request, $rules);

        $comment = new Comment;
        $comment->status_id = 1;
        $comment->content = $request->content;
        $comment->author_id = $request->author_id;
        $comment->post_id = $request->post_id;

        $comment->save();

        Session::flash('success_message', 'Comment Added Successfully');

        return redirect("/posts/categories/$id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        // $items = Item::all(); //SELECT * FROM items;
        $comments = Comment::paginate(5);
        return view("/posts/categories/$id", compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function editComment($id)
    {
        $commented = Comment::find($id);

        // return view('posts.edit_comment', compact('comment'));
        return view('posts.post_details', compact('commented'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function updateComment(Request $request, Comment $comment, $id)
    {
        $rules = array(
            'content' => 'required|profane',
            // 'content' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/|profane',
        );

        $this->validate($request, $rules);

        $comment = Comment::find($id);

        $myposts = Post::where('id', $comment->post_id)->get();
        foreach($myposts as $mypost){
            $newpost = $mypost->category_id;
            echo $newpost;
        }
        
        $comment->content = $request->content;

        $comment->save();

        Session::flash('success_message', 'Comment Updated Successfully');

        return redirect("/posts/categories/$newpost");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, $id)
    {
        $comment = Comment::find($id);

        $kevin = Post::where('id', $comment->post_id)->get();
        foreach($kevin as $kevs){
            $louie = $kevs->category_id;
            echo $louie;
        }

        $comment->delete();

        Session::flash('delete_message', 'Comment Has Been Deleted');

        return redirect("/posts/categories/$louie");
    }
}
