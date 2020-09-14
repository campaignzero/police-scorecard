<div class="stat-wrapper no-border-mobile">
    <a href="#" data-city="{{ $location }}" data-more-info="Low Level Offenses include drug offenses, public drunkenness and other alcohol-related offenses; vagrancy, loitering, gambling, disorderly conduct, prostitution, vandalism, and other minor non-violent offenses. These types of offenses are usually classified as misdemeanors and are often associated with issues of substance abuse, homelessness and sex work. Our definition of Low Level Offenses excludes all arrests for violent crimes, simple assaults, crimes against families and children, weapons offenses, sex offenses and all arrests for property crimes except for vandalism. Importantly, since the FBI’s UCR arrests database does not distinguish between lower level property crimes such as petty theft or shoplifting and more serious forms of theft, we were not able to include any arrests for petty theft or shoplifting within the low level arrests category. Similarly, arrests for non-DUI related traffic offenses are not reported to the UCR program. This likely results in an undercount of the total number of low level arrests made by each agency." class="more-info visible" title="More Info ..."  {!! trackData('Nav', 'Arrests Low Level', 'More Info Modal') !!}>
        <span class="sr-only">More Info</span>
    </a>

    <h3>Arrests for Low Level Offenses</h3>

    <p>
        {{ num(round(intval(str_replace(',', '', $scorecard['report']['total_arrests'])) * (intval($scorecard['report']['percent_misdemeanor_arrests']) / 100))) }}
        Arrests <span class="divider">&nbsp;|&nbsp;</span>
        {{ num($scorecard['report']['low_level_arrests_per_1k_population']) }} per 1k residents
    </p>

    @if(!isset($scorecard['report']['percentile_low_level_arrests_per_1k_population']))
    <div class="progress-bar-wrapper">
        <div class="progress-bar no-data" style="width: 0"></div>
    </div>
    <p class="note">No Data Found <a href="https://forms.gle/R7ADBELo1cQ4sbfz7" class="btn no-data" rel="noopener" target="_blank" {!! trackData('External Nav', 'Chart', 'Add Data') !!}>Add Data</a></p>
    @else
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar {{ progressBar(100 - intval($scorecard['report']['percentile_low_level_arrests_per_1k_population']), 'reverse') }}" data-percent="{{ output(100 - intval($scorecard['report']['percentile_low_level_arrests_per_1k_population']), 0, '%') }}"></div>
    </div>
    <p class="note">
        ^&nbsp; Higher Arrest Rate for Low Level Offenses than {{ num($scorecard['report']['percentile_low_level_arrests_per_1k_population'], 0, '%', true) }} of Depts &nbsp;&nbsp;
    </p>
    @endif
</div>
