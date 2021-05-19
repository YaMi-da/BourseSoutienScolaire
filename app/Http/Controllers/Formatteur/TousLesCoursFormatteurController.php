<?php

namespace App\Http\Controllers\Formatteur;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class TousLesCoursFormatteurController extends Controller
{
    public function TousLesCoursView(){
        //$allData = Course::all();
        $data['allData'] = Course::all();
        return view('formatteur.touslescours_formatteur_view', $data);
    }
}
