<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function listClasses(){
        //$classes = Classes::all();    //lấy tất cả select * from

        //$classes = Classes::where('classID','LIKE', 'C8%')->get();  //lọc những ID có chữ C8 đầu tiên

//        $classes = Classes::orderBy('className', 'asc')
//            ->select('classID', 'className', 'classRoom', 'created_at', 'updated_at')
//            //->limit(5)  //lấy 5 thằng đầu
//            //->skip(5)   //bỏ qua 5 thằng đầu, lấy 5 thằng tiếp theo
//            ->get();

        //get all array, phân trang
        $classes = Classes::simplePaginate(6);    //paginate(6): mỗi trang 6 thằng

//        dd($classes); //dump();die();

        return view('pages.tables.listClasses', [
            'classes'=>$classes
        ]);

    }
}
