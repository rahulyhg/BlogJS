<?php

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
    return view('index');
});

Route::get('/categoria', function () {
    return view('categoria');
});

Route::get('/serie', function () {
    return view('serie');
});

Route::get('/post', function () {
    return view('post');
});

Auth::routes();

/* Rutas del Middleware y del Administrador */
