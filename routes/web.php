<?php

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

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::group(["middleware" => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'], 'prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Auth::routes();
    Route::get('/', function () {
        return view('welcome');
    });
    Route::group(["middleware" => "auth"], function () {
        Route::get('reporte', 'ReporteController@testPDF');
        Route::resource("peliculas", "PeliculaController")->except(['store', 'update', 'destroy']);
        Route::resource("usuarios", "UserController")->except(['store', 'update', 'destroy', "create", "edit"])
            ->middleware('role:admi');
        Route::resource("generos", "GeneroController")->except(['create', 'edit', 'store', 'update']);
        Route::get('settings', 'UserController@settings')->name('settings');
        Route::post('change_password', 'UserController@change_password')->name('settings.store');
    });
});
Route::group(["middleware" => "auth"], function () {
    Route::resource("peliculas", "PeliculaController")->only(['store', 'update', 'destroy']);
    Route::resource("usuarios", "UserController")->only(['store', 'update', 'destroy'])->middleware('role:admi');;
    Route::post("generos/{id}/restore", "GeneroController@restore")->name("generos.restore");
    Route::post("generos/{id}/trash", "GeneroController@trash")->name("generos.trash");
});
