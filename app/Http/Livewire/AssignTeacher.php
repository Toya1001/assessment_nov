<?php

namespace App\Http\Livewire;

use App\Models\AssignCourse;
use App\Models\AssignTeacher as ModelsAssignTeacher;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class AssignTeacher extends Component
{
    use WithPagination;
    public $selectTeacher =false;

    public function selectTeacher($id){
        $course = AssignCourse::find($id);
        $studentId = Student::where('user_id', auth()->user()->id)->value('id'); 
        $check = ModelsAssignTeacher::where('student_id', $studentId)
        ->where('teacher_id', $course->teacher_id )
        ->count(); 
        if($check == 1){
            return 'Already selected teacher';
        }else{
        ModelsAssignTeacher::create([
            'student_id' => $studentId,
            'teacher_id'=> $course->teacher_id,
        ]);
    }
        return redirect()->route('student.teacher');
    }
    public function render()
    {
        $selection = ModelsAssignTeacher::all();
        $teachers =AssignCourse::paginate(5);
        return view('livewire.assign-teacher',[
            'teachers'=>$teachers,
            'selection'=>$selection,
            ]);
    }
}
