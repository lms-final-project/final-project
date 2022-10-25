<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CoursesComponent extends Component
{
    public $courses;

    public function __construct()
    {
        $this->courses = Course::with(['type' , 'category'])->get();

    }
    public function render()
    {
        return view('livewire.dashboard.courses-component');
    }
}
