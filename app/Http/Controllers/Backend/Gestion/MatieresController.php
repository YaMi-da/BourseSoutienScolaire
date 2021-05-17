<?php

namespace App\Http\Controllers\Backend\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Matiere;
use Illuminate\Http\Request;

class MatieresController extends Controller
{
    public function ViewMatieres(){
        //$allData = Course::all();
        $data['allData'] = Matiere::all();
        return view('backend.gestion.matieres_list.view_list', $data);
    }

    public function AddViews(){
        return view('backend.gestion.views_list.add_list');
    }

    public function StoreMatieres(Request $request){
        $data = new Matiere();
        $data -> user_id = $request -> user_id;
        $data -> matiere_id = $request -> matiere_id;
        $data -> niveau_id = $request -> niveau_id;
        $data -> course_id = $request -> course_id;
        $data -> item_id = $request ->item_id;
        $data->save();

        $notification = array(
            'message' => 'View Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('adminview.view')->with($notification);
    }

    public function EditViews($id){
        $editData = Matiere::find($id);
        return view('backend.gestion.views_list.edit_list', compact('editData'));
    }

    public function UpdateViews(Request $request, $id){
        $data = Matiere::find($id);
        $data -> user_id = $request -> user_id;
        $data -> matiere_id = $request -> matiere_id;
        $data -> niveau_id = $request -> niveau_id;
        $data -> course_id = $request -> course_id;
        $data -> item_id = $request ->item_id;
        $data->save();

        $notification = array(
            'message' => 'View Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('adminview.view')->with($notification);
    }

    public function DeleteViews($id){
        $course = Matiere::find($id);
        $course -> delete();

        $notification = array(
            'message' => 'View Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('adminview.view')->with($notification);
    }
}
