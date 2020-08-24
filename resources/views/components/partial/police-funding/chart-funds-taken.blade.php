@if (isset($scorecard['police_funding']['fines_forfeitures_2010']) && isset($scorecard['police_funding']['fines_forfeitures_2011']) && isset($scorecard['police_funding']['fines_forfeitures_2012']))
<div class="stat-wrapper">
    <h3>Funds taken from communities in fines and forfeitures</h3>

    <p>
        Total: {{ nFormatter((
            $scorecard['police_funding']['fines_forfeitures_2010'] +
            $scorecard['police_funding']['fines_forfeitures_2011'] +
            $scorecard['police_funding']['fines_forfeitures_2012'] +
            $scorecard['police_funding']['fines_forfeitures_2013'] +
            $scorecard['police_funding']['fines_forfeitures_2014'] +
            $scorecard['police_funding']['fines_forfeitures_2015'] +
            $scorecard['police_funding']['fines_forfeitures_2016'] +
            $scorecard['police_funding']['fines_forfeitures_2017'] +
            $scorecard['police_funding']['fines_forfeitures_2018'] +
            $scorecard['police_funding']['fines_forfeitures_2019']
        ), 2) }}
        from 2010-17
    </p>

    <p>
        <canvas id="bar-chart-funds-taken"></canvas>
    </p>

    @if (!empty($scorecard['police_funding']['budget_source_link']) && !empty($scorecard['police_funding']['budget_source_name']))
        <p class="source-link-wrapper">
            Source:
            <a href="{{ $scorecard['police_funding']['budget_source_link'] }}" class="source-link" rel="noopener" target="_blank" {!! trackData('External Nav', 'Funds Taken', $scorecard['police_funding']['budget_source_name']) !!}>
                {{ $scorecard['police_funding']['budget_source_name'] }}
            </a>
        </p>
    @endif
</div>
@endif
