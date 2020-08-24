<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class WhatsNext extends Component
{
    public $stateName;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->stateName = '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.partial.whats-next');
    }
}
