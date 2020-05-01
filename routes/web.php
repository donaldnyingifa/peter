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
use App\Bug;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/bugs/create', 'BugsController@create');
Route::get('/bugs', 'BugsController@index');
Route::get('/bugs/resolved', 'BugsController@resolved');

Route::post('/continueCreate', 'BugsController@continueCreate');

Route::get('/bugs/{bug}', 'BugsController@show');
Route::get('/bugs/edit/{bug}', 'BugsController@edit');
Route::post('/editBug/{id}', 'BugsController@editBug');
Route::get('/deleteBug/{id}', 'BugsController@deleteBug');
Route::post('/search', 'BugsController@search');
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');

Route::post('/bugs', 'BugsController@store');
Route::post('/bugs/{bug}/comments', 'CommentsController@store');

Route::get('/my_bugs', 'BugsController@view');

Route::get('/auth/register', 'Auth\RegisterController@view');
Route::get('/auth/login', 'Auth\LoginController@view');

Route::post('/resolve/{id}', 'BugsController@resolve');


Route::get('/priorities/view', 'PriorityController@view');








