<!-- Grades -->
<div class="section bg-light-gray grades short" id="score-card">
    <div class="content grades-header">
        <h1 class="title">
            {{ getStateName($state)  }} {{ $type === 'sheriff' ? "Sheriff's" : "Police" }} Department Scores
        </h1>

        <div class="summary">
            <p>
                Rankings are based upon a 0 to 100 percentage scale. Departments with <strong>higher scores</strong> use
                <strong>less force</strong>, make <strong>fewer arrests</strong> for low level offenses, <strong>solve</strong>
                murder cases more often, hold officers <strong>more accountable</strong> and <strong>spend less on policing</strong> overall.
            </p>

            <p>Overall Scores for Depts where We Have Obtained the Most Data.</p>

            <p>Tap more to see an extended list.</p>
        </div>
    </div>

    <div class="content"></div>

    <div class="content filter-wrapper">
        <a href="#score-0-29" class="filter-grade grade-f-minus" style="opacity: 1" data-grade="f-minus" {!! trackData('Nav', 'Grades Filter', '0-29%') !!}>
            <span class="grade grade-f-minus"></span>
            <span class="percent">0-29%</span>
        </a>

        <a href="#score-30-59" class="filter-grade grade-f" style="opacity: 1" data-grade="f" {!! trackData('Nav', 'Grades Filter', '30-59%') !!}>
            <span class="grade grade-f"></span>
            <span class="percent">30-59%</span>
        </a>

        <a href="#score-60-69" class="filter-grade grade-d" style="opacity: 1" data-grade="d" {!! trackData('Nav', 'Grades Filter', '60-69%') !!}>
            <span class="grade grade-d"></span>
            <span class="percent">60-69%</span>
        </a>

        <a href="#score-70-79" class="filter-grade grade-c" style="opacity: 1" data-grade="c" {!! trackData('Nav', 'Grades Filter', '70-79%') !!}>
            <span class="grade grade-c"></span>
            <span class="percent">70-79%</span>
        </a>

        <span class="break-mobile"></span>

        <a href="#score-80-89" class="filter-grade grade-b" style="opacity: 1" data-grade="b" {!! trackData('Nav', 'Grades Filter', '80-89%') !!}>
            <span class="grade grade-b"></span>
            <span class="percent">80-89%</span>
        </a>

        <a href="#score-90-100" class="filter-grade grade-a" style="opacity: 1" data-grade="a" {!! trackData('Nav', 'Grades Filter', '90-100%') !!}>
            <span class="grade grade-a"></span>
            <span class="percent">90-100%</span>
        </a>

        <a href="#score-incomplete" class="filter-grade grade-incomplete" style="opacity: 1" data-grade="incomplete" {!! trackData('Nav', 'Grades Filter', 'Incomplete') !!}>
            <span class="grade grade-incomplete"></span>
            <span class="percent">Incomplete</span>
        </a>
    </div>

    <div class="content">
        <div class="left">
            <table>
                <tr>
                <th width="80%">{{ $type === 'sheriff' ? "Sheriff's" : "Police" }} Department</th>
                    <th>Score</th>
                </tr>
                @foreach(array_slice($grades['all'], 0, 500) as $index => $card) @if ($index < floor(count(array_slice($grades['all'], 0, 500)) / 2) && $index)
                <tr class="grade-row grade-{{ $card['complete'] ? $card['grade_class'] : 'incomplete' }}" data-grade="{{ $card['grade_class'] }}">
                    <td colspan="2">
                    <a href="{{ $card['url_pretty'] }}"{!! ($index > 7) ? ' class="show-more-only" tabindex="-1" aria-hidden="true"' : '' !!} {!! trackData('Nav', 'Grades', $card['agency_name']) !!}>
                            <span class="agency-name">{{ $card['complete'] ? (count($grades['complete']) - $index) . '.' : '*' }} {{ $card['agency_name'] }}</span>
                            <span class="grade grade-{{ $card['complete'] ? $card['grade_class'] : 'incomplete' }}"></span>
                            <span class="percent">{{ $card['overall_score'] }}%</span>
                        </a>
                    </td>
                </tr>
                @endif @endforeach
            </table>
        </div>
        <div class="right">
            <table>
                <tr>
                    <th width="80%">{{ $type === 'sheriff' ? "Sheriff's" : "Police" }} Department</th>
                    <th>Score</th>
                </tr>
                @foreach(array_slice($grades['all'], 0, 500) as $index => $card) @if ($index >= floor(count(array_slice($grades['all'], 0, 500)) / 2))
                <tr class="grade-row grade-{{ $card['complete'] ? $card['grade_class'] : 'incomplete' }}" data-grade="{{ $card['grade_class'] }}">
                    <td colspan="2">
                        <a href="{{ $card['url_pretty'] }}"{!! ($index > (floor(count($grades['complete']) / 2) + 7)) ? ' class="show-more-only" tabindex="-1" aria-hidden="true"' : '' !!} {!! trackData('Nav', 'Grades', $card['agency_name']) !!}>
                            <span class="agency-name">{{ $card['complete'] ? (count($grades['complete']) - $index) . '.' : '*' }} {{ $card['agency_name'] }}</span>
                            <span class="grade grade-{{ $card['complete'] ? $card['grade_class'] : 'incomplete' }}"></span>
                            <span class="percent">{{ $card['overall_score'] }}%</span>
                        </a>
                    </td>
                </tr>
                @endif @endforeach
            </table>
        </div>
    </div>

    <div class="content{{ count($grades['all']) <= 10 ? ' hide-mobile' : '' }}{{ count($grades['all']) <= 20 ? ' hide-desktop' : '' }}">
        <button class="button more" id="show-more" {!! trackData('Nav', 'Grades', 'Show More') !!}>SHOW MORE</a>
        <button class="button less" id="show-less" {!! trackData('Nav', 'Grades', 'Show Less') !!}>SHOW LESS</a>
    </div>

    <div class="content bt add-new-data">
        <div class="left">
            <p class="partial-data"><strong>*</strong> An asterisk indicates this location did not publish enough data to evaluate. <strong>Click below to add data to the Scorecard.</strong></p>
        </div>
        <div class="right add-data">
            <a href="https://forms.gle/WPC2Z6A92tBqxGWZ8" rel="noopener" target="_blank" {!! trackData('Nav', 'Grades', 'Add New Data') !!}>Add New Data</a>
        </div>
    </div>
</div>
