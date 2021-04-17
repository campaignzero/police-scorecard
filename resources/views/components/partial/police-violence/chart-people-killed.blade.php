@if (output($scorecard['report']['total_people_killed']) !== '0')
<div class="stat-wrapper">
    <h3>Deadly Force by Armed Status</h3>

    <p>
        {{ num($scorecard['report']['percent_used_against_people_who_were_unarmed'], 0, '%') }} Unarmed
        <span class="divider">&nbsp;|&nbsp;</span>
        {{ num($scorecard['report']['percent_used_against_people_who_were_not_armed_with_gun'], 0, '%') }} Did Not
        Allegedly Have a Gun
    </p>

    <div class="keys" style="padding: 10px 0;">
        <span class="key key-red"></span> Unarmed
        <span class="key key-orange"></span> Other
        <span class="key key-white"></span> Alleged Gun
        <span class="key key-grey"></span> Vehicle
    </div>

    <?php
    $unarmed = floatval($scorecard['report']['percent_used_against_people_who_were_unarmed']);
    $alleged_gun = floatval($scorecard['report']['percent_used_against_people_who_were_not_armed_with_gun']);
    $vehicle = floatval($scorecard['police_violence']['vehicle_people_killed']);

    $red = $unarmed;
    $orange = (($alleged_gun - $unarmed - $vehicle) >= 0) ? (($alleged_gun - $unarmed - $vehicle)) : 0;
    $white = ($orange > 0) ? (100 - $alleged_gun) : 0;
    $grey = $vehicle;
    ?>

    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar grouped key-red" data-percent="{{ output($red, 0, '%') }}">
            <span>{{ ($red > 5) ? num($red, 0, '%') : '' }}</span>
        </div>
        <div class="progress-bar animate-bar grouped key-orange" data-percent="{{ output($orange, 0, '%') }}">
            <span>{{ ($orange > 5) ? num($orange, 0, '%') : '' }}</span>
        </div>
        <div class="progress-bar animate-bar grouped key-white" data-percent="{{ output($white, 0, '%') }}">
            <span>{{ ($white > 5) ? num($white, 0, '%') : '' }}</span>
        </div>
        <div class="progress-bar animate-bar grouped key-grey" data-percent="{{ output($grey, 0, '%') }}">
            <span>{{ ($grey > 5) ? num($grey, 0, '%') : '' }}</span>
        </div>
    </div>

    <p class="note">^&nbsp; More Unarmed People Killed per Arrest than
        {{ num($scorecard['report']['percentile_unarmed_killed_by_police'], 0, '%', true) }} of Depts &nbsp;&nbsp;
    </p>
</div>
@endif
