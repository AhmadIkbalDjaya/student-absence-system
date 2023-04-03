<?php

namespace App\Http\Controllers\Admin;

use App\Models\Claass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Builder\Class_;

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
            "claasses" => Claass::all(),
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
            "claass_level" => "required|in:10,11,12",
            "claass_name" => "required|",
        ]);
        Claass::create($validated);
        return redirect('/admin/claass');
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
            '"claass' => $claass,
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
            "claass_level" => "required|in:10,11,12",
            "claass_name" => "required|",
        ]);
        $claass->update($validated);
        return redirect('/admin/claass');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Claass  $claass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Claass $claass)
    {
        $claass->delete();
        return redirect('/admin/claass');
    }
}
