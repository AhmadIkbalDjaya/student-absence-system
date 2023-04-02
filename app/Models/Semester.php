<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function course () {
        return $this->hasMany(Course::class);
    }

    public function attendance () {
        return $this->hasMany(Attendance::class);
    }
}
