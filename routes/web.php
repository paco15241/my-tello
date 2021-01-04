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

Auth::routes();

Route::middleware('auth')->get('/', 'CardListsController@index');

// Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->resource('card-lists', 'CardListsController');
Route::middleware('auth')->put('card-lists/{id}/move', 'CardListsController@move');

Route::resource('cards', 'CardsController');
Route::put('cards/{id}/move', 'CardsController@move');
