<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function listStudents() {

        //get all array, phân trang
        $students = Student::simplePaginate(6); //get all array, phân trang

        return view('pages.tables.listStudents', [
            'students' => $students
        ]);

    }
}
