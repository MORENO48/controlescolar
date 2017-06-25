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

/*Route::get('/', function () {// cuando se ejecuta esta url manda a llamar esta vista
    return view('welcome');
});*/

Route::get('/', 'homeController@index');

Route::get('/ejemplo', 'ejemploController@index'); // cuando se accede a esta url manda a llamar el controlador

// rutas Alumno

Route::get('/registrarAlumno', 'alumnosController@registrar');

Route::post('/guardarAlumno','alumnosController@guardar');

Route::get('/consultarAlumnos', 'alumnosController@consultar');

Route::get('/eliminarAlumno/{id}','alumnosController@eliminar');

Route::get('/editarAlumno/{id}','alumnosController@editar');

Route::post('/actualizarAlumno/{id}','alumnosController@actualizar');

// rutas maestro

Route::get('/registrarMaestro', 'maestrosController@registrar');

Route::post('/guardarMaestro','maestrosController@guardar');

Route::get('/consultarMaestros', 'maestrosController@consultar');

Route::get('/editarMaestro/{id}','maestrosController@editar');

Route::post('/actualizarMaestro/{id}','maestrosController@actualizar');

Route::get('/eliminarMaestro/{id}','maestrosController@eliminar');

// materia

Route::get('/registrarMateria', 'materiasController@registrar');

Route::post('/guardarMateria','materiasController@guardar');

Route::get('/consultarMaterias', 'materiasController@consultar');

Route::get('/editarMateria/{id}','materiasController@editar');

Route::post('/actualizarMateria/{id}','materiasController@actualizar');

Route::get('/eliminarMateria/{id}','materiasController@eliminar');

//grupo
Route::get('/registrarGrupo', 'gruposController@registrar');

Route::post('/guardarGrupo','gruposController@guardar');

Route::get('/consultarGrupos', 'gruposController@consultar');

Route::get('/editarGrupo/{id}','gruposController@editar');

Route::post('/actualizarGrupo/{id}','gruposController@actualizar');

Route::get('/eliminarGrupo/{id}','gruposController@eliminar');