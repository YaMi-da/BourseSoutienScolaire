<?php

namespace App\Http\Controllers\Backend\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Matiere;
use Illuminate\Http\Request;

class MatieresController extends Controller
{
    public function ViewMatiere(){
        //$allData = Course::all();
        $data['allData'] = Matiere::all();
        return view('backend.gestion.matieres_list.view_list', $data);
    }

    public function AddMatiere(){
        return view('backend.gestion.matieres_list.add_list');
    }

    public function StoreMatiere(Request $request){
        $data = new Matiere();
        $data -> name = $request -> name;
        $data -> view_count = $request -> view_count;

        if ($request->hasFile('image')) {
            $file = $request -> file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move(public_path('upload/matiere_img'), $filename);
            $data->image = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Matiere Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('adminmatiere.view')->with($notification);
    }

    public function EditMatiere($id){
        $editData = Matiere::find($id);
        return view('backend.gestion.matieres_list.edit_list', compact('editData'));
    }

    public function UpdateMatiere(Request $request, $id){
        $data = Matiere::find($id);
        $data -> name = $request -> name;
        $data -> view_count = $request -> view_count;
        
        if ($request->hasFile('image')) {
            $file = $request -> file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move(public_path('upload/matiere_img'), $filename);
            $data->image = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Matiere Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('adminmatiere.view')->with($notification);
    }

    public function DeleteMatiere($id){
        $course = Matiere::find($id);
        $course -> delete();

        $notification = array(
            'message' => 'Matiere Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('adminmatiere.view')->with($notification);
    }
}
