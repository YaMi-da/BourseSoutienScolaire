<?php

namespace App\Http\Controllers\Backend\Gestion;

use App\Http\Controllers\Controller;
use App\Models\Eleves;
use Illuminate\Http\Request;

class StudentsListController extends Controller
{
    public function ViewStudent(){
        $data['allData'] = Eleves::all();
        return view('backend.gestion.liste_eleves.view_list', $data);
    }
}
