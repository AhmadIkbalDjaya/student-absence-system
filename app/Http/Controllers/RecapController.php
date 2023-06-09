<?php

namespace App\Http\Controllers;

use App\Models\Claass;
use App\Models\Course;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\StudentAttendance;

class RecapController extends Controller
{
    public function index()
    {
        return view("user.recap.index", [
            "title" => "Rekap Absensi",
            "IPAclaasses" => Claass::where("major", "IPA")->orderBy("class_level")->get(),
            "IPSclaasses" => Claass::where("major", "IPS")->orderBy("class_level")->get(),
            "active_semester_id" => $this->active_semester->id,
        ]);
    }

    public function courseRecap(Course $course)
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

    public function print(Course $course)
    {
        $students = Student::where('claass_id', $course->claass->id)->get();
        $attendances_id = Attendance::where("course_id", $course->id)->pluck("id");
        $student_attendances = StudentAttendance::whereIn("attendance_id", $attendances_id)->get();
        return view("user.recap.print", [
            "title" => "Rekap $course->course_name " . $course->claass->class_name,
            "course" => $course,
            "students" => $students,
            "student_attendances" => $student_attendances,
            "attendances_count" => count($attendances_id),
        ]);
    }
}
