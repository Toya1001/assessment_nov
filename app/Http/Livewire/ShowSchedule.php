<?php

namespace App\Http\Livewire;

use App\Models\AssignCourse;
use App\Models\Schedule;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSchedule extends Component
{
    use WithPagination;
    public function render()
    {
        $teacherId = Teacher::where('user_id', auth()->user()->id)->value('id');
        $schedules = AssignCourse::where('teacher_id', $teacherId)->paginate(5);
        return view('livewire.show-schedule', [
            'schedules'=> $schedules,
        ]);
    }
}
