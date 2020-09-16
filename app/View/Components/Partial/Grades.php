<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class Grades extends Component
{
    public $grades;
    public $state;
    public $type;

    protected $maxGrades = 1000;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($grades = [], $state = 'US', $type = 'police-department')
    {
        $this->grades = array_slice($grades, 0, $this->maxGrades);
        $this->state = $state;
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
