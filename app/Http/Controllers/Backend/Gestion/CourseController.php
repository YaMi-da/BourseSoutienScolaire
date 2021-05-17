<?php

namespace App\Http\Controllers\Backend\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function CourseView(){
        //$allData = Course::all();
        $data['allData'] = Course::all();
        return view('backend.gestion.course_list.view_list', $data);
    }

    public function AddCourse(){
        return view('backend.gestion.course_list.add_list');
    }

    public function StoreCourse(Request $request){
        $data = new Course();
        $data -> titre = $request -> titre;
        $data -> description = $request -> description;
        $data -> session_url = $request -> session_url;
        $data->save();

        $notification = array(
            'message' => 'Course Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admincourse.view')->with($notification);
    }

    public function EditCourse($id){
        $editData = Course::find($id);
        return view('backend.gestion.course_list.edit_list', compact('editData'));
    }

    public function UpdateCourse(Request $request, $id){
        $data = Course::find($id);
        $data -> titre = $request -> titre;
        $data -> description = $request -> description;
        $data -> session_url = $request -> session_url;
        $data->save();

        $notification = array(
            'message' => 'Course Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admincourse.view')->with($notification);
    }

    public function DeleteCourse($id){
        $course = Course::find($id);
        $course -> delete();

        $notification = array(
            'message' => 'Course Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admincourse.view')->with($notification);
    }
}
