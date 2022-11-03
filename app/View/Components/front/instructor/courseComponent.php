<?php

namespace App\View\Components\front\instructor;

use Illuminate\View\Component;

class courseComponent extends Component
{
    public $course;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.instructor.course-component');
    }
}
