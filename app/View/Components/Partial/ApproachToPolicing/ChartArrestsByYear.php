<?php

namespace App\View\Components\Partial\ApproachToPolicing;

use Illuminate\View\Component;

class ChartArrestsByYear extends Component
{
    public $location;
    public $scorecard;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($location = null, $scorecard = [])
    {
        $this->location = $location;
        $this->scorecard = $scorecard;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.partial.approach-to-policing.chart-arrests-by-year');
    }
}
