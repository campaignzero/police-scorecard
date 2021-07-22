@php
    $police_shootings_2016 = isset($scorecard['police_violence']['police_shootings_2016']) ? $scorecard['police_violence']['police_shootings_2016'] : 0;
    $police_shootings_2017 = isset($scorecard['police_violence']['police_shootings_2017']) ? $scorecard['police_violence']['police_shootings_2017'] : 0;
    $police_shootings_2018 = isset($scorecard['police_violence']['police_shootings_2018']) ? $scorecard['police_violence']['police_shootings_2018'] : 0;
    $police_shootings_2019 = isset($scorecard['police_violence']['police_shootings_2019']) ? $scorecard['police_violence']['police_shootings_2019'] : 0;
    $police_shootings_2020 = isset($scorecard['police_violence']['police_shootings_2020']) ? $scorecard['police_violence']['police_shootings_2020'] : 0;
    $shot_first = isset($scorecard['police_violence']['shot_first']) ? $scorecard['police_violence']['shot_first'] : 0;

    $police_shootings_incidents = ($police_shootings_2016 + $police_shootings_2017 + $police_shootings_2018 + $police_shootings_2019 + $police_shootings_2020);
    $percent_shot_first = ($shot_first / $police_shootings_incidents) * 100;
@endphp

@if (!empty($police_shootings_incidents) && !empty($percent_shot_first))
<div class="stat-wrapper">
    <h3>Police Shootings Where Police Did Not Try Non-Deadly Force Before Shooting</h3>

    <p>
        {{ num($percent_shot_first, 0, '%') }}
        of Shootings from 2016-20
        ({{ $shot_first }}/{{ $police_shootings_incidents }})
    </p>

    @if (!isset($percent_shot_first) || (isset($percent_shot_first) && empty($percent_shot_first)))
    <div class="progress-bar-wrapper">
        <div class="progress-bar no-data" style="width: 0"></div>
    </div>
    @else
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar {{ (intval($percent_shot_first) === 0) ? 'bright-green' : 'always-bad' }}" data-percent="{{ output($percent_shot_first, 0, '%') }}"></div>
    </div>
    @endif

    @if (strtolower($state) === 'ca')
    <p class="source-link-wrapper">
        Source:
        <a href="https://openjustice.doj.ca.gov/data?utm_content=logolink&utm_medium=website&utm_source=policescorecard.org" rel="noopener" class="source-link" target="_blank" {!! trackData('External Nav', 'Police Shootings', 'CA Department of Justice') !!}>
            CA Department of Justice
        </a>
    </p>
    @endif
</div>
@endif
