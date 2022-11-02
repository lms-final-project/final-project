<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class selectOption extends Component
{
    public $options , $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($options , $name)
    {
        $this->options  = $options;
        $this->name     = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.select-option');
    }
}
