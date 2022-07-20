<?php

namespace App\Http\Controllers;

use App\Models\Scores;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class ScoresController extends Controller
{
    public function listScores(Request $request){
        $paramResult = $request->get('result');
        $paramStudentID = $request->get('studentID'); //name combobox
        $paramSubjectID = $request->get('subjectID'); //name combobox

        $scores = Scores::ResultSearch($paramResult)
            ->StudentFilter($paramStudentID)
            ->SubjectFilter($paramSubjectID)
            ->simplePaginate(6);

        $studentsList = Student::all();
        $subjectsList = Subject::all();

        return view('pages.tables.listScores', [
            'scores' => $scores,
            'studentsList'=>$studentsList,
            'subjectsList'=>$subjectsList
        ]);

    }

    public function scoreForm(){
        $studentsList = Student::all();
        $subjectsList = Subject::all();

        return view('pages.forms.score-forms.score-create',[
            'studentsList'=>$studentsList,
            'subjectsList'=>$subjectsList
        ]);
    }

    public function scoreCreate(Request $request){
        Scores::create(
            [
                'score'=>$request->get('score'),    //name input
                'result'=>$request->get('result'),
                'studentID'=>$request->get('studentID'),
                'subjectID'=>$request->get('subjectID'),
            ]
        );
        return redirect()->to('/scores-list');  //điều hướng về list
    }
}
