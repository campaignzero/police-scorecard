<div class="section score animate grade-{{ ($scorecard['agency']['complete']) ? $scorecard['report']['grade_class'] : 'incomplete' }}" id="toggle-animate">
  <div class="content">
    <div class="left">
      <div class="selected-location{{ (strlen($scorecard['agency']['name']) > 14) ? ' long' : '' }}{{ (strlen($scorecard['agency']['name']) > 25) ? ' really-long' : '' }}">
        <span class="selected-location-label">
            {{ $type === 'police-department' ? 'Police Department' : 'Sheriff\'s Department' }}
        </span>
        <a href="#" id="score-location" title="Select Other Departments in {{ getStateName($state) }}" {!! trackData('Nav', 'Location', 'Location Selection') !!}>
            {!! ($scorecard['agency']['complete']) ? '' : '<span class="incomplete">*</span>' !!}
            {{ $scorecard['agency']['name'] }}
        </a>
      </div>
    </div>
    <a href="#scorecard-at-a-glance" class="right v-center view-score" {!! trackData('Nav', 'Location', 'View Score') !!}>
      <span class="grade">{{ $scorecard['report']['overall_score'] }}<i>%</i></span>
      <span class="score-label">SCORE</span>
    </a>
  </div>
  @if ($scorecard['agency']['complete'] === false)
  <div class="content">
    <p class="incomplete-data">
        * An asterisk indicates that this location <strong>has not provided enough data</strong> to be included in our rankings. We are still working to obtain comprehensive data from every jurisdiction in the nation.
    </p>
  </div>
  @endif
</div>
