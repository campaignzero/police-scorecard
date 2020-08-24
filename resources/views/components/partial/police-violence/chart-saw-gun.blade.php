@if ($scorecard['police_violence']['all_deadly_force_incidents'] && $scorecard['report']['percent_police_misperceive_the_person_to_have_gun'])
<div class="stat-wrapper">
    <h3>How Often Police Said a Person had a Gun but No Gun was Found</h3>

    <p>
        {{ num($scorecard['report']['percent_police_misperceive_the_person_to_have_gun'], 0, '%') }} of Guns "Perceived"
        were Never Found
        ({{ output($scorecard['police_violence']['people_killed_or_injured_gun_perceived'] - $scorecard['police_violence']['people_killed_or_injured_armed_with_gun']) }}/{{ num($scorecard['police_violence']['people_killed_or_injured_gun_perceived']) }})
    </p>

    @if (!isset($scorecard['report']['percent_police_misperceive_the_person_to_have_gun']) || (isset($scorecard['report']['percent_police_misperceive_the_person_to_have_gun']) && empty($scorecard['report']['percent_police_misperceive_the_person_to_have_gun'])))
    <div class="progress-bar-wrapper">
        <div class="progress-bar no-data" style="width: 0"></div>
    </div>
    @else
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar {{ (intval($scorecard['report']['percent_police_misperceive_the_person_to_have_gun']) === 0) ? 'bright-green' : 'always-bad' }}" data-percent="{{ output(intval($scorecard['report']['percent_police_misperceive_the_person_to_have_gun']), 0, '%') }}"></div>
    </div>
    @endif

    @if (strtolower($state) === 'ca')
    <p class="source-link-wrapper">
        Source:
        <a href="https://openjustice.doj.ca.gov/data" class="source-link" rel="noopener" target="_blank" {!! trackData('External Nav', 'Saw Gun', 'CA Department of Justice') !!}>
            CA Department of Justice
        </a>
    </p>
    @endif
</div>
@endif
