@if (isset($scorecard['police_accountability']['complaints_in_detention_reported']) || isset($scorecard['report']['percent_complaints_in_detention_sustained']))
<div class="stat-wrapper">
    <h3>Complaints of Misconduct in Jail</h3>

    @if (output($scorecard['police_accountability']['complaints_in_detention_reported']) === '0' || output($scorecard['report']['percent_complaints_in_detention_sustained']) === '0')
    <p>0 Complaints Reported</p>
    <div class="progress-bar-wrapper">
        <div class="progress-bar bright-green" style="width: 0"></div>
    </div>
    <p class="note">&nbsp;</p>
    @elseif (!isset($scorecard['report']['percent_complaints_in_detention_sustained']) || (isset($scorecard['report']['percent_complaints_in_detention_sustained']) && empty($scorecard['report']['percent_complaints_in_detention_sustained'])))
    <p>
        {{ num($scorecard['police_accountability']['complaints_in_detention_reported']) }} Reported
        <span class="divider">&nbsp;|&nbsp;</span>
        {{ num($scorecard['report']['percent_complaints_in_detention_sustained'], 0, '%') }} Ruled in Favor of Civilians
    </p>
    <div class="progress-bar-wrapper">
        <div class="progress-bar no-data" style="width: 0"></div>
    </div>
    <p class="note">City Did Not Provide Data</p>
    @else
    <p>
        {{ num($scorecard['police_accountability']['complaints_in_detention_reported']) }} Reported
        <span class="divider">&nbsp;|&nbsp;</span>
        {{ num($scorecard['report']['percent_complaints_in_detention_sustained'], 0, '%') }} Ruled in Favor of Civilians
    </p>
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar {{ progressBar(100 - intval($scorecard['report']['percent_complaints_in_detention_sustained']), 'reverse') }}" data-percent="{{ output(intval($scorecard['report']['percent_complaints_in_detention_sustained']), 0, '%') }}"></div>
    </div>
    <p class="note">&nbsp;</p>
    @endif
</div>
@endif
