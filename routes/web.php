<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Admin\ClaassController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\RecapController;

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
    return view('index', [
        "title" => "Absensi Sekolah"
    ]);
})->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'login')->name('login')->middleware('guest');
    Route::post('login', 'authenticate')->middleware('guest');
    Route::post('logout', 'logout')->middleware('auth');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('', function () { return redirect('/'); });
        Route::resource('semester', SemesterController::class)->except(["show", "edit", "update"]);
        Route::post("semester/change", [SemesterController::class, 'changeSemester']);
        Route::resource('teacher', TeacherController::class);
        Route::resource('claass', ClaassController::class)->except(["show"]);
        Route::resource('student', StudentController::class);
        Route::resource('course', CourseController::class);
    });
});

Route::get('/class', [AttendanceController::class, 'userCourse']);
Route::get('/class/course/{course}', [AttendanceController::class, 'courseAttendance']);
Route::get('/class/course/{course}/attendance/create', [AttendanceController::class, 'createAttendance']);
Route::post('/class/course/{course}/attendance', [AttendanceController::class, 'storeAttendance']);
Route::get('/class/course/{course}/attendance/{attendance}', [AttendanceController::class, 'attendance']);
Route::post('/class/course/{course}/attendance/{attendance}', [AttendanceController::class, 'storeStudentAttendance']);

Route::get('/recap', [RecapController::class, 'index']);
Route::get('/recap/course/{course}', [RecapController::class, 'courseRecap']);