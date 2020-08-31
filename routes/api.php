<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/api/map/us/sheriff', function () {
    $api = new ApiController();
    $geojson = $api->fetchNationwideMapData('sheriff');

    return response()->json($geojson);
});
