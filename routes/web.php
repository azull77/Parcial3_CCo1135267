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


Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('alumnos', AlumnoController::class);
    Route::resource('profesor', ProfesorController::class);
    Route::resource('notas', NotasController::class);
    Route::resource('curso', CursoController::class);
});


Route::group(['middleware' => ['role:profesor']], function () {

    Route::resource('notasp', ProfesorNotController::class);
    Route::resource('cursop', ProfesorCurController::class);

});

Route::group(['middleware' => ['role:alumno']], function () {

    Route::resource('notasa', AlumnoNotController::class);
   

});

