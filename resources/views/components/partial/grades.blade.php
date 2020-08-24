<!-- Grades -->
<div class="section bg-light-gray grades short" id="score-card">
    <div class="content">
        <h1 class="title">
            United States {{ $type === 'sheriff' ? "Sheriff's" : "Police" }} Department Scores
        </h1>
    </div>

    <div class="content">
        <div class="left">
            <table>
                <tr>
                    <th width="80%">Department</th>
                    <th>Score</th>
                </tr>
                @foreach($grades as $index => $card) @if ($index < floor(count($grades) / 2))
                <tr>
                    <td colspan="2">
                        <a href="{{ $card['url_pretty'] }}"{!! ($index > 7) ? ' class="show-more-only" tabindex="-1" aria-hidden="true"' : '' !!} {!! trackData('Nav', 'Grades', $card['agency_name']) !!}>
                            <span class="agency-name">{{ (count($grades) - $index) }}. {{ $card['agency_name'] }}</span>
                            <span class="grade grade-{{ $card['grade_class'] }}"></span>
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
                    <th width="80%">Department</th>
                    <th>Score</th>
                </tr>
                @foreach($grades as $index => $card) @if ($index >= floor(count($grades) / 2))
                <tr>
                    <td colspan="2">
                        <a href="{{ $card['url_pretty'] }}"{!! ($index > (floor(count($grades) / 2) + 7)) ? ' class="show-more-only" tabindex="-1" aria-hidden="true"' : '' !!} {!! trackData('Nav', 'Grades', $card['agency_name']) !!}>
                            <span class="agency-name">{{ (count($grades) - $index) }}. {{ $card['agency_name'] }}</span>
                            <span class="grade grade-{{ $card['grade_class'] }}"></span>
                            <span class="percent">{{ $card['overall_score'] }}%</span>
                        </a>
                    </td>
                </tr>
                @endif @endforeach
            </table>
        </div>
    </div>

    <div class="content{{ count($grades) <= 10 ? ' hide-mobile' : '' }}{{ count($grades) <= 20 ? ' hide-desktop' : '' }}">
        <button class="button more" id="show-more" {!! trackData('Nav', 'Grades', 'Show More') !!}>SHOW MORE</a>
        <button class="button less" id="show-less" {!! trackData('Nav', 'Grades', 'Show Less') !!}>SHOW LESS</a>
    </div>

    <div class="content bt add-new-data">
        <div class="left">
            <p class="partial-data"><strong>*</strong> An asterisk indicates this location did not publish enough data to evaluate. <strong>Click below to add data to the Scorecard.</strong></p>
        </div>
        <div class="right add-data">
            <button class="btn btn-primary" onclick="document.getElementById('research').click();document.querySelector('.take-action').scrollIntoView({ behavior: 'smooth' }); return false;" {!! trackData('Nav', 'Grades', 'Add New Data') !!}>Add New Data</button>
        </div>
    </div>
</div>
