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

// Laravel Crud Opeartions Route
Route::get('/display_pagi', 'App\Http\Controllers\Icontroller@display_pagi');
Route::post('/form-submit', 'App\Http\Controllers\Icontroller@form_submit');
Route::get('/display_pagi', 'App\Http\Controllers\Icontroller@display_data');
Route::get('/delete_data/{id}', 'App\Http\Controllers\Icontroller@delete');
Route::get('/display_pagi/{id}', 'App\Http\Controllers\Icontroller@edit');
Route::post('/edit-form-submit/{id}', 'App\Http\Controllers\Icontroller@edit_form_submit');
Route::post('/search-form-submit', 'App\Http\Controllers\Icontroller@search');
