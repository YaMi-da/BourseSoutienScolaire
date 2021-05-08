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
        $data -> password = bcrypt($request -> role);
        $data->save();

        return redirect()->route('users.view');


    }
}
