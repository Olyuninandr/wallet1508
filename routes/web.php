<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/transactions', 'TransactionController@showAllTransactions')
    ->name('transactions');
Route::get('/transaction/add', 'CategoryController@getCategoriesList')
    ->name('transaction_add');
Route::post('/transaction/submit', 'TransactionController@submitTransaction')
    ->name('transaction_submit');
Route::post('/transaction/submit/{id}', 'TransactionController@submitTransaction')
    ->name('transaction_update_submit');
Route::get('/transaction/delete/{id}', 'TransactionController@deleteTransaction')
    ->name('transaction_delete');
Route::get('transaction/update/{id}', 'CategoryController@getCategoriesList')
    ->name('transaction_update');

Route::get('/categories', 'CategoryController@showAllCategories')
    ->name('categories');
Route::get('/categories/add', function () {
    return view('categories_form');
})->name('categories_add');
Route::post('categories/submit', 'CategoryController@submitCategory')
    ->name('category_submit');
