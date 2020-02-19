<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
//        $posts = Post::all();
        $posts = Post::orderby('created_at','desc')->get();
//        return view('welcome')->with('posts',$posts);
        return view('welcome',compact('posts'));
    }

    public function singlePost(Post $post){
//        dd($post);
        return view('singlePost',compact('post'));
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function contactPost(){

    }

}
