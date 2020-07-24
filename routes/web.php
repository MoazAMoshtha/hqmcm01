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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/manger', 'MangerController@index')->name('manger');
Route::get('/manger', 'MangerController@index')->name('manger');
Route::get('/function.area_fun', 'AreaController@index')->name('area_fun');
Route::get('insertArea','AreaController@insertform');
Route::post('createArea','AreaController@insert');
Route::post('showAreas','AreaController@showAreas')->name('showAreas');
Route::get('delete-records','AreaController@index');
Route::get('delete/{id}','AreaController@destroy');
Route::get('edit-records','AreaController@index');
Route::get('edit/{id}','AreaController@show');
Route::post('edit/{id}','AreaController@edit');


Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
