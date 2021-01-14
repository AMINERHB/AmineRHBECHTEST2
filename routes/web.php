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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/storeCategory','CategoryController@storeCategory');
Route::get('/getCategory', 'CategoryController@getCategory');
Route::post('/deleteCategory/{id}', 'CategoryController@deleteCategory');
Route::post('/editCategory/{id}', 'CategoryController@editCategory');

Route::post('/storeProduit','ProduitController@storeProduit');
Route::get('/getProduit', 'ProduitController@getProduit');
Route::post('/deleteProduit/{id}', 'ProduitController@deleteProduit');
Route::post('/editProduit/{id}', 'ProduitController@editProduit');
