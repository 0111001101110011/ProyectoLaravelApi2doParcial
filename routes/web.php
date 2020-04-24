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

Auth::routes();

// Admin login/dashboard routes
Route::get('/', 'AdminController@dashboard') -> name('admin.dashboard');
Route::get('/admin', 'AdminController@dashboard') -> name('admin.dashboard');
Route::get('/home', 'AdminController@dashboard')->name('admin.dashboard');
Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');

// Atajo para establecer las 7 rutas básicas de un recurso (index, show, create, store, edit, update, destroy)

Route::resource('admin/armar', 'Admin\armarController');
Route::resource('admin/modificar', 'Admin\modificarController');
Route::resource('admin/usuarios', 'Admin\usuarioController');


Route::get('/search', 'Admin\ArmarController@search');

Route::get('/search', 'Admin\ModificarController@search');



?>