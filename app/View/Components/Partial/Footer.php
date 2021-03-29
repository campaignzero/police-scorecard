<?php

namespace App\View\Components\Partial;

use Illuminate\View\Component;
use Illuminate\Routing\UrlGenerator;

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
        $this->socialUrl = urlencode(url()->full());
        $this->socialText = rawurlencode('Get the Data on Policing in America.  Get the Facts about US Police Departments at PoliceScorecard.org');;
        $this->socialSubject = rawurlencode('Get the Data on Policing in America');
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
