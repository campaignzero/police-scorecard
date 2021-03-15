@extends('layouts.app')

@section('title', 'Findings')

@section('content')
    <x-partial.menu />

    <div class="section bg-dotted current-state">
        <div class="content">
            Key Findings
        </div>
    </div>

    <div class="section bg-light-gray findings toc">
        <div class="content">
            <h2 class="subtitle">
                TABLE OF CONTENTS
            </h2>

            <nav class="toc">
                <ul>
                    <li><a href="#intro" {!! trackData('Nav', 'Findings', 'Intro') !!}><strong>Intro</strong></a></li>
                    <li>
                        <a href="#data-availability" {!! trackData('Nav', 'Findings', 'Findings') !!}><strong>Findings</strong>
                        <ol>
                            <li><a href="#data-availability" {!! trackData('Nav', 'Findings', 'Police Hide Data') !!}>Police continue to hide substantial amounts of data from the public</a></li>
                            <li><a href="#policing-differs" {!! trackData('Nav', 'Findings', 'Policing Differs') !!}>Policing differs substantially depending where you live</a></li>
                            <li><a href="#making-fewer-arrests" {!! trackData('Nav', 'Findings', 'Making Fewer Arrests') !!}>Police are making fewer arrests for low level offenses</a></li>
                            <li><a href="#racial-disparities-persist" {!! trackData('Nav', 'Findings', 'Racial Disparities Persist') !!}>As arrests decline, racial disparities persist</a></li>
                            <li><a href="#more-heavily-policed" {!! trackData('Nav', 'Findings', 'More Heavily Policed') !!}>Black communities are more heavily policed</a></li>
                            <li><a href="#clear-pattern" {!! trackData('Nav', 'Findings', 'Clear Pattern') !!}>Some police departments show a clear pattern of using more force than other departments</a></li>
                            <li><a href="#misconduct-investigations" {!! trackData('Nav', 'Findings', 'Misconduct Investigations') !!}>Few departments regularly rule against officers in misconduct investigations</a></li>
                            <li><a href="#increased-funding" {!! trackData('Nav', 'Findings', 'Increased Funding') !!}>80% of jurisdictions increased police funding from 2013-2018</a></li>
                        </ol>
                    </li>
                    <li><a href="#conclusion" {!! trackData('Nav', 'Findings', 'Conclusion') !!}><strong>Conclusion</strong></a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="section findings">
        <div class="content">

            <h2 class="subtitle" id="intro">
                WE EVALUATED POLICING IN AMERICA. HERE'S WHAT WE FOUND.
            </h2>

            <p>
                Nationwide protests have <a href="https://www.vox.com/2020/6/26/21301066/public-opinion-shift-black-lives-matter" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'Shifted Public Opinion') !!}>shifted public opinion</a> in support of systemic change. But while public opinion is changing, the police have continued to kill people at <a href="http://mappingpoliceviolence.org/" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'Similar Rates') !!}>similar rates</a> this year as they did last year. In a nation with thousands of law enforcement agencies, each with different issues and outcomes, changing policing outcomes on a nationwide scale requires sustained organizing and advocacy efforts in <em>every jurisdiction</em>. To do this, <strong>communities need the tools to effectively monitor police behavior and hold cities and counties accountable to producing measurable change</strong>.
            </p>

            <p>
                To obtain and publish this information, we submitted public records requests to local police departments and combined the data obtained from these departments with federal databases tracking crime, arrests, financial and personnel records from thousands of municipal and county governments. This represents one of the largest-scale examinations of policing outcomes in the United States - including every municipal police department and county sheriff's department in the country. <strong>Here are initial findings from our analysis:</strong>
            </p>

            <div class="divider"></div>

            <!-- 1. Police continue to hide substantial amounts of data from the public -->

            <h2 class="subtitle" id="data-availability">
                1. Police continue to hide substantial amounts of data from the public
            </h2>

            <p>
                The federal government does not publish comprehensive data on police violence or misconduct. In <a href="https://www.wnyc.org/story/police-misconduct-records/" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', '38 States') !!}>38 states</a>, laws restrict or prohibit agencies from making these records public. Even in states where this information is supposed to be public record, local police agencies often refuse to comply with public records requests or charge <a href="https://www.muckrock.com/foi/pinellas-county-10455/police-data-collection-project-pinellas-county-sheriffs-office-97754/" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'Exorbitant Fees') !!}>exorbitant fees</a> to produce these records. In some cases, like Rapid City South Dakota, police <a href="https://www.muckrock.com/foi/rapid-city-30141/police-data-collection-project-rapid-city-police-department-98427/#file-878340" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'Have Refused') !!}>have refused</a> to provide even basic data on police use of force unless a court orders them to make these records public.
            </p>

            <p>
                <a href="{{ asset('/pdf/sinyangwe_open_record_request_response_7.29.2020.pdf') }}" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'Record Request Response') !!} class="image-link" title="Open PDF - Sinyangwe Open Record Request Response 7.29.2020">
                    <img src="{{ asset('/images/findings/record-request.png') }}" alt="Sinyangwe Open Record Request Response 7.29.2020" />
                </a>
            </p>

            <p>
                As such, there are substantial limitations to the data we are able to collect from agencies and limitations on our capacity to make comparisons between agencies - especially when it comes to outcomes such as police misconduct complaints and police use of force. This is an ongoing project and more data will be published as it is obtained. Track our progress in compiling the data on use of force, misconduct complaints, arrests, police budgets and other indicators from over 16,000 law enforcement agencies using the interactive visualization below.
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecardDataTracker/Profile/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608411754526" data-viz-desktop-height="860px" data-viz-mobile-height="460px" />
                <div id="viz1608411754526">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecardDataTracker/Profile" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <div class="divider"></div>

            <!-- 2. Policing differs substantially depending where you live -->

            <h2 class="subtitle" id="policing-differs">
                2. Policing differs substantially depending where you live
            </h2>

            <p>
                <strong>How Police Departments Are Compared:</strong>
            </p>

            <p>
                The Police Scorecard includes data on all police and sheriff's departments that are the primary law enforcement agency for their jurisdiction. Each agency's reported outcomes are compared to the outcomes reported by other agencies of the same type, generally grouped by the following agency types:
            </p>

            <ol>
                <li>Municipal Police Departments</li>
                <li>County Sheriff's Departments</li>
            </ol>

            <p>
                Among agencies of the same type, scores are calculated as percentiles relative to other departments with similar sized jurisdictions:
            </p>

            <ol>
                <li>< 50,000 residents</li>
                <li>50,000 - 100,000 residents</li>
                <li>100,000 - 250,000 residents</li>
                <li>250,000+ residents</li>
            </ol>

            <p>
                83% of the 16,146 agencies are municipal (city or town) police departments while the remaining 17% are county sheriff's departments. The vast majority of these agencies represent small towns and cities, with 93% of all agencies in the Scorecard policing in jurisdictions with fewer than 50,000 residents.
            </p>

            <p>
                <strong>Most police agencies have jurisdictions with fewer than 50,000 residents.</strong>
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/DepartmentTotalsbyPopulationSize/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608525476357" data-viz-desktop-height="277px" data-viz-mobile-height="277px" />
                <div id="viz1608525476357">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/DepartmentTotalsbyPopulationSize" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <p>
                <strong>State-Level Policing Outcomes</strong>
            </p>

            <p>
                Policing outcomes varied by state. To compare agencies, we calculated scores for each agency using a 0-100% scale whereby departments with <strong>higher scores</strong> use <strong>less force</strong>, make <strong>fewer arrests for low level offenses, solve murder cases more often</strong>, hold officers <strong>more accountable</strong> and <strong>spend less</strong> on policing overall (Read more about our methodology <a href="/about" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'Our Methodology') !!}>here</a>).
                Based on this methodology, Nevada and Georgia had among the lowest scores for the average police or sheriff's department in a state while Pennsylvania and Massachusetts had among the highest average scores.
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/StateScores/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608515880357" data-viz-desktop-height="807px" data-viz-mobile-height="460px" />
                <div id="viz1608515880357" style="position: relative;">
                    <object style="display: none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/StateScores" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <p>
                <strong>Local-Level Policing Outcomes</strong>
            </p>

            <p>
                There was also substantial variation in policing outcomes among city police departments and county sheriffs within each state - with the lowest scoring departments receiving scores at or below 30% and the highest scoring departments receiving scores above 60%. Among the largest police jurisdictions, those with over 400,000 population, Charlotte-Mecklenburg and El Paso police departments had among the highest overall scores - making fewer low level arrests, using less force, and spending less on policing than other big city police departments. Further exploration of the organizational culture, leadership and practices of these departments might produce valuable insights into how to improve outcomes in other places. By contrast, police departments in Long Beach, Memphis and Kansas City, MO had the worst outcomes. This suggests the need for further investigation and intervention from local, state and federal authorities to better understand and address these issues.
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/BigCityScores/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608496271669" data-viz-desktop-height="807px" data-viz-mobile-height="460px" />
                <div id="viz1608496271669">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/BigCityScores" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <div class="divider"></div>

            <!-- 3. Police are making fewer arrests for low level offenses -->

            <h2 class="subtitle" id="making-fewer-arrests">
                3. Police are making fewer arrests for low level offenses
            </h2>

            <p>
                <strong>Two-thirds of all arrests reported by law enforcement nationwide in 2019 were for low-level offenses</strong>, which include loitering, disorderly conduct, substance use, sex work and other offenses that are not crimes against people or property. This is 12x as many reported arrests as were made for violent crimes. Among big cities, police in Seattle, Boston and Detroit had the lowest arrest rates for low level offenses. By contrast, Louisville police arrested people for low level offenses at 5x higher rate than these cities. While some of these differences could reflect differences in crime, such large disparities between cities suggest major differences in how each city approaches law enforcement.
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/LowLevelArrestTrendsOverall/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608518127922" data-viz-desktop-height="420px" data-viz-mobile-height="402px" />
                <div id="viz1608518127922">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/LowLevelArrestTrendsOverall" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <p>
                Big cities appear to be shifting their approach to law enforcement more quickly than other parts of the country. <strong>Police departments representing jurisdictions with over 400,000 residents, on average, reported 23% fewer arrests overall and 26% fewer low level offenses in 2019 than they did in 2013</strong> - exceeding the 13% reduction in arrests and 11% reduction in low level arrests reported by other agencies during this time period. Cities like New York, Houston, Milwaukee, Nashville and Fort Worth led other big cities in reducing arrests for low level offenses - cutting these arrests by more than 60% from 2013-2019. These declines in the enforcement of low level offenses did not appear to change how agencies approached violent crime - big city police departments reported similar violent crime clearance rates during this period and actually made 3% <em>more</em> arrests overall for violent crime in 2019 than they had in 2013.
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/LowLevelArrestChanges/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608515841510" data-viz-desktop-height="527px" data-viz-mobile-height="460px" />
                <div id="viz1608515841510">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/LowLevelArrestChanges" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <div class="divider"></div>

            <!-- 4. As arrests decline, racial disparities persist -->

            <h2 class="subtitle" id="racial-disparities-persist">
                4. As arrests decline, racial disparities persist
            </h2>

            <p>
                <strong>Black people were arrested at higher rates than white people in 92% of police jurisdictions</strong> reporting 100 or more arrests in 2019 - including every police department with a jurisdiction of over 400,000 population. Despite research <a href="https://www.cdc.gov/nchs/data/hus/2018/020.pdf" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'Drug Rate Research') !!}>showing</a> Black and white people use drugs at similar rates, <strong>three-quarters of police departments arrested Black people for drug possession at higher rates than white people</strong>. Moreover, despite an overall decline in drug possession arrests in big cities, Black-white arrest disparities in these arrests have <em>grown</em> in many cities since 2013, a trend that has been <a href="https://datacollaborativeforjustice.org/wp-content/uploads/2020/04/Marijuana-Report.pdf" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'Cited Trend') !!}>cited</a> in previous <a href="https://drugpolicy.org/legalization-status-report" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'Previous Research') !!}>research</a>.
            </p>

            <p>
                Though there were racial disparities in arrests in almost every jurisdiction, the most severe disparities tended to be found in smaller towns and cities. Of the 500 departments with the largest Black-white racial disparities in arrests, 4 in 5 had a population of fewer than 15,000 people. This highlights the need to expand and deepen policy and practice interventions beyond the largest cities to also reach more rural and small city jurisdictions.
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/ArrestDisparitiesin2019/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608518452695" data-viz-desktop-height="477px" data-viz-mobile-height="427px" />
                <div id="viz1608518452695">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/ArrestDisparitiesin2019" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/DrugArrestDisparities/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608523779568" data-viz-desktop-height="627px" data-viz-mobile-height="500px" />
                <div id="viz1608523779568">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/DrugArrestDisparities" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <p>
                <strong>Disparities in Murder Clearance Rates</strong>
            </p>

            <p>
                While police were more likely to arrest Black people for low level offenses, they were <em>less</em> likely to find someone responsible for the most serious offense - homicide - when the victim was Black. Nationwide, police reported finding a suspect in 88% of homicides of white victims from 2013-2019 compared to only 79% of Latinx victims and 78% of Black victims.
            </p>

            <div class="divider"></div>

            <!-- 5. Black communities are more heavily policed -->

            <h2 class="subtitle" id="more-heavily-policed">
                5. Black communities are more heavily policed
            </h2>

            <p>
                In addition to widespread racial disparities in arrests and murder clearance rates, communities with more Black residents tended to be more saturated with police officers, with more police officers per population, and also tended to spend more money on policing overall. Moreover, police agencies in Black communities confiscated more money and resources from residents through fines and forfeitures than police agencies in other jurisdictions. Even among jurisdictions with similar violent crime rates, there are consistently more police officers in communities where more Black people live.
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/OfficersbyPopulationandCrimeRate/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608524943204" data-viz-desktop-height="377px" data-viz-mobile-height="377px" />
                <div id="viz1608524943204">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/OfficersbyPopulationandCrimeRate" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <div class="divider"></div>

            <!-- 6. Some police departments show a clear pattern of using more force than other departments. -->

            <h2 class="subtitle" id="clear-pattern">
                6. Some police departments show a clear pattern of using more force than other departments.
            </h2>

            <p>
                <strong>Police Shootings</strong>
            </p>

            <p>
                Examining data obtained from big city police agencies on both fatal and nonfatal police shootings incidents from 2013-2019, police in Oakland, Miami, San Francisco and New York had among the lowest rates of police shootings per every 10,000 arrests they made. Detroit and Oklahoma City <em>consistently</em> had the highest rates of police shootings - Oklahoma City has had one of the top 3 highest rates of police shootings among big cities for 4 of the past 7 years while Detroit has had the highest rate of all agencies for 5 of the past 7 years. This suggests the need for urgent interventions from the US Department of Justice and/or state Attorney's General to restrict police use of force standards and strengthen independent accountability structures in these cities.
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/PoliceShootings/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608517153562" data-viz-desktop-height="527px" data-viz-mobile-height="527px" />
                <div id="viz1608517153562">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/PoliceShootings" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <p>
                <strong>Other Forms of Police Use of Force</strong>
            </p>

            <p>
                We obtained detailed use of force data from many departments indicating the number of uses of police tasers, batons, strangleholds, pepper spray and other force involving "less lethal" weapons each year. Among larger cities, police in Long Beach and Mesa used these forms of force at higher rates than other large departments, while Baltimore City had the lowest rate of using "less lethal" force among other large cities in 2019 following a substantial decline in these use of force incidents since the federal government intervened in 2015 to investigate and mandate changes to the department's policies and practices.
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/LessLethalForceRates/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608516838184" data-viz-desktop-height="527px" data-viz-mobile-height="527px" />
                <div id="viz1608516838184">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/LessLethalForceRates" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <p>
                <strong>Chokeholds and Strangleholds:</strong>
            </p>

            <p>
                More than 40 departments specified the number of chokeholds or strangleholds used (Lateral Vascular Neck Restraints, Carotid Restraints and other neck restraints were included as strangleholds). Of these, the data show that a few departments were consistently outliers in using this tactic against people. Police departments in Santa Ana, San Diego, Long Beach and Minneapolis consistently reported using strangleholds against civilians at higher rates per arrest than other large police departments. Following widespread protests over police violence in 2020, <a href="https://leginfo.legislature.ca.gov/faces/billTextClient.xhtml?bill_id=201920200AB1196" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'California') !!}>California</a> and <a href="https://www.npr.org/sections/live-updates-protests-for-racial-justice/2020/07/21/893444295/minnesota-lawmakers-ban-police-chokeholds-warrior-style-training" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'Minnesota') !!}>Minnesota</a> passed laws banning both chokeholds and strangleholds among these law enforcement agencies.
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/StrangleholdRates/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608517458685" data-viz-desktop-height="527px" data-viz-mobile-height="527px" />
                <div id="viz1608517458685">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/StrangleholdRates" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <div class="divider"></div>

            <!-- 7. Few departments regularly rule against officers in misconduct investigations -->

            <h2 class="subtitle" id="misconduct-investigations">
                7. Few departments regularly rule against officers in misconduct investigations
            </h2>

            <p>
                When people come forward to report police misconduct, it rarely leads to accountability. Among the 1,039 departments we obtained civilian complaint data from, <strong>only 1 in every 9 civilian complaints</strong> of police misconduct was ruled in favor of civilians. Examining the 418 jurisdictions that reported 5 or more complaints, there were only 41 jurisdictions sustained complaints at least one-third of the time and only 15 jurisdictions where the majority of civilian complaints reported were sustained. By contrast, Houston, Miami-Dade and Charlotte-Mecklenburg police sustained complaints in nearly half of all cases, suggesting the need for further examination of potential best-practices used by investigators in these jurisdictions to substantiate misconduct.
                Consistent with <a href="https://nixthe6.org/research/" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'NixThe6 Past Research') !!}>past research</a> finding that police union contracts undermine accountability, departments were more likely to sustain misconduct complaints against officers in states like GA, TN, SC and NC that do not allow police unions to negotiate these contracts.
                By contrast, departments in <a href="https://nixthe6.org/" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', 'NixThe6 States') !!}>states</a> with "Police Bill of Rights" laws were less likely to sustain complaints of police misconduct - suggesting that these laws may also be barriers to police accountability.
                Importantly, since no nationwide database exists to track police disciplinary consequences resulting from substantiated complaints, we do not know the full extent to which officers are held accountable even in many of the agencies with higher rates of sustained complaints.
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/ComplaintSustainRates/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608516322532" data-viz-desktop-height="677px" data-viz-mobile-height="677px" />
                <div id="viz1608516322532">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/ComplaintSustainRates" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <p>
                Among the types of allegations reported, more serious allegations like excessive force or discrimination allegations were even less likely to be ruled in favor civilians than other complaints. Civilians reporting police <strong>discrimination</strong> had only a <strong>1 in 76 chance</strong> of their complaint being upheld and civilians reporting <strong>use of force</strong> complaints had only a <strong>1 in 33 chance</strong> of being upheld. This lack of administrative accountability for police violence mirrors the criminal justice system's approach towards police violence. Only 1% of killings by police from 2013-2019 have resulted in an officer being charged with a crime and only 0.5% have resulted in a criminal conviction.
            </p>

            <div class="divider"></div>

            <!-- 8. 80% of jurisdictions increased police funding from 2013-2018 -->

            <h2 class="subtitle" id="increased-funding">
                8. 80% of jurisdictions increased police funding from 2013-2018
            </h2>

            <p>
                Local government finances data reported to the US Census Bureau shows residents spend substantially different amounts on policing depending on which jurisdiction they live in - for example, residents in Baltimore City, Oakland and New York City spent 3-4x more per capita on policing than residents in El Paso, Virginia Beach or Indianapolis in 2018 (the latest year of data published by the Census Bureau). Police funding increased in almost every jurisdiction from 2013-2018 - the median jurisdiction increased police spending by 11% after adjusting for inflation.
            </p>

            <p>
                20% of all jurisdictions cut police funding from 2013-2018 after accounting for the estimated <a href="https://www.usinflationcalculator.com/" target="_blank" rel="noopener" {!! trackData('External Nav', 'Findings', '7.8%') !!}>7.8%</a> inflation during this period, according to the Census data. A review of municipal budgetary documents along with the Census data found only one of the nation's largest cities (over 400k population) cut police spending more than 10% from 2013-2018 - Detroit. Detroit cut its police budget 14% and cut other agency budgets after the city went through municipal bankruptcy.
            </p>

            <p class="tableau-chart">
                <img src="https://public.tableau.com/static/images/Po/PoliceScorecard/PoliceFundingChanges/1_rss.png" class="tableau-placeholder" data-viz-id="viz1608567894757" data-viz-desktop-height="627px" data-viz-mobile-height="627px" />
                <div id="viz1608567894757">
                    <object style="display:none;">
                        <param name="host_url" value="https://public.tableau.com/" />
                        <param name="embed_code_version" value="3" />
                        <param name="site_root" value="" />
                        <param name="name" value="PoliceScorecard/PoliceFundingChanges" />
                        <param name="tabs" value="no" />
                        <param name="toolbar" value="yes" />
                        <param name="static_image" value="{{ asset('/images/blank.png') }}" />
                        <param name="animate_transition" value="yes" />
                        <param name="display_static_image" value="no" />
                        <param name="display_spinner" value="yes" />
                        <param name="display_overlay" value="yes" />
                        <param name="display_count" value="yes" />
                        <param name="language" value="en" />
                        <param name="filter" value="publish=yes" />
                    </object>
                </div>
            </p>

            <div class="divider"></div>

            <!-- Conclusion -->

            <h2 class="subtitle" id="conclusion">
                CONCLUSION
            </h2>

            <p>
                When these outcomes are evaluated together, it reveals a disturbing picture of policing across the nation. While the federal government collects and publishes data on crime, arrests and police personnel from the vast majority of America's police agencies, only a fraction of these agencies make data available on police use of force, misconduct complaints, or settlements. Where such data are available, they show racially disparate policing outcomes and low rates of upholding police misconduct complaints in almost every location. Altogether, <strong>most departments received a score lower than 50% and no department scored higher than 70%, suggesting the need to thoroughly reimagine and transform the way the vast majority of cities and counties in the United States approach public safety.</strong>
            </p>

            <p>
                The data also reveals that many of the nation's largest cities are making progress towards reducing police shootings by 39% and cutting arrests for low level offenses by 26%, on average, from 2013-2019. At the same time, Black communities continue to be disproportionately impacted by these policing practices and, even in many of these same cities, racial disparities are <em>increasing</em>. And the data also identify police departments that consistently demonstrate worse outcomes than other agencies - using force at multiple times the rate of the average agency of their size. These findings suggest the need for urgent investigations and interventions prioritizing the lowest-performing departments - especially smaller towns and big cities where racial disparities are most severe/increasing most rapidly. This includes interventions from local policymakers and pattern/practice investigations by state and federal attorneys general.
            </p>

            <a href="#main" class="back-to-top">
                <i class="fa fa-chevron-circle-up"></i>
                <span class="sr-only">Back to Top</span>
            </a>
        </div>
    </div>

    <x-partial.footer :states="$states" />
@endsection

@section('scripts')
<script>
// Check Window Scroll
document.addEventListener('scroll', function() {
    var body = document.body; // IE 'quirks'
    var doc = document.documentElement; // IE with doctype
    doc = (doc.clientHeight) ? doc : body;

    if (doc.scrollTop <= 100 && doc.classList.contains('show-back-to-top')) {
        doc.classList.remove('show-back-to-top');
    } else if (doc.scrollTop > 100 && !doc.classList.contains('show-back-to-top')) {
        doc.classList.add('show-back-to-top');
    }
}, { passive: true });
</script>
@endsection
