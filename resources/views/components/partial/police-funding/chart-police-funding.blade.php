@if (isset($scorecard['police_funding']['police_budget_2020']) || isset($scorecard['police_funding']['police_budget_2019']) || isset($scorecard['police_funding']['police_budget_2018']) || isset($scorecard['police_funding']['police_budget_2017']))
<div class="stat-wrapper">
    <h3>Police Funding By Year</h3>
    <p>
    @if (isset($scorecard['police_funding']['police_budget_2020']))
        {{ nFormatter($scorecard['police_funding']['police_budget_2020'], 2) }}
    @elseif (isset($scorecard['police_funding']['police_budget_2019']))
        {{ nFormatter($scorecard['police_funding']['police_budget_2019'], 2) }}
    @elseif (isset($scorecard['police_funding']['police_budget_2018']))
        {{ nFormatter($scorecard['police_funding']['police_budget_2018'], 2) }}
    @elseif (isset($scorecard['police_funding']['police_budget_2017']))
        {{ nFormatter($scorecard['police_funding']['police_budget_2017'], 2) }}
    @endif
        <span class="divider">&nbsp;|&nbsp;</span>
        {{ nFormatter($scorecard['report']['police_spending_per_resident'], 2) }} per Resident
    </p>
    <p>
        More Police Funding per Capita than {{ num(100 - $scorecard['report']['percentile_police_spending'], 0, '%') }} of Depts
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
