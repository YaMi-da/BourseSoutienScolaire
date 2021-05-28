<?php

namespace App\Http\Controllers\Formatteur;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\User;
use Illuminate\Http\Request;

class CoursFormatteurController extends Controller
{
    public function MesCoursView($id){
        //$allData = Course::all();
        $users = User::find($id);
        $courses = Course::where('user_id', $id)->get();
        return view('formatteur.cours.cours_formatteur_view', $users)->with('courses', $courses)->with('users', $users);
    }

    public function AddMesCours(){
        $matieres = Matiere::all(); 
        $niveaux = Niveau::all();
        $users = User::where('user_type_id', '3')->get();
        return view('formatteur.cours.cours_formatteur_add')->with('matieres', $matieres)->with('users', $users)->with('niveaux', $niveaux);
    }

    public function StoreMesCours(Request $request, $id){
        $data = new Course();
        $user = User::find($id);
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

        return redirect()->route('coursformatteur.view', $user)->with($notification)->with('user',$user);
    }

    public function EditMesCours($id){
        $matieres = Matiere::all();
        $niveaux = Niveau::all();
        $users = User::where('user_type_id', '3')->get();
        $editData = Course::find($id);
        return view('formatteur.cours.cours_formatteur_view', compact('editData'))->with('matieres', $matieres)->with('users', $users)->with('niveaux', $niveaux);
    }

    public function UpdateMesCours(Request $request, $id){
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

        return redirect()->route('coursformatteur.view')->with($notification);
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

    public function ShowCours($id){
        $showData = Course::find($id);
        return view('showcours.showcours_formatteur', compact('showData'));
    }
}
