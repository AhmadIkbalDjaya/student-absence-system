<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\ClaassController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\SemesterController;

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

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'authenticate');
    Route::post('logout', 'logout');
});

Route::prefix('admin')->group(function () {
    Route::resource('semester', SemesterController::class)->except(["show", "edit", "update"]);
    Route::resource('teacher', TeacherController::class);
    Route::resource('claass', ClaassController::class)->except(["show"]);
    Route::resource('student', StudentController::class);
    Route::resource('course', CourseController::class);
});