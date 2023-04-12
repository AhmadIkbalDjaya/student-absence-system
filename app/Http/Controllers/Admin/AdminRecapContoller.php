<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\StudentAttendance;
use App\Http\Controllers\Controller;

class AdminRecapContoller extends Controller
{
    public function index()
    {
        return view("admin.recap.index", [
            "title" => "Rekap Absensi",
            "courses" => Course::where("semester_id", $this->active_semester->id)->get(),
        ]);
    }

    public function recapCourse(Course $course)
    {
        // ambil semua siswa di course itu
        $students = Student::where('claass_id', $course->claass->id)->get();
        // ambil semua studentAttendance di course itu
        $attendances_id = Attendance::where("course_id", $course->id)->pluck("id");
        // dd(count($attendances_id));
        $student_attendances = StudentAttendance::whereIn("attendance_id", $attendances_id)->get();
        // dd($student_attendances);
        return view("user.recap.course-recap", [
            "title" => "Rekap Mapel",
            "course" => $course,
            "students" => $students,
            "student_attendances" => $student_attendances,
            "attendances_count" => count($attendances_id),
        ]);
    }
}
