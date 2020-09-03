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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');









Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');



// Routes for admin


Route::get('/admin','AdminController@index')->middleware('is_admin');

Route::get('/subjects','AdminController@subjectsIndex')->middleware('is_admin');
Route::post('/subjects-togglestatus','AdminController@subjecttogglestatus')->middleware('is_admin');
Route::post('/subjects/new','AdminController@addnewsubject')->middleware('is_admin');

Route::get('/q-and-a','AdminController@qandaIndex')->middleware('is_admin');
Route::post('/q-and-a-togglestatus','AdminController@qandatogglestatus')->middleware('is_admin');
Route::post('/q-and-a/new','AdminController@addnewqanda')->middleware('is_admin');

Route::get('/users','AdminController@usersIndex')->middleware('is_admin');
Route::post('/users-togglestatus','AdminController@userstogglestatus')->middleware('is_admin');
Route::post('/users/new','AdminController@addnewuser')->middleware('is_admin');

Route::get('/new-questions','AdminController@newquestionsIndex')->middleware('is_admin');
Route::post('/new-questions/discard','AdminController@newquestionsDiscard')->middleware('is_admin');
Route::post('/new-questions/answer','AdminController@newquestionsAnswer')->middleware('is_admin');

