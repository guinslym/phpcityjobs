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
Route::get('/', 'EmploiController@index')->name('home');
Route::get('/emploi/expire_in_two_weeks_from_now', 'EmploiController@expire_in_2_weeks_from_now')->name('will_expire_2_weeks_from_now');
Route::get('/emploi/post_2_weeks_ago}', 'EmploiController@post_2_weeks_ago')->name('posted_whithin_the_last_2_weeks');

//Detail View (get)
Route::get('emploi/show/{id}', 'EmploiController@show')->where('id', '[0-9]+')->name('detail');

//TemplateView
Route::get('/about/', 'EmploiController@aboutPage')->name('about');

//Downloading a JSON file view 
Route::get('/download/', 'EmploiController@download')->name('download');


//Statistics
Route::get('/statistics', 'EmploiController@showStatistics')->name('statistics');
//statistics result (JSON)
Route::get('/statisticsJSON/', 'EmploiController@showStatisticsJSON')->name('statsJSON');

//Search View (get)
Route::get('search', 'EmploiController@search')->name('search');


Route::get('update/{passcode}', 'EmploiController@update_db')->where('passcode', 'A-Z]+')->name('update_db');
