<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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
        'clearCache' => false,
        'mapbox' => false
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
        'clearCache' => true,
        'mapbox' => false
    ]);
})->middleware('auth.basic.once');

Route::get('/admin/mapbox', function () {
    $api = new ApiController();
    $geojson = $api->fetchNationwideMapData('police-department');
    $uploaded = false;
    $response = null;

    // Make sure we got some GeoJSON back
    if (!empty($geojson) && isset($geojson['features'])) {
        $geojson_ld = encodeNDJSON($geojson['features']);

        // Make sure GeoJSON conversion worked, and that we wrote the file to disk
        if (!empty($geojson_ld) && Storage::disk('local')->put('police-department.geojson.ld', $geojson_ld)) {
            // Setup cURL Request
            $url = 'https://api.mapbox.com/tilesets/v1/sources/policescorecard/aopjgh6s?access_token=' . config('app.mapbox_tile_token');
            $filepath = Storage::disk('local')->path('police-department.geojson.ld');
            $file = new CURLFile(realpath($filepath));

            // Verify cURL created a File
            if ($file) {
                $post = array (
                    'file' => $file
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: multipart/form-data'));
                curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
                curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 100);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

                $result = curl_exec($ch);

                if ($result === FALSE) {
                    curl_close($ch);
                } else{
                    curl_close($ch);
                    $uploaded = true;
                    $response = json_decode($result, true);
                }
            }
        }
    }

    return view('admin', [
        'clearCache' => false,
        'mapbox' => true,
        'uploaded' => $uploaded,
        'response' => $response
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

    return view('report', [
        'title' => "Police Scorecard: {$scorecard['geo']['state']['name']}",
        'description' => "Get the facts about police violence and accountability in {$scorecard['geo']['state']['name']}. Evaluate each department and hold them accountable at PoliceScorecard.org",
        'grades' => sortGrades($grades),
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

    return view('report', [
        'title' => "Police Scorecard: {$scorecard['geo']['state']['name']}",
        'description' => "Get the facts about police violence and accountability in {$scorecard['geo']['state']['name']}. Evaluate each department and hold them accountable at PoliceScorecard.org",
        'grades' => sortGrades($grades),
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

    return view('report', [
        'title' => "Police Scorecard: {$scorecard['geo']['state']['name']}",
        'description' => "Get the facts about police violence and accountability in {$scorecard['geo']['state']['name']}. Evaluate each department and hold them accountable at PoliceScorecard.org",
        'grades' => sortGrades($grades),
        'location' => $location,
        'scorecard' => $scorecard,
        'state' => $state,
        'states' => $states,
        'stateData' => $stateData,
        'type' => $type,
        'total' => $total
    ]);
});
