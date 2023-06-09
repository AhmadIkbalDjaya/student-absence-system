<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.teacher.index", [
            "title" => "Guru",
            "teachers" => Teacher::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.teacher.create", [
            "title" => "Tambah Guru",
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
            "username" => "required|unique:users|min:3",
            "password" => "required|min:8",
            "name" => "required|min:3",
            "email" => "required|email|unique:users",
            "phone" => "required|numeric|digits_between:10,12",
            "gender" => "required|in:Laki-laki,Perempuan",
        ]);
        // dd("Valid");
        $validated["password"] = Hash::make($validated["password"]);
        $new_user = [
            "username" => $validated["username"],
            "password" => $validated["password"],
            "name" => $validated["name"],
            "email" => $validated["email"],
        ];
        $user = User::create($new_user);
        $new_teacher = [
            "user_id" => $user->id,
            "phone" => $validated["phone"],
            "gender" => $validated["gender"],
        ];
        Teacher::create($new_teacher);
        // return redirect('/admin/teacher')->with('success', "Guru Berhasil Di Tambahkan");
        return redirect()->route('admin.teacher.index')->with("success", "Guru Berhasil Ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view("admin.teacher.show", [
            "title" => "Detail Guru",
            "teacher" => $teacher,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view("admin.teacher.edit", [
            "title" => "Edit Guru",
            "teacher" => $teacher,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $user_id = $teacher->user->id;
        $validated = $request->validate([
            "username" => "required|unique:users,username,$user_id",
            "password" => "nullable|min:8",
            "name" => "required",
            "email" => "required|email|unique:users,email,$user_id",
            "phone" => "required|numeric|digits_between:10,12",
            "gender" => "required|in:Laki-laki,Perempuan",
        ]);
        if($request->password){
            $validated["password"] = Hash::make($validated["password"]);
        }else if (!$request->password){
            unset($validated["password"]);
        }

        $update_user = [
            "username" => $validated["username"],
            "name" => $validated["name"],
            "email" => $validated["email"],
        ];
        if($request->password) {
            $update_user["password"] = $validated["password"];
        }

        User::where('id', $teacher->user->id)->update($update_user);

        $update_teacher = [
            "phone" => $validated["phone"],
            "gender" => $validated["gender"],
        ];
        $teacher->update($update_teacher);
        // return redirect('/admin/teacher')->with('success', "Guru Berhasil Di Update");
        return redirect()->route('admin.teacher.index')->with("success", "Guru Berhasil Diedit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $use_count = Course::where("teacher_id", $teacher->id)->count();
        if($use_count > 0){
            return back()->with('failed', "Guru tidak dapat dihapus karena digunakan di $use_count Mata Pelajaran");
        }
        $teacher->user->delete();
        $teacher->delete();
        // return redirect('/admin/teacher')->with('success', "Guru Berhasil Di Hapus");
        return redirect()->route('admin.teacher.index')->with("success", "Guru Berhasil Dihapus");
    }
}
