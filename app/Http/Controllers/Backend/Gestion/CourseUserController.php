<?php

namespace App\Http\Controllers\Backend\Gestion;

use App\Http\Controllers\Controller;
use App\Models\CourseUser;
use Illuminate\Http\Request;

class CourseUserController extends Controller
{
    public function CourseUserView(){
        //$allData = Course::all();
        $data['allData'] = CourseUser::all();
        return view('backend.gestion.course_user_list.view_list', $data);
    }

    public function AddCourseUser(){
        return view('backend.gestion.course_user_list.add_list');
    }

    public function StoreCourseUser(Request $request){
        $data = new CourseUser();
        $data -> user_id = $request -> user_id;
        $data -> course_id = $request -> course_id;
        $data -> status = $request -> status;
        $data->save();

        $notification = array(
            'message' => 'Course/User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admincourseuser.view')->with($notification);
    }

    public function EditCourseUser($id){
        $editData = CourseUser::find($id);
        return view('backend.gestion.course-user_list.edit_list', compact('editData'));
    }

    public function UpdateCourseUser(Request $request, $id){
        $data = CourseUser::find($id);
        $data -> user_id = $request -> user_id;
        $data -> course_id = $request -> course_id;
        $data -> status = $request -> status;
        $data->save();

        $notification = array(
            'message' => 'Course/User Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admincourseuser.view')->with($notification);
    }

    public function DeleteCourseUser($id){
        $course = CourseUser::find($id);
        $course -> delete();

        $notification = array(
            'message' => 'Course/User Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admincourseuser.view')->with($notification);
    }
}
