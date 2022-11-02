<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use App\Models\Course;
use Livewire\Component;
use App\Models\Category;
use App\Models\CourseType;
use Illuminate\Support\Facades\Log;

class CoursesComponent extends Component
{
    public $courses;
    public $categories;
    public $courseTypes;
    
    // for filter
    public $title;
    public $category_id;
    public $course_type_id;

    public function __construct()
    {
        $this->categories = Category::all();
        $this->courseTypes = CourseType::all();
        
    }

    public function acceptCourse($id){
        $course=Course::find($id);
       // dd($course);
       $course->update([
        'status'=>'accepted',
       ]);

      
    }
    public function rejectCourse($id){
        $course=Course::find($id);
        // dd($course);
        $course->update([
         'status'=>'rejected',
        ]);
    }

    public function render()
    {
        // model must be a query not colection
        $courses = Course::query()->with(['category' , 'type']);
        if($this->title){
            $courses = $courses->where('title', 'like' , '%'.$this->title.'%');
        }

        if($this->category_id){
            $courses = $courses->where('category_id' , $this->category_id);
        }
        if($this->course_type_id){
            $courses = $courses->where('course_type_id' , $this->course_type_id);
           
        }

        $this->courses = $courses->get();

        return view('livewire.dashboard.courses-component');
    }
}
