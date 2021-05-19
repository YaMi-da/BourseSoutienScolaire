<?php

namespace App\Http\Controllers\Formatteur;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursFormatteurController extends Controller
{
    public function MesCoursView(){
        //$allData = Course::all();
        $data['allData'] = Course::all();
        return view('backend.gestion.course_list.view_list', $data);
    }

    public function AddMesCours(){
        return view('backend.gestion.course_list.add_list');
    }

    public function StoreMesCours(Request $request){
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

    public function EditMesCours($id){
        $editData = Course::find($id);
        return view('backend.gestion.course_list.edit_list', compact('editData'));
    }

    public function UpdateMesCours(Request $request, $id){
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

    public function DeleteMesCours($id){
        $course = Course::find($id);
        $course -> delete();

        $notification = array(
            'message' => 'Course Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admincourse.view')->with($notification);
    }
}
