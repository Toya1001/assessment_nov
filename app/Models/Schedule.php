<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
       'course_id',	'start_time','end_time', 'day',
    ];

    public function course(){
      return $this->belongsTo(Course::class);
    }
}
