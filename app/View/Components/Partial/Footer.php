<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;

class Footer extends Component
{
    public $states;
    public $state;
    public $socialUrl;
    public $socialText;
    public $socialSubject;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($state = '', $states = [])
    {
        $this->states = $states;
        $this->state = $state;
        $this->socialUrl = '';
        $this->socialText = '';
        $this->socialSubject = '';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.partial.footer');
    }
}
