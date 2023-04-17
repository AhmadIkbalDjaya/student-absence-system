<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("guide.index", [
            "title" => "Panduan Pengguna",
            "guides" => Guide::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("guide.create", [
            "title" => "Tmbah Panduan Pengguna",
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
            "file" => "required|mimes:pdf",
        ]);
        $validated["file"] = $request->file("file")->store("guide");
        Guide::create($validated);
        return redirect()->route("guide.index")->with("success", "Data Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function show(Guide $guide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function edit(Guide $guide)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guide $guide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guide  $guide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guide $guide)
    {
        Storage::delete($guide->file);
        $guide->delete();
        return redirect()->route('guide.index')->with('success', "Data Berhasil Dihapus");
    }
}
