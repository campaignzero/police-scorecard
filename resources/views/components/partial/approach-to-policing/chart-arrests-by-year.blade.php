@if (isset($scorecard['arrests']['arrests_2016']) && isset($scorecard['arrests']['arrests_2017']) && isset($scorecard['arrests']['arrests_2018']))
<div class="stat-wrapper">
    <h3>Arrests By Year</h3>
    <p>{{ num($scorecard['report']['total_arrests']) }} Arrests Reported from 2013-19</p>
    <p style="margin-top: 18px; margin-bottom: 6px;">
        <canvas id="bar-chart-arrests"></canvas>
    </p>
</div>
@endif
