<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\postsCategory;

class CategoryController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    function showByCategory($id){
        // $category = postsCategory::find($id);
        $category = postsCategory::all();
        // dd($category);
        $category_posts = Post::where('category_id', $id)->get();
        // $category_posts = Post::where('category_id', $category->id)->get();

        // return view('posts.show_posts', compact('category_posts'));
        return view('posts.category_details', compact('category_posts'));
        // return view('items.show_items', compact('items'));
    }
    function showCategories(){
        $categories = postsCategory::all();
        // dd($categories); //returns a collection of categories
        // return view('items.show_categories', compact('categories'));
        return view('posts.show_categories', ['categories' => $categories]);
    }

    function categoryDetails($id){
        $category = postsCategory::find($id);
        // dd($categories);
        return view('postsCategory.category_details', compact('category'));
    }
}