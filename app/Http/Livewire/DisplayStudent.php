<?php

namespace App\Http\Livewire;

use App\Models\AssignCourse;
use App\Models\AssignTeacher;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayStudent extends Component
{
    use WithPagination;
    public $studentlist = false;
    public $addStudent = false;
    public $editStudent = false;
    public $assignStudent = false;
    public $studentname, $email, $password, $class, $subject, $studentId, $teacherId, $hiddenId;


    public function studentAdd()
    {
        // dd($this->subject);
        User::create([
            'name' => $this->studentname,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 2
        ]);

        $userid = User::where('email', $this->email)->value('id');

        Student::create([
            'user_id' => $userid,
        ]);

        return redirect()->route('student');
    }

    public function studentEdit($id)
    {
        $this->editStudent = true;
        $student = Student::find($id);
        $this->studentname = $student->user->name;
        $this->email = $student->user->email;
        $this->studentId = $id;
    }

    public function studentUpdate()
    {
        $userid = User::where('email', $this->email)->value('id');
        User::where('id', $userid)->update([
            'name' => $this->studentname,
            'email' => $this->email,
            'role' => 2,
        ]);

        return redirect()->route('student');
    }

    public function studentDelete($id)
    {
        Student::where('id', $id)->update([
            'status' => 0,
        ]);
        return redirect()->route('student');
    }

    public function addTeacher($id)
    {
        $this->assignStudent = true;
        $this->hiddenId = $id;
    }

    public function teacherAdd()
    {
        AssignTeacher::create([
            'student_id' => $this->hiddenId,
            'teacher_id' => $this->teacherId,
        ]);
        return redirect()->route('student');
    }

    public function render()
    {
        $teachers = Teacher::all();
        $students = Student:: paginate(5); 
        $assigned = AssignTeacher::paginate(5);
        return view('livewire.display-student', [
            'teachers' => $teachers,
            'students'=> $students,
            'assigned' => $assigned ]);
    }
}
