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
Route::get('/debtor/index', 'DebtorController@index');
Route::get('/debtor/create', 'DebtorController@create');
Route::post('/debtor/', 'DebtorController@store');

Route::get('/credit/index/', 'CreditController@index');
Route::get('/credit/create/', 'CreditController@create');
Route::post('/credit/', 'CreditController@store');
Route::get('/credit/{debtor}', 'CreditController@show')->name('debtor.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
