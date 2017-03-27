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
    return view('properties.addproperty');
});

Route::get('/add_property',[
  'uses'=>'PropertyController@create',
  'as'=>'add_property'
]);

Route::post('/save_property',[
  'uses'=>'PropertyController@store',
  'as'=>'save_property'
]);

Route::get('/list_property',[
  'uses'=>'PropertyController@index',
  'as'=>'list_property'
]);

Route::get('/edit_property/{id}',[
    'uses'=>'PropertyController@edit',
    'as'=>'edit_property'
]);

Route::get('/edit_property/{id}',[
    'uses'=>'PropertyController@edit',
    'as'=>'edit_property'
]);

Route::post('/update_property/{id}',[
    'uses'=>'PropertyController@update',
    'as'=>'update_property'
]);

Route::get('/delete_property/{id}',[
    'uses'=>'PropertyController@destroy',
    'as'=>'delete_property'
]);




Auth::routes();

Route::get('/home', 'HomeController@index');
