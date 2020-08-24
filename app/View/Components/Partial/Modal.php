<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class Modal extends Component
{
    public $stateData;
    public $state;
    public $states;
    public $type;
    public $location;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($location = null, $state = [], $states = [], $stateData = [], $type = 'police-department')
    {
        $this->stateData = $stateData;
        $this->state = $state;
        $this->states = $states;
        $this->type = $type;
        $this->location = $location;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.partial.modal');
    }
}
