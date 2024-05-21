<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::all();
        // dd($post);
        return view("blog", ['post' => $post]);
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
        try{
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        dump($request->image);
       
           Post::create([
            'photo' => $request->image, 
            'title' =>  $request->title, 
            'description' => $request->description

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
