<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // dump($request);
        if ($request->category) {
            $posts = Category::where('category_id', $request->category)->firstOrFail();
        }
        if ($request->user) {
            $posts = User::where('user_id', $request->user)->firstOrFail();
        } else {
            $posts = Post::orderBy('title')->paginate(10);
            // dd($post);
            $categories = Category::all();
            $users = User::all();
            return view("blog", ['posts' => $posts, 'categories' => $categories, 'users' => $users]);
        }
    }

    public function filter(Request $request)
    {
        //dd($request);

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
        // try{
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
        // } catch(\Exception $e){
        //     dd($e);

        // }


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
        $posts = Post::find($id);
        //dump($posts);
        $categories = Category::all();
        $users = User::all();

        return view("edit-post", ['posts' => $posts, 'categories' => $categories, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $imgName = "";
        // try{
        $request->validate([
            // 'blog_image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'category' => 'required'
        ]);
        if ($request->blog_image) {

            $file = $request->blog_image;
            $filename = time() . rand() . "." . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/hazaar-images', $filename);
            $imgName = $filename;
        }

        // dd(empty($imgName));
        $post = Post::find($id);
        $post->update([
            'photo' => empty($imgName) ? $post->photo : $imgName,
            'title' =>  $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'category_id' => $request->category

        ]);


        // $post->save; 
        // } catch(\Exception $e){
        //     dd($e);

        // }

        return redirect()->route('blog-page')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect()->route('blog-create')->with('success', 'Post has been deleted!');
    }


    public function like($post_id)
    {
        $is_liked = Like::where('user_id', auth()->user()->id)->where('post_id', $post_id)->exists();
        if ($is_liked) {
            $liked_post = Like::where('user_id', auth()->user()->id)->where('post_id', $post_id)->first();

            $liked_post->delete();
            return redirect()->route('single-post-page',['id'=>$post_id])->withSuccess('The propety was unfavourited');
        } else {
            Like::create([
                'user_id' => auth()->user()->id,
                'post_id' => $post_id
            ]);

            return redirect()->route('single-post-page',['id'=>$post_id])->withSuccess('Post was Liked');
        }
    }

    public function comment(Request $request, $post_id){
        // dd('rjt');
        $request->validate([
            'comment'=>'required',
        ]);

        $comment = [
            'comment'=>$request->comment,
            'user_id' => auth()->user()->id,
            'post_id' => $post_id
        ];
       
        Comment::create($comment);

        return redirect()->route('single-post-page',['id'=>$post_id])->withSuccess('A comment was added to the post');            return redirect()->route('property-contact', ['id' => $propertyId, 'contacted' => $contacted])->withSuccess('Thanks for contacting us!');

        }
}
