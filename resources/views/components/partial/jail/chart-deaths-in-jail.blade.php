@if(num(round(intval(str_replace(',', '', $scorecard['report']['total_jail_deaths_2016_2018'])))) !== 'N/A')
<div class="stat-wrapper">
    <h3>Deaths in Jail</h3>

    <p>
        {{ num(round(intval(str_replace(',', '', $scorecard['report']['total_jail_deaths_2016_2018'])))) }} Deaths
        <span class="divider">&nbsp;|&nbsp;</span>
        {{ num($scorecard['report']['jail_deaths_per_1k_jail_population']) }} per 1k Jail Population
    </p>

    <p class="keys">
        <span class="key key-red"></span> Homicide
        <span class="key key-orange"></span> Suicide
        <span class="key key-black"></span> Other
        <span class="key key-grey"></span> Investigating
    </p>

    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar grouped key-red" data-percent="{{ output(floatval(round((intval($scorecard['jail']['jail_deaths_homicide']) / intval($scorecard['report']['total_jail_deaths_2016_2018'])) * 100)), 0, '%') }}">
            <span>{{ (intval(round((intval($scorecard['jail']['jail_deaths_homicide']) / intval($scorecard['report']['total_jail_deaths_2016_2018'])) * 100)) > 5) ? output(round((intval($scorecard['jail']['jail_deaths_homicide']) / intval($scorecard['report']['total_jail_deaths_2016_2018'])) * 100), 0, '%') : '' }}</span>
        </div>
        <div class="progress-bar animate-bar grouped key-orange" data-percent="{{ output(floatval(round((intval($scorecard['jail']['jail_deaths_suicide']) / intval($scorecard['report']['total_jail_deaths_2016_2018'])) * 100)), 0, '%') }}">
            <span>{{ (intval(round((intval($scorecard['jail']['jail_deaths_suicide']) / intval($scorecard['report']['total_jail_deaths_2016_2018'])) * 100)) > 5) ? output(round((intval($scorecard['jail']['jail_deaths_suicide']) / intval($scorecard['report']['total_jail_deaths_2016_2018'])) * 100), 0, '%') : '' }}</span>
        </div>
        <div class="progress-bar animate-bar grouped key-black" data-percent="{{ output(floatval(round((intval($scorecard['jail']['jail_deaths_investigating']) / intval($scorecard['report']['total_jail_deaths_2016_2018'])) * 100)), 0, '%') }}">
            <span>{{ (intval(round((intval($scorecard['jail']['jail_deaths_investigating']) / intval($scorecard['report']['total_jail_deaths_2016_2018'])) * 100)) > 5) ? output(round((intval($scorecard['jail']['jail_deaths_investigating']) / intval($scorecard['report']['total_jail_deaths_2016_2018'])) * 100), 0, '%') : '' }}</span>
        </div>
        <div class="progress-bar animate-bar grouped key-grey" data-percent="{{ output(floatval(round((intval($scorecard['jail']['jail_deaths_other']) / intval($scorecard['report']['total_jail_deaths_2016_2018'])) * 100)), 0, '%') }}">
            <span>{{ (intval(round((intval($scorecard['jail']['jail_deaths_other']) / intval($scorecard['report']['total_jail_deaths_2016_2018'])) * 100)) > 5) ? output(round((intval($scorecard['jail']['jail_deaths_other']) / intval($scorecard['report']['total_jail_deaths_2016_2018'])) * 100), 0, '%') : '' }}</span>
        </div>
    </div>

    <p class="note">^&nbsp;Higher Rate of Jail Deaths than {{ num($scorecard['report']['percentile_jail_deaths_per_1k_jail_population'], 0, '%', true) }} of Depts &nbsp;&nbsp;</p>
</div>
@endif

@if(isset($scorecard['jail']['total_jail_population']))
<div class="stat-wrapper no-border-mobile">
    <h3>Jail Incarceration rate</h3>
    <p>
        {{ num(round(intval(str_replace(',', '', $scorecard['jail']['total_jail_population'])))) }} Avg Daily Jail
        Population <span class="divider">&nbsp;|&nbsp;</span>
        {{ num($scorecard['report']['jail_incarceration_per_1k_population']) }} per 1k residents
    </p>

    @if(!isset($scorecard['report']['percentile_jail_incarceration_per_1k_population']) || (isset($scorecard['report']['percentile_jail_incarceration_per_1k_population']) && empty($scorecard['report']['percentile_jail_incarceration_per_1k_population'])))
    <div class="progress-bar-wrapper">
        <div class="progress-bar no-data" style="width: 0"></div>
    </div>
    <p class="note">City Did Not Provide Data</p>
    @else
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar {{ progressBar(100 - intval($scorecard['report']['percentile_jail_incarceration_per_1k_population']), 'reverse') }}" data-percent="{{ output(100 - intval($scorecard['report']['percentile_jail_incarceration_per_1k_population']), 0, '%') }}"></div>
    </div>
    <p class="note">^&nbsp; More than {{ num($scorecard['report']['percentile_jail_incarceration_per_1k_population'], 0, '%', true) }} of Sheriff's Depts&nbsp;&nbsp;</p>
    @endif
</div>
@endif
