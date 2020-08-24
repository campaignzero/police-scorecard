<?php
if (!function_exists('anon')) {
    /**
     * Anonymize an IPv4 or IPv6 address.
     *
     * @param  string  $address
     * @return string
     */
    function anon($address)
    {
        $ipv4NetMask = "255.255.255.0";
        $ipv6NetMask = "ffff:ffff:ffff:ffff:0000:0000:0000:0000";

        $packedAddress = inet_pton($address);
        if (strlen($packedAddress) == 4) {
            return inet_ntop(inet_pton($address) & inet_pton($ipv4NetMask));
        } elseif (strlen($packedAddress) == 16) {
            return inet_ntop(inet_pton($address) & inet_pton($ipv6NetMask));
        } else {
            return "";
        }
    }
}

if (!function_exists('isDevelopment')) {
    /**
     * Check if we're not in Production
     * @return string
     */
    function isDevelopment()
    {
        return (env('APP_ENV') !== 'production' && env('APP_ENV') !== 'staging') ? 'true' : 'false';
    }
}

if (!function_exists('isProduction')) {
    /**
     * Check if we're in Production
     * @return string
     */
    function isProduction()
    {
        return (env('APP_ENV') === 'production' || env('APP_ENV') === 'staging') ? 'true' : 'false';
    }
}

if (!function_exists('titleCase')) {
    /**
     * Convert String to Title Case
     * @param $string
     * @return string
     */
    function titleCase($string)
    {
        $title = str_replace('-', ' ', $string);
        $title = str_replace('_', ' ', $title);

        $regx = '/<(code|var)[^>]*>.*?<\/\1>|<[^>]+>|&\S+;/';

        preg_match_all($regx, $title, $html, PREG_OFFSET_CAPTURE);

        $title = preg_replace($regx, '', $title);

        preg_match_all('/[\w\p{L}&`\'‘’"“\.@:\/\{\(\[<>_]+-? */u', $title, $m1, PREG_OFFSET_CAPTURE);

        foreach ($m1[0] as &$m2) {
            list ($m, $i) = $m2;

            $i = mb_strlen(substr ($title, 0, $i), 'UTF-8');

            $m = $i > 0 && mb_substr($title, max(0, $i-2), 1, 'UTF-8') !== ':' && !preg_match('/[\x{2014}\x{2013}] ?/u', mb_substr($title, max(0, $i-2), 2, 'UTF-8')) &&

            preg_match('/^(a(nd?|s|t)?|b(ut|y)|en|for|i[fn]|o[fnr]|t(he|o)|vs?\.?|via)[ \-]/i', $m)
                ? mb_strtolower($m, 'UTF-8')
                : (preg_match('/[\'"_{(\[‘“]/u', mb_substr($title, max(0, $i-1), 3, 'UTF-8'))
                    ? mb_substr($m, 0, 1, 'UTF-8') . mb_strtoupper(mb_substr($m, 1, 1, 'UTF-8'), 'UTF-8') . mb_substr($m, 2, mb_strlen($m, 'UTF-8')-2, 'UTF-8')
                    : (preg_match ('/[\])}]/', mb_substr($title, max (0, $i-1), 3, 'UTF-8')) || preg_match('/[A-Z]+|&|\w+[._]\w+/u', mb_substr($m, 1, mb_strlen($m, 'UTF-8')-1, 'UTF-8'))
                        ? $m
                        : mb_strtoupper (mb_substr($m, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($m, 1, mb_strlen($m, 'UTF-8'), 'UTF-8')
                    ));

            $title = mb_substr($title, 0, $i, 'UTF-8') . $m . mb_substr($title, $i + mb_strlen($m, 'UTF-8'), mb_strlen($title, 'UTF-8'), 'UTF-8');
        }

        foreach ($html[0] as &$tag) {
            $title = substr_replace ($title, $tag[0], $tag[1], 0);
        }

        // We have some Roman Numerals we need to consider too
        $title = preg_replace_callback('/\b(?=[LXIVCDM]+\b)([a-z]+)\b/i',
            function($matches) {
                return strtoupper($matches[0]);
            }, ucwords(strtolower($title))
        );

        $title = preg_replace('/\s+/', ' ', $title);
        return $title;
    }
}

if (!function_exists('truncateText')) {
    /**
     * Truncate Text
     * @param $string
     * @param $limit
     * @param string $break
     * @param string $pad
     * @return string
     */
    function truncateText($string, $limit, $break=" ", $pad=" ...")
    {
        // return with no change if string is shorter than $limit
        if(strlen($string) <= $limit) return $string;

        // is $break present between $limit and the end of the string?
        if(false !== ($breakpoint = strpos($string, $break, $limit))) {
            if($breakpoint < strlen($string) - 1) {
                $string = substr($string, 0, $breakpoint) . $pad;
            }
        }

        return $string;
    }
}

if (!function_exists('pageClass')) {
    /**
     * Convert Current Page to Class
     * @param string $url
     * @return string
     */
    function pageClass($url)
    {
        list($page, $sub) = array_pad(explode('/', $url), 2, '');
        $classes = array();

        if ($page) {
            $classes[] = 'page-' . $page;
        } else {
            $classes[] = 'page-home';
        }

        if ($sub) {
            $classes[] = 'sub-page-' . $sub;
        }

        return implode(' ', $classes);
    }
}

if (!function_exists('removeEmpty')) {

    function removeEmpty($data, $key_name)
    {
        $clean = array();
        $arr = (array) $data;
        foreach ($arr as $key => $item) {
            $arr = (array) $item;
            $check = trim($arr[$key_name]);

            if (isset($arr[$key_name]) && !empty($check) && strlen($check) > 0) {
                $clean[] = $item;
            }
        }

        return $clean;
    }
}

if (!function_exists('trackData')) {

    function trackData($category, $action, $label = null, $value = null)
    {
        $data = array('data-track');

        if ( !empty($category)) {
            $data[] = 'data-category="' . $category . '"';
        }

        if ( !empty($action)) {
            $data[] = 'data-action="' . $action . '"';
        }

        if ( !empty($label)) {
            $data[] = 'data-label="' . $label . '"';
        }

        if ( !empty($value)) {
            $data[] = 'data-value="' . $value . '"';
        }

        return join(' ', $data);
    }
}

if (!function_exists('getStateName')) {
    function getStateName($abbr) {
        $states = array(
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'DC' => 'District of Columbia',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming',
        );

        return $states[strtoupper($abbr)];
    }
}

/**
 * Get National Grades
 *
 * @param string $states
 * @param string $type
 *
 * @return object
 */
if (!function_exists('getNationalGrades')) {
    function getNationalGrades($states, $type) {
        $data = array();

        foreach($states as $abbr => $state) {
            if ($type === 'police-department' && !empty($state['police-department'])) {
                foreach($state['police-department'] as $department) {
                    if ($department['complete']) {
                        $data[] = array(
                            'agency_name' => $department['agency_name'] . ', '.$abbr,
                            'complete' => $department['complete'],
                            'grade_class' => $department['grade_class'],
                            'grade_letter' => $department['grade_letter'],
                            'overall_score' => $department['overall_score'],
                            'url_pretty' => $department['url_pretty'],
                            'url' => $department['url']
                        );
                    }
                }
            }

            if ($type === 'sheriff' && !empty($state['sheriff'])) {
                foreach($state['sheriff'] as $department) {
                    if ($department['complete']) {
                        $data[] = array(
                            'agency_name' => $department['agency_name'] . ', '.$abbr,
                            'complete' => $department['complete'],
                            'grade_class' => $department['grade_class'],
                            'grade_letter' => $department['grade_letter'],
                            'overall_score' => $department['overall_score'],
                            'url_pretty' => $department['url_pretty'],
                            'url' => $department['url']
                        );
                    }
                }
            }
        }

        usort($data, function($a, $b) {
            return $a['overall_score'] > $b['overall_score'];
        });

        return $data;
    }
}

/**
 * Output Number for Template
 *
 * @param  string $string String to be converted to Number
 * @param  integer $decimal Number of Decimal Points
 * @param  string $suffix Suffix to Add to Output
 * @param  boolean $invert If this is a percent, and we need to subtract number from total
 *
 * @return string Converted Number
 */
if (!function_exists('num')) {
    function num($string, $decimal = 0, $suffix = '', $invert = false) {
        if (empty($string) && $string !== 0 && $string !== '0') {
            return "N/A";
        }

        $string = preg_replace("/[^0-9\.]/", "", trim($string));
        $output = floatval($string);
        if ($output < 0) {
            $output = 0;
        }

        if ($invert) {
            $output = (100 - $output);
        }

        $output = round($output, $decimal);

        if ($output > 999) {
            $output = number_format($output, $decimal);
        }

        if ($output === '0.0' || $output === '0.00') {
            $output = '0';
        }

        if (substr($output, -2) === '.0' || substr($output, -3) === '.00') {
            $output = intval($string);
        }

        return "{$output}{$suffix}";
    }
}

/**
 * Get National Summary
 *
 * @param string $states
 *
 * @return object
 */
if (!function_exists('getNationalSummary')) {
    function getNationalSummary($states) {
        $total_arrests = 0;
        $total_complaints_reported = 0;
        $total_complaints_sustained = 0;
        $total_people_killed = 0;

        $total_black_people_killed = 0;
        $total_black_population = 0;
        $total_hispanic_people_killed = 0;
        $total_hispanic_population = 0;
        $total_white_people_killed = 0;
        $total_white_population = 0;

        $total_low_level_arrests = 0;
        $total_violent_crime_arrests = 0;

        $total_arrests_2013 = 0;
        $total_arrests_2014 = 0;
        $total_arrests_2015 = 0;
        $total_arrests_2016 = 0;
        $total_arrests_2017 = 0;
        $total_arrests_2018 = 0;

        foreach($states as $abbr => $state) {
            $total_arrests += $state['total_arrests'];
            $total_complaints_reported += $state['total_complaints_reported'];
            $total_complaints_sustained += $state['total_complaints_sustained'];
            $total_people_killed += $state['total_people_killed'];

            $total_black_people_killed += $state['total_black_people_killed'];
            $total_black_population += $state['total_black_population'];
            $total_hispanic_people_killed += $state['total_hispanic_people_killed'];
            $total_hispanic_population += $state['total_hispanic_population'];
            $total_white_people_killed += $state['total_white_people_killed'];
            $total_white_population += $state['total_white_population'];

            $total_low_level_arrests += $state['total_low_level_arrests'];
            $total_violent_crime_arrests += $state['total_violent_crime_arrests'];

            $total_arrests_2013 += $state['total_arrests_2013'];
            $total_arrests_2014 += $state['total_arrests_2014'];
            $total_arrests_2015 += $state['total_arrests_2015'];
            $total_arrests_2016 += $state['total_arrests_2016'];
            $total_arrests_2017 += $state['total_arrests_2017'];
            $total_arrests_2018 += $state['total_arrests_2018'];
        }

        return array(
            'total_arrests' => $total_arrests,
            'total_low_level_arrests' => $total_low_level_arrests,
            'total_complaints_reported' => $total_complaints_reported,
            'total_complaints_sustained' => $total_complaints_sustained,
            'total_people_killed' => $total_people_killed,
            'total_black_people_killed' => $total_black_people_killed,
            'total_hispanic_people_killed' => $total_hispanic_people_killed,
            'total_white_people_killed' => $total_white_people_killed,
            'total_black_population' => $total_black_population,
            'total_hispanic_population' => $total_hispanic_population,
            'total_white_population' => $total_white_population,
            'total_arrests_2013' => $total_arrests_2013,
            'total_arrests_2014' => $total_arrests_2014,
            'total_arrests_2015' => $total_arrests_2015,
            'total_arrests_2016' => $total_arrests_2016,
            'total_arrests_2017' => $total_arrests_2017,
            'total_arrests_2018' => $total_arrests_2018,
            'black_deadly_force_disparity_per_population' => (($total_black_people_killed / $total_black_population) / ($total_white_people_killed / $total_white_population)),
            'hispanic_deadly_force_disparity_per_population' => (($total_hispanic_people_killed / $total_hispanic_population) / ($total_white_people_killed / $total_white_population)),
            'times_more_misdemeanor_arrests_than_violent_crime' => ($total_low_level_arrests / $total_violent_crime_arrests)
        );
    }
}

/**
 * Get National Total
 *
 * @param string $states
 *
 * @return string
 */
if (!function_exists('getNationalTotal')) {
    function getNationalTotal($states) {
        $total = 0;

        foreach($states as $abbr => $state) {
            if (!empty($state['police-department'])) {
                $total += count($state['police-department']);
            }

            if (!empty($state['sheriff'])) {
                $total += count($state['sheriff']);
            }
        }

        return num($total);
    }
}

/**
 * Get National Map Data
 *
 * @param string $states
 * @param string $type
 *
 * @return object
 */
if (!function_exists('getNationalMapData')) {
    function getNationalMapData($states, $type) {
        $map_data = array();
        $map_scores = array(
            array(),
            array(),
            array(),
            array(),
            array(),
            array(),
            array()
        );

        foreach($states as $abbr => $state) {
            if ($type === 'police-department' && !empty($state['police-department'])) {
                foreach($state['police-department'] as $department) {
                    if (!empty($department['latitude']) && !empty($department['longitude']) && $department['complete']) {
                        $index = getColorIndex($department['overall_score'], $department['complete']);
                        $map_scores[$index - 1][] = array(
                            'className' => 'location-'.$department['slug'],
                            'colorIndex' => getColorIndex($department['overall_score'], $department['complete']),
                            'name' => $department['agency_name'],
                            'lat' => floatval($department['latitude']),
                            'lon' => floatval($department['longitude']),
                            'stateAbbr' => strtolower($abbr),
                            'value' => $department['overall_score']
                        );
                    }
                }
            }

            if ($type === 'sheriff' && !empty($state['sheriff'])) {
                foreach($state['sheriff'] as $department) {
                    if (!empty($department['district']) && $department['complete']) {
                        $map_data[] = array(
                            'className' => 'location-'.$department['slug'],
                            'colorIndex' => getColorIndex($department['overall_score'], $department['complete']),
                            'name' => $department['agency_name'],
                            'hc-key' => $department['district'],
                            'stateAbbr' => strtolower($abbr),
                            'value' => $department['overall_score']
                        );
                    }
                }
            }
        }

        return ($type === 'police-department') ? json_encode($map_scores) : json_encode($map_data);
    }
}

/**
 * Return Percent Score to Letter Grade
 *
 * @param integer $score Percent Score
 *
 * @return integer
 */
if (!function_exists('getColorIndex')) {
    function getColorIndex($score, $complete) {
        $score = intval($score);

        if (!$complete) {
            return 1;
        } else if ($score <= 29) {
            return 2;
        } else if ($score <= 59 && $score >= 30) {
            return 3;
        }
        elseif($score <= 69 && $score >= 60) {
            return 4;
        }
        elseif($score <= 79 && $score >= 70) {
            return 5;
        }
        elseif($score <= 89 && $score >= 80) {
            return 6;
        }
        elseif($score >= 90) {
            return 7;
        }
    }
}


/**
 * Generate State Link
 *
 * @param string $key
 * @param string $state
 *
 * @return string
 */
if (!function_exists('generateStateLink')) {
    function generateStateLink($key, $state) {
        $stateName = getStateName($key);
        $activeClass = (strtoupper($key) === strtoupper($state)) ? 'active' : '';
        $stateCode = strtolower($key);

        return "<a href=\"/${stateCode}\" class=\"state-link ${activeClass}\" title=\"View Report for ${stateName}'s Largest Police Department\">${stateName}</a>";
    }
}

/**
 * Get State Icon
 *
 * @param string $abbr
 *
 * @return string
 */
if (!function_exists('getStateIcon')) {
    function getStateIcon($abbr) {
        $states = array(
            "AL" => "B",
            "AK" => "A",
            "AZ" => "D",
            "AR" => "C",
            "CA" => "E",
            "CO" => "F",
            "CT" => "G",
            "DE" => "H",
            "DC" => "y",
            "FL" => "I",
            "GA" => "J",
            "HI" => "K",
            "ID" => "M",
            "IL" => "N",
            "IN" => "O",
            "IA" => "L",
            "KS" => "P",
            "KY" => "Q",
            "LA" => "R",
            "ME" => "U",
            "MD" => "T",
            "MA" => "S",
            "MI" => "V",
            "MN" => "W",
            "MS" => "Y",
            "MO" => "X",
            "MT" => "Z",
            "NE" => "c",
            "NV" => "g",
            "NH" => "d",
            "NJ" => "e",
            "NM" => "f",
            "NY" => "h",
            "NC" => "a",
            "ND" => "b",
            "OH" => "i",
            "OK" => "j",
            "OR" => "k",
            "PA" => "l",
            "RI" => "m",
            "SC" => "n",
            "SD" => "o",
            "TN" => "p",
            "TX" => "q",
            "UT" => "r",
            "VT" => "t",
            "VA" => "s",
            "WA" => "u",
            "WV" => "w",
            "WI" => "v",
            "WY" => "x",
            "US" => "z"
        );

        return $states[strtoupper($abbr)];
    }
}

/**
 * Get State Total
 *
 * @param string $states
 * @param string $code
 *
 * @return string
 */
if (!function_exists('getStateTotal')) {
    function getStateTotal($states, $code) {
        $total = 0;

        foreach($states as $abbr => $state) {
            if ($code === $abbr) {
                if (!empty($state['police-department'])) {
                    $total += count($state['police-department']);
                }

                if (!empty($state['sheriff'])) {
                    $total += count($state['sheriff']);
                }
            }
        }

        return num($total);
    }
}

/**
 * Return Percent Score to Letter Grade Class
 *
 * @param string $score Percent Score
 *
 * @return string
 */
if (!function_exists('getGradeClass')) {
    function getGradeClass($score) {
        $score = intval($score);

        if ($score <= 29) {
            return 'f-minus';
        } else if ($score <= 59 && $score >= 30) {
            return 'f';
        }
        elseif($score <= 62 && $score >= 60) {
            return 'd';
        }
        elseif($score <= 66 && $score >= 63) {
            return 'd';
        }
        elseif($score <= 69 && $score >= 67) {
            return 'd';
        }
        elseif($score <= 72 && $score >= 70) {
            return 'c';
        }
        elseif($score <= 76 && $score >= 73) {
            return 'c';
        }
        elseif($score <= 79 && $score >= 77) {
            return 'c';
        }
        elseif($score <= 82 && $score >= 80) {
            return 'b';
        }
        elseif($score <= 86 && $score >= 83) {
            return 'b';
        }
        elseif($score <= 89 && $score >= 87) {
            return 'b';
        }
        elseif($score <= 92 && $score >= 90) {
            return 'a';
        }
        elseif($score <= 97 && $score >= 93) {
            return 'a';
        }
        elseif($score >= 98) {
            return 'a';
        }
    }
}

/**
 * Get Change
 *
 * @param integer $change
 * @param boolean $reverse
 * @param string $label
 *
 * @return string
 */
if (!function_exists('getChange')) {
    function getChange($change, $reverse = false, $label = 'since 2016') {
        $change = intval($change);
        $text = '';
        $tooltip = '';
        $class = '';

        if ($change && $change !== 0) {
            $text = ($change > 0) ? "<span class=\"grade-arrow\"><span>▶</span><small>+{$change}%</small></span>" : "<span class=\"grade-arrow\"><span>▶</span><small>{$change}%</small></span>";
            $class = ($change > 0) ? 'bad' : 'good';
            $tooltip = ($change > 0) ? "Up {$change}% {$label}" : "Down ". abs($change) . "% {$label}";

            if ($reverse) {
                $class .= ' reverse';
            }

            return "<a href=\"#\" class=\"stats-change tooltip {$class}\" data-tooltip=\"{$tooltip}\">{$text}</a>";
        }
    }
}

/**
 * Output Template
 *
 * @param  string $template Text to Convert
 * @param  string [$default='N/A'] Text to use if output is empty
 * @param  string [$suffix=''] Append this to end of string
 *
 * @return string
 */
if (!function_exists('output')) {
    function output($template, $default = 'N/A', $suffix = '') {
        $template = strval($template);
        if (empty($template) && $template !== '0') {
            $template = $default;
        }

        return "{$template}{$suffix}";
    }
}

/**
 * Custom Color for Progress Bar
 *
 * @param  string $score Number
 * @param  string $color Which Color Pattern to use
 * @param  string $break Which Break Point to use
 *
 * @return string Color to use
 */
if (!function_exists('progressBar')) {
    function progressBar($score, $color = 'default', $break = 'default') {
        if (empty($score)) {
            $score = 0;
        }

        $breakpoints = array(
            'default' => array(20, 40, 50, 60, 100)
        );

        $colors = array(
            'default' => array('red', 'orange', 'yellow', 'green', 'bright-green'),
            'reverse' => array('bright-green', 'green', 'yellow', 'orange', 'red')
        );

        $output = $colors[$color][0];
        $score = floatval(preg_replace("/[^0-9\.]/", "", trim($score)));

        if ($score > 100) {
            $score = 100;
        }

        if ($score < 0) {
            $score = 0;
        }

        foreach($breakpoints[$break] as $index => $breakpoint) {
            if ($score >= intval($breakpoint)) {
                $output = (($index + 1) < sizeof($colors[$color])) ? $colors[$color][$index + 1] : $colors[$color][$index];
            }
        }

        return $output;
    }
}


/**
 * Number Formatter
 *
 * @param integer $num
 * @param integer $decimal
 *
 * @return string
 */
if (!function_exists('nFormatter')) {
    function nFormatter($num, $decimal = 2) {
        $num = intval(str_replace(',', '', $num));
        $units = ["k", "M", "B", "T"];
        $order = floor(log($num) / log(1000));
        $unit_name = ($order > 0) ? $units[($order - 1)] : '';

        $val = ($num === 0) ? $num : round(floatval($num / 1000 ** $order), $decimal).$unit_name;

        // output number remainder + unitname
        return '$'.$val;
    }
}

/**
 * Get Map Data
 *
 * @param string $state
 *
 * @param string $type
 */
if (!function_exists('getMapData')) {
    function getMapData($state, $type, $grades) {
        $map_data = array();
        $map_scores = array(
            array(),
            array(),
            array(),
            array(),
            array(),
            array(),
            array()
        );

        foreach($grades as $grade) {
            if ($type === 'police-department' && !empty($grade['latitude']) && !empty($grade['longitude'])) {
                $index = getColorIndex($grade['overall_score'], $grade['complete']);
                $map_scores[$index - 1][] = array(
                    'className' => 'location-'.$grade['slug'],
                    'colorIndex' => getColorIndex($grade['overall_score'], $grade['complete']),
                    'name' => $grade['agency_name'],
                    'lat' => floatval($grade['latitude']),
                    'lon' => floatval($grade['longitude']),
                    'value' => $grade['overall_score']
                );
            } else if ($type === 'sheriff' && !empty($grade['district'])) {
                $map_data[] = array(
                    'className' => 'location-'.$grade['slug'],
                    'colorIndex' => getColorIndex($grade['overall_score'], $grade['complete']),
                    'name' => $grade['agency_name'],
                    'hc-key' => $grade['district'],
                    'value' => $grade['overall_score']
                );
            }
        }

        return ($type === 'police-department') ? json_encode($map_scores) : json_encode($map_data);
    }
}

/**
 * Get Map Location
 *
 * @param string $type
 * @param object $scorecard
 * @param string $location
 *
 * @return string
 */
if (!function_exists('getMapLocation')) {
    function getMapLocation($type, $scorecard, $location) {
        $map_data = array(
            'type' => $type,
            'name' => ($type === 'police-department') ? 'Police Department' : 'Sheriff Department',
            'data' => array(),
            'icon' => getGradeIcon($scorecard['report']['overall_score'], $scorecard['agency']['complete'])
        );

        $map_data['data'][] = array(
            'className' => 'location-'.$location,
            'colorIndex' => getColorIndex($scorecard['report']['overall_score'], $scorecard['agency']['complete']),
            'name' => $scorecard['agency']['name'],
            'lat' => floatval($scorecard['geo']['city']['latitude']),
            'lon' => floatval($scorecard['geo']['city']['longitude']),
            'value' => intval($scorecard['report']['overall_score'])
        );

        return json_encode($map_data);
    }
}

/**
 * Get Map Grade Icon
 * @param string $score Percent Score
 *
 * @return string
 */
if (!function_exists('getGradeIcon')) {
    function getGradeIcon($score, $complete) {
        $icon = $complete ? $score : 'incomplete';
        return 'url(/images/numbers/' . $icon . '.svg)';
    }
}


/**
 * Generate Arrest Chart
 *
 * @param object
 */
if (!function_exists('generateArrestChart')) {
    function generateArrestChart($scorecard) {
        $output = array(
            'labels' => array(),
            'datasets' => array(
                array(
                    'minBarLength' => 5,
                    'maxBarThickness' => 20,
                    'label' => 'Arrests',
                    'backgroundColor' => '#dc4646',
                    'stack' => 'arrests',
                    'data' => array()
                )
            )
        );

        if (isset($scorecard['arrests']['arrests_2013'])) {
            $output['labels'][] = '2013';
            $output['datasets'][0]['data'][] = $scorecard['arrests']['arrests_2013'];
        }

        if (isset($scorecard['arrests']['arrests_2014'])) {
            $output['labels'][] = '2014';
            $output['datasets'][0]['data'][] = $scorecard['arrests']['arrests_2014'];
        }

        if (isset($scorecard['arrests']['arrests_2015'])) {
            $output['labels'][] = '2015';
            $output['datasets'][0]['data'][] = $scorecard['arrests']['arrests_2015'];
        }

        if (isset($scorecard['arrests']['arrests_2016'])) {
            $output['labels'][] = '2016';
            $output['datasets'][0]['data'][] = $scorecard['arrests']['arrests_2016'];
        }

        if (isset($scorecard['arrests']['arrests_2017'])) {
            $output['labels'][] = '2017';
            $output['datasets'][0]['data'][] = $scorecard['arrests']['arrests_2017'];
        }

        if (isset($scorecard['arrests']['arrests_2018'])) {
            $output['labels'][] = '2018';
            $output['datasets'][0]['data'][] = $scorecard['arrests']['arrests_2018'];
        }

        return json_encode($output);
    }
}

/**
 * Generate History Chart
 *
 * @param object $scorecard
 *
 * @return string
 */
if (!function_exists('generateHistoryChart')) {
    function generateHistoryChart($scorecard) {
        $output = array(
            'labels' => array(),
            'datasets' => array(
                array(
                    'minBarLength' => 5,
                    'maxBarThickness' => 20,
                    'label' => 'Police Shootings',
                    'backgroundColor' => '#dc4646',
                    'stack' => 'police-violence',
                    'hidden' => false,
                    'data' => array()
                ),
                array(
                    'minBarLength' => 5,
                    'maxBarThickness' => 20,
                    'label' => 'Other Police Weapons',
                    'backgroundColor' => '#dc4646',
                    'stack' => 'police-violence',
                    'hidden' => true,
                    'data' => array()
                )
            )
        );

        if (isset($scorecard['police_violence']['less_lethal_force_2013']) || isset($scorecard['police_violence']['police_shootings_2013'])) {
            $output['labels'][] = '2013';

            $output['datasets'][0]['data'][] = $scorecard['police_violence']['police_shootings_2013'];
            $output['datasets'][1]['data'][] = $scorecard['police_violence']['less_lethal_force_2013'];
        }

        if (isset($scorecard['police_violence']['less_lethal_force_2014']) || isset($scorecard['police_violence']['police_shootings_2014'])) {
            $output['labels'][] = '2014';

            $output['datasets'][0]['data'][] = $scorecard['police_violence']['police_shootings_2014'];
            $output['datasets'][1]['data'][] = $scorecard['police_violence']['less_lethal_force_2014'];
        }

        if (isset($scorecard['police_violence']['less_lethal_force_2015']) || isset($scorecard['police_violence']['police_shootings_2015'])) {
            $output['labels'][] = '2015';

            $output['datasets'][0]['data'][] = $scorecard['police_violence']['police_shootings_2015'];
            $output['datasets'][1]['data'][] = $scorecard['police_violence']['less_lethal_force_2015'];
        }

        if (isset($scorecard['police_violence']['less_lethal_force_2016']) || isset($scorecard['police_violence']['police_shootings_2016'])) {
            $output['labels'][] = '2016';

            $output['datasets'][0]['data'][] = $scorecard['police_violence']['police_shootings_2016'];
            $output['datasets'][1]['data'][] = $scorecard['police_violence']['less_lethal_force_2016'];
        }

        if (isset($scorecard['police_violence']['less_lethal_force_2017']) || isset($scorecard['police_violence']['police_shootings_2017'])) {
            $output['labels'][] = '2017';

            $output['datasets'][0]['data'][] = $scorecard['police_violence']['police_shootings_2017'];
            $output['datasets'][1]['data'][] = $scorecard['police_violence']['less_lethal_force_2017'];
        }

        if (isset($scorecard['police_violence']['less_lethal_force_2018']) || isset($scorecard['police_violence']['police_shootings_2018'])) {
            $output['labels'][] = '2018';

            $output['datasets'][0]['data'][] = $scorecard['police_violence']['police_shootings_2018'];
            $output['datasets'][1]['data'][] = $scorecard['police_violence']['less_lethal_force_2018'];
        }

        if (isset($scorecard['police_violence']['less_lethal_force_2019']) || isset($scorecard['police_violence']['police_shootings_2019'])) {
            $output['labels'][] = '2019';

            $output['datasets'][0]['data'][] = $scorecard['police_violence']['police_shootings_2019'];
            $output['datasets'][1]['data'][] = $scorecard['police_violence']['less_lethal_force_2019'];
        }

        return json_encode($output);
    }
}

/**
 * Generate Bar Chart Funds Taken
 *
 * @param object $scorecard
 *
 * @return string
 */
if (!function_exists('generateBarChartFundsTaken')) {
    function generateBarChartFundsTaken($scorecard) {
        $output = array(
            'labels' => array(),
            'datasets' => array(
                array(
                    'minBarLength' => 5,
                    'maxBarThickness' => 20,
                    'label' => 'Funds Taken',
                    'backgroundColor' => '#dc4646',
                    'stack' => 'funds-taken',
                    'data' => array()
                )
            )
        );

        if (isset($scorecard['police_funding']['fines_forfeitures_2010'])) {
            $output['labels'][] = '2010';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['fines_forfeitures_2010'];
        }

        if (isset($scorecard['police_funding']['fines_forfeitures_2011'])) {
            $output['labels'][] = '2011';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['fines_forfeitures_2011'];
        }

        if (isset($scorecard['police_funding']['fines_forfeitures_2012'])) {
            $output['labels'][] = '2012';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['fines_forfeitures_2012'];
        }

        if (isset($scorecard['police_funding']['fines_forfeitures_2013'])) {
            $output['labels'][] = '2013';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['fines_forfeitures_2013'];
        }

        if (isset($scorecard['police_funding']['fines_forfeitures_2014'])) {
            $output['labels'][] = '2014';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['fines_forfeitures_2014'];
        }

        if (isset($scorecard['police_funding']['fines_forfeitures_2015'])) {
            $output['labels'][] = '2015';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['fines_forfeitures_2015'];
        }

        if (isset($scorecard['police_funding']['fines_forfeitures_2016'])) {
            $output['labels'][] = '2016';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['fines_forfeitures_2016'];
        }

        if (isset($scorecard['police_funding']['fines_forfeitures_2017'])) {
            $output['labels'][] = '2017';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['fines_forfeitures_2017'];
        }

        if (isset($scorecard['police_funding']['fines_forfeitures_2018'])) {
            $output['labels'][] = '2018';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['fines_forfeitures_2018'];
        }

        if (isset($scorecard['police_funding']['fines_forfeitures_2019'])) {
            $output['labels'][] = '2019';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['fines_forfeitures_2019'];
        }

        return json_encode($output);
    }
}

/**
 * Generate Bar Chart Officers
 *
 * @param object $scorecard
 *
 * @return string
 */
if (!function_exists('generateBarChartOfficers')) {
    function generateBarChartOfficers($scorecard) {
        $output = array(
            'labels' => array(),
            'datasets' => array(
                array(
                    'minBarLength' => 5,
                    'maxBarThickness' => 20,
                    'label' => 'Officers',
                    'backgroundColor' => '#dc4646',
                    'stack' => 'officers',
                    'data' => array()
                )
            )
        );

        if (isset($scorecard['police_funding']['total_officers_2013'])) {
            $output['labels'][] = '2013';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['total_officers_2013'];
        }

        if (isset($scorecard['police_funding']['total_officers_2014'])) {
            $output['labels'][] = '2014';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['total_officers_2014'];
        }

        if (isset($scorecard['police_funding']['total_officers_2015'])) {
            $output['labels'][] = '2015';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['total_officers_2015'];
        }

        if (isset($scorecard['police_funding']['total_officers_2016'])) {
            $output['labels'][] = '2016';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['total_officers_2016'];
        }

        if (isset($scorecard['police_funding']['total_officers_2017'])) {
            $output['labels'][] = '2017';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['total_officers_2017'];
        }

        if (isset($scorecard['police_funding']['total_officers_2018'])) {
            $output['labels'][] = '2018';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['total_officers_2018'];
        }

        if (isset($scorecard['police_funding']['total_officers_2019'])) {
            $output['labels'][] = '2019';
            $output['datasets'][0]['data'][] = $scorecard['police_funding']['total_officers_2019'];
        }

        return json_encode($output);
    }
}

/**
 * Generate Bar Chart
 *
 * @param object $scorecard
 * @param string $type
 *
 * @return string
 */
if (!function_exists('generateBarChart')) {
    function generateBarChart($scorecard, $type) {
        $output = array(
            'labels' => array(' '),
            'datasets' => array()
        );

        if ($type === 'police-department') {
            if (isset($scorecard['police_funding']['police_budget'])) {
                $police_budget = $scorecard['police_funding']['police_budget'];
                $output['datasets'][] = array(
                    'minBarLength' => 5,
                    'maxBarThickness' => 20,
                    'label' => 'Police',
                    'backgroundColor' => '#dc4646',
                    'borderWidth' => 0,
                    'data' => array($police_budget)
                );
            }

            if (isset($scorecard['police_funding']['health_budget'])) {
                $health_budget = $scorecard['police_funding']['health_budget'];
                $output['datasets'][] = array(
                    'minBarLength' => 5,
                    'maxBarThickness' => 20,
                    'label' => 'Health',
                    'backgroundColor' => '#58595b',
                    'borderWidth' => 0,
                    'data' => array($health_budget)
                );
            }

            if (isset($scorecard['police_funding']['housing_budget'])) {
                $housing_budget = $scorecard['police_funding']['housing_budget'];
                $output['datasets'][] = array(
                    'minBarLength' => 5,
                    'maxBarThickness' => 20,
                    'label' => 'Housing',
                    'backgroundColor' => '#9a9b9f',
                    'borderWidth' => 0,
                    'data' => array($housing_budget)
                );
            }
        } else if ($type === 'sheriff' && isset($scorecard['police_funding'])) {
            if (isset($scorecard['police_funding']['police_budget']) || isset($scorecard['police_funding']['jail_budget'])) {
                $police_budget = isset($scorecard['police_funding']['police_budget']) ? $scorecard['police_funding']['police_budget'] : 0;
                $jail_budget = isset($scorecard['police_funding']['jail_budget']) ? $scorecard['police_funding']['jail_budget'] : 0;

                $output['datasets'][] = array(
                    'minBarLength' => 5,
                    'maxBarThickness' => 20,
                    'label' => 'Police & Jail',
                    'backgroundColor' => '#dc4646',
                    'borderWidth' => 0,
                    'data' => array($police_budget + $jail_budget)
                );
            }

            if (isset($scorecard['police_funding']['health_budget'])) {
                $health_budget = $scorecard['police_funding']['health_budget'];
                $output['datasets'][] = array(
                    'minBarLength' => 5,
                    'maxBarThickness' => 20,
                    'label' => 'Health',
                    'backgroundColor' => '#58595b',
                    'borderWidth' => 0,
                    'data' => array($health_budget)
                );
            }

            if (isset($scorecard['police_funding']['education_budget'])) {
                $education_budget = $scorecard['police_funding']['education_budget'];
                $output['datasets'][] = array(
                    'minBarLength' => 5,
                    'maxBarThickness' => 20,
                    'label' => 'Education',
                    'backgroundColor' => '#9a9b9f',
                    'borderWidth' => 0,
                    'data' => array($education_budget)
                );
            }
        }

        return json_encode($output);
    }
}

/**
 * Get Police Funding Chart
 *
 * @param object $funding
 *
 * @return object
 */
if (!function_exists('getPoliceFundingChart')) {
    function getPoliceFundingChart($funding) {
        $labels = array();
        $police = array();
        $housing = array();
        $health = array();

        if ($funding['police_budget_2010'] && $funding['housing_budget_2010'] && $funding['health_budget_2010']) {
            $labels[] = '2010';
            $police[] = intval($funding['police_budget_2010']);
            $housing[] = intval($funding['housing_budget_2010']);
            $health[] = intval($funding['health_budget_2010']);
        }

        if ($funding['police_budget_2011'] && $funding['housing_budget_2011'] && $funding['health_budget_2011']) {
            $labels[] = '2011';
            $police[] = intval($funding['police_budget_2011']);
            $housing[] = intval($funding['housing_budget_2011']);
            $health[] = intval($funding['health_budget_2011']);
        }

        if ($funding['police_budget_2012'] && $funding['housing_budget_2012'] && $funding['health_budget_2012']) {
            $labels[] = '2012';
            $police[] = intval($funding['police_budget_2012']);
            $housing[] = intval($funding['housing_budget_2012']);
            $health[] = intval($funding['health_budget_2012']);
        }

        if ($funding['police_budget_2013'] && $funding['housing_budget_2013'] && $funding['health_budget_2013']) {
            $labels[] = '2013';
            $police[] = intval($funding['police_budget_2013']);
            $housing[] = intval($funding['housing_budget_2013']);
            $health[] = intval($funding['health_budget_2013']);
        }

        if ($funding['police_budget_2014'] && $funding['housing_budget_2014'] && $funding['health_budget_2014']) {
            $labels[] = '2014';
            $police[] = intval($funding['police_budget_2014']);
            $housing[] = intval($funding['housing_budget_2014']);
            $health[] = intval($funding['health_budget_2014']);
        }

        if ($funding['police_budget_2015'] && $funding['housing_budget_2015'] && $funding['health_budget_2015']) {
            $labels[] = '2015';
            $police[] = intval($funding['police_budget_2015']);
            $housing[] = intval($funding['housing_budget_2015']);
            $health[] = intval($funding['health_budget_2015']);
        }

        if ($funding['police_budget_2016'] && $funding['housing_budget_2016'] && $funding['health_budget_2016']) {
            $labels[] = '2016';
            $police[] = intval($funding['police_budget_2016']);
            $housing[] = intval($funding['housing_budget_2016']);
            $health[] = intval($funding['health_budget_2016']);
        }

        if ($funding['police_budget_2017'] && $funding['housing_budget_2017'] && $funding['health_budget_2017']) {
            $labels[] = '2017';
            $police[] = intval($funding['police_budget_2017']);
            $housing[] = intval($funding['housing_budget_2017']);
            $health[] = intval($funding['health_budget_2017']);
        }

        if ($funding['police_budget_2018'] && $funding['housing_budget_2018'] && $funding['health_budget_2018']) {
            $labels[] = '2018';
            $police[] = intval($funding['police_budget_2018']);
            $housing[] = intval($funding['housing_budget_2018']);
            $health[] = intval($funding['health_budget_2018']);
        }

        if ($funding['police_budget_2019'] && $funding['housing_budget_2019'] && $funding['health_budget_2019']) {
            $labels[] = '2019';
            $police[] = intval($funding['police_budget_2019']);
            $housing[] = intval($funding['housing_budget_2019']);
            $health[] = intval($funding['health_budget_2019']);
        }

        if ($funding['police_budget_2020'] && $funding['housing_budget_2020'] && $funding['health_budget_2020']) {
            $labels[] = '2020';
            $police[] = intval($funding['police_budget_2020']);
            $housing[] = intval($funding['housing_budget_2020']);
            $health[] = intval($funding['health_budget_2020']);
        }

        return json_encode(array(
            'labels' => $labels,
            'police' => $police,
            'housing' => $housing,
            'health' => $health
        ));
    }
}
