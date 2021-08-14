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
    // return view('welcome');
    return redirect("/login");
});

Route::get('login', 'UserController@index' )->name('login');
Route::post('post-login','UserController@postLogin' )->name('login.post'); 
Route::get('register', 'UserController@registration')->name('register');
Route::post('post-registration', 'UserController@postRegistration' )->name('register.post'); 
Route::middleware('auth')->group(function(){
Route::get('dashboard', 'UserController@dashboard');     
Route::get('logout', 'UserController@logout')->name('logout');
Route::get('admin/dashboard', 'UserController@adminHome')->name('admin.dashboard')->middleware('is_admin');

Route::get('admin/students','ResourceController@student')->name('student.index');
Route::get('admin/add_student','ResourceController@addStudent')->name('student.add');
Route::get('admin/delete_student/{id}','ResourceController@deleteStudent')->name('student.delete');
Route::get('admin/edit_student/{id}','ResourceController@editStudent')->name('student.edit');
Route::post('admin/store_student','ResourceController@storeStudent')->name('student.store');
Route::post('admin/update_student/{id}','ResourceController@updateStudent')->name('student.update');


});