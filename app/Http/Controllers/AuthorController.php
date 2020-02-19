<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreatePostRequest;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\InvalidTag;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','checkRole:author']);
    }


    public function dashboard(){
        $posts = Post::where('user_id',Auth::id())->pluck('id')->toArray();
        $comments = Comment::whereIn('post_id',$posts)->get();
        $commentsToday = $comments->where('created_at','>=',Carbon::today())->count();
//        dd($comments);
        return view('author.dashboard',compact('comments','commentsToday'));
    }
    public function posts(){
        return view('author.posts');
    }
    public function comments(){
        $posts = Post::where('user_id',\auth()->user()->id)->pluck('id')->toArray();
        $comments = Comment::whereIn('post_id',$posts)->get();
        return view('author.comments',compact('comments'));
    }

    public function newpost(){
        return view('author.newPost');
    }
    public function createpost(CreatePostRequest $request){
//        dd($request->all());
//        $post = new Post();
//        $post->title = $request->input('title');
//        $post->content = $request->input('content');
//        $post->save();

        \auth()->user()->posts()->create([
            'title' => $request->input('title'),
            'content'=> $request->input('content'),
        ]);

        return redirect()->back()->with('success','New Post Created Successfully :).');
    }

    public function postedit($post){
        $post = Post::where('id',$post)->where('user_id',\auth()->user()->id)->first();

        return view('author.editPost',compact('post'));
    }
    public function updatepost(CreatePostRequest $request,$post){
//        Find Post
        $post = Post::where('id',$post)->where('user_id',\auth()->user()->id)->first();

        $post->update([
            'title'=>$request->input('title'),
            'content'=>$request->input('content'),
        ]);

        return redirect()->back()->with('success','Post updated Successfully :).');
    }

    public function deletePost($post) {
        $post = Post::where('id',$post)->where('user_id',\auth()->user()->id)->first();
        $post->delete();

        return redirect(route('authorPosts'))->with('success','Post Deleted Succefully');
    }
}
