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

Route::group(['namespace' => 'V1', 'prefix' => 'v1', 'as' => ''], function() {

    $apiControllerDir = '\App\Http\Controllers\API\V1';

    Route::get('lang', "{$apiControllerDir}\LangController@index")->name('api.v1.lang.index');
    Route::get('lang/{lang}', "{$apiControllerDir}\LangController@show")->name('api.v1.lang.show');
    Route::post('lang', "{$apiControllerDir}\LangController@store")->name('api.v1.lang.store');
    Route::put('lang/{lang}', "{$apiControllerDir}\LangController@update")->name('api.v1.lang.update');
    Route::delete('lang/{lang}', "{$apiControllerDir}\LangController@delete")->name('api.v1.lang.delete');

    Route::get('term', "{$apiControllerDir}\TermController@index")->name('api.v1.term.index');
    Route::get('term/{term}', "{$apiControllerDir}\TermController@show")->name('api.v1.term.show');
    Route::post('term', "{$apiControllerDir}\TermController@store")->name('api.v1.term.store');
    Route::put('term/{term}', "{$apiControllerDir}\TermController@update")->name('api.v1.term.update');
    Route::delete('term/{term}', "{$apiControllerDir}\TermController@delete")->name('api.v1.term.delete');
});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/


