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



//homeListView
Route::get('/query/{ordering?}', 'EmploiController@index')->name('home_ordering');
Route::get('/emploi/{ordering?}', 'EmploiController@index')->name('home_order');
Route::get('/', 'EmploiController@index')->name('home');

//Detail View (get)
Route::get('emploi/show/{id}', 'EmploiController@show')->where('id', '[0-9]+')->name('detail');

//TemplateView
Route::get('/about/', 'EmploiController@aboutPage')->name('about');

//Downloading a JSON file view 
Route::get('/download/', 'EmploiController@download')->name('download');


//Statistics (JSON)
Route::get('/statistics', 'EmploiController@showStatistics')->name('statistics');
Route::get('/statistics/{annee}/{mois}/{jour}', 'EmploiController@showStatisticsJSON')->name('statsJSON')->where('annee', '^(19|20)\d{2}$')->where('mois', '^(19|20)\d{2}$')->where('jour', '^(19|20)\d{2}$');

//Search View (get)
Route::get('search', 'EmploiController@search')->name('search');

