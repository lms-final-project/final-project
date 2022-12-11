<?php

namespace App\View\Components\front\instructor;

use Illuminate\View\Component;
use App\Models\AssignmentStudent;

class assignmentsComponent extends Component
{
   public $assignment;
public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($assignment)
    {
        $this->assignment = $assignment;
        $this->id=$assignment->id;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $count=AssignmentStudent::where('assignment_id','=',$this->id)->get()->count();
        return view('components.front.instructor.assignments-component',compact('count'));
    }
}
