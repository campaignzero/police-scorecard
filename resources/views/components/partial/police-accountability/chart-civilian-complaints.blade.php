<div class="stat-wrapper">
    <h3>Total civilian complaints</h3>

    @if (output($scorecard['police_accountability']['civilian_complaints_reported']) === '0')
    <p>0 Complaints Reported</p>
    @else
    <p>
        {{ num($scorecard['police_accountability']['civilian_complaints_reported']) }} from {{ $scorecard['police_accountability']['years_of_complaints_data'] }}
        <span class="divider">&nbsp;|&nbsp;</span>
        {{ num($scorecard['police_accountability']['civilian_complaints_sustained'], 0, '%') }} Ruled in Favor of Civilians
    </p>
    @endif

    @if (!isset($scorecard['police_accountability']['civilian_complaints_sustained']))
    <div class="progress-bar-wrapper">
        <div class="progress-bar no-data" style="width: 0"></div>
    </div>
    <x-partial.no-data-found />
    @else
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar {{ progressBar(100 - intval($scorecard['police_accountability']['civilian_complaints_sustained']), 'reverse') }}" data-percent="{{ output(intval($scorecard['police_accountability']['civilian_complaints_sustained']), 0, '%') }}"></div>
    </div>
    <p class="note">&nbsp;</p>
    @endif
</div>
