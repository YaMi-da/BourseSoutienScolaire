<?php

namespace App\Http\Controllers\Backend\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Niveau;
use Illuminate\Http\Request;

class NiveauxController extends Controller
{
    public function ViewNiveau(){
        //$allData = Course::all();
        $data['allData'] = Niveau::all();
        return view('backend.gestion.niveaux_list.view_list', $data);
    }

    public function AddNiveau(){
        return view('backend.gestion.niveaux_list.add_list');
    }

    public function StoreNiveau(Request $request){
        $data = new Niveau();
        $data -> name = $request -> name;
        $data -> view_count = $request -> view_count;
        $data->save();

        $notification = array(
            'message' => 'Niveau Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('adminniveau.view')->with($notification);
    }

    public function EditNiveau($id){
        $editData = Niveau::find($id);
        return view('backend.gestion.niveaux_list.edit_list', compact('editData'));
    }

    public function UpdateNiveau(Request $request, $id){
        $data = Niveau::find($id);
        $data -> name = $request -> name;
        $data -> view_count = $request -> view_count;
        $data->save();

        $notification = array(
            'message' => 'Niveau Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('adminniveau.view')->with($notification);
    }

    public function DeleteNiveau($id){
        $course = Niveau::find($id);
        $course -> delete();

        $notification = array(
            'message' => 'Niveau Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('adminniveau.view')->with($notification);
    }
}
