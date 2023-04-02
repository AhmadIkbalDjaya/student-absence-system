<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claass extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function course () {
        return $this->hasMany(Course::class);
    }

    public function student () {
        return $this->hasMany(Student::class);
    }
}
