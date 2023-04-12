<?php

namespace App\Http\Controllers\Admin;

use App\Models\Claass;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseStudent;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.course.index", [
            "title" => "Mata Pelajaran",
            "courses" => Course::where("semester_id", $this->active_semester->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.course.create", [
            "title" => "Tambah Mata Pelajaran",
            "claasses" => Claass::all(),
            "teachers" => Teacher::all(),
            "semesters" => Semester::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "course_name" => "required",
            "claass_id" => "required|exists:claasses,id",
            "teacher_id" => "required|exists:teachers,id",
            "semester_id" => "required|exists:semesters,id",
        ]);
        $course = Course::create($validated);

        $students_id = Student::where("claass_id", $request->claass_id)->pluck("id");
        foreach($students_id as $student_id) {
            CourseStudent::create([
                "course_id" => $course->id,
                "student_id" => $student_id,
            ]);
        }
        return redirect('/admin/course')->with('success', "Mata Pelajaran Berhasil Di Tambahkan");;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view("admin.course.show", [
            "title" => "Detail Mata Pelajaran",
            "course" => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view("admin.course.edit", [
            "title" => "Edit Mata Pelajaran",
            "course" => $course,
            "claasses" => Claass::all(),
            "teachers" => Teacher::all(),
            "semesters" => Semester::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            "course_name" => "required",
            "claass_id" => "required|exists:claasses,id",
            "teacher_id" => "required|exists:teachers,id",
            "semester_id" => "required|exists:semesters,id",
        ]);
        $course->update($validated);

        if($validated["claass_id"] != $request->claass_id_old){
            $students_id = Student::where('claass_id', $request->claass_id_old)->pluck('id');
            foreach ($students_id as $student_id) {
                CourseStudent::where('course_id', $course->id)->where('student_id', $student_id)->delete();
            }

            $new_students_id = Student::where('claass_id', $request->claass_id)->pluck('id');
            foreach($new_students_id as $student_id){
                CourseStudent::create([
                    "course_id" => $course->id,
                    "student_id" => $student_id,
                ]);
            }
        }

        return redirect('/admin/course')->with('success', "Mata Pelajaran Berhasil Di Update");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $students_id = Student::where('claass_id', $course->claass_id)->pluck('id');
        foreach ($students_id as $student_id) {
            CourseStudent::where('course_id', $course->id)->where('student_id', $student_id)->delete();
        }
        $course->delete();
        return redirect('/admin/course')->with('success', "Mata Pelajaran Berhasil Di Hapus");
    }
}
