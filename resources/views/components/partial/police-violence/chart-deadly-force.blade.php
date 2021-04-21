<div class="stat-wrapper">
    <a href="https://drive.google.com/open?id=1U-0WykJJLBAqSknaDF3938FI7TtXhB9z" rel="noopener" target="_blank" class="external-link" {!! trackData('External Nav', 'Deadly Force', 'Source Data') !!}>
        <span class="sr-only">Open in New Window</span>
    </a>

    <h3>Deadly Force</h3>

    @if (output($scorecard['police_violence']['all_deadly_force_incidents']) === '0')
    <p class="good-job">Did Not Report Using Deadly Force in 2016-19</p>
    @else
    <p>
        {{ num($scorecard['report']['total_people_killed']) }} Killings by Police from 2013-20
        <span class="divider">&nbsp;|&nbsp;</span>
        {{ num($scorecard['report']['killed_by_police_per_10k_arrests'], 1) }} every 10k arrests
    </p>
    @endif

    @if (output($scorecard['police_violence']['all_deadly_force_incidents']) === '0' || output($scorecard['report']['total_people_killed']) === '0')
    <div class="progress-bar-wrapper">
        <div class="progress-bar bright-green" style="width: 0"></div>
    </div>
    @elseif (!isset($scorecard['report']['total_people_killed']) || (isset($scorecard['report']['killed_by_police_per_10k_arrests']) && empty($scorecard['report']['killed_by_police_per_10k_arrests'])))
    <div class="progress-bar-wrapper">
        <div class="progress-bar no-data" style="width: 0"></div>
    </div>
    <x-partial.no-data-found />
    @else
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar {{ progressBar(100 - intval($scorecard['report']['percentile_killed_by_police']), 'reverse') }}" data-percent="{{ output(100 - intval($scorecard['report']['percentile_killed_by_police']), 0, '%') }}"></div>
    </div>
    <p class="note">
        ^&nbsp; More Killings by Police per Arrest than {{ num($scorecard['report']['percentile_killed_by_police'], 0, '%', true) }} of Depts &nbsp;&nbsp;
    </p>
    @endif

    <p class="source-link-wrapper">
        Source:
        <a href="https://mappingpoliceviolence.org" class="source-link" rel="noopener" target="_blank" {!! trackData('External Nav', 'Deadly Force', 'Mapping Police Violence') !!}>
            Mapping Police Violence
        </a>
    </p>
</div>
