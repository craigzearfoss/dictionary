<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {

    Route::get('/category', '\App\Http\Controllers\Admin\CategoryController@index')->name('category.index');
    Route::get('/category/create', '\App\Http\Controllers\Admin\CategoryController@create')->name('category.create');
    Route::post('/category/create', '\App\Http\Controllers\Admin\CategoryController@store')->name('category.store');
    Route::get('/category/{category}', '\App\Http\Controllers\Admin\CategoryController@show')->name('category.show');
    Route::get('/category/{category}/edit', '\App\Http\Controllers\Admin\CategoryController@edit')->name('category.edit');
    Route::patch('/category/{category}/update', '\App\Http\Controllers\Admin\CategoryController@update')->name('category.update');
    Route::delete('/category/{category}/delete', '\App\Http\Controllers\Admin\CategoryController@destroy')->name('category.destroy');

    Route::get('/lang', '\App\Http\Controllers\Admin\LangController@index')->name('lang.index');
    Route::get('/lang/create', '\App\Http\Controllers\Admin\LangController@create')->name('lang.create');
    Route::post('/lang/create', '\App\Http\Controllers\Admin\LangController@store')->name('lang.store');
    Route::get('/lang/{lang}', '\App\Http\Controllers\Admin\LangController@show')->name('lang.show');
    Route::get('/lang/{lang}/edit', '\App\Http\Controllers\Admin\LangController@edit')->name('lang.edit');
    Route::patch('/lang/{lang}/update', '\App\Http\Controllers\Admin\LangController@update')->name('lang.update');
    Route::delete('/lang/{lang}/delete', '\App\Http\Controllers\Admin\LangController@destroy')->name('lang.destroy');

    Route::get('/term', '\App\Http\Controllers\Admin\TermController@index')->name('term.index');
    Route::get('/term/create', '\App\Http\Controllers\Admin\TermController@create')->name('term.create');
    Route::post('/term/create', '\App\Http\Controllers\Admin\TermController@store')->name('term.store');
    Route::get('/term/{term}', '\App\Http\Controllers\Admin\TermController@show')->name('term.show');
    Route::get('/term/{term}/edit', '\App\Http\Controllers\Admin\TermController@edit')->name('term.edit');
    Route::patch('/lang/{term}/update', '\App\Http\Controllers\Admin\TermController@update')->name('term.update');
    Route::delete('/term/{term}/delete', '\App\Http\Controllers\Admin\TermController@destroy')->name('term.destroy');
});

Route::get('/start', '\App\Http\Controllers\Sandbox\WhccController@start')->name('start');
Route::get('/test', '\App\Http\Controllers\Sandbox\WhccController@test')->name('test');
Route::get('/infinity', '\App\Http\Controllers\Sandbox\WhccController@infinity')->name('infinity');
