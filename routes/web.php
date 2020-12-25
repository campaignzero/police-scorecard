<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WebController@home');
Route::get('/findings', 'WebController@findings');
Route::get('/about', 'WebController@about');
Route::get('/sandiego', 'WebController@sandiego');
Route::get('/admin', 'WebController@admin')->middleware('auth.basic.once');
Route::get('/admin/clear-cache', 'WebController@adminClearCache')->middleware('auth.basic.once');
Route::get('/admin/mapbox', 'WebController@adminMapbox')->middleware('auth.basic.once');
Route::get('/us', 'WebController@us');
Route::get('/us/police-department', 'WebController@usPoliceDepartment');
Route::get('/us/sheriff', 'WebController@usSheriffDepartment');
Route::get('/{state}', 'WebController@state');
Route::get('/{state}/{type}', 'WebController@stateType');
Route::get('/{state}/{type}/{location}', 'WebController@stateTypeLocation');
