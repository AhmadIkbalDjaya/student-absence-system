<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Claass;
use App\Models\CourseStudent;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.student.index", [
            "title" => "Siswa",
            "students" => Student::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.student.create", [
            "title" => "Tambah Siswa",
            "claasses" => Claass::all(),
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
            "name" => "required",
            "nis" => "required|unique:students",
            "gender" => "required|in:Laki-laki,Perempuan",
            "parent_phone" => "required|numeric|digits_between:10,12",
            "claass_id" => "required|exists:claasses,id"
        ]);
        Student::create($validated);
        // return redirect('/admin/student')->with('success', "Siswa Berhasil Di Tambahkan");
        return redirect()->route('admin.student.index')->with("success", "Siswa Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view("admin.student.show", [
            "title" => "Detail Siswa",
            "student" => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view("admin.student.edit", [
            "title" => "Detail Siswa",
            "student" => $student,
            "claasses" => Claass::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            "nis" => "required|unique:students,nis,$student->id",
            "name" => "required",
            "gender" => "required|in:Laki-laki,Perempuan",
            "parent_phone" => "required|numeric|digits_between:10,12",
            "claass_id" => "required|exists:claasses,id"
        ]);
        $student->update($validated);
        // return redirect('/admin/student')->with('success', "Siswa Berhasil Di Update");
        return redirect()->route('admin.student.index')->with("success", "Siswa Berhasil Diedit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        CourseStudent::where("student_id", $student->id)->delete();
        $student->delete();
        // return redirect('admin/student')->with('success', "Siswa Berhasil Di Hapus");
        return redirect()->route('admin.student.index')->with("success", "Siswa Berhasil Dihapus");
    }
}
