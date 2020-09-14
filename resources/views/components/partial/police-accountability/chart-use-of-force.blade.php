<div class="stat-wrapper">
    <h3>Use of Force Complaints</h3>

    @if (output($scorecard['police_accountability']['use_of_force_complaints_reported']) === '0')
    <p>0 Complaints Reported</p>
    <div class="progress-bar-wrapper">
        <div class="progress-bar bright-green" style="width: 0"></div>
    </div>
    <p class="note">&nbsp;</p>
    @elseif (!isset($scorecard['report']['percent_use_of_force_complaints_sustained']))
    <p>
        {{ num($scorecard['police_accountability']['use_of_force_complaints_reported']) }} Reported

        @if(isset($scorecard['report']['percent_use_of_force_complaints_sustained']))
        <span class="divider">&nbsp;|&nbsp;</span>
        {{ num($scorecard['report']['percent_use_of_force_complaints_sustained'], 0, '%') }} Ruled in Favor of Civilians
        @endif
    </p>
    <div class="progress-bar-wrapper">
        <div class="progress-bar no-data" style="width: 0"></div>
    </div>
    <p class="note">No Data Found <a href="https://forms.gle/R7ADBELo1cQ4sbfz7" class="btn no-data" rel="noopener" target="_blank" {!! trackData('External Nav', 'Chart', 'Add Data') !!}>Add Data</a></p>
    @else
    <p>
        {{ num($scorecard['police_accountability']['use_of_force_complaints_reported']) }} Reported

        @if(isset($scorecard['report']['percent_use_of_force_complaints_sustained']))
        <span class="divider">&nbsp;|&nbsp;</span>
        {{ num($scorecard['report']['percent_use_of_force_complaints_sustained'], 0, '%') }} Ruled in Favor of Civilians
        @endif
    </p>
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar {{ progressBar(100 - intval($scorecard['report']['percent_use_of_force_complaints_sustained']), 'reverse') }}" data-percent="{{ output(intval($scorecard['report']['percent_use_of_force_complaints_sustained']), 0, '%') }}"></div>
    </div>
    <p class="note">&nbsp;</p>
    @endif
</div>
