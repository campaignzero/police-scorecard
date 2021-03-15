<div class="section bg-gray stats">
    <div class="content section-header home-page">
        <h1 class="title">
            Key Findings
        </h1>
    </div>

    <div class="content">
        <div class="one-third home-page">
            <h1><strong>7,645</strong> Killings by Police</h1>

            <div class="text">
                <p>Based on population, a Black person was <strong>2.6x</strong> as likely and a Latinx person was <strong>1.3x</strong> as likely to be killed by police as a White person in America from 2013-19</p>
            </div>

            <div class="chart chart-1">
                <div id="chart-mini-people-killed"></div>
            </div>
        </div>

        <div class="one-third home-page">
            <h1><strong>{{ num($scorecard['total_complaints_reported']) }}</strong> civilian complaints of police misconduct</h1>

            <div class="text">
                <p>Only <strong>1 in every {{ round($scorecard['total_complaints_reported'] / $scorecard['total_complaints_sustained']) }} complaints</strong> were ruled in favor of civilians from 2016-19.</p>
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
                <p>Police in America made <strong>12x as many arrests for low level offenses</strong> as for violent crimes from 2013-2019.</p>
            </div>

            <div class="chart chart-3">
                <div class="chart-mini-arrests">
                    <div class="filler"
                        style="width: {{ ($scorecard['total_low_level_arrests'] / ($scorecard['total_arrests_2013'] + $scorecard['total_arrests_2014'] + $scorecard['total_arrests_2015'] + $scorecard['total_arrests_2016'] + $scorecard['total_arrests_2017'] + $scorecard['total_arrests_2018'] + $scorecard['total_arrests_2019'])) * 100 }}%; height: 100%">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content tableau-chart">
        <div class='tableauPlaceholder' id='viz1615182678022'>
            <noscript><a href='#'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Po&#47;PoliceScorecard&#47;PolicingIndicators&#47;1_rss.png' style='border: none' /></a></noscript>
            <object class='tableauViz'  style='display:none;'>
                <param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' />
                <param name='embed_code_version' value='3' />
                <param name='site_root' value='' />
                <param name='name' value='PoliceScorecard&#47;PolicingIndicators' />
                <param name='tabs' value='no' />
                <param name='toolbar' value='no' />
                <param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Po&#47;PoliceScorecard&#47;PolicingIndicators&#47;1.png' />
                <param name='animate_transition' value='yes' />
                <param name='display_static_image' value='yes' />
                <param name='display_spinner' value='yes' />
                <param name='display_overlay' value='yes' />
                <param name='display_count' value='yes' />
                <param name='language' value='en' />
                <param name='filter' value='publish=yes' />
            </object>
        </div>
        <script type='text/javascript'>
            var divElement = document.getElementById('viz1615182678022');
            var vizElement = divElement.getElementsByTagName('object')[0];
            if ( divElement.offsetWidth > 800 ) {
                vizElement.style.width='800px';
                vizElement.style.height='377px';
            } else if ( divElement.offsetWidth > 500 ) {
                vizElement.style.width='800px';
                vizElement.style.height='377px';
            } else {
                vizElement.style.width='100%';
                vizElement.style.height='377px';
            }

            var scriptElement = document.createElement('script');
            scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';
            vizElement.parentNode.insertBefore(scriptElement, vizElement);
        </script>
    </div>
    <div class="content more-findings-wrapper">
        <a href="/findings" class="more-findings" {!! trackData('Nav', 'Key Findings', 'More Findings') !!}>More Findings</a>
    </div>
</div>
