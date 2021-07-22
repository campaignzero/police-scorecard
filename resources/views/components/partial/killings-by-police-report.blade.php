<!-- Killings by Police -->
<div class="section bg-gray stats">
  <div class="content section-header">
    <h1 class="title">
      Key Findings
    </h1>
  </div>

  <div class="content">
    <div class="one-third">
      <h2><strong>{{ num(intval($scorecard['report']['total_people_killed']), 0) }}</strong> Killings by Police</h2>

      <div class="text">
        @if(intval($scorecard['report']['total_people_killed']) === 0)
        <p>This agency did not reportedly kill anyone from 2013-20.</p>
        @elseif(intval($scorecard['report']['total_people_killed']) === 1)
        <p>{{ $scorecard['agency']['name'] }} {{ ($type === 'police-department') ? 'Police' : 'Sheriff' }} Department killed 1 person from 2013-20.</p>
        @elseif(num($scorecard['report']['black_deadly_force_disparity_per_population'], 1, 'x') === '0x' &&  num($scorecard['report']['hispanic_deadly_force_disparity_per_population'], 1, 'x') === '0x')
        <p>{{ $scorecard['report']['total_people_killed'] }} people killed by {{ $scorecard['agency']['name'] }} {{ ($type === 'police-department') ? 'Police' : 'Sheriff' }} Department from 2013-20</p>
        @elseif(!isset($scorecard['report']['black_deadly_force_disparity_per_population']) || !isset($scorecard['report']['hispanic_deadly_force_disparity_per_population']))
        <p>That's higher than <strong>{{ num($scorecard['report']['percentile_killed_by_police'], 0, '%', true) }}</strong> of {{ getStateName($state) }} police departments.</p>
        @else
        <p>Based on population, a Black person was <strong>{{ num($scorecard['report']['black_deadly_force_disparity_per_population'], 1, 'x') }} as likely</strong> and a Latinx person was <strong>{{ num($scorecard['report']['hispanic_deadly_force_disparity_per_population'], 1, 'x') }} as likely</strong> to be killed by police as a White person in {{ $scorecard['agency']['name'] }} from 2013-20.</p>
        @endif
      </div>

      <div class="chart chart-1">
        <div id="chart-mini-people-killed"></div>
      </div>
    </div>

    <div class="one-third">
      <h2><strong>{{ num(intval($scorecard['police_accountability']['civilian_complaints_reported'])) }}</strong> civilian complaint{{$scorecard['police_accountability']['civilian_complaints_reported'] === 1 ? '' : 's' }} of police misconduct</h2>

      @php
      $black_disparity = (!isset($scorecard['agency']['black_population']) || $scorecard['agency']['black_population'] === 0) ? 0 : round(($scorecard['police_violence']['black_people_killed'] / $scorecard['agency']['black_population']) * 100, 2);
      $hispanic_disparity = (!isset($scorecard['agency']['hispanic_population']) || $scorecard['agency']['hispanic_population'] === 0) ? 0 : round(($scorecard['police_violence']['hispanic_people_killed'] / $scorecard['agency']['hispanic_population']) * 100, 2);
      $white_disparity = (!isset($scorecard['agency']['white_population']) || $scorecard['agency']['white_population'] === 0) ? 0 : round(($scorecard['police_violence']['white_people_killed'] / $scorecard['agency']['white_population']) * 100, 2);
      @endphp

      <div class="text">
        @if($scorecard['police_accountability']['civilian_complaints_reported'] === 0)

        <p><strong>0 complaints </strong> of misconduct were reported from {{ $scorecard['police_accountability']['years_of_complaints_data'] }}.</p>

        @elseif($black_disparity > 0 && $hispanic_disparity === 0 && $white_disparity === 0)

        <p><strong>100%</strong> of people killed by {{ $scorecard['agency']['name'] }} were Black.</p>

        @elseif($black_disparity === 0 && $hispanic_disparity > 0 && $white_disparity === 0)

        <p><strong>100%</strong> of people killed by {{ $scorecard['agency']['name'] }} were Latinx.</p>

        @elseif($black_disparity === 0 && $hispanic_disparity === 0 && $white_disparity > 0)

        <p><strong>100%</strong> of people killed by {{ $scorecard['agency']['name'] }} were White.</p>

        @elseif($scorecard['police_accountability']['civilian_complaints_sustained'] === 1)

        <p>Only <strong>1 in every {{ num($scorecard['police_accountability']['civilian_complaints_reported']) }} complaints</strong> were ruled in favor of civilians from {{ $scorecard['police_accountability']['years_of_complaints_data'] }}.</p>

        @elseif($scorecard['police_accountability']['civilian_complaints_reported'] > 0)

        <p><strong>{{ num(intval($scorecard['report']['complaints_sustained']), 0, '%') }}</strong> were ruled in favor of civilians from {{ $scorecard['police_accountability']['years_of_complaints_data'] }}.</p>

        @elseif(!$scorecard['report']['complaints_sustained'] || $scorecard['report']['complaints_sustained'] === 0)

        <p>No civilian complaints data obtained for this agency.</p>

        @else

        <p>Only <strong>1 in every {{ round(intval(str_replace(',', '', $scorecard['police_accountability']['civilian_complaints_reported'])) / intval(str_replace(',', '', $scorecard['police_accountability']['civilian_complaints_sustained']))) }} complaints</strong> were ruled in favor of civilians from 2016-19.</p>

        @endif
      </div>

      <div class="chart chart-2">
        <script>
        var CHART_MINI_REPORTED = {{ $scorecard['police_accountability']['civilian_complaints_reported'] ? $scorecard['police_accountability']['civilian_complaints_reported'] : 0 }};
        var CHART_MINI_SUSTAINED = {{ $scorecard['police_accountability']['civilian_complaints_sustained'] ? $scorecard['police_accountability']['civilian_complaints_sustained'] : 0 }};
        </script>
        <canvas id="chart-mini-complaints-reported" width="125" height="125"></canvas>
        <span id="chart-mini-complaints-reported-label"></span>
      </div>
    </div>

    <div class="one-third">
      <h2><strong>{{ num($scorecard['report']['total_arrests']) }}</strong> arrests made</h2>

      <div class="text">
        <p><strong>{{ num($scorecard['report']['percent_misdemeanor_arrests'], 0, '%') }}</strong> of all arrests were for low-level, non-violent offenses from 2013-19.</p>
      </div>

      <div class="chart chart-3">
        <div class="chart-mini-arrests">
          <div class="filler" style="width: {{ $scorecard['report']['percent_misdemeanor_arrests']  }}%; height: 100%"></div>
        </div>
      </div>
    </div>
  </div>
</div>
