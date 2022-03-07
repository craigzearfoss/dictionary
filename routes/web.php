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

    Route::get('/', '\App\Http\Controllers\Admin\IndexController@index')->name('index');

    Route::get('/category', '\App\Http\Controllers\Admin\CategoryController@index')->name('category.index');
    Route::get('/category/create', '\App\Http\Controllers\Admin\CategoryController@create')->name('category.create');
    Route::get('/category/{category}', '\App\Http\Controllers\Admin\CategoryController@show')->name('category.show');
    Route::get('/category/{category}/edit', '\App\Http\Controllers\Admin\CategoryController@edit')->name('category.edit');

    Route::get('/collins-tag', '\App\Http\Controllers\Admin\CollinsTagController@index')->name('collins_tag.index');
    Route::get('/collins-tag/create', '\App\Http\Controllers\Admin\CollinsTagController@create')->name('collins_tag.create');
    Route::get('/collins-tag/{collinsTag}', '\App\Http\Controllers\Admin\CollinsTagController@show')->name('collins_tag.show');
    Route::get('/collins-tag/{collinsTag}/edit', '\App\Http\Controllers\Admin\CollinsTagController@edit')->name('collins_tag.edit');

    Route::get('/grade', '\App\Http\Controllers\Admin\GradeController@index')->name('grade.index');
    Route::get('/grade/{grade}', '\App\Http\Controllers\Admin\GradeController@show')->name('grade.show');

    Route::get('/lang', '\App\Http\Controllers\Admin\LangController@index')->name('lang.index');
    Route::get('/lang/create', '\App\Http\Controllers\Admin\LangController@create')->name('lang.create');
    Route::get('/lang/{lang}', '\App\Http\Controllers\Admin\LangController@show')->name('lang.show');
    Route::get('/lang/{lang}/edit', '\App\Http\Controllers\Admin\LangController@edit')->name('lang.edit');

    Route::get('/pos', '\App\Http\Controllers\Admin\PosController@index')->name('pos.index');
    Route::get('/pos/{pos}', '\App\Http\Controllers\Admin\PosController@show')->name('pos.show');

    Route::get('/tag', '\App\Http\Controllers\Admin\TagController@index')->name('tag.index');
    Route::get('/tag/create', '\App\Http\Controllers\Admin\TagController@create')->name('tag.create');
    Route::get('/tag/{tag}', '\App\Http\Controllers\Admin\TagController@show')->name('tag.show');
    Route::get('/tag/{tag}/edit', '\App\Http\Controllers\Admin\TagController@edit')->name('tag.edit');

    Route::get('/term', '\App\Http\Controllers\Admin\TermController@index')->name('term.index');
    Route::get('/term/create', '\App\Http\Controllers\Admin\TermController@create')->name('term.create');
    Route::get('/term/{term}', '\App\Http\Controllers\Admin\TermController@show')->name('term.show');
    Route::get('/term/{term}/edit', '\App\Http\Controllers\Admin\TermController@edit')->name('term.edit');

    Route::get('/term-todo', '\App\Http\Controllers\Admin\TermTodoController@index')->name('term_todo.index');
    Route::get('/term-todo/create', '\App\Http\Controllers\Admin\TermTodoController@create')->name('term_todo.create');
    Route::get('/term-todo/{termTodo}', '\App\Http\Controllers\Admin\TermTodoController@show')->name('term_todo.show');
    Route::get('/term-todo/{termTodo}/edit', '\App\Http\Controllers\Admin\TermTodoController@edit')->name('term_todo.edit');

    Route::get('/thword', '\App\Http\Controllers\Admin\ThwordController@index')->name('thword.index');
    Route::get('/thword/create', '\App\Http\Controllers\Admin\ThwordController@create')->name('thword.create');
    Route::get('/thword/{thword}', '\App\Http\Controllers\Admin\ThwordController@show')->name('thword.show');
    Route::get('/thword/{thword}/edit', '\App\Http\Controllers\Admin\ThwordController@edit')->name('thword.edit');

    Route::get('/thwordplay', '\App\Http\Controllers\Admin\ThwordplayController@index')->name('thwordplay.index');
    Route::get('/thwordplay/create', '\App\Http\Controllers\Admin\ThwordplayController@create')->name('thwordplay.create');
    Route::get('/thwordplay/{thwordplay}', '\App\Http\Controllers\Admin\ThwordplayController@show')->name('thwordplay.show');
    Route::get('/thwordplay/{thwordplay}/edit', '\App\Http\Controllers\Admin\ThwordplayController@edit')->name('thwordplay.edit');

    Route::get('/tile-set', '\App\Http\Controllers\Admin\TileSetController@index')->name('tile_set.index');
    Route::get('/tile-set/{tileSet}', '\App\Http\Controllers\Admin\TileSetController@show')->name('tile_set.show');

    Route::get('/user', '\App\Http\Controllers\Admin\UserController@index')->name('user.index');
    Route::get('/user/create', '\App\Http\Controllers\Admin\UserController@create')->name('user.create');
    Route::get('/user/{user}', '\App\Http\Controllers\Admin\UserController@show')->name('user.show');
    Route::get('/user/{user}/edit', '\App\Http\Controllers\Admin\UserController@edit')->name('user.edit');

    Route::get('/search', '\App\Http\Controllers\Admin\SearchController@index')->name('search.index');

});
