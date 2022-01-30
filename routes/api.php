<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('v1/lang', '\App\Http\Controllers\Api\V1\LangController@index')->name('api.v1.lang.index');
Route::get('v1/lang/{lang}', '\App\Http\Controllers\Api\V1\LangController@show')->name('api.v1.lang.show');
Route::post('v1/lang', '\App\Http\Controllers\Api\V1\LangController@store')->name('api.v1.lang.store');
Route::put('v1/lang/{lang}', '\App\Http\Controllers\Api\V1\LangController@update')->name('api.v1.lang.update');
Route::delete('v1/lang/{lang}', '\App\Http\Controllers\Api\V1\LangController@delete')->name('api.v1.lang.delete');

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/


