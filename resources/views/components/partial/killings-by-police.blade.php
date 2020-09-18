<div class="section bg-gray stats">
  <div class="content">
    <div class="one-third home-page">
      <h1>7,645 Killings by Police</h1>

      <div class="text">
        <p>Based on population, a Black person was 2.6x as likely and a Latinx person was 1.3x as likely to be killed by police as a White person in America from 2013-19</p>
      </div>

      <div class="chart chart-1">
        <div id="chart-mini-people-killed"></div>
      </div>
    </div>

    <div class="one-third home-page">
      <h1><strong>{{ num($scorecard['total_complaints_reported']) }}</strong> civilian complaints of police misconduct</h1>

      <div class="text">
        <p>Only <strong>1 in every {{ round($scorecard['total_complaints_reported'] / $scorecard['total_complaints_sustained']) }} complaints</strong> were ruled in favor of civilians from 2016-18.</p>
      </div>

      <div class="chart chart-2">
        <script>
        var CHART_MINI_REPORTED = {{ $scorecard['total_complaints_reported'] ? $scorecard['total_complaints_reported'] : 0 }};
        var CHART_MINI_SUSTAINED = {{ $scorecard['total_complaints_sustained'] ? $scorecard['total_complaints_sustained'] : 0 }};
        </script>
        <canvas id="chart-mini-complaints-reported" width="125" height="125"></canvas>
        <span id="chart-mini-complaints-reported-label" class="national-report"></span>
      </div>
    </div>

    <div class="one-third home-page">
      <h1><strong>{{ num($scorecard['total_arrests']) }}</strong> arrests made</h1>

      <div class="text">
        <p>Police in America made <strong>{{ num($scorecard['times_more_misdemeanor_arrests_than_violent_crime'], 1, 'x') }} as many arrests for low level offenses</strong> as for violent crimes in 2013-2018.</p>
      </div>

      <div class="chart chart-3">
        <div class="chart-mini-arrests">
          <div class="filler" style="width: {{ ($scorecard['total_low_level_arrests'] / ($scorecard['total_arrests_2013'] + $scorecard['total_arrests_2014'] + $scorecard['total_arrests_2015'] + $scorecard['total_arrests_2016'] + $scorecard['total_arrests_2017'] + $scorecard['total_arrests_2018'])) * 100 }}%; height: 100%"></div>
        </div>
      </div>
    </div>
  </div>
</div>
