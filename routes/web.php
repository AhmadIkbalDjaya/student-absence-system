<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecapController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Admin\ClaassController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\AdminRecapContoller;

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
})->name('home')->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'login')->name('login')->middleware('guest');
    Route::post('login', 'authenticate')->name('login.store')->middleware('guest');
    Route::post('logout', 'logout')->name('logout')->middleware('auth');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('', function () { return redirect('/'); })->name('admin');
        Route::resource('semester', SemesterController::class)->except(["show", "edit", "update"])->names('admin.semester');
        Route::post("semester/change", [SemesterController::class, 'changeSemester'])->name('admin.semester.change');
        Route::resource('teacher', TeacherController::class)->names('admin.teacher');
        Route::resource('claass', ClaassController::class)->except(["show"])->names('admin.claass');
        Route::resource('student', StudentController::class)->names('admin.student');
        Route::resource('course', CourseController::class)->names('admin.course');

        Route::get('recap', [AdminRecapContoller::class, 'index'])->name('admin.recap.index');
        Route::get('recap/{course}', [AdminRecapContoller::class, 'recapCourse'])->name('admin.recap.course');
    });
});
Route::middleware(['auth', 'teacher'])->group(function () {
    Route::get('/class', [AttendanceController::class, 'userCourse'])->name('teacher.claass');
    Route::get('/class/course/{course}', [AttendanceController::class, 'courseAttendance'])->name('teacher.attendance');
    Route::get('/class/course/{course}/attendance/create', [AttendanceController::class, 'createAttendance'])->name('teacher.attendance.create');
    Route::post('/class/course/{course}/attendance', [AttendanceController::class, 'storeAttendance'])->name('teacher.attendance.store');
    Route::get('/class/course/{course}/attendance/{attendance}', [AttendanceController::class, 'attendance'])->name('teacher.student.attendance');
    Route::post('/class/course/{course}/attendance/{attendance}', [AttendanceController::class, 'storeStudentAttendance'])->name('teacher.student.attendance.store');
    Route::delete('/class/course/{course}/attendance/{attendance}', [AttendanceController::class, 'destroyStudentAbsence'])->name('teacher.student.attendance.destroy');

    Route::get('/recap', [RecapController::class, 'index'])->name('teacher.recap');
    Route::get('/recap/course/{course}', [RecapController::class, 'courseRecap'])->name('teacher.recap.course');
    
});

Route::get('/recap/print/course/{course}', [RecapController::class, 'print'])->name('print.recap')->middleware('auth');
Route::resource('about', AboutController::class);
Route::resource('guide', GuideController::class);