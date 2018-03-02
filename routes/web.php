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

Route::get('/fb/login', 'FacebookController@redirect')
	->name('facebook.redirect');

Route::get('/fb/callback', 'FacebookController@callback')
	->name('facebook.callback');

Route::get('/home', 'HomeController@index')
	->name('home');

Route::get('movies/all', 'MoviesController@all')
	->name('movies/all');

Route::get('actors/all', 'ActorsController@all')
	->name('actors/all');

Route::get('/', 'MoviesController@index')
	->name('index');

Route::middleware('auth')->group(function()
{
Route::post('categories/store', 'CategoriesController@store')
	->name('categories/store');

Route::get('categories/create', 'CategoriesController@create')
	->name('categories/create');

Route::get('categories/all', 'CategoriesController@all')
	->name('categories/all');

Route::get('categories/destroy/{id}', 'CategoriesController@destroy')
	->name('categories/destroy');

Route::get('categories/edit/{id}', 'CategoriesController@edit')
	->name('categories/edit');

Route::post('categories/update/{id}', 'CategoriesController@update')
	->name('categories/update');

Route::get('categories/single/{id}', 'CategoriesController@single')
	->name('categories/single');


Route::get('movies/edit/{id}', 'MoviesController@edit')
	->name('movies/edit');

Route::post('movies/update/{id}', 'MoviesController@update')
	->name('movies/update');

Route::get('movies/destroy/{id}', 'MoviesController@destroy')
	->name('movies/destroy');

Route::post('movies/store', 'MoviesController@store')
	->name('movies/store');

Route::get('movies/create', 'MoviesController@create')
	->name('movies/create');

Route::get('movies/single/{id}', 'MoviesController@single')
	->name('movies/single');

Route::get('images/all_movies/{id}', 'MoviesController@all_movies_images')
	->name('images/all_movies');


Route::get('actors/create', 'ActorsController@create')
	->name('actors/create');

Route::get('actors/edit/{id}', 'ActorsController@edit')
	->name('actors/edit');

Route::post('actors/update/{id}', 'ActorsController@update')
	->name('actors/update');

Route::get('actors/destroy/{id}', 'ActorsController@destroy')
	->name('actors/destroy');

Route::post('actors/store', 'ActorsController@store')
	->name('actors/store');

Route::get('actors/image/{id}', 'ActorsController@image')
	->name('actors/image');

Route::get('actors/single/{id}', 'ActorsController@single')
	->name('actors/single');

Route::get('images/all_actors/{id}', 'ActorsController@all_actors_images')
	->name('images/all_actors');


Route::get('users/all', 'UsersController@all')
	->name('users/all');

Route::get('users/create', 'UsersController@create')
	->name('users/create');

Route::post('users/store', 'UsersController@store')
	->name('users/store');

Route::get('users/edit/{id}', 'UsersController@edit')
	->name('users/edit');

Route::post('users/update/{id}', 'UsersController@update')
	->name('users/update');

Route::get('users/destroy/{id}', 'UsersController@destroy')
	->name('users/destroy');


Route::get('images/actor/create/{id}', 'ImagesController@actor_create')
	->name('images/actor/create');

Route::post('images/actor/store/{id}', 'ImagesController@actor_store')
	->name('images/actor/store');

Route::get('images/movie/create/{id}', 'ImagesController@movie_create')
	->name('images/movie/create');

Route::post('images/movie/store/{id}', 'ImagesController@movie_store')
	->name('images/movie/store');

Route::get('images/movie/destroy/{id}', 'ImagesController@movie_destroy')
	->name('images/movie/destroy');

Route::get('images/movie/featured/{id}', 'ImagesController@movie_featured')
	->name('images/movie/featured');

Route::get('images/actor/destroy/{id}', 'ImagesController@actor_destroy')
	->name('images/actor/destroy');

Route::get('images/actor/featured/{id}', 'ImagesController@actor_featured')
	->name('images/actor/featured');





});




