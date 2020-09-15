<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

Route::get('/api/map/us/sheriff', function () {
    $api = new ApiController();
    $geojson = $api->fetchNationwideMapData('sheriff');

    return response()->json($geojson);
});

Route::post('/api/search', function (Request $request) {
    $keyword = $request->input('keyword');

    $api = new ApiController();
    $results = $api->search($keyword);

    return response()->json($results);
});
