<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $search = $request->search;
        
        $posts = Post::where('title','LIKE',"%{$search}%")
        ->latest()->paginate();

        return view('home',['posts'=>$posts]);
    }

    // public function blog()
    
    // {
    // // $posts=[
    // //         ['id'=>1,'title'=>'PHP','slug'=>'php'],
    // //         ['id'=>1,'title'=>'Laravel','slug'=>'Laravel']
    // //     ];

    // // $posts= Post::get();
    //     $posts= Post::latest()->paginate();
    //     return view('blog',['posts'=>$posts]);
    // }

    public function post(Post $post)
    {
        // $post=$slug;
        return view('post',['post'=>$post]);
    }
}
