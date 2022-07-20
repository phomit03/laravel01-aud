<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    //home
    public function aboutUs(){
        return view('about-us');
    }

    //form
    public function classesEdit(){
        return view('pages.forms.classes-forms.classes-edit');
    }

    public function studentEdit(){
        return view('pages.forms.student-forms.student-edit');
    }

    public function subjectEdit(){
        return view('pages.forms.subject-forms.subject-edit');
    }

    public function scoreEdit(){
        return view('pages.forms.score-forms.score-edit');
    }


}
