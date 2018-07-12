<?php

use App\Http\Controllers\Api\v2\CurrentPhpVersionController;
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

Route::get('/hosts/shared', ['uses' => 'Api\v2\SharedHostsController@index']);
Route::get('/hosts/managed', ['uses' => 'Api\v2\ManagedHostsController@index']);
Route::get('/hosts/distros', ['uses' => 'Api\v2\OperatingSystemsController@index']);
Route::get('/versions/current', ['uses' => 'Api\v2\CurrentPhpVersionController@index']);
Route::get('/versions/deprecated', ['uses' => 'Api\v2\DeprecatedPhpVersionController@index']);
