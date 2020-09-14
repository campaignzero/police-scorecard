<div class="stat-wrapper no-border-mobile">
    <a href="http://www.murderdata.org/p/blog-page.html?m=1" rel="noopener" target="_blank" class="external-link"{!! trackData('External Nav', 'Homicides Unsolved', 'Source Data') !!}>
        <span class="sr-only">Open in New Window</span>
    </a>

    <h3>Homicides Unsolved</h3>

    <p>
        {{ num($scorecard['homicide']['homicides_2013_2018']) }} Homicides from 2013-18
        <span class="divider">&nbsp;|&nbsp;</span>
        {{ (intval(str_replace(',', '', $scorecard['homicide']['homicides_2013_2018'])) - intval(str_replace(',', '', $scorecard['homicide']['homicides_2013_2018_solved']))) }}
        Unsolved
    </p>

    @if(intval($scorecard['homicide']['homicides_2013_2018']) === 0)
    <p class="good-job pad-bottom">No Homicides Reported</p>
    @elseif(intval($scorecard['homicide']['homicides_2013_2018']) > 0 && (intval(str_replace(',', '', $scorecard['homicide']['homicides_2013_2018'])) - intval(str_replace(',', '', $scorecard['homicide']['homicides_2013_2018_solved']))) === 0)
    <p class="good-job pad-bottom">No Unsolved Homicides Reported</p>
    @elseif(!isset($scorecard['report']['percentile_murders_solved']) || (isset($scorecard['report']['percentile_murders_solved']) && empty($scorecard['report']['percentile_murders_solved'])))
    <div class="progress-bar-wrapper">
        <div class="progress-bar no-data" style="width: 0"></div>
    </div>
    <p class="note">No Data Found <a href="https://forms.gle/R7ADBELo1cQ4sbfz7" class="btn no-data" rel="noopener" target="_blank" {!! trackData('External Nav', 'Chart', 'Add Data') !!}>Add Data</a></p>
    @else
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar {{ progressBar(intval($scorecard['report']['percentile_murders_solved']), 'reverse') }}" data-percent="{{ output(intval($scorecard['report']['percentile_murders_solved']), 0, '%') }}"></div>
    </div>
    <p class="note">^&nbsp; Solved Fewer Homicides than {{ num($scorecard['report']['percentile_murders_solved'], 0, '%') }} of Depts &nbsp;&nbsp;</p>
    @endif
</div>
