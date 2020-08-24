<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class HeroReport extends Component
{
    public $type;
    public $state;
    public $stateData;
    public $location;
    public $total;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'police-department', $state = 'us', $stateData = [], $location = null, $total = 0)
    {
        $this->type = $type;
        $this->state = $state;
        $this->stateData = $stateData;
        $this->location = $location;
        $this->total = $total;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.partial.hero-report');
    }
}
