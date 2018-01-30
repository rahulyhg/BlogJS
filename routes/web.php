<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rutas Generales
|
*/

//Route::get('/', 'IndexController@index');
Route::get('/', function () {
    return view('index');
});

//Route::get('/categoria/{categoria}', 'CategoriaController@index');
Route::get('/categoria', function () {
    return view('categoria');
});
//Route::get('/serie/{serie}', 'SerieController@index');
Route::get('/serie', function () {
    return view('serie');
});
//Route::get('/post/{id}/{titulo}', 'PostController@index');
Route::get('/post', function () {
    return view('post');
});

/* Rutas de Autenticación */
Auth::routes();


Route::group(['middleware' => ['administrador.redirect']], function () {

    /* Rutas de Posts */
    Route::get('/admin/posts', 'AdministradorController@index');
    Route::post('/admin/posts', 'AdministradorController@nuevoPost');
    Route::post('/admin/editar-posts', 'AdministradorController@editarPost');
    Route::post('/admin/eliminar-posts', 'AdministradorController@eliminarPost');

    /* Rutas de Categorias */
    Route::get('/admin/categorias', 'AdministradorController@categorias');
    Route::post('/admin/categorias', 'AdministradorController@nuevaCategoria');
    Route::post('/admin/editar-categorias', 'AdministradorController@editarCategoria');
    Route::post('/admin/eliminar-categorias', 'AdministradorController@eliminarCategoria');

    /* Rutas de Subcategorias */
    Route::get('/admin/subcategorias', 'AdministradorController@subcategorias');
    Route::post('/admin/subcategorias', 'AdministradorController@nuevaSubcategoria');
    Route::post('/admin/editar-subcategorias', 'AdministradorController@editarSubcategoria');
    Route::post('/admin/eliminar-subcategorias', 'AdministradorController@eliminarSubcategoria');

    /* Rutas del Newsletter */
    Route::get('admin/newsletter', 'AdministradorController@newsletter');

});
