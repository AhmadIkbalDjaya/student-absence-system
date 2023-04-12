<?php

namespace App\Http\Controllers;

use App\Models\Claass;
use App\Models\Course;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\CourseStudent;
use App\Models\StudentAttendance;

class AttendanceController extends Controller
{
    public function userCourse()
    {
        return view("user.claass.user-course", [
            "title" => "Mata Pelajaran",
            "IPAclaasses" => Claass::where("major", "IPA")->orderBy("class_level")->get(),
            "IPSclaasses" => Claass::where("major", "IPS")->orderBy("class_level")->get(),
            "active_semester_id" => $this->active_semester->id,
        ]);
    }

    public function courseAttendance(Course $course)
    {
        return view("user.claass.course-attendance", [
            "title" => "Absensi Kelas",
            "course" => $course,
            "attendances" => Attendance::where("course_id", $course->id)->get(),
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
        $attendance = Attendance::create($validated);

        // ambil semua id siswa di course itu (bisa menggunakan class id yag sma dengan class id di tabel course dan student)
        $students_id = Student::where("claass_id", $course->claass_id)->pluck("id");
        // isi semua id student ke dalam table student_attendances
        // dengan attendance_id di atas dan status 0 
        foreach ($students_id as $student) {
            StudentAttendance::create([
                "attendance_id" => $attendance->id,
                "student_id" => $student,
                "status" => "0"
            ]);
        }
        return redirect("/class/course/$course->id");
    }

    public function attendance(Course $course, Attendance $attendance)
    {
        // ambil data dari student_attendance yg id attendancenya sama dengan id attendance di atas
        // kirim ke dalam view
        $student_attendances = StudentAttendance::where("attendance_id", $attendance->id)->get();
        $students_id = CourseStudent::where('course_id', $course->id)->pluck('student_id');
        $students = Student::whereIn('id', $students_id)->get();
        
        return view("user.claass.attendance", [
            "title" => "Absen Kehadiran",
            "students" => $students,
            "course" => $course,
            "attendance" => $attendance,
            "student_attendaces" => $student_attendances,
        ]);
    }
    
    public function storeStudentAttendance(Request $request, Course $course, Attendance $attendance)
    {
        $validated = $request->validate([
            "id" => "required|array",
            "statuses" => "required|array",
        ]);

        foreach ($validated["id"] as $key => $student_attendance_id) {
            $student_attendance = [];
            $student_attendance["status"] = $validated["statuses"][$key];
            StudentAttendance::where("id", $student_attendance_id)->update($student_attendance);
        }
        Attendance::where("id", $attendance->id)->update([
            "is_filled" => "1",
        ]);
        return redirect("/class/course/$course->id");
    }
}
