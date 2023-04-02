<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function claass () {
        return $this->belongsTo(claass::class);
    }

    

    public function course_student () {
        return $this->hasMany(CourseStudent::class);
    }

    public function student_attendance () {
        return $this->hasMany(StudentAttendance::class);
    }
}
