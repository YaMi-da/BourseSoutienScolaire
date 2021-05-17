<?php

namespace App\Http\Controllers\Backend\Gestion;

use App\Http\Controllers\Controller;
use App\Models\View;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function ViewViews(){
        //$allData = Course::all();
        $data['allData'] = View::all();
        return view('backend.gestion.views_list.view_list', $data);
    }

    public function AddViews(){
        return view('backend.gestion.views_list.add_list');
    }

    public function StoreViews(Request $request){
        $data = new View();
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
        $editData = View::find($id);
        return view('backend.gestion.views_list.edit_list', compact('editData'));
    }

    public function UpdateViews(Request $request, $id){
        $data = View::find($id);
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
        $course = View::find($id);
        $course -> delete();

        $notification = array(
            'message' => 'View Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('adminview.view')->with($notification);
    }
}
