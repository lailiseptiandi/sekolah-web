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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => ['auth']], function () {
        // dashboard
        Route::get('/dashboard', 'Admin\DashboardController@index')->name('dashboard');

        Route::resource('/permission', 'Admin\PermissionController', ['except' =>
        ['show', 'create', 'edit', 'update', 'delete'], 'as' => 'admin']);

        // role
        Route::resource('/role', 'Admin\RoleController', ['except' =>
        ['show'], 'as' => 'admin']);

        // users
        Route::resource('/user', 'Admin\UserController', ['except' =>
        ['show'], 'as' => 'admin']);
    });
});
