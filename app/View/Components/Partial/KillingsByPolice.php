<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class KillingsByPolice extends Component
{
    public $scorecard;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($scorecard = [], $type = 'police-department')
    {
        $this->scorecard = $scorecard;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.partial.killings-by-police');
    }
}
