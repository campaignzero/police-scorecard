<?php

namespace App\View\Components\Script;

use Illuminate\View\Component;

class Home extends Component
{
    public $type;
    public $scorecard;
    public $states;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'police-department', $states = [], $scorecard = [])
    {
        $this->type = $type;
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
        return view('components.script.home');
    }
}
