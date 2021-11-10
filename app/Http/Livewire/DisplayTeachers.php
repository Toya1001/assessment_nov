<?php

namespace App\Http\Livewire;

use App\Models\AssignCourse;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayTeachers extends Component
{
    use WithPagination;
    public $teacherslist = false; 
    public $addTeacher = false;
    public $editTeacher = false;
    public $assignTeacher = false;
    public $teachername, $email, $password, $class, $subject, $courseId, $teacher, $hiddenId;


    public function teacherAdd()
    {
        // dd($this->subject);
        User::create([
            'name' => $this->teachername,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role'=> 1
        ]);

        $userid = User::where('email', $this->email)->value('id');

        Teacher::create([
            'user_id' => $userid,
        ]);

        return redirect()->route('teacher');
    }

    public function teacherEdit($id)
    {
        $this->editTeacher = true;
        $teacher = Teacher::find($id);
        $this->teachername = $teacher->user->name;
        $this->email = $teacher->user->email;
        $this->teacherId = $id;
    }

    public function teacherUpdate()
    {
        $userid = User::where('email', $this->email)->value('id');
        User::where('id', $userid)->update([
            'name' => $this->teachername,
            'email' => $this->email,
            'role' => 1,
        ]);

        return redirect()->route('teacher');
    }

    public function teacherDelete($id)
    {
        Teacher::where('id', $id)->update([
            'status' => 0,
        ]);
        return redirect()->route('teacher');
    }

    public function addCourse($id)
    {
        $this->assignTeacher = true;
        $this->hiddenId =$id;

    }

    public function courseAdd(){
        AssignCourse::create([
            'teacher_id' => $this->hiddenId,
            'course_id' => $this->courseId,
        ]);
        return redirect()->route('teacher');
    }


    public function render()
    {
        $courses = Course::all();
        $teachers = Teacher::paginate(5);
        // dd($teacher); 
        $assign = AssignCourse::paginate(5);
        return view('livewire.display-teachers', [
            'courses' => $courses,
            'teachers' => $teachers,
            'assign'=> $assign,
        ]);
    }
    
}
