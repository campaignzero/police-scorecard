<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class Hero extends Component
{
    public $type;
    public $location;
    public $total;
    public $totalPolice;
    public $totalSheriff;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'police-department', $location = null, $total = 0, $totalPolice = 0, $totalSheriff = 0)
    {
        $this->type = $type;
        $this->location = $location;
        $this->total = $total;
        $this->totalPolice = $totalPolice;
        $this->totalSheriff = $totalSheriff;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.partial.hero');
    }
}
