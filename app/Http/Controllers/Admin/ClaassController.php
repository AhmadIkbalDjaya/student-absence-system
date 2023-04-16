<?php

namespace App\Http\Controllers\Admin;

use App\Models\Claass;
use App\Models\Course;
use Illuminate\Http\Request;
use PhpParser\Builder\Class_;
use App\Http\Controllers\Controller;

class ClaassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.claass.index", [
            "title" => "Kelas",
            "claasses" => Claass::orderBy("class_level")->orderBy("major")->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.claass.create", [
            "title" => "Tambah kelas",
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
            "major" => "required|in:IPA,IPS",
            "class_level" => "required|in:10,11,12",
            "class_name" => "required",
        ]);
        Claass::create($validated);
        // return redirect('/admin/claass')->with('success', "Kelas Berhasil Ditambahkan");
        return redirect()->route('admin.claass.index')->with("success", "Kelas Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Claass  $claass
     * @return \Illuminate\Http\Response
     */
    public function show(Claass $claass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Claass  $claass
     * @return \Illuminate\Http\Response
     */
    public function edit(Claass $claass)
    {
        return view("admin.claass.edit", [
            "title" => "Edit Kelas",
            "claass" => $claass,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Claass  $claass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Claass $claass)
    {
        $validated = $request->validate([
            "major" => "required|in:IPA,IPS",
            "class_level" => "required|in:10,11,12",
            "class_name" => "required",
        ]);
        $claass->update($validated);
        // return redirect('/admin/claass')->with('success', "Kelas Berhasil Di Update");
        return redirect()->route('admin.claass.index')->with("success", "Kelas Berhasil Diedit");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Claass  $claass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claass $claass)
    {
        $use_count = Course::where("claass_id", $claass->id)->count();
        if($use_count > 0){
            return back()->with('failed', "Kelas tidak dapat dihapus karena digunakan di $use_count Mata Pelajaran");
        }
        $claass->delete();
        // return redirect('/admin/claass')->with('success', "Kelas Berhasil Dihapus");
        return redirect()->route('admin.claass.index')->with("success", "Kelas Berhasil Dihapus");
    }
}
