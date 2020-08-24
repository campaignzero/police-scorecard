<div class="stat-wrapper grouped">
    <h3>Percent of total arrests by type</h3>

    <p>All Arrests for Low Level Offenses ( {{ num($scorecard['report']['percent_misdemeanor_arrests'], 0, '%') }} )</p>
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar dark-grey" data-percent="{{ output(intval($scorecard['report']['percent_misdemeanor_arrests']), 0, '%') }}"></div>
    </div>

    <p>Drug Possession ( {{ num($scorecard['report']['percent_drug_possession_arrests'], 0, '%') }} )</p>
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar dark-grey" data-percent="{{ output(intval($scorecard['report']['percent_drug_possession_arrests']), 0, '%') }}"></div>
    </div>

    <p>Violent Crime ( {{ num($scorecard['report']['percent_violent_crime_arrests'], 0, '%') }} )</p>
    <div class="progress-bar-wrapper">
        <div class="progress-bar animate-bar dark-grey" data-percent="{{ output(intval($scorecard['report']['percent_violent_crime_arrests']), 0, '%') }}"></div>
    </div>
</div>
