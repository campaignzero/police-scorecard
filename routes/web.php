<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/', function () {
    $api = new ApiController();
    $states = $api->fetchStates();
    $grades = getNationalGrades($states, 'police-department');
    $scorecard = getNationalSummary($states);
    $total = getNationalTotal($states);
    $totalPolice = getNationalPoliceTotal($states);

    return view('home', [
        'description' => 'The Police Scorecard evaluates police departments based on quantitative data on arrests, use of force, accountability and other policing issues to make progress towards more just and equitable policing outcomes.',
        'grades' => $grades,
        'scorecard' => $scorecard,
        'state' => 'us',
        'states' => $states,
        'title' => 'Police Scorecard',
        'total' => $total,
        'totalPolice' => $totalPolice,
        'totalSheriff' => 0,
        'type' => 'police-department'
    ]);
});

Route::get('/findings', function () {
    $api = new ApiController();
    $states = $api->fetchStates();

    return view('findings', [
        'states' => $states
    ]);
});

Route::get('/sandiego', function () {
    $api = new ApiController();
    $states = $api->fetchStates();

    return view('sandiego', [
        'states' => $states
    ]);
});

Route::get('/admin', function () {
    return view('admin', [
        'clearCache' => false
    ]);
})->middleware('auth.basic.once');

Route::get('/admin/clear-cache', function () {
    // Manually Clear Cache
    Cache::flush();

    // Reset other Cached Elements
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');

    return view('admin', [
        'clearCache' => true
    ]);
})->middleware('auth.basic.once');

Route::get('/us', function () {
    $api = new ApiController();
    $states = $api->fetchStates();
    $grades = getNationalGrades($states, 'police-department');
    $scorecard = getNationalSummary($states);
    $total = getNationalTotal($states);
    $totalPolice = getNationalPoliceTotal($states);

    return view('home', [
        'description' => 'The Police Scorecard evaluates police departments based on quantitative data on arrests, use of force, accountability and other policing issues to make progress towards more just and equitable policing outcomes.',
        'grades' => $grades,
        'scorecard' => $scorecard,
        'state' => 'us',
        'states' => $states,
        'title' => 'Police Scorecard',
        'total' => $total,
        'totalPolice' => $totalPolice,
        'totalSheriff' => 0,
        'type' => 'police-department'
    ]);
});

Route::get('/us/police-department', function () {
    $api = new ApiController();
    $states = $api->fetchStates();
    $grades = getNationalGrades($states, 'police-department');
    $scorecard = getNationalSummary($states);
    $total = getNationalTotal($states);
    $totalPolice = getNationalPoliceTotal($states);

    return view('home', [
        'description' => 'The Police Scorecard evaluates police departments based on quantitative data on arrests, use of force, accountability and other policing issues to make progress towards more just and equitable policing outcomes.',
        'grades' => $grades,
        'scorecard' => $scorecard,
        'state' => 'us',
        'states' => $states,
        'title' => 'Police Scorecard',
        'total' => $total,
        'totalPolice' => $totalPolice,
        'totalSheriff' => 0,
        'type' => 'police-department'
    ]);
});

Route::get('/us/sheriff', function () {
    $api = new ApiController();
    $states = $api->fetchStates();
    $grades = getNationalGrades($states, 'sheriff');
    $scorecard = getNationalSummary($states);
    $total = getNationalTotal($states);
    $totalSheriff = getNationalSheriffTotal($states);

    return view('home', [
        'description' => 'The Police Scorecard evaluates police departments based on quantitative data on arrests, use of force, accountability and other policing issues to make progress towards more just and equitable policing outcomes.',
        'grades' => $grades,
        'scorecard' => $scorecard,
        'state' => 'us',
        'states' => $states,
        'title' => 'Police Scorecard',
        'total' => $total,
        'totalPolice' => 0,
        'totalSheriff' => $totalSheriff,
        'type' => 'sheriff'
    ]);
});

Route::get('/{state}', function ($state) {
    $api = new ApiController();
    $grades = $api->fetchGrades($state, 'police-department');
    $scorecard = $api->fetchLocationScorecard($state, 'police-department');
    $stateData = $api->fetchStateData($state);
    $states = $api->fetchStates();
    $total = getStateTotal($states, $state);
    $location = $scorecard['agency']['slug'];

    // Sort Grades
    usort($grades, function($a, $b) {
        return $a['overall_score'] > $b['overall_score'];
    });

    return view('report', [
        'title' => "Police Scorecard: {$scorecard['geo']['state']['name']}",
        'description' => "Get the facts about police violence and accountability in {$scorecard['geo']['state']['name']}. Evaluate each department and hold them accountable at PoliceScorecard.org",
        'grades' => $grades,
        'location' => $location,
        'scorecard' => $scorecard,
        'state' => $state,
        'states' => $states,
        'stateData' => $stateData,
        'type' => 'police-department',
        'total' => $total
    ]);
});

Route::get('/{state}/{type}', function ($state, $type) {
    $api = new ApiController();
    $grades = $api->fetchGrades($state, $type);
    $scorecard = $api->fetchLocationScorecard($state, $type);
    $stateData = $api->fetchStateData($state);
    $states = $api->fetchStates();
    $total = getStateTotal($states, $state);
    $location = $scorecard['agency']['slug'];

    // Sort Grades
    usort($grades, function($a, $b) {
        return $a['overall_score'] > $b['overall_score'];
    });

    return view('report', [
        'title' => "Police Scorecard: {$scorecard['geo']['state']['name']}",
        'description' => "Get the facts about police violence and accountability in {$scorecard['geo']['state']['name']}. Evaluate each department and hold them accountable at PoliceScorecard.org",
        'grades' => $grades,
        'location' => $location,
        'scorecard' => $scorecard,
        'state' => $state,
        'states' => $states,
        'stateData' => $stateData,
        'type' => $type,
        'total' => $total
    ]);
});

Route::get('/{state}/{type}/{location}', function ($state, $type, $location) {
    $api = new ApiController();
    $grades = $api->fetchGrades($state, $type);
    $scorecard = $api->fetchLocationScorecard($state, $type, $location);
    $stateData = $api->fetchStateData($state);
    $states = $api->fetchStates();
    $total = getStateTotal($states, $state);

    // Sort Grades
    usort($grades, function($a, $b) {
        return $a['overall_score'] > $b['overall_score'];
    });

    return view('report', [
        'title' => "Police Scorecard: {$scorecard['geo']['state']['name']}",
        'description' => "Get the facts about police violence and accountability in {$scorecard['geo']['state']['name']}. Evaluate each department and hold them accountable at PoliceScorecard.org",
        'grades' => $grades,
        'location' => $location,
        'scorecard' => $scorecard,
        'state' => $state,
        'states' => $states,
        'stateData' => $stateData,
        'type' => $type,
        'total' => $total
    ]);
});
