<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CoursesComponent extends Component
{
    public $courses;
    public $categories;
    // for filter
    public $title;
    public $category_id;

    public function __construct()
    {
        $this->categories = Category::all();
    }

    public function acceptCourse($id){
    }
    public function rejectCourse(){

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

        $this->courses = $courses->get();

        return view('livewire.dashboard.courses-component');
    }
}
