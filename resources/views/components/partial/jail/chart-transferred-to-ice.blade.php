@php
$drug_ice_transfers = isset($scorecard['jail']['drug_ice_transfers']) ? $scorecard['jail']['drug_ice_transfers'] : 0;
$other_ice_transfers = isset($scorecard['jail']['other_ice_transfers']) ? $scorecard['jail']['other_ice_transfers'] : 0;
$violent_ice_transfers = isset($scorecard['jail']['violent_ice_transfers']) ?
$scorecard['jail']['violent_ice_transfers'] : 0;

$total_ice_transfers = ($drug_ice_transfers + $other_ice_transfers + $violent_ice_transfers);
$percent_drug_transfers = ($total_ice_transfers > 0) ? ($drug_ice_transfers / $total_ice_transfers) * 100 : 0;
$percent_violent_transfers = ($total_ice_transfers > 0) ? ($violent_ice_transfers / $total_ice_transfers) * 100 : 0;
$percent_other_transfers = ($total_ice_transfers > 0) ? ($other_ice_transfers / $total_ice_transfers) * 100 : 0;
@endphp

@if ($total_ice_transfers && $percent_drug_transfers && $percent_drug_transfers && $percent_other_transfers)
<div class="stat-wrapper">
    <h3>People Transferred to ICE in 2018</h3>

    <p>{{ num($total_ice_transfers) }} people were transferred to ICE</p>

    <p class="keys">
        <span class="key key-red"></span> Violent Crime
        <span class="key key-orange"></span> Drug Offenses
        <span class="key key-black"></span> Other
    </p>

    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar grouped key-red" data-percent="{{ output(floatval($percent_violent_transfers), 0, '%') }}">
            <span>{{ (intval($percent_violent_transfers) > 5) ? num(intval($percent_violent_transfers), 0, '%') : '' }}</span>
        </div>
        <div class="progress-bar animate-bar grouped key-orange" data-percent="{{ output(floatval($percent_drug_transfers), 0, '%') }}">
            <span>{{ (intval($percent_drug_transfers) > 5) ? num(intval($percent_drug_transfers), 0, '%') : '' }}</span>
        </div>
        <div class="progress-bar animate-bar grouped key-black" data-percent="{{ output(floatval($percent_other_transfers), 0, '%') }}">
            <span>{{ (intval($percent_other_transfers) > 5) ? num(intval($percent_other_transfers), 0, '%') : '' }}</span>
        </div>
    </div>
</div>
@endif

@if(isset($scorecard['jail']['unconvicted_jail_population']) && isset($scorecard['jail']['total_jail_population']))

@php
$unconvicted_jail_population = isset($scorecard['jail']['unconvicted_jail_population']) ?
$scorecard['jail']['unconvicted_jail_population'] : 0;
$total_jail_population = isset($scorecard['jail']['total_jail_population']) ?
$scorecard['jail']['total_jail_population'] : 0;
$percent_without_conviction = ($unconvicted_jail_population / $total_jail_population) * 100;
@endphp

<div class="stat-wrapper">
    <h3>People in Jail Without Being Convicted</h3>
    <p>
        {{ num(round($percent_without_conviction)) }} % of People in Jail
    </p>
    @if(!$percent_without_conviction)
    <div class="progress-bar-wrapper">
        <div class="progress-bar no-data" style="width: 0"></div>
    </div>
    <p class="note">No Data Found <a href="https://forms.gle/R7ADBELo1cQ4sbfz7" class="btn no-data" rel="noopener" target="_blank" {!! trackData('External Nav', 'Chart', 'Add Data') !!}>Add Data</a></p>
    @else
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar {{ progressBar(intval($percent_without_conviction), 'reverse') }}" data-percent="{{ output(intval($percent_without_conviction), 0, '%') }}"></div>
    </div>
    @endif
</div>
@endif
