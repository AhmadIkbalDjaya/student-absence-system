<?php

namespace App\Http\Controllers;

use App\Models\Claass;
use App\Models\Course;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\CourseStudent;

class AttendanceController extends Controller
{
    public function userCourse()
    {
        return view("user.claass.user-course", [
            "title" => "Mata Pelajaran",
            "IPAclaasses" => Claass::where("major", "IPA")->orderBy("class_level")->get(),
            "IPSclaasses" => Claass::where("major", "IPS")->orderBy("class_level")->get(),
        ]);
    }

    public function courseAttendance(Course $course)
    {
        return view("user.claass.course-attendance", [
            "title" => "Absensi Kelas",
            "course" => $course,
            "attendances" => Attendance::where("course_id", $course->id)->latest()->get(),
        ]);
    }

    public function createAttendance(Course $course)
    {
        return view("user.claass.create-attendance", [
            "title" => "Buat Absensi",
            "course" => $course,
        ]);
    }

    public function storeAttendance(Course $course, Request $request)
    {
        $validated = $request->validate([
            "attendance_title" => "required|min:3",
            "attendance_date" => "required|date",
        ]);
        $validated["course_id"] = $course->id;
        $validated["semester_id"] = $course->semester->id;
        Attendance::create($validated);
        return redirect("/class/course/$course->id");
    }

    public function attendance(Course $course, Attendance $attendance)
    {
        $students_id = CourseStudent::where('course_id', $course->id)->pluck('student_id');
        $students = Student::whereIn('id', $students_id)->get();
        
        return view("user.claass.attendance", [
            "title" => "Absen Kehadiran",
            "students" => $students,
        ]);
    }
    
}
