@if ($scorecard['police_funding']['average_annual_misconduct_settlements'])
<div class="stat-wrapper">
    <h3>Funds Spent On Misconduct Settlements</h3>
    <p>
        {{ nFormatter($scorecard['police_funding']['average_annual_misconduct_settlements'], 0) }} per year from {{ $scorecard['police_funding']['year_misconduct_settlement_data'] }}
        <span class="divider">&nbsp;|&nbsp;</span>
        ${{ num($scorecard['police_funding']['misconduct_settlements_per_10k_population']) }} per 10k population
    </p>

    @if (!isset($scorecard['police_funding']['percentile_misconduct_settlements_per_population']) || (isset($scorecard['police_funding']['percentile_misconduct_settlements_per_population']) && empty($scorecard['police_funding']['percentile_misconduct_settlements_per_population'])))
    <div class="progress-bar-wrapper">
        <div class="progress-bar no-data" style="width: 0"></div>
    </div>
    @else
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar always-bad" data-percent="{{ output(100 - intval($scorecard['police_funding']['percentile_misconduct_settlements_per_population']), 0, '%') }}"></div>
    </div>
    @endif

    <p class="note" style="margin-top: 0">
        ^&nbsp; More Spending due to Misconduct than {{ num($scorecard['police_funding']['percentile_misconduct_settlements_per_population'], 0, '%', false) }} of Depts &nbsp;&nbsp;
    </p>

    @if ($scorecard['police_funding']['misconduct_settlement_source'])
    <p class="source-link-wrapper">
        Source:
        <a href="{{ $scorecard['police_funding']['misconduct_settlement_source'] }}" class="source-link" rel="noopener" target="_blank" {!! trackData('External Nav', 'Funds Spent', $scorecard['police_funding']['misconduct_settlement_source_name']) !!}>
            {{ $scorecard['police_funding']['misconduct_settlement_source_name'] }}
        </a>
    </p>
    @endif
</div>
@endif
