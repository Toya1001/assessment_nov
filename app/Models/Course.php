<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_nm',
    ];

    public function assignCourse(){
        return $this->hasMany(Course::class);
    }

    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
    
}
