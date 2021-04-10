<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class WebController extends Controller
{
    public function home() {
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
    }

    public function findings() {
        $api = new ApiController();
        $states = $api->fetchStates();

        return view('findings', [
            'states' => $states
        ]);
    }

    public function about() {
        $api = new ApiController();
        $states = $api->fetchStates();

        return view('about', [
            'states' => $states
        ]);
    }

    public function sandiego() {
        $api = new ApiController();
        $states = $api->fetchStates();

        return view('sandiego', [
            'states' => $states
        ]);
    }

    public function admin() {
        return view('admin', [
            'clearCache' => false,
            'mapbox' => false
        ]);
    }

    public function adminClearCache() {
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
    }

    public function adminMapbox() {
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
    }

    public function us() {
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
    }

    public function usPoliceDepartment() {
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
    }

    public function usSheriffDepartment() {
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
    }

    public function state($state) {
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
    }

    public function stateType($state, $type) {
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
    }

    public function stateTypeLocation($state, $type, $location) {
        $api = new ApiController();
        $grades = $api->fetchGrades($state, $type);
        $scorecard = $api->fetchLocationScorecard($state, $type, $location);
        $stateData = $api->fetchStateData($state);
        $states = $api->fetchStates();
        $total = getStateTotal($states, $state);

        $metaLocation = ($type === 'sheriff')
            ? "{$scorecard['geo']['county']['name']}, {$scorecard['geo']['state']['abbr']}"
            : "{$scorecard['geo']['city']['name']}, {$scorecard['geo']['state']['abbr']}";

        return view('report', [
            'title' => "Police Scorecard: {$metaLocation}",
            'description' => "Get the facts about police violence and accountability in {$metaLocation}. Evaluate each department and hold them accountable at PoliceScorecard.org",
            'grades' => sortGrades($grades),
            'location' => $location,
            'scorecard' => $scorecard,
            'state' => $state,
            'states' => $states,
            'stateData' => $stateData,
            'type' => $type,
            'total' => $total
        ]);
    }
}
