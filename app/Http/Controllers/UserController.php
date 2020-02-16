<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        return view('user.dashboard');
    }

    public function comments(){
        return view('user.comments');
    }

    public function deleteComment($commentId) {
        $comment = Comment::where('id',$commentId)->where('user_id',auth()->user()->id)->first();

        if($comment){
            $comment->delete();
            return redirect()->back()->with('success','One Comment Deleted Successfully.');
        }


    }

    public function profile() {
        return view('user.profile');
    }

    public function profilePost(UserUpdateRequest $request){
//        dd($request->all());
        $user = auth()->user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();

        return redirect()->back()->with('success','Profile updated successfully.');
    }


}
