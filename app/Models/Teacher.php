<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status',
    ];

    public function assignCourses()
    {
        return $this->hasMany(AssignCourse::class,'id', 'teacher_id');
    }

    public function assignTeachers()
    {
        return $this->hasMany(AssignTeacher::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


}
