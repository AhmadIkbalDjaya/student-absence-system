<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SemesterController extends Controller
{

    public function changeSemester(Request $request)
    {
        Semester::query()->update(["is_active" => "0"]);
        Semester::where("id", $request->active_id)->update(["is_active" => "1"]);
        return back()->with("success", "Semester Aktif Berhasil Di Ubah");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.semester.index', [
            "title" => "Semester",
            "semesters" => Semester::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.semester.create", [
            "title" => "Tambah Semester",
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
            "start_year" => "required",
            "odd_even" => "required|in:1,2",
        ]);
        $validated["end_year"] = $validated["start_year"] + 1;

        Semester::create($validated);
        // return redirect('/admin/semester')->with('success', "Semester Berhasil Di Tambahkan");
        return redirect()->route('admin.semester.index')->with("success", "Semester Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semester  $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semester $semester)
    {
        $use_count = Course::where("claass_id", $semester->id)->count();
        if($use_count > 0){
            return back()->with('failed', "Semester tidak dapat dihapus karena digunakan");
        }
        if($semester->is_active == 1){
            return back()->with('failed', "Semester aktif tidak dapat dihapus");
        }
        $semester->delete();
        // return redirect('/admin/semester')->with('success', "Semester Berhasil Di Hapus");
        return redirect()->route('admin.semester.index')->with("success", "Semester Berhasil Dihapus");
    }
}
