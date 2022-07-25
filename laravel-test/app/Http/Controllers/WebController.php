<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    //home
    public function aboutUs(){
        return view('about-us');
    }

}
