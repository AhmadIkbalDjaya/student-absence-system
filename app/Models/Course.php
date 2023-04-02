<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function claass () {
        return $this->belongsTo(Claass::class);
    }

    public function teacher () {
        return $this->belongsTo(Teacher::class);
    }

    public function semester () {
        return $this->belongsTo(Semester::class);
    }


    
    public function course_student () {
        return $this->hasMany(CourseStudent::class);
    }

    public function attendance () {
        return $this->hasMany(Attendance::class);
    }
}
