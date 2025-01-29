<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index',[
            'posts'=> Post::latest()->paginate()
        ]);
    }

    public function create(Post $post)
    {
        return view('posts.create',['post'=>$post]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:posts,slug',
            'body'=>'required',
            'img_page' => 'required',
            'img_content' => 'required'
        ]);

        $post = $request->user()->posts()->create([
            'title'=> $request->title,
            'slug' => Str::slug($request->slug),
            'body' => $request->body,
            'img_page' => $request->img_page,
            'img_content' => $request->img_content
        
        ]);
        return redirect()->route('posts.edit',$post);
    }

    public function edit(Post $post)
    {
      return view('posts.edit',['post'=>$post]);
    }

    public function update(Request $request, Post $post)
    {  
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:posts,slug' , $post->id,
            'body'=>'required',
            'img_page' => 'required',
            'img_content' => 'required'
        ]);

        $post->update([
            'title'=> $request->title,
            'slug' => Str::slug($request->slug),
            'body' => $request->body,
            'img_page' => $request->img_page,
            'img_content' => $request->img_content
        ]);
        return redirect()->route('posts.edit',$post);
    }

    public function destroy(Post $post)
    {
       $post->delete();
        return back();
    }
}
