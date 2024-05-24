<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        dump($request);
        if($request->category){
            $posts = Category::where('category_id', $request->category)->firstOrFail();
        }
        if($request->user){
            $posts = User::where('user_id', $request->user)->firstOrFail();
        }
        else{
        $posts = Post::orderBy('title')->paginate(10);
        // dd($post);
        $categories = Category::all();
        $users = User::all();
        return view("blog", ['posts' => $posts, 'categories' => $categories, 'users' => $users]);
    }
    }

    public function filter(Request $request){
        dd($request);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $imgName = "";
        //dd($request);
        try{
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'category' => 'required'
        ]);
        //dump($request->image);

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . rand() . "." . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/hazaar-images', $filename);
            $imgName = $filename;
        }
       
           Post::create([
            'photo' => $imgName, 
            'title' =>  $request->title, 
            'description' => $request->description,
            //'timestamps' => $request->timestamps,
            'user_id' => $request->user_id,
            'category_id' => $request->category

           ]);
           return redirect()->route('blog-page')->with('success', 'Post created');

       
           // $post->save; 
        } catch(\Exception $e){
            dd($e);

        }

        
        // dd($post);
        // return redirect()->route('blog-page')->with('success', 'Post created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        //dd($post);
        return view('layouts.singlePost', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
