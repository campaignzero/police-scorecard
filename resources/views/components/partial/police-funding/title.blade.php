<div class="score-divider-full hide-mobile grade-{{ getGradeClass($scorecard['report']['police_funding_score']) }}"></div>

<div class="content section-header">
    <h1 class="title">
        Police Funding

        <a href="#" class="results-info" data-city="{{ $location }}" data-result-info="police-funding" {!! trackData('Nav', 'Police Funding', 'Results') !!}>i</a>
    </h1>

    <h2 class="score-divider grade grade-{{ getGradeClass($scorecard['report']['police_funding_score']) }}">
        <span class="section-label">
            Section Score:
        </span>
        <span class="section-score">
            {{ num($scorecard['report']['police_funding_score'], 0, '%') }}
        </span>

        @if(isset($scorecard['report']['change_police_funding_score']))
        {!! getChange($scorecard['report']['change_police_funding_score'], true) !!}
        @endif
    </h2>
</div>
