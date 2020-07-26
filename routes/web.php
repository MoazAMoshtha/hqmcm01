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


Route::post('/manger', 'MangerController@index')->name('manger');
Route::get('/manger', 'MangerController@index')->name('manger');

/*************area routes*****************/
Route::prefix('area')->group(function (){
    Route::get('/function.area_fun', 'AreaController@index')->name('area_fun');
    Route::get('/insertArea','AreaController@insertform')->name('area.insertArea');
    Route::post('/createArea','AreaController@insert')->name('area.createArea');
    Route::post('/showAreas','AreaController@showAreas')->name('area.showAreas');
    Route::get('/delete-records','AreaController@index')->name('area.deleteRecords');
    Route::get('/delete/{id}','AreaController@destroy')->name('area.delete');
    Route::get('/edit-records','AreaController@index')->name('area.editRecords');
    Route::get('/edit/{id}','AreaController@show')->name('area.edit');
});
Route::post('edit/{id}','AreaController@edit')->name('area.edit');

/*************mosque routes*****************/
Route::prefix('mosque')->group(function (){
    Route::get('/function.mosque_fun', 'MosqueController@index')->name('mosque_fun');
    Route::get('/insertMosque','MosqueController@insertform')->name('mosque.insertMosque');
    Route::post('/createMosque','MosqueController@insert')->name('mosque.createMosque');
    Route::post('/showMosques','MosqueController@showMosques')->name('mosque.showMosques');
    Route::get('/delete-records','MosqueController@index')->name('mosque.deleteRecords');
    Route::get('/delete/{id}','MosqueController@destroy')->name('mosque.delete');
    Route::get('/edit-records','MosqueController@index')->name('mosque.editRecords');
    Route::get('/edit/{id}','MosqueController@show')->name('mosque.edit');
});
Route::post('edit/{id}','MosqueController@edit')->name('mosque.edit');

/*************admin routes*****************/
Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
});


/*************Auth routes*****************/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

