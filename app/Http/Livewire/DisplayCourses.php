<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class DisplayCourses extends Component
{

    public $addCourse = false;
    public $editCourse = false;
    public $course, $hiddenId;

    public function courseAdd(){
        Course::create([
            'course_nm' => $this->course,
        ]);

        return redirect()->route('course');
    }

    public function courseEdit($id){
        $this->editCourse = true;
        $sub = Course::find($id);
        $this->course = $sub->course_nm;
        $this->hiddenId = $id;
    }

    public function courseUpdate(){
        Course::where('id', $this->hiddenId)->update([
            'course_nm' => $this->course,
        ]);

        return redirect()->route('course');
    }


    public function courseDelete($id){
        Course::where('id', $id)->delete();
        return redirect()->route('course');
    }

    public function render()
    {
        $courses = Course::paginate(5);
        return view('livewire.display-courses', ['courses' => $courses]);
    }
}
