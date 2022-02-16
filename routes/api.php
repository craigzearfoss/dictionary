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

    Route::get('category', "{$apiControllerDir}\CategoryController@index")->name('api.v1.category.index');
    Route::get('category/{category}', "{$apiControllerDir}\CategoryController@show")->name('api.v1.category.show');
    Route::post('category', "{$apiControllerDir}\CategoryController@store")->name('api.v1.category.store');
    Route::put('category/{category}', "{$apiControllerDir}\CategoryController@update")->name('api.v1.category.update');
    Route::delete('category/{category}', "{$apiControllerDir}\CategoryController@delete")->name('api.v1.category.destroy');
    Route::post('category/{category}/activate', "{$apiControllerDir}\CategoryController@activate")->name('api.v1.category.activate');

    Route::get('collins-tag', "{$apiControllerDir}\CollinsTagController@index")->name('api.v1.collins_tag.index');
    Route::get('collins-tag/{collinsTag}', "{$apiControllerDir}\CollinsTagController@show")->name('api.v1.collins_tag.show');
    Route::post('collins-tag', "{$apiControllerDir}\CollinsTagController@store")->name('api.v1.collins_tag.store');
    Route::put('collins-tag/{collinsTag}', "{$apiControllerDir}\CollinsTagController@update")->name('api.v1.collins_tag.update');
    Route::delete('collins-tag/{collinsTag}', "{$apiControllerDir}\CollinsTagController@delete")->name('api.v1.collins_tag.destroy');
    Route::post('collins-tag/{collinsTag}/activate', "{$apiControllerDir}\CollinsTagController@activate")->name('api.v1.collins_tag.activate');

    Route::get('grade', "{$apiControllerDir}\GradeController@index")->name('api.v1.grade.index');
    Route::get('grade/{grade}', "{$apiControllerDir}\GradeController@show")->name('api.v1.grade.show');

    Route::get('lang', "{$apiControllerDir}\LangController@index")->name('api.v1.lang.index');
    Route::get('lang/{lang}', "{$apiControllerDir}\LangController@show")->name('api.v1.lang.show');
    Route::post('lang', "{$apiControllerDir}\LangController@store")->name('api.v1.lang.store');
    Route::put('lang/{lang}', "{$apiControllerDir}\LangController@update")->name('api.v1.lang.update');
    Route::delete('lang/{lang}', "{$apiControllerDir}\LangController@delete")->name('api.v1.lang.destroy');
    Route::post('lang/{lang}/activate', "{$apiControllerDir}\LangController@activate")->name('api.v1.lang.activate');

    Route::get('pos', "{$apiControllerDir}\PosController@index")->name('api.v1.pos.index');
    Route::get('pos/{pos}', "{$apiControllerDir}\PosController@show")->name('api.v1.pos.show');

    Route::post('search', "{$apiControllerDir}\SearchController@index")->name('api.v1.search.index');

    Route::get('tag', "{$apiControllerDir}\TagController@index")->name('api.v1.tag.index');
    Route::get('tag/{tag}', "{$apiControllerDir}\TagController@show")->name('api.v1.tag.show');
    Route::post('tag', "{$apiControllerDir}\TagController@store")->name('api.v1.tag.store');
    Route::put('tag/{tag}', "{$apiControllerDir}\TagController@update")->name('api.v1.tag.update');
    Route::delete('tag/{tag}', "{$apiControllerDir}\TagController@delete")->name('api.v1.tag.destroy');
    Route::post('tag/{tag}/activate', "{$apiControllerDir}\TagController@activate")->name('api.v1.tag.activate');

    Route::get('term', "{$apiControllerDir}\TermController@index")->name('api.v1.term.index');
    Route::get('term/{term}', "{$apiControllerDir}\TermController@show")->name('api.v1.term.show');
    Route::post('term', "{$apiControllerDir}\TermController@store")->name('api.v1.term.store');
    Route::put('term/{term}', "{$apiControllerDir}\TermController@update")->name('api.v1.term.update');
    Route::delete('term/{term}', "{$apiControllerDir}\TermController@delete")->name('api.v1.term.destroy');
    Route::post('term/{term}/activate', "{$apiControllerDir}\TermController@activate")->name('api.v1.term.activate');

    Route::get('thword', "{$apiControllerDir}\ThwordController@index")->name('api.v1.thword.index');
    Route::get('thword/{thword}', "{$apiControllerDir}\ThwordController@show")->name('api.v1.thword.show');
    Route::post('thword', "{$apiControllerDir}\ThwordController@store")->name('api.v1.thword.store');
    Route::put('thword/{thword}', "{$apiControllerDir}\ThwordController@update")->name('api.v1.thword.update');
    Route::delete('thword/{thword}', "{$apiControllerDir}\ThwordController@delete")->name('api.v1.thword.destroy');
    Route::post('thword/{thword}/activate', "{$apiControllerDir}\ThwordController@activate")->name('api.v1.thword.activate');

    Route::get('user', "{$apiControllerDir}\UserController@index")->name('api.v1.user.index');
    Route::get('user/{user}', "{$apiControllerDir}\UserController@show")->name('api.v1.user.show');
    Route::post('user', "{$apiControllerDir}\UserController@store")->name('api.v1.user.store');
    Route::put('user/{user}', "{$apiControllerDir}\UserController@update")->name('api.v1.user.update');
    Route::delete('user/{user}', "{$apiControllerDir}\UserController@delete")->name('api.v1.user.destroy');
    Route::post('user/{user}/activate', "{$apiControllerDir}\UserController@activate")->name('api.v1.user.activate');

});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/


