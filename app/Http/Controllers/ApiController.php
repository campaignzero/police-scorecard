<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ApiController extends Controller
{
    /**
     * @var Http API Client
     */
    protected $client;

    /**
     * Create new instance of Http
     */
    public function __construct() {
        $this->client = Http::withOptions([
            'timeout' => config('api.api_timeout'),
            'base_uri' => config('api.api_base') . '/' . config('api.api_version') . '/',
            'headers' => [
                'API-Key' => config('api.api_key'),
                'accept' => 'application/json'
            ]
        ]);
    }

    /**
     * Get Cache Key for URL
     * @param $endpoint
     * @param $query
     * @return string
     */
    public function getCacheKey($endpoint, $query) {
        $cache_url = $endpoint . '?' . http_build_query($query);
        return 'api:query:' . md5($cache_url);
    }

    /**
     * @param $endpoint
     * @param array $query
     * @return mixed
     */
    protected function makeRequest($endpoint, $query=[]) {
        $cache_key = $this->getCacheKey($endpoint, $query);
        $cached_response = Cache::get($cache_key);

        if ($cached_response) {
            $api_data = json_decode($cached_response, true);
            return isset($api_data['data']) ? $api_data['data'] : $api_data;
        } else {
            $apiRequest = $this->client->get($endpoint);
            $response = $apiRequest->getBody()->getContents();
            $api_data = json_decode($response, true);

            if (!$api_data) {
                abort(403, 'Invalid Request: ' . $endpoint);
            } else if (isset($api_data['errors']) && count($api_data['errors']) > 0) {
                abort(403, $api_data['errors'][0]);
            } else {
                Cache::add($cache_key, $response, config('api.cache_expire'));
                return isset($api_data['data']) ? $api_data['data'] : $api_data;
            }
        }
    }

    /**
     * Fetch Scorecard for a Given Location
     *
     * <code>
     * $api = new ApiController();
     * $scorecard = api->fetchLocationScorecard('ny', 'police-department', 'new-york');
     * </code>
     *
     * @param $state
     * @param $type
     * @param $location
     * @return mixed
     */
    public function fetchLocationScorecard($state, $type, $location = null) {
        return ($location)
            ? $this->makeRequest("scorecard/report/{$state}/{$type}/{$location}")
            : $this->makeRequest("scorecard/report/{$state}/{$type}");
    }

    /**
     * Fetch Scorecard Grades for a Given Location
     *
     * <code>
     * $api = new ApiController();
     * $states = api->fetchGrades('ny', 'police-department');
     * </code>
     *
     * @return mixed
     */
    public function fetchGrades($state, $type, $limit = 1000) {
        return $this->makeRequest("scorecard/grades/{$state}/{$type}?limit={$limit}");
    }

    /**
     * Fetch Summary Data for States
     *
     * <code>
     * $api = new ApiController();
     * $states = api->fetchStates();
     * </code>
     *
     * @return mixed
     */
    public function fetchStates() {
        return $this->makeRequest("scorecard/states");
    }

    /**
     * Fetch Data for Specific State
     *
     * <code>
     * $api = new ApiController();
     * $states = api->fetchStateData('ny');
     * </code>
     *
     * @param $state
     * @return mixed
     */
    public function fetchStateData($state) {
        return $this->makeRequest("scorecard/state/{$state}");
    }

    /**
     * Fetch Data for Specific State
     *
     * <code>
     * $api = new ApiController();
     * $geojson = api->fetchNationwideMapData('sheriff');
     * </code>
     *
     * @param $type
     * @return mixed
     */
    public function fetchNationwideMapData($type) {
        return $this->makeRequest("/scorecard/map/us/{$type}?format=geojson");
    }

    /**
     * Fetch Data for Specific State
     *
     * <code>
     * $api = new ApiController();
     * $search = api->search('St. Louis, MO');
     * </code>
     *
     * @param $type
     * @return mixed
     */
    public function search($keyword) {
        if (!$keyword || strlen($keyword) < 3) {
            return '[]';
        }

        return $this->makeRequest("/scorecard/search/{$keyword}");
    }
}
