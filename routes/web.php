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

Route::get('/admin' , 'AdminController@admin_login_page')->name('admin');
Route::get('/admin/login' , 'AdminController@admin_login')->name('admin.login');
Route::get('/admin/dashboard' , 'AdminController@admin_dashboard')->name('admin.dashboard');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::post('/manger' , 'MangerController@index')->name('manger');
Route::get('/manger'  , 'MangerController@index')->name('manger');

Route::post('/daily_followup', 'Daily_followupController@index')->name('daily_followup');
Route::get('/daily_followup', 'Daily_followupController@index')->name('daily_followup');
Route::get('/daily_record_save', 'Daily_followupController@save_record')->name('daily_record_save');
Route::get('/daily_record/{hqmcm_id}', 'Daily_followupController@daily_record')->name('daily_record');

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
    Route::post('/SearchByArea','MosqueController@SearchByArea')->name('mosque.SearchByArea');
    Route::get('/function.mosque_fun', 'MosqueController@index')->name('mosque_fun');
    Route::get('/insertMosque','MosqueController@insertform')->name('mosque.insertMosque');
    Route::post('/createMosque','MosqueController@insert')->name('mosque.createMosque');
    Route::get('/createMosque','MosqueController@insert')->name('mosque.createMosque');
    Route::post('/showMosques','MosqueController@showMosques')->name('mosque.showMosques');
    Route::get('/delete-records','MosqueController@index')->name('mosque.deleteRecords');
    Route::get('/delete_mosque/{id}','MosqueController@destroy')->name('mosque.delete');
    Route::get('/edit-mosque-records','MosqueController@edit')->name('mosque.editRecords');
    Route::post('/edit-mosque-records','MosqueController@edit')->name('mosque.editRecords');
    Route::get('/edit_mosque/{id}','MosqueController@show')->name('mosque.edit');
    Route::get('/mosqueDeleteAll', 'MosqueController@deleteAll');
});

Route::post('edit/{id}','MosqueController@edit')->name('mosque.edit');

/*************group routes*****************/
Route::prefix('group')->group(function (){
    Route::post('/SearchByArea','GroupController@SearchByArea')->name('group.SearchByArea');
    Route::get('/function.group_fun', 'GroupController@index')->name('group_fun');
    Route::get('/insertGroup','GroupController@insertform')->name('group.insertGroup');
    Route::post('/createGroup','GroupController@insert')->name('group.createGroup');
    Route::get('/createGroup','GroupController@insert')->name('group.createGroup');
    Route::post('/showGroups','GroupController@showGroups')->name('group.showGroups');
    Route::get('/delete-records','GroupController@index')->name('group.deleteRecords');
    Route::get('/delete_group/{id}','GroupController@destroy')->name('group.delete');
    Route::get('/edit-group-records','GroupController@edit')->name('group.editRecords');
    Route::post('/edit-group-records','GroupController@edit')->name('group.editRecords');
    Route::get('/edit_group/{id}','GroupController@show')->name('group.edit');
    Route::get('/mosqueDeleteAll', 'GroupController@deleteAll');
});
Route::post('edit/{id}','GroupController@edit')->name('group.edit');

/*************teacher routes*****************/
Route::prefix('teacher')->group(function (){
    Route::post('/SearchByArea','MosqueController@SearchByArea')->name('mosque.SearchByArea');
    Route::get('/function.teachers_fun', 'TeacherController@index')->name('Teachers_fun');
    Route::get('/insertTeacher','TeacherController@insertform')->name('teacher.insertTeacher');
    Route::post('/createTeacher','TeacherController@insert')->name('teacher.createTeacher');
    Route::post('/showTeachers','TeacherController@showTeachers')->name('teacher.showTeachers');
    Route::get('/delete-records','TeacherController@index')->name('teacher.deleteRecords');
    Route::get('/delete/{id}','TeacherController@destroy')->name('teacher.delete');
    Route::get('/edit-records','TeacherController@index')->name('teacher.editRecords');
    Route::get('/edit/{id}','TeacherController@show')->name('teacher.edit');
    Route::get('/teacherDeleteAll', 'TeacherController@deleteAll');
});

Route::post('edit/{id}','TeacherController@edit')->name('teacher.edit');

/*************student routes*****************/
Route::prefix('student')->group(function (){
    Route::get('/function.students_fun', 'StudentController@index')->name('Students_fun');
    Route::get('/insertStudent','StudentController@insertform')->name('student.insertStudent');
    Route::post('/createStudent','StudentController@insert')->name('student.createStudent');
    Route::post('/showStudents','StudentController@showStudents')->name('student.showStudents');
    Route::get('/delete-records','StudentController@index')->name('student.deleteRecords');
    Route::get('/delete/{hqmcm_id}','StudentController@destroy')->name('student.delete');
    Route::get('/edit-records','StudentController@index')->name('student.editRecords');
    Route::get('/edit/{hqmcm_id}','StudentController@show')->name('student.edit');
    Route::get('/studentDeleteAll', 'StudentController@deleteAll');
});

Route::post('edit/{id}','TeacherController@edit')->name('teacher.edit');

/*************Auth routes*****************/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


