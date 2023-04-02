<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function course () {
        return $this->belongsTo(Course::class);
    }

    public function semester () {
        return $this->belongsTo(Semester::class);
    }


    
    public function student_attendance () {
        return $this->hasMany(StudentAttendance::class);
    }
}
