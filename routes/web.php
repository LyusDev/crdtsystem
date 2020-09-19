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

Route::prefix('debtor')->group(function () {
    Route::get('/index', 'DebtorController@index')->name('debtor.index');
    Route::get('/create', 'DebtorController@create')->name('debtor.create');
    Route::post('/', 'DebtorController@store')->name('debtor.store');
});

Route::prefix('credit')->group(function(){
    
    Route::get('/index', 'CreditController@index')->name('credit.index');
    Route::get('/create', 'CreditController@create')->name('credit.create');   
    Route::get('/{debtor}', 'CreditController@show')->name('credit.show');
    Route::post('/', 'CreditController@store')->name('credit.store');
    
});

Route::prefix('admin')->group(function() {
    Route::get('/edit/{user}', 'AdminController@edit')->name('admin.edit');
    Route::patch('/update/{user}', 'AdminController@update')->name('admin.update');
  
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'AdminLoginController@showLoginForm');
    Route::post('/login', 'AdminLoginController@login')->name('admin.login');

});
Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();