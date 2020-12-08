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

Route::resource('novidades', 'NovidadeController')->middleware('auth');

Route::any('propostas/search', 'ContratoController@search')->name('propostas.search')->middleware('auth');

Route::resource('contratos', 'ContratoUserController')->middleware('auth');

Route::resource('resgates', 'ContratoUserSaqueController')->middleware('auth');

Route::get('saques', 'ContratoUserController@saque')->name('saques.saque')->middleware('auth');

Route::get('saques/{id}', 'ContratoUserController@sacar')->name('saques.sacar')->middleware('auth');

Route::post('saques', 'ContratoUserController@solicitar')->name('saques.solicitar')->middleware('auth');

Route::resource('propostas', 'ContratoController')->middleware('auth');

Route::resource('gestores', 'UserGestoreController')->middleware('auth');

Route::resource('setors', 'ContratoSetorController')->middleware('auth');

Route::get('/proposta/{slug}', 'ContratoController@single')->name('propostas.single');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('cadastros', ['as' => 'cadastros.create', 'uses' => 'CadastroController@create']);
	Route::post('cadastros', ['as' => 'cadastros.store', 'uses' => 'CadastroController@store']);
	Route::put('cadastros', ['as' => 'cadastros.update', 'uses' => 'CadastroController@update']);
	Route::get('cadastros', ['as' => 'cadastros.edit', 'uses' => 'CadastroController@edit']);
	Route::get('cadastros/{id}', ['as' => 'cadastros.show', 'uses' => 'CadastroController@show']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('bancarios', ['as' => 'bancarios.create', 'uses' => 'BancarioController@create']);
	Route::post('bancarios', ['as' => 'bancarios.store', 'uses' => 'BancarioController@store']);
	Route::put('bancarios', ['as' => 'bancarios.update', 'uses' => 'BancarioController@update']);
	Route::get('bancarios', ['as' => 'bancarios.edit', 'uses' => 'BancarioController@edit']);
});