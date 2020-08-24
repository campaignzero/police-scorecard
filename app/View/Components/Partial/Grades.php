<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class Grades extends Component
{
    public $grades;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($grades = [], $type = 'police-department')
    {
        // Cap Grades Report to worst 500
        $this->grades = array_slice($grades, 0, 500);
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.partial.grades');
    }
}
