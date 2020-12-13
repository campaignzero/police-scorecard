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
    $updated = false;
    $published = false;
    $response = null;
    $error = null;

    // Make sure we got some GeoJSON back
    if (!empty($geojson) && isset($geojson['features'])) {
        $geojson_ld = encodeNDJSON($geojson['features']);

        // Make sure GeoJSON conversion worked, and that we wrote the file to disk
        if (!empty($geojson_ld) && Storage::disk('local')->put('police-department.geojson.ld', $geojson_ld)) {
            // Setup Params fpr Mapbox Update
            $mapbox_police_tileset = config('app.mapbox_police_tileset');
            $mapbox_tile_token = config('app.mapbox_tile_token');
            $update_url = "https://api.mapbox.com/tilesets/v1/sources/" . str_replace('.', '/', $mapbox_police_tileset) . "?access_token={$mapbox_tile_token}";
            $file_path = Storage::disk('local')->path('police-department.geojson.ld');

            if ($file_path) {
                $update = mapBoxUpdate($update_url, $file_path);

                // Check if we got a response back from the Mapbox Update
                if ($update) {
                    $updated = (isset($update['success']) && $update['success'] === true);
                    $response = (isset($update['success']) && $update['success'] === true) ? $update['response'] : null;
                    $error = (isset($update['success']) && $update['success'] === false) ? $update['response'] : null;

                    // If the Update Completed Successfully, Trigger a Publish
                    if ($updated) {
                        $publish_url = "https://api.mapbox.com/tilesets/v1/{$mapbox_police_tileset}/publish?access_token={$mapbox_tile_token}";
                        $publish = mapBoxPublish($publish_url);

                        // Check that we got a response from Mapbox Publish
                        if ($publish) {
                            $published = (isset($publish['success']) && $publish['success'] === true);

                            $response['published'] = array(
                                'response' => (isset($publish['response']) && isset($publish['response']['message'])) ? $publish['response']['message'] : $publish['message'],
                                'jobId' => (isset($publish['response']) && isset($publish['response']['jobId'])) ? $publish['response']['jobId'] : null
                            );
                        }
                    }
                }
            } else {
                $error = 'Unable to Locate File ' . realpath($file_path) . 'for Upload.';
            }
        } else {
            $error = 'Failed to create police-department.geojson.ld file.';
        }
    } else {
        $error = 'Failed to fetch GeoJSON for Police Departments.';
    }

    return view('admin', [
        'clearCache' => false,
        'error' => $error,
        'mapbox' => true,
        'published' => $published,
        'response' => $response,
        'updated' => $updated
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
