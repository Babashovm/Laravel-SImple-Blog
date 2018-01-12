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
// Admin Routing
Route::get('/admin','admin@index');
Route::post('/admin','admin@qeydet');
Route::get('/admin/sil/{id}','admin@sil');
Route::post('/admin/edit/{id}','admin@edit');

//Public Routing
Route::get('/home',function()
{
	return view('welcome');
});
