<?php

namespace App\Http\Controllers\Backend\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function CourseView(){
        //$allData = Course::all();
        $data['allData'] = Course::all();
        return view('backend.gestion.course_list.view_list', $data);
    }

    public function AddCourse(){
        $matieres = Matiere::all();
        $niveaux = Niveau::all();
        $users = User::where('user_type_id', '3')->get();
        return view('backend.gestion.course_list.add_list')->with('matieres', $matieres)->with('users', $users)->with('niveaux', $niveaux);
    }

    public function StoreCourse(Request $request){
        $data = new Course();
        $data -> titre = $request -> titre;
        $data -> matiere_id = $request -> matiere_id;
        $data -> description = $request -> description;
        $data -> user_id = $request -> user_id;
        $data -> niveau_id = $request -> niveau_id;
        $data -> view_count = $request -> view_count;
        $data -> enrolled_count = $request -> enrolled_count;
        $data -> session_url = $request -> session_url;
        if ($request->hasFile('photo')) {
            $file = $request -> file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move(public_path('upload/cours_img'), $filename);
            $data->photo = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Course Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admincourse.view')->with($notification);
    }

    public function ShowCours($id){
        $showData = Course::find($id);
        return view('showcours.showcours_admin', compact('showData'));
    }


    public function EditCourse($id){
        $matieres = Matiere::all();
        $niveaux = Niveau::all();
        $users = User::where('user_type_id', '3')->get();
        $editData = Course::find($id);
        return view('backend.gestion.course_list.edit_list', compact('editData'))->with('matieres', $matieres)->with('users', $users)->with('niveaux', $niveaux);
    }

    public function UpdateCourse(Request $request, $id){
        $data = Course::find($id);
        $data -> titre = $request -> titre;
        $data -> matiere_id = $request -> matiere_id;
        $data -> description = $request -> description;
        $data -> user_id = $request -> user_id;
        $data -> niveau_id = $request -> niveau_id;
        $data -> view_count = $request -> view_count;
        $data -> enrolled_count = $request -> enrolled_count;
        $data -> session_url = $request -> session_url;
        if ($request->hasFile('photo')) {
            $file = $request -> file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move(public_path('upload/cours_img'), $filename);
            $data->photo = $filename;
        }
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

    public function CourseView2(){
        //$allData = Course::all();
        $data['allData'] = Course::all();
        return view('formatteur.cours.touslescours_formatteur_view', $data);
    }

    public function CourseView3(){
        //$allData = Course::all();
        $data['allData'] = Course::all();
        $users = User::where('user_type_id', '3')->get();
        return view('formatteur.cours.cours_formatteur_view', $data)->with('users', $users);
    }

    public function ShowCours2($id){
        $showData = Course::find($id);
        return view('showcours.showcours_formatteur', compact('showData'));
    }

    
}
