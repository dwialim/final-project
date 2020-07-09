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

	// question
	Route::get('/stacloverload/quest','QuestionController@index')->name('createquest');
	Route::post('/stacloverload/quest','QuestionController@store')->name('savequest');

	// detail question
	Route::get('/detail/{id}','QuestionController@detail')->name('detail'); // Vote disini
	Route::get('/detail/{id}/editquest','QuestionController@edit')->name('editquest');
	Route::put('/detail/{id}/editquest','QuestionController@update')->name('updatequest');
	Route::delete('/detail/{id}/deletequest','QuestionController@destroy')->name('deletequest');

	// answer
	Route::get('/detail/{id}/answer','AnswerController@index')->name('createanswer');
	Route::post('/detail/{id}/answer','AnswerController@store')->name('saveanswer');
	Route::get('/detail/{id}/editanswer','AnswerController@edit')->name('editanswer');
	Route::put('/detail/{id}/editanswer','AnswerController@update')->name('updateanswer');
	Route::delete('/detail/{id}/deleteanswer','AnswerController@destroy')->name('deleteanswer');

	// comment
	Route::post('/detail/{id}','CommentController@store')->name('savecomment');
	// Route::get('/detail/{id}/editcomment','CommentController@store')->name('editcomment');
	// Route::put('/detail/{id}/editcomment','CommentController@store')->name('updatecomment');
	// Route::delete('/detail/{id}/deletecomment','CommentController@destroy')->name('deletecomment');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');