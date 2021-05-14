<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $type = Auth::user()->user_type_id;

        if ($type == 1) {
            return view('admin.index');
        }

        else if ($type == 2) {
            return view('students.index');
        }

        else if ($type == 3) {
            return view('formatteur.index');
        }
    }
}
