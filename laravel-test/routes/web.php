<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ScoresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//home
Route::get('/about', [WebController::class, 'aboutUs']); //about la link dan sau url

//routing form
Route::get('/classes-create', [ClassesController::class, 'classesForm']);   //hiển thị giao diện
Route::post('/classes-create', [ClassesController::class, 'classesCreate']);    //post dữ liệu từ input

Route::get('/student-create', [StudentController::class, 'studentForm']);
Route::post('/student-create', [StudentController::class, 'studentCreate']);

Route::get('/subject-create', [SubjectController::class, 'subjectForm']);
Route::post('/subject-create', [SubjectController::class, 'subjectCreate']);

Route::get('/score-create', [ScoresController::class, 'scoreForm']);
Route::post('/score-create', [ScoresController::class, 'scoreCreate']);


Route::get('/classes-edit', [WebController::class, 'classesEdit']);
Route::get('/student-edit', [WebController::class, 'studentEdit']);
Route::get('/subject-edit', [WebController::class, 'subjectEdit']);
Route::get('/score-edit', [WebController::class, 'scoreEdit']);

//routing tables
Route::get('/classes-list', [ClassesController::class, 'listClasses']);
Route::get('/students-list', [StudentController::class, 'listStudents']);
Route::get('/subjects-list', [SubjectController::class, 'listSubjects']);
Route::get('/scores-list', [ScoresController::class, 'listScores']);


