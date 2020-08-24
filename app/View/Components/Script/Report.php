<?php

namespace App\View\Components\Script;

use Illuminate\View\Component;

class Report extends Component
{
    public $grades;
    public $location;
    public $type;
    public $scorecard;
    public $state;
    public $states;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($grades = [], $location = null, $type = 'police-department', $state = null, $states = [], $scorecard = [])
    {
        $this->grades = $grades;
        $this->location = $location;
        $this->type = $type;
        $this->state = $state;
        $this->states = $states;
        $this->scorecard = $scorecard;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.script.report');
    }
}
