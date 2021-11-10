<?php

namespace App\Http\Livewire;

use App\Models\AssignCourse;
use App\Models\Course;
use App\Models\Schedule;
use Livewire\Component;
use Livewire\WithPagination;
class DisplaySchedule extends Component
{
    use WithPagination;
    public $addSchedule = false;
    public $editSchedule = false;
    public $assignId, $startTime, $endTime, $day;

    public function scheduleAdd(){
   
        // dd($this->courseId);
        Schedule::create([
            'assign_course_id' => $this->assignId,
            'day' => $this->day, 
            'start_time' => $this->startTime,
            'end_time'=> $this->endTime
        ]);
        return redirect()->route('schedule');
    }
    public function render()
    {
        $assign= AssignCourse::all();
        $courses = Course::all();
        // dd($courses);
        $schedules = Schedule::paginate(5);
        return view('livewire.display-schedule', [
            'courses' => $courses,
            'schedules' => $schedules,
            'assign' => $assign,
        ]);
    }
}
