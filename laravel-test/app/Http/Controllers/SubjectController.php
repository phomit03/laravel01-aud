<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function listSubjects(Request $request){
        $paramName = $request->get('subjectName'); //name input search

        $subject = Subject::SubjectFilter($paramName)->simplePaginate(6);

//        dd($subject);

        return view('pages.tables.listSubjects', [
            'subject' => $subject,
        ]);
    }

    public function subjectForm(){
        return view('pages.forms.subject-forms.subject-create');
    }

    public function subjectCreate(Request $request){
        Subject::create(
            [
                'subjectID'=>$request->get('subjectID'),    //name input
                'subjectName'=>$request->get('subjectName')
            ]
        );
        return redirect()->to('/subjects-list');    //điều hướng về list
    }

}
