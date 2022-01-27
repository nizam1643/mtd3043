<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\M5AssigmentController;
use App\Http\Controllers\M6SubmitController;
use App\Http\Controllers\M8ParentController;
use App\Http\Controllers\M9StudentController;
use App\Http\Controllers\SubjectListController;

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

Route::get('register', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('verify', [AuthController::class, 'verify'])->name('verify');
Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('send-link', [AuthController::class, 'sendLink'])->name('sendLink');
Route::get('login-verify', [AuthController::class, 'login'])->name('loginVerify');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


//USER
Route::group(['middleware' => 'auth'], function () {

    Route::view('M1/Year','livewire.year.year-home')->name('m1');
    Route::view('M2/Group','livewire.group.group-home')->name('m2');
    Route::view('M3/Subject','livewire.subject.subject-home')->name('m3');
    Route::view('M4/User','livewire.user.user-home')->name('m4');

    Route::get('home', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('parent', [AuthController::class, 'dashboardparent'])->name('dashboardparent');
    Route::post('parent/store', [M8ParentController::class, 'parentstore'])->name('parentstore');
    Route::get('parent/list', [M8ParentController::class, 'parent'])->name('parent');

    Route::get('student', [M9StudentController::class, 'student'])->name('student');
    Route::post('student/store', [M9StudentController::class, 'studentstore'])->name('studentstore');
    Route::get('student/list', [M9StudentController::class, 'studentlist'])->name('studentlist');

    Route::group(['prefix' => 'Subject', 'as' => 'subject.'], function () {
        Route::get('/list/{id}', [SubjectListController::class, 'show'])->name('note.show');
        Route::post('/list/{id}/virtual', [SubjectListController::class, 'virtual'])->name('note.virtual');
        Route::post('/list/store', [SubjectListController::class, 'store'])->name('note.store');
        Route::post('/list/{id}/edit', [SubjectListController::class, 'edit'])->name('note.edit');
        Route::delete('/list/{id}/destroy', [SubjectListController::class, 'destroy'])->name('note.destroy');
    });

    Route::group(['prefix' => 'Assignment', 'as' => 'assignment.'], function () {
        Route::post('/list/store', [M5AssigmentController::class, 'store'])->name('store');
        Route::post('/list/{id}/edit', [M5AssigmentController::class, 'edit'])->name('edit');
        Route::delete('/list/{id}/destroy', [M5AssigmentController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'Submit', 'as' => 'submit.'], function () {
        Route::post('/list/store', [M6SubmitController::class, 'store'])->name('store');
        Route::post('/list/{id}/edit', [M6SubmitController::class, 'edit'])->name('edit');
        Route::delete('/list/{id}/destroy', [M6SubmitController::class, 'destroy'])->name('destroy');
    });


});

// Admin
// Route::group(['middleware' => 'InnosysAdmin'], function () {

//     Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

//         Route::get('/dashboard', [AdminController::class, 'admindashboard'])->name('admindashboard');
//         Route::get('/evaluation/list', [AdminController::class, 'studentlist'])->name('studentlist');
//         Route::get('/jury/list', [AdminController::class, 'jurylist'])->name('jurylist');
//         Route::get('/evaluationlist/pending', [AdminController::class, 'evaluationlist1'])->name('evaluationlist1');
//         Route::get('/evaluationlist/progress', [AdminController::class, 'evaluationlist2'])->name('evaluationlist2');
//         Route::get('/evaluationlist/success', [AdminController::class, 'evaluationlist3'])->name('evaluationlist3');
//         Route::get('/nominate/list', [AdminController::class, 'nominatelist'])->name('nominatelist');
//         Route::get('/topaward/list', [AdminController::class, 'topaward'])->name('topaward');
//         Route::get('/allwinner/list', [AdminController::class, 'allwinner'])->name('allwinner');
//         Route::get('/categoryresult/{categorymenu}', [AdminController::class, 'categoryresult'])->name('categoryresult');
//         Route::get('/setting', [AdminController::class, 'setting'])->name('setting');
//         Route::post('setting/threshold/store/', [AdminController::class, 'threshold'])->name('threshold');
//     });

// });
