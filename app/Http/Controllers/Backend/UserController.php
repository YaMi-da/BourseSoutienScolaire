<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserView(){
        //$allData = User::all();
        $data['allData'] = User::all();
        return view('backend.user.view_user', $data);
    }

    public function AddUser(){
        return view('backend.user.add_user');
    }

    public function StoreUser(Request $request){
        $validatedData = $request->validate([
            'email' =>  'required|unique:users',
            'name' => 'required',

        ]);

        $data = new User();
        $data -> user_type = $request -> role;
        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data -> password = bcrypt($request -> password);
        $data->save();

        $notification = array(
            'message' => 'User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('users.view')->with($notification);
    }

    public function EditUser($id){
        $editData = User::find($id);
        return view('backend.user.edit_user', compact('editData'));
    }

    public function UpdateUser(Request $request, $id){
        $data = User::find($id);
        $data -> user_type = $request -> role;
        $data -> name = $request -> name;
        $data -> email = $request -> email;
        $data->save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('users.view')->with($notification);
    }

    public function DeleteUser($id){
        $user = User::find($id);
        $user -> delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('users.view')->with($notification);
    }
}
