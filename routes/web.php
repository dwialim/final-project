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

Route::get('/', 'HomeController@redirect');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/stacloverload','StackController@index')->name('dashboard');

	Route::get('/stacloverload/create','QuestionController@create')->name('createquest');
	Route::post('/stacloverload','QuestionController@store')->name('savequest');

	Route::get('/detail/{question_id}','QuestionController@index')->name('detail');
	Route::get('/detail/{question_id}/questedit','QuestionController@edit')->name('editquest');
	Route::put('/detail/{question_id}/questedit','QuestionController@update')->name('updatequest');
	Route::delete('/detail/{question_id}question','QuestionController@destroy')->name('deletequest');

	Route::post('/detail/{question_id}','AnswerController@store')->name('saveanswer');
	Route::get('/detail/{question_id}/ansedit','AnswerController@edit')->name('editanswer');
	Route::put('/detail/{question_id}/ansedit','AnswerController@update')->name('updateanswer');
	Route::delete('/detail/{question_id}answer','AnswerController@destroy')->name('deleteanswer');

});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');