<?php
use App\Http\Controllers\WebController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//home user
Route::get('/about', [WebController::class, 'aboutUs']); //about la link dan sau url
