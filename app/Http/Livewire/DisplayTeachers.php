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
    public $addTeacher = false;
    public $editTeacher = false;
    public $assignTeacher = false;
    public $teachername, $email, $password, $class, $subject, $courseId, $teacher;


    public function teacherAdd()
    {
        // dd($this->subject);
        User::create([
            'name' => $this->teachername,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $userid = User::where('email', $this->email)->value('id');

        Teacher::create([
            'user_id' => $userid,
        ]);

        return redirect('teacher');
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
        ]);

        return redirect('teacher');
    }

    public function teacherDelete($id)
    {
        Teacher::where('id', $id)->update([
            'status' => 0,
        ]);
        return redirect('teacher');
    }

    public function addCourse($id)
    {
        $this->assignTeacher = true;
        AssignCourse::create([
            'teacher_id' => $id,
            'course_id' => $this->courseId,
        ]);
        return redirect('teacher');
    }


    public function render()
    {
        $courses = Course::all();
        
        // dd($subjects);
        $teacher = Teacher::paginate(5);
        return view('livewire.display-teachers', [
            'courses' => $courses,
            'teacher' => $teacher,
        ]);
    }
    
}
