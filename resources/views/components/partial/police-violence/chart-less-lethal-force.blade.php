@if ($scorecard['report']['total_less_lethal_force_estimated'] !== null)
<div class="stat-wrapper">
    <a href="https://docs.google.com/document/d/1FIeprYO7E8_2JjQzrcMNrQqqVt_YdTAoOEqmHia96sI" rel="noopener" target="_blank" class="external-link" {!! trackData('External Nav', 'Less-Lethal Force', 'Source Data') !!}>
        <span class="sr-only">Open in New Window</span>
    </a>

    <h3>Less-Lethal Force</h3>

    <p>
        Used More Force per Arrest than {{ num($scorecard['report']['percentile_less_lethal_force'], 0, '%', true) }} of Depts
    </p>
    <p>
        {{ num($scorecard['report']['total_less_lethal_force_estimated'], 0) }} Incidents
        <span class="divider">&nbsp;|&nbsp;</span>
        {{ num($scorecard['report']['less_lethal_per_10k_arrests'], 0) }} every 10k arrests

        @if ($scorecard['report']['less_lethal_force_change'])
        <span class="divider">&nbsp;|&nbsp;</span>
        {!! getChange($scorecard['report']['less_lethal_force_change']) !!}
        @endif
    </p>

    @if (!isset($scorecard['report']['percentile_less_lethal_force']) || (isset($scorecard['report']['percentile_less_lethal_force']) && empty($scorecard['report']['percentile_less_lethal_force'])))
    <div class="progress-bar-wrapper">
        <div class="progress-bar no-data" style="width: 0"></div>
    </div>
    <p class="note">City Did Not Provide Data</p>
    @else
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar {{ progressBar(100 - intval($scorecard['report']['percentile_less_lethal_force']), 'reverse') }}" data-percent="{{ num($scorecard['report']['percentile_less_lethal_force'], 0, '%', true) }}"></div>
    </div>
    <p class="note">
        ^&nbsp; Includes batons, strangleholds, tasers & other police weapons &nbsp;&nbsp;
    </p>
    @endif

    <p class="source-link-wrapper">
        Source:
        <a href="https://docs.google.com/document/d/1u3mLH5vt2kd2lBa5s2LwXIhwoJLzJup4Y-K86iVDUHI/edit?usp=sharing" class="source-link" rel="noopener" target="_blank" {!! trackData('External Nav', 'Less-Lethal Force', 'Police Department') !!}>
            Police Department
        </a>
    </p>
</div>
@endif
