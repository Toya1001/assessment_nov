<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
       'assign_course_id',	'start_time','end_time', 'day',
    ];

    public function assignCourse(){
      return $this->belongsTo(AssignCourse::class);
    }
}
