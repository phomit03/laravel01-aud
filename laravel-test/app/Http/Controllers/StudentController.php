<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function listStudents(Request $request) {
/*
        //Classes::query()->getQuery()->from: lấy ra bảng table
        $classTable = Classes::query()->getQuery()->from;
        $studentTable = Student::query()->getQuery()->from;

        //lấy tên hiển thị thay cho ID theo kiểu truy vấn database
        $student = Student::leftJoin($classTable, $studentTable.'.classID', '=', $classTable.'.classID')
            ->SELECT($studentTable.'.*', $classTable.'.className as className', $classTable.'.classRoom')
            ->simplePaginate(6); //get all array, phân trang
*/

        $paramName = $request->get('name'); //name input search
        $paramclassID = $request->get('classID'); //name combobox
        $paramBirthStart = $request->get('birth_start');
        $paramBirthEnd = $request->get('birth_end');

        //with: tra ve 1 OBJECT trong relationship, nghia la nhieu student 'chi' tra ve 1 class (obj)...
        //simplePaginate(6): phan trang,  get all database
        //ClassFilter, Filter là func của controller, bỏ scope (khoá phạm vi)
        $student = Student::ClassFilter($paramclassID)
            ->BirthdayFrom($paramBirthStart)
            ->BirthdayTo($paramBirthEnd)
            ->Filter($paramName)
            ->with('getClasses')
            ->simplePaginate(6);

        //dd($student);   //dump();die();

        $classesList = Classes::all();
        return view('pages.tables.listStudents', [
            'student' => $student,
            'classesList'=> $classesList
        ]);
    }

    public function studentForm(){
        $classesList = Classes::all();
        return view('pages.forms.student-forms.student-create', [
            'classesList'=>$classesList
        ]);
    }

    protected function studentCreate(Request $request){
//        dd($request->all());
        Student::create(
            [
                'studentID'=>$request->get('studentID'),    //name input
                'studentName'=>$request->get('studentName'),
                'birthday'=>$request->get('birthday'),
                'classID'=>$request->get('classID')
            ]
        );
//        die('done');
        return redirect()->to('/students-list');    //điều hướng về list
    }
}
