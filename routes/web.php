<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function() {
    return redirect()->route('allcust');
});

Route::get('/cust/add', 'CustomerController@create');

Route::get('/cust', 'CustomerController@index')->name('allcust');

Route::post('/cust', 'CustomerController@store');

Route::get('/cust/{id}', 'CustomerController@show');

Route::put('/cust/{id}', 'CustomerController@update');

Route::delete('/cust/{id}', 'CustomerController@destroy');

Route::get('/cust/edit/{id}', 'CustomerController@edit');

Route::get('cust/{id}/history', 'CustomerController@callhistory');
