<div class="score-divider-full hide-mobile grade-{{ getGradeClass($scorecard['report']['police_violence_score']) }}"></div>
<div class="section score-divider-full hide-mobile grade-{{ getGradeClass($scorecard['report']['approach_to_policing_score']) }}"></div>

<div class="content section-header">
    <div class="divider-line hide-desktop"></div>

    <h1 class="title large-title">
        Approach to Law Enforcement
        <a href="#" class="results-info" data-city="{{ $location }}" data-result-info="approach" {!! trackData('Nav', 'Approach', 'Results') !!}>i</a>
    </h1>

    <h2 class="score-divider grade grade-{{ getGradeClass($scorecard['report']['approach_to_policing_score']) }}">
        <span class="section-label">Section Score:</span>
        <span class="section-score">{{ num($scorecard['report']['approach_to_policing_score'], 0, '%') }}</span>
        {!! getChange($scorecard['report']['change_approach_to_policing_score'], true) !!}
    </h2>

    <p class="source-link-wrapper">
        Source:
        <a href="https://crime-data-explorer.fr.cloud.gov/explorer/national/united-states/arrest" class="source-link" rel="noopener" target="_blank" {!! trackData('External Nav', 'Approach', 'Uniform Crime Report') !!}>
            Uniform Crime Report
        </a>
    </p>
</div>
