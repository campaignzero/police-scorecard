@if (isset($scorecard['arrests']['arrests_2016']) && isset($scorecard['arrests']['arrests_2017']) && isset($scorecard['arrests']['arrests_2018']))
<div class="stat-wrapper">
    <h3>Arrests By Year</h3>
    <p style="margin-top: 18px;">
        <canvas id="bar-chart-arrests"></canvas>
    </p>
</div>
@endif
