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

Route::get('list','Usercon@showData');

Route::get('/', function () {
    return view('welcome');
});

Route::view('add-user','showdata');
Route::post('sve','Usercon@savedata');
Route::post('edt={id}','Usercon@updateData');
Route::get('del_id={id}','Usercon@deleteData');
Route::get('edit_id={id}','Usercon@editData');

