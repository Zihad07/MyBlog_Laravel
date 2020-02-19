<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','checkRole:admin']);
    }

    public function dashboard() {
        return view('admin.dashboard');
    }

    public function posts(){
        $posts = Post::all();
        return view('admin.posts',compact('posts'));
    }
    public function comments(){
        $comments = Comment::all();
        return view('admin.comments',compact('comments'));
    }

    public function deletecomment($comment) {
        $comment = Comment::where('id',$comment)->first();
        $comment->delete();

        return redirect()->back()->with('success','Comment Deleted Successfully :)');
    }
    public function users(){
        $users = User::all();
        return view('admin.users',compact('users'));
    }

    public function edituser(User $user) {
//        dd($user);
        return view('admin.editUser',compact('user'));
    }

    public function edituserpost(UserUpdateRequest $request,User $user){

//        dd($request->all());
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->input('admin')==1){
            $user->admin = true;
        }else{
            $user->admin = false;
        }
        if($request->input('author')==1){
            $user->author = true;
        }else{
            $user->author = false;
        }

        $user->save();
        return redirect()->back()->with('success','User Updated Successfully');
    }

    public function deleteuser($user) {
        $user = User::where('id',$user)->first();
        $userName = $user->name;
        $user->posts()->delete();
        $user->comments()->delete();
        $user->delete();

        return redirect()->back()->with('success',"User:$userName profile deleted Successfully.");

    }

    public function postEdit(Post $post) {
        return view('admin.editPost',compact('post'));
    }

    public function updatepost(CreatePostRequest $request,$post) {
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        return redirect()->back()->with('success','Post Updated Succefully :)');
    }

    public function deletepost($post) {
        $post = Post::where('id',$post)->first();
        $post->delete();

        return redirect(route('adminPosts'))->with('success','Post Deleted Succefully :)');
    }
}
