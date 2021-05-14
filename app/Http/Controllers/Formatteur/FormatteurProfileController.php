<?php

namespace App\Http\Controllers\Formatteur;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FormatteurProfileController extends Controller
{
    public function FormatteurProfileView(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('formatteur.profile.view_profile', compact('user'));
    }

    public function FormatteurProfileEdit(){
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('formatteur.profile.edit_profile',compact('editData'));
    }

    public function FormatteurProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->matiere_formatteur = $request->matiere_formatteur;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_img/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_img'), $filename);
            $data['image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('formatteurprofile.view')->with($notification);
    }

    public function FormatteurPasswordView(){
        return view('formatteur.profile.edit_password');
    }

    public function FormatteurPasswordUpdate(Request $request){
        $validatedData = $request->validate([
            'oldPassword' =>  'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else {
            return redirect()->back();
        }
    }
}
