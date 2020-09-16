@php
$class_a = (is_numeric($scorecard['report']['percentile_less_lethal_force'])) ? 'key percent-' . $scorecard['report']['percentile_less_lethal_force'] : 'incomplete';
$class_b = (is_numeric($scorecard['report']['percentile_killed_by_police'])) ? 'key percent-' . $scorecard['report']['percentile_killed_by_police'] : 'incomplete';
$class_c = (is_numeric($scorecard['report']['percentile_unarmed_killed_by_police'])) ? 'key percent-' . $scorecard['report']['percentile_unarmed_killed_by_police'] : 'incomplete';
$class_d = (is_numeric($scorecard['report']['percentile_overall_disparity_index'])) ? 'key percent-' . $scorecard['report']['percentile_overall_disparity_index'] : 'incomplete';
$class_e = (is_numeric($scorecard['report']['percentile_complaints_sustained'])) ? 'key percent-' . $scorecard['report']['percentile_complaints_sustained'] : 'incomplete';
$class_f = (is_numeric($scorecard['report']['percent_criminal_complaints_sustained'])) ? 'key percent-' . $scorecard['report']['percent_criminal_complaints_sustained'] : 'incomplete';
$class_g = (is_numeric($scorecard['report']['percentile_low_level_arrests_per_1k_population'])) ? 'key percent-' . $scorecard['report']['percentile_low_level_arrests_per_1k_population'] : 'incomplete';
$class_h = (is_numeric($scorecard['report']['percent_murders_solved'])) ? 'key percent-' . $scorecard['report']['percent_murders_solved'] : 'incomplete';
$class_i = (is_numeric($scorecard['report']['percentile_jail_incarceration_per_1k_population'])) ? 'key percent-' . $scorecard['report']['percentile_jail_incarceration_per_1k_population'] : 'incomplete';
$class_j = (is_numeric($scorecard['report']['percentile_jail_deaths_per_1k_jail_population'])) ? 'key percent-' . $scorecard['report']['percentile_jail_deaths_per_1k_jail_population'] : 'incomplete';
$class_k = (is_numeric($scorecard['report']['percentile_police_spending'])) ? 'key percent-' . $scorecard['report']['percentile_police_spending'] : 'incomplete';
$class_l = (is_numeric($scorecard['police_funding']['percentile_misconduct_settlements_per_population'])) ? 'key percent-' . $scorecard['police_funding']['percentile_misconduct_settlements_per_population'] : 'incomplete';
$class_m = (is_numeric($scorecard['police_funding']['percentile_fines_forfeitures_per_resident'])) ? 'key percent-' . $scorecard['police_funding']['percentile_fines_forfeitures_per_resident'] : 'incomplete';
$class_n = (is_numeric($scorecard['police_funding']['percentile_officers_per_population'])) ? 'key percent-' . $scorecard['police_funding']['percentile_officers_per_population'] : 'incomplete';
$class_o = (is_numeric($scorecard['report']['percent_use_of_force_complaints_sustained'])) ? 'key percent-' . $scorecard['report']['percent_use_of_force_complaints_sustained'] : 'incomplete';
$class_p = (is_numeric($scorecard['report']['percent_discrimination_complaints_sustained'])) ? 'key percent-' . $scorecard['report']['percent_discrimination_complaints_sustained'] : 'incomplete';
@endphp

<a name="scorecard-at-a-glance"></a>
<div class="section bg-gray at-a-glance">
    <div class="content group-header">
        <h1 class="title">
            Scorecard at a Glance
        </h1>

        <h2 class="subtitle">
            Average for 4 Sections: <strong>{{ $scorecard['report']['overall_score'] }}%</strong>
        </h2>

        <p>Scores range from 0-100% comparing {{ $type === 'sheriff' ? 'counties' : 'cities' }} with {{ $scorecard['police_funding']['comparison_group'] }}. {{ $type === 'sheriff' ? 'Counties' : 'Cities' }} with higher scores spend less on policing, use less force, are more likely to hold officers accountable and make fewer arrests for low-level offenses.</p>
    </div>

    <div class="content">
        <div class="left">
            <div class="table-header-labels">
                <div class="worse">
                    Worse
                </div>
                <div class="middle">
                    50th Percentile
                </div>
                <div class="better">
                    Better
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th colspan="5">
                            Police Funding:&nbsp; {{ ($scorecard['report']['police_funding_score'] ? $scorecard['report']['police_funding_score'] : 0) }}%
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="{{ $class_k }}">
                        <td class="table-label">Police Budget Cost per Person</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    <tr class="{{ $class_l }}">
                        <td class="table-label">Misconduct Settlements</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    <tr class="{{ $class_m }}">
                        <td class="table-label">Fines/Forfeitures</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    <tr class="double {{ $class_n }}">
                        <td class="table-label">Police Presence/Over-Policing (Officers per Population)</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                </tbody>
            </table>

            <div class="table-header-labels empty"></div>

            <table>
                <thead>
                    <tr>
                        <th colspan="5">
                            Police Violence:&nbsp; {{ ($scorecard['report']['police_violence_score'] ? $scorecard['report']['police_violence_score'] : 0)  }}%
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="{{ $class_a }}">
                        <td class="table-label">Force Used per Arrest</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    <tr class="{{ $class_b }}">
                        <td class="table-label">Deadly Force per Arrest</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    <tr class="double {{ $class_c }}">
                        <td class="table-label">Unarmed Victims of Deadly Force per Arrest</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    <tr class="double {{ $class_d }}">
                        <td class="table-label">Racial Disparities in Arrests and Deadly Force</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="right">
            <div class="table-header-labels">
                <div class="worse">
                    Worse
                </div>
                <div class="middle">
                    50th Percentile
                </div>
                <div class="better">
                    Better
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th colspan="5">
                            Police Accountability:&nbsp; {{ ($scorecard['report']['police_accountability_score'] ? $scorecard['report']['police_accountability_score'] : 0) }}%
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="{{ $class_e }}">
                        <td class="table-label">Misconduct Complaints Upheld</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    <tr class="{{ $class_o }}">
                        <td class="table-label">Excessive Force Complaints Upheld</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    <tr class="{{ $class_p }}">
                        <td class="table-label">Discrimination Complaints Upheld</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    <tr class="double {{ $class_f }}">
                        <td class="table-label">Criminal Misconduct Complaints Upheld</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                </tbody>
            </table>

            <div class="table-header-labels empty"></div>

            <table>
                <thead>
                    <tr>
                        <th colspan="5">
                            Approach to Law Enforcement:&nbsp; {{ ($scorecard['report']['approach_to_policing_score'] ? $scorecard['report']['approach_to_policing_score'] : 0) }}%
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="double {{ $class_g }}">
                        <td class="table-label">Arrest Rate for Low Level Offenses</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    <tr class="{{ $class_h }}">
                        <td class="table-label">Homicides Solved</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    @if ($scorecard['report']['percentile_jail_deaths_per_1k_jail_population'] && $scorecard['report']['percentile_jail_incarceration_per_1k_population'])
                    <tr class="{{ $class_i }}">
                        <td class="table-label">Jail Incarceration Rate</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    <tr class="{{ $class_j }}">
                        <td class="table-label">Jail Deaths per 1,000</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell divider">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                        <td class="table-cell">&nbsp;</td>
                    </tr>
                    @endif
                </tbody>
            </table>

            <div class="table-header-labels empty hide-desktop"></div>
        </div>
    </div>

    <div class="content hide-mobile">
        <div class="table-header-labels empty"></div>
    </div>
</div>
