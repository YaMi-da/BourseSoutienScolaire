<?php

namespace App\Http\Controllers\Backend\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function CourseUserView(){
        //$allData = Course::all();
        $data['allData'] = Item::all();
        return view('backend.gestion.items_list.view_list', $data);
    }

    public function AddItems(){
        return view('backend.gestion.items_list.add_list');
    }

    public function StoreItems(Request $request){
        $data = new Item();
        $data -> user_id = $request -> user_id;
        $data -> course_id = $request -> course_id;
        $data -> view_count = $request -> view_count;
        $data -> url = $request -> url;
        $data -> description = $request -> description;
        $data->save();

        $notification = array(
            'message' => 'Item Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('adminitem.view')->with($notification);
    }

    public function EditItems($id){
        $editData = Item::find($id);
        return view('backend.gestion.items_list.edit_list', compact('editData'));
    }

    public function UpdateItems(Request $request, $id){
        $data = Item::find($id);
        $data -> user_id = $request -> user_id;
        $data -> course_id = $request -> course_id;
        $data -> view_count = $request -> view_count;
        $data -> url = $request -> url;
        $data -> description = $request -> description;
        $data->save();

        $notification = array(
            'message' => 'Item Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('adminitem.view')->with($notification);
    }

    public function DeleteItems($id){
        $course = Item::find($id);
        $course -> delete();

        $notification = array(
            'message' => 'Item Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('adminitem.view')->with($notification);
    }
}
