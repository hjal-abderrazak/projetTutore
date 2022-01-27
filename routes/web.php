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

Route::get('/', "PostController@index")->name('home');

Route::get('/admin', "PostController@adminIndex" )->name('adminPanel')->middleware('auth');;

Auth::routes();


Route::get('/{titre}', 'PostController@show');
Route::get('/admin/createpost', [App\Http\Controllers\PostController::class, 'create'])->name('post.create')->middleware('auth');;
Route::get('/posts/{id}','PostController@destroy')->middleware('auth');

Route::get('admin/addTopics', 'CategorieController@create')->name('topics.add')->middleware('auth');
Route::get('admin/topics','CategorieController@index')->name('topics')->middleware('auth');
Route::get('admin/topic/{id}/edit','CategorieController@edit');
Route::get('/topic/{id}/edit','CategorieController@edit')->name('topic.edit');
Route::put('topics/{id}','CategorieController@update');
Route::get('/topics/{id}','CategorieController@destroy')->middleware('auth');
Route::post('/posts', 'PostController@store');
Route::post('/topics', 'CategorieController@store');
Route::get('/posts/{id}/edit','PostController@edit')->name('post.edit')->middleware('auth');
Route::put('/posts/{id}','PostController@update')->middleware('auth');
Route::get('/categorie/{nom}','PostController@categorie');
Route::post('/search', 'PostController@search');
Route::get('/post/recent','PostController@recentPost');
Route::post('/sendemail/send', 'SendEmailController@send');
