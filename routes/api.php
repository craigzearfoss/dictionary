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

$apiControllerDir = '\App\Http\Controllers\API\V1';

Route::get('anti-thword', "{$apiControllerDir}\ThwordController@randomAntiThword")->name('api.anti-thword.random');
Route::get('anti-thword/{thword}', "{$apiControllerDir}\ThwordController@showAntiThword")->name('api.anti-thword.show');
Route::get('thword', "{$apiControllerDir}\ThwordController@random")->name('api.thword.random');
Route::get('thword/{thword}', "{$apiControllerDir}\ThwordController@show")->name('api.thword.show');
Route::get('tiles/{key}', "{$apiControllerDir}\TileSetController@tiles")->name('api.tiles');

Route::group(['namespace' => 'V1', 'prefix' => 'v1', 'as' => ''], function() use($apiControllerDir) {

    Route::get('case', "{$apiControllerDir}\VerbCaseController@index")->name('api.v1.verb_case.index');
    Route::get('case/{verbCase}', "{$apiControllerDir}\VerbCaseController@show")->name('api.v1.verb_case.show');

    Route::get('article', "{$apiControllerDir}\ArticleController@index")->name('api.v1.article.index');
    Route::get('article/definite', "{$apiControllerDir}\ArticleController@definite")->name('api.v1.article.definite');
    Route::get('article/indefinite', "{$apiControllerDir}\ArticleController@indefinite")->name('api.v1.article.indefinite');
    Route::get('article/definite/{languageIdOrCode}', "{$apiControllerDir}\ArticleController@definiteByLanguageIdOrCode")->name('api.v1.article.definite-language');
    Route::get('article/indefinite/{languageIdOrCode}', "{$apiControllerDir}\ArticleController@indefiniteByLanguageIdOrCode")->name('api.v1.article.indefinite-language');
    Route::get('article/definite/gender/{genderId}', "{$apiControllerDir}\ArticleController@definiteByGenderId")->name('api.v1.article.definite-gender');

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

    Route::get('gender', "{$apiControllerDir}\GenderController@index")->name('api.v1.gender.index');
    Route::get('gender/{gender}', "{$apiControllerDir}\GenderController@show")->name('api.v1.gender.show');

    Route::get('grade', "{$apiControllerDir}\GradeController@index")->name('api.v1.grade.index');
    Route::get('grade/{grade}', "{$apiControllerDir}\GradeController@show")->name('api.v1.grade.show');

    Route::get('language', "{$apiControllerDir}\LanguageController@index")->name('api.v1.language.index');
    Route::get('language/{language}', "{$apiControllerDir}\LanguageController@show")->name('api.v1.language.show');
    Route::post('language', "{$apiControllerDir}\LanguageController@store")->name('api.v1.language.store');
    Route::put('language/{language}', "{$apiControllerDir}\LanguageController@update")->name('api.v1.language.update');
    Route::delete('language/{language}', "{$apiControllerDir}\LanguageController@delete")->name('api.v1.language.destroy');
    Route::post('language/{language}/activate', "{$apiControllerDir}\LanguageController@activate")->name('api.v1.language.activate');

    Route::get('plurality', "{$apiControllerDir}\PluralityController@index")->name('api.v1.plurality.index');
    Route::get('plurality/{plurality}', "{$apiControllerDir}\PluralityController@show")->name('api.v1.plurality.show');

    Route::get('pos', "{$apiControllerDir}\PosController@index")->name('api.v1.pos.index');
    Route::get('pos/{pos}', "{$apiControllerDir}\PosController@show")->name('api.v1.pos.show');

    Route::get('pronoun', "{$apiControllerDir}\PronounController@index")->name('api.v1.pronoun.index');
    Route::get('pronoun/{pronoun}', "{$apiControllerDir}\PronounController@show")->name('api.v1.pronoun.show');
    Route::get('pronoun/list/{langCode}', "{$apiControllerDir}\PronounController@list")->name('api.v1.pronoun.list');

    Route::post('search', "{$apiControllerDir}\SearchController@index")->name('api.v1.search.index');

    Route::get('tag', "{$apiControllerDir}\TagController@index")->name('api.v1.tag.index');
    Route::get('tag/{tag}', "{$apiControllerDir}\TagController@show")->name('api.v1.tag.show');
    Route::post('tag', "{$apiControllerDir}\TagController@store")->name('api.v1.tag.store');
    Route::put('tag/{tag}', "{$apiControllerDir}\TagController@update")->name('api.v1.tag.update');
    Route::delete('tag/{tag}', "{$apiControllerDir}\TagController@delete")->name('api.v1.tag.destroy');
    Route::post('tag/{tag}/activate', "{$apiControllerDir}\TagController@activate")->name('api.v1.tag.activate');

    Route::get('tense', "{$apiControllerDir}\TenseController@index")->name('api.v1.tense.index');
    Route::get('tense/{tense}', "{$apiControllerDir}\TenseController@show")->name('api.v1.tense.show');
    //Route::post('tense', "{$apiControllerDir}\TenseController@store")->name('api.v1.tense.store');
    //Route::put('tense/{tense}', "{$apiControllerDir}\TenseController@update")->name('api.v1.tense.update');
    //Route::delete('tense/{tense}', "{$apiControllerDir}\TenseController@delete")->name('api.v1.tense.destroy');

    Route::get('term', "{$apiControllerDir}\TermController@index")->name('api.v1.term.index');
    Route::get('term/{term}', "{$apiControllerDir}\TermController@show")->name('api.v1.term.show');
    Route::post('term', "{$apiControllerDir}\TermController@store")->name('api.v1.term.store');
    Route::post('term/search', "{$apiControllerDir}\TermController@search")->name('api.v1.term.search');
    Route::put('term/{term}', "{$apiControllerDir}\TermController@update")->name('api.v1.term.update');
    Route::delete('term/{term}', "{$apiControllerDir}\TermController@delete")->name('api.v1.term.destroy');
    Route::post('term/{term}/activate', "{$apiControllerDir}\TermController@activate")->name('api.v1.term.activate');

    Route::get('term-todo', "{$apiControllerDir}\TermTodoController@index")->name('api.v1.term_todo.index');
    Route::get('term-todo/{termTodo}', "{$apiControllerDir}\TermTodoController@show")->name('api.v1.term_todo.show');
    Route::get('term-todo/{termTodo}/process', "{$apiControllerDir}\TermTodoController@process")->name('api.v1.term_todo.process');
    Route::get('term-todo/{termTodo}/skip', "{$apiControllerDir}\TermTodoController@skip")->name('api.v1.term_todo.skip');
    Route::get('term-todo/{termTodo}/verify', "{$apiControllerDir}\TermTodoController@verify")->name('api.v1.term_todo.verify');
    Route::post('term-todo', "{$apiControllerDir}\TermTodoController@store")->name('api.v1.term_todo.store');
    Route::put('term-todo/{termTodo}', "{$apiControllerDir}\TermTodoController@update")->name('api.v1.term_todo.update');
    Route::delete('term-todo/{termTodo}', "{$apiControllerDir}\TermTodoController@delete")->name('api.v1.term_todo.destroy');

    Route::get('thword', "{$apiControllerDir}\ThwordController@index")->name('api.v1.thword.index');
    Route::get('thword/{thword}', "{$apiControllerDir}\ThwordController@show")->name('api.v1.thword.show');
    Route::post('thword', "{$apiControllerDir}\ThwordController@store")->name('api.v1.thword.store');
    Route::put('thword/{thword}', "{$apiControllerDir}\ThwordController@update")->name('api.v1.thword.update');
    Route::delete('thword/{thword}', "{$apiControllerDir}\ThwordController@delete")->name('api.v1.thword.destroy');
    Route::post('thword/{thword}/activate', "{$apiControllerDir}\ThwordController@activate")->name('api.v1.thword.activate');

    Route::get('thwordplay', "{$apiControllerDir}\ThwordplayController@index")->name('api.v1.thwordplay.index');
    Route::get('thwordplay/bases', "{$apiControllerDir}\ThwordplayController@bases")->name('api.v1.thwordplay.bases');
    Route::get('thwordplay/{thwordplay}', "{$apiControllerDir}\ThwordplayController@show")->name('api.v1.thwordplay.show');
    Route::post('thwordplay', "{$apiControllerDir}\ThwordplayController@store")->name('api.v1.thwordplay.store');
    Route::post('thwordplay/search', "{$apiControllerDir}\ThwordplayController@search")->name('api.v1.thwordplay.search');
    Route::put('thwordplay/{thwordplay}', "{$apiControllerDir}\ThwordplayController@update")->name('api.v1.thwordplay.update');
    Route::delete('thwordplay/{thwordplay}', "{$apiControllerDir}\ThwordplayController@delete")->name('api.v1.thwordplay.destroy');
    Route::post('thwordplay/{thwordplay}/activate', "{$apiControllerDir}\ThwordplayController@activate")->name('api.v1.thwordplay.activate');

    Route::get('tile', "{$apiControllerDir}\TileController@index")->name('api.v1.tile.index');
    Route::get('tile/{tile}', "{$apiControllerDir}\TileController@show")->name('api.v1.tile.show');

    Route::get('tile-set', "{$apiControllerDir}\TileSetController@index")->name('api.v1.tile_set.index');
    Route::get('tile-set/{tileSet}', "{$apiControllerDir}\TileSetController@show")->name('api.v1.tile_set.show');

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


