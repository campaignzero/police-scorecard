@if (isset($scorecard['police_funding']['police_budget_2017']))
<div class="stat-wrapper">
    <h3>Police Funding By Year</h3>
    <p>
        {{ nFormatter($scorecard['police_funding']['police_budget_2017'], 2) }}
        <span class="divider">&nbsp;|&nbsp;</span>
        {{ nFormatter($scorecard['report']['police_spending_per_resident'], 2) }} per Resident
    </p>
    <p>
        More Police Funding per Capita than {{ num($scorecard['police_funding']['percentile_police_spending_ratio'], 0, '%', true) }} of Depts
    </p>

    <div id="chart-police-funding"></div>

    @if (!empty($scorecard['police_funding']['budget_source_link']) && !empty($scorecard['police_funding']['budget_source_name']))
    <p class="source-link-wrapper">
        Source:
        <a href="{{ $scorecard['police_funding']['budget_source_link'] }}" class="source-link" rel="noopener" target="_blank" {!! trackData('External Nav', 'Police Funding', 'Federal LEOKA Database') !!}>
            {{ $scorecard['police_funding']['budget_source_name'] }}
        </a>
    </p>
    @endif
</div>
@endif
