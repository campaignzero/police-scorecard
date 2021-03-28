<?php

use Illuminate\Support\Facades\Route;

Route::get('/api/map/us/sheriff', 'ApiController@mapSheriff');
Route::post('/api/search', 'ApiController@webSearch');
