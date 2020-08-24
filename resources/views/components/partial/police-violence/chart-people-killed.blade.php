@if (output($scorecard['report']['total_people_killed']) !== '0')
<div class="stat-wrapper">
  <h3>Deadly Force by Armed Status</h3>

  <p>
    {{ num($scorecard['report']['percent_used_against_people_who_were_unarmed'], 0, '%') }} Unarmed
    <span class="divider">&nbsp;|&nbsp;</span>
    {{ num($scorecard['report']['percent_used_against_people_who_were_not_armed_with_gun'], 0) }}% Did Not Allegedly Have a Gun
  </p>

  <div class="keys" style="padding: 10px 0;">
    <span class="key key-red"></span> Unarmed
    <span class="key key-orange"></span> Other
    <span class="key key-white"></span> Alleged Gun
    <span class="key key-grey"></span> Vehicle
  </div>

  <div class="progress-bar-wrapper">
    <div class="progress-bar animate-bar grouped key-red" data-percent="{{ output(floatval($scorecard['report']['percent_used_against_people_who_were_unarmed']), 0, '%') }}">
      <span>{{ (intval($scorecard['report']['percent_used_against_people_who_were_unarmed']) > 5) ? num(intval($scorecard['report']['percent_used_against_people_who_were_unarmed']), 0, '%') : '' }}</span>
    </div>
    <div class="progress-bar animate-bar grouped key-orange" data-percent="{{ output(floatval(($scorecard['report']['percent_used_against_people_who_were_not_armed_with_gun'] - $scorecard['report']['percent_used_against_people_who_were_unarmed'])), 0, '%') }}">
      <span>{{ (intval(($scorecard['report']['percent_used_against_people_who_were_not_armed_with_gun'] - $scorecard['report']['percent_used_against_people_who_were_unarmed'])) > 5) ? num(intval(($scorecard['report']['percent_used_against_people_who_were_not_armed_with_gun'] - $scorecard['report']['percent_used_against_people_who_were_unarmed'])), 0, '%') : '' }}</span>
    </div>
    <div class="progress-bar animate-bar grouped key-white" data-percent="{{ output(floatval((100 - floatval($scorecard['report']['percent_used_against_people_who_were_not_armed_with_gun']))), 0, '%') }}">
      <span>{{ (intval((100 - floatval($scorecard['report']['percent_used_against_people_who_were_not_armed_with_gun']))) > 5) ? num(intval((100 - floatval($scorecard['report']['percent_used_against_people_who_were_not_armed_with_gun']))), 0, '%') : '' }}</span>
    </div>
    <div class="progress-bar animate-bar grouped key-grey" data-percent="{{ output(floatval($scorecard['police_violence']['vehicle_people_killed']), 0, '%') }}">
      <span>{{ (intval($scorecard['police_violence']['vehicle_people_killed']) > 5) ? num(intval($scorecard['police_violence']['vehicle_people_killed']), 0, '%') : '' }}</span>
    </div>
  </div>

  <p class="note">^&nbsp; More Unarmed People Killed per Arrest than {{ num($scorecard['report']['percentile_unarmed_killed_by_police'], 0, '%', true) }} of Depts &nbsp;&nbsp;</p>
</div>
@endif
