<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class About extends Component
{
    public $type;
    public $scorecard;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'police-department', $scorecard = [])
    {
        $this->type = $type;
        $this->scorecard = $scorecard;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.partial.about');
    }
}
