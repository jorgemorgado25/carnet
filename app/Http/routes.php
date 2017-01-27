<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'uses' => 'FrontController@index',
	'as'   => 'front.index'
]);

Route::group(['middleware' => 'carnet'], function()
{
	Route::get('/pdf_carnet', [
		'uses' => 'FrontController@pdf_carnet',
		'as'   => 'front.pdf_carnet'
	]);
});

Route::group(['middleware' => 'guest'], function()
{
	Route::get('/admin', [
		'uses' => 'FrontController@admin',
		'as'   => 'front.admin'
	]);
});

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function()
{
	
});

Route::get('dashboard', [
	'uses' => 'AdminController@dashboard',
	'as' => 'dashboard'
]);
Route::resource('students', 'StudentsController');
Route::resource('matricula', 'MatriculaController');
Route::resource('matricula/carnet', 'MatriculaController@carnet');
Route::post('escolaridades/activar', 'EscolaridadesController@activar');


#API
Route::get('buscar_persona_ci/{cedula}', 'EstudiantesController@buscar_persona_ci');

Route::get('buscar_persona_id/{id}', 'EstudiantesController@buscar_persona_id');

Route::get('buscar_estudiante_ci/{cedula}', 'EstudiantesController@buscar_estudiante_ci');

Route::get('buscar_anos/{mencion_id}', 'AnosController@buscar_anos');

Route::get('buscar_secciones/{ano_id}', 'AnosController@buscar_secciones');

Route::get('buscar_inscripciones_seccion/{escolaridad_id}/{seccion_id}', 'InscripcionesController@buscar_inscripciones_seccion');

Route::get('student/buscar_ci/{cedula}', 'StudentsController@buscar_ci');
Route::group(['prefix' => 'api'], function()
{
	Route::post('front/postBuscarEstudiante', 'FrontController@postBuscarEstudiante');
});