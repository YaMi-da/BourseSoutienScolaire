<?php

namespace App\Http\Controllers\Backend\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Eleves;
use Illuminate\Http\Request;

class StudentsListController extends Controller
{
    public function ViewStudent(){
        $data['allData'] = Eleves::all();
        return view('backend.gestion.liste_eleves.view_list', $data);
    }

    public function AddStudent(){
        return view('backend.gestion.liste_eleves.add_list');
    }

    public function StoreStudent(Request $request){
        $validatedData = $request->validate([
            'email' =>  'required|unique:eleves',
            'nom' => 'required|unique:eleves',

        ]);

        $data = new Eleves();
        $data->email = $request->email;
        $data->nom = $request->nom;
        $data->save();

        $notification = array(
            'message' => 'Student Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('students.list.view')->with($notification);
    }

    public function EditStudent($id){
        $editData = Eleves::find($id);
        return view('backend.gestion.liste_eleves.edit_list', compact('editData'));
    }

    public function UpdateStudent(Request $request, $id){
        $data = Eleves::find($id);

        $validatedData = $request->validate([
            'email' =>  'required|unique:eleves',
            'nom' => 'required|unique:eleves',

        ]);

        $data -> email = $request -> email;
        $data -> nom = $request -> nom;
        $data->save();

        $notification = array(
            'message' => 'Student Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('students.list.view')->with($notification);
    }

    public function DeleteStudent($id){
        $eleve = Eleves::find($id);
        $eleve -> delete();

        $notification = array(
            'message' => 'Student Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('students.list.view')->with($notification);
    }
}
