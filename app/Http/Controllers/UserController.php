<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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


        if($request->input('password') != ''){
            if(!(Hash::check($request->input('password'),Auth::user()->password))){
                return redirect()->back()->with('error',"Your Current Password does not match with the password you provieded");
            }

            if(strcmp($request->input('password'),$request->input('new_password')) == 0){
                return redirect()->back()->with('error','New passord cannot be same as your current password.');
            }

//            Some validation
            $validation = $request->validate([
                'password' => 'required',
                'new_password' => 'required|string|min:8|confirmed'
            ]);

//            after validation success new password save
            $user->password = bcrypt($request->input('new_password'));
            $user->save();
            return redirect()->back()->with('success','Successfully Password Changed.');

        }
        $user->save();
        return redirect()->back()->with('success','Profile updated successfully.');
    }


}
