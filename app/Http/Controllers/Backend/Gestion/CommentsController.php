<?php

namespace App\Http\Controllers\Backend\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Course;
use App\Models\User;
use App\Notifications\NewComment;
use App\Notifications\SubscriptionNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
    public function CommentView(){
        //$allData = Course::all();
        $data['allData'] = Comment::all();
        return view('backend.gestion.comments_list.view_list', $data);
    }

    public function ShowComments($id){
        $showData = Course::find($id);
        return view('backend.user.view_commentaire', compact('showData'));
    }

    public function ShowComments2($id){
        $showData = Course::find($id);
        return view('formatteur.view_commentaire', compact('showData'));
    }

    public function ShowComments3($id){
        $showData = Course::find($id);
        return view('students.view_commentaire', compact('showData'));
    }

    public function AddComment(){
        return view('backend.gestion.comments_list.add_list');
    }

    public function StoreComment(Request $request){
        $data = new Comment();
        $data -> user_id = $request -> user_id;
        $data -> course_id = $request -> course_id;
        $data -> body = $request -> body;
        $data->save();

        $notification = array(
            'message' => 'Comment Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admincomment.view')->with($notification);
    }

    public function EditComment($id){
        $editData = Comment::find($id);
        return view('backend.gestion.comments_list.edit_list', compact('editData'));
    }

    public function UpdateComment(Request $request, $id){
        $data = Comment::find($id);
        $data -> user_id = $request -> user_id;
        $data -> course_id = $request -> course_id;
        $data -> body = $request -> body;
        $data->save();

        $notification = array(
            'message' => 'Comment Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admincomment.view')->with($notification);
    }

    public function DeleteComment($id){
        $comment = Comment::find($id);
        $comment -> delete();

        $notification = array(
            'message' => 'Comment Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admincomment.view')->with($notification);
    }

    public function PostComment(Request $request, Course $course){
        $data = new Comment();
        $data -> user_id = Auth::user()->id;
        $data -> course_id = $request->course_id;
        $data -> course_title = $request->course_title;
        $data -> course_user = $request->course_user;
        $data -> body = $request -> body;
        $data->save();
        
        $course -> id = $request->course_id;
        $course -> titre = $request->course_title;
        $course -> user_id = $request->course_user;

        $user = User::where('id',  $course -> user_id)->first();

        $user->notify(new NewComment($course, Auth::user()));

        return redirect()->back();
    }

    public function DeleteComment2($id){
        $comment = Comment::find($id);
        $comment -> delete();

        return redirect()->back();
    }

    public function PostComment2(Request $request, Course $course){
        $data = new Comment();
        $data -> user_id = Auth::user()->id;
        $data -> course_id = $request->course_id;
        $data -> course_title = $request->course_title;
        $data -> course_user = $request->course_user;
        $data -> body = $request -> body;
        $data->save();
        
        $course -> id = $request->course_id;
        $course -> titre = $request->course_title;
        $course -> user_id = $request->course_user; 

        $user = User::where('id',  $course -> user_id)->first();

        $user->notify(new NewComment($course, Auth::user()));

        return redirect()->back();
    }

    public function DeleteComment3($id){
        $comment = Comment::find($id);
        $comment -> delete();

        return redirect()->back();
    }

    public function PostComment3(Request $request, Course $course){
        $data = new Comment();
        $data -> user_id = Auth::user()->id;
        $data -> course_id = $request->course_id;
        $data -> course_title = $request->course_title;
        $data -> course_user = $request->course_user;
        $data -> body = $request -> body;
        $data->save();
        
        $course -> id = $request->course_id;
        $course -> titre = $request->course_title;
        $course -> user_id = $request->course_user;

        $user = User::where('id',  $course -> user_id)->first();

        $user->notify(new NewComment($course, Auth::user()));

        return redirect()->back();
    }

    public function DeleteComment4($id){
        $comment = Comment::find($id);
        $comment -> delete();

        return redirect()->back();
    }


}
