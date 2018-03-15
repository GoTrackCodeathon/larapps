<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/kasus', 'KasusController');
Route::apiResource('/acc', 'BankAccountController');
Route::apiResource('/crimes', 'CrimeController');
Route::apiResource('/fiureport', 'FiuReportController');
Route::apiResource('/unscr/individu', 'UnscrIndividualController');
Route::get('/unscr/refresh/individu', 'UnscrIndividualController@refresh');

Route::get('/search/{query}', 'SearchController@cari');
