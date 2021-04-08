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


Route::get('/user-list', 'HomeController@userList')->name('user-list');

Route::get('/add-edit-user/{id?}', 'HomeController@addEditUser')->name('add-edit-user');

Route::get('/view-user/{id}', 'HomeController@viewUser')->name('view-user');

Route::post('/store-user', 'HomeController@storeUser')->name('store-user');

Route::get('/delete-user/{id?}', 'HomeController@deleteUser')->name('delete-user');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
