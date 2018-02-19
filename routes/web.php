<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rutas Generales
|
*/

Route::get('/', 'IndexController@index');
Route::post('/', 'IndexController@nuevoNewsletter');
Route::get('/post/{id}/{titulo}', 'PostController@index');
Route::get('/categoria/{id}/{categoria}', 'CategoriaController@index');
Route::get('/serie/{id}/{serie}', 'SerieController@index');

/* Rutas de Autenticación */
Auth::routes();

Route::group(['middleware' => ['administrador.redirect']], function () {

    /* Rutas de Posts */
    Route::get('/admin/posts', 'AdministradorController@posts');
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

    /* Rutas de Estadistica Agente */
    Route::get('/admin/estadisticas', 'AdministradorController@estadisticas');

    /* Rutas del Newsletter */
    Route::get('admin/newsletter', 'AdministradorController@newsletter');

    /* Rutas de Configuración del Usuario */
    Route::get('admin/configuracion', 'AdministradorController@configuracion');
    Route::post('admin/configuracion', 'AdministradorController@actualizarInfo');
});
