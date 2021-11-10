<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Schedule;
use Livewire\Component;
use Livewire\WithPagination;
class DisplaySchedule extends Component
{
    use WithPagination;
    public $addSchedule = false;
    public $editSchedule = false;
    public $courseId, $startTime, $endTime, $day;

    public function scheduleAdd(){
   
        // dd($this->courseId);
        Schedule::create([
            'course_id' => $this->courseId,
            'day' => $this->day, 
            'start_time' => $this->startTime,
            'end_time'=> $this->endTime
        ]);
        return redirect()->route('schedule');
    }
    public function render()
    {
        $courses = Course::all();
        // dd($courses);
        $schedules = Schedule::paginate(5);
        return view('livewire.display-schedule', [
            'courses' => $courses,
            'schedules' => $schedules,
        ]);
    }
}
