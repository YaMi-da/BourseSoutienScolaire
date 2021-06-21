<?php

namespace App\Http\Controllers\Backend\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;
use App\Notifications\SubscriptionNotification;
use Facade\FlareClient\Middleware\CensorRequestBodyFields;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseUserController extends Controller
{
    public function CourseUserView(){
        //$allData = Course::all();
        $data['allData'] = CourseUser::all();
        return view('backend.gestion.course_user_list.view_list', $data);
    }

    public function AddCourseUser(){
        $course = Course::all();
        $users = User::where('user_type_id', '2')->get();
        return view('backend.gestion.course_user_list.add_list')->with('users', $users)->with('course', $course);
    }

    public function StoreCourseUser(Request $request){
        $data = new CourseUser();
        $data -> user_id = $request -> user_id;
        $data -> course_id = $request -> course_id;
        $data->save();

        $notification = array(
            'message' => 'Course/User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admincourseuser.view')->with($notification);
    }

    public function EditCourseUser($id){
        $editData = CourseUser::find($id);
        $course = Course::all();
        $users = User::where('user_type_id', '2')->get();
        return view('backend.gestion.course_user_list.edit_list', compact('editData'))->with('users', $users)->with('course', $course);
    }

    public function UpdateCourseUser(Request $request, $id){
        $data = CourseUser::find($id);
        $data -> user_id = $request -> user_id;
        $data -> course_id = $request -> course_id;
        $data->save();

        $notification = array(
            'message' => 'Course/User Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admincourseuser.view')->with($notification);
    }

    public function DeleteCourseUser($id){
        $courseuser = CourseUser::find($id);
        $courseuser -> delete();

        $notification = array(
            'message' => 'Course/User Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admincourseuser.view')->with($notification);
    }

    public function Subscribe(Request $request, Course $course){
        $data = new CourseUser();
        $data -> user_id = Auth::user()->id;
        $data -> course_id = $request->course_id;
        $data -> course_title = $request->course_title;
        $data -> course_user = $request->course_user;
        $data -> course_username = $request->course_username;
        $data -> course_niveau = $request->course_niveau;
        $data -> course_matiere = $request->course_matiere;
        $data->save();
        
        $course -> id = $request->course_id;
        $course -> titre = $request->course_title;
        $course -> user_id = $request->course_user; 

        $user = User::where('id',  $course -> user_id)->first();

        $user->notify(new SubscriptionNotification($course, Auth::user()));

        return redirect()->back();
    }
}
