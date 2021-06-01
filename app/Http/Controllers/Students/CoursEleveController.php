<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\CourseUser;
use App\Models\User;
use Illuminate\Http\Request;

class CoursEleveController extends Controller
{
    public function MesCoursView($id){
        //$allData = Course::all();
        $users = User::find($id);
        $courses = CourseUser::where('user_id', $id)->get();
        return view('students.cours.cours_eleve_view', $users)->with('courses', $courses)->with('users', $users);
    }
}
