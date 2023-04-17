<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('about.index', [
            "title" => "Tentang Kami",
            "abouts" => About::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('about.create', [
            "title" => "Tambah Tentang Kami"
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
            "description" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg",
        ]);
        $validated['image'] = $request->file('image')->store('about');
        About::create($validated);
        return redirect()->route('about.index')->with('success', "Data Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('about.edit', [
            "title" => "Edit Tentang Kami",
            "about" => $about,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $validated = $request->validate([
            "description" => "required",
            "image" => "image|mimes:jpeg,png,jpg",
        ]);
        if($request->image){
            Storage::delete($request->old_image);
            $validated['image'] = $request->file('image')->store('about');

        }
        $about->update($validated);
        return redirect()->route('about.index')->with('success', "Data Berhasil Diedit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        Storage::delete($about->image);
        $about->delete();
        return redirect()->route('about.index')->with('success', "Data Berhasil Dihapus");
    }
}
