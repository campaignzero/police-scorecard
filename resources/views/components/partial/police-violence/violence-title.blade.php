<div class="score-divider-full hide-mobile grade-{{ getGradeClass($scorecard['report']['police_violence_score']) }}"></div>

<div class="content section-header">
    <div class="divider-line hide-desktop"></div>

    <h1 class="title">
        Police violence

        <a href="#" class="results-info" data-city="{{ $location }}" data-result-info="police-violence" {!! trackData('Nav', 'Police Violence', 'Results') !!}>i</a>
    </h1>

    <h2 class="score-divider grade grade-{{ getGradeClass($scorecard['report']['police_violence_score']) }}">
        <span class="section-label">Section Score:</span>
        <span class="section-score">{{ num($scorecard['report']['police_violence_score'], 0, '%') }}</span>
        {!! getChange($scorecard['report']['change_police_violence_score'], true, 'since \'16') !!}
    </h2>
</div>
