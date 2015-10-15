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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::resource('clients', 'ClientController');

Route::get('clients/{id}/delete', [
    'as' => 'clients.delete',
    'uses' => 'ClientController@destroy',
]);


Route::resource('roles', 'RolesController');

Route::get('roles/{id}/delete', [
    'as' => 'roles.delete',
    'uses' => 'RolesController@destroy',
]);


Route::resource('clientes', 'ClientesController');

Route::get('clientes/{id}/delete', [
    'as' => 'clientes.delete',
    'uses' => 'ClientesController@destroy',
]);


Route::resource('estados', 'EstadosController');

Route::get('estados/{id}/delete', [
    'as' => 'estados.delete',
    'uses' => 'EstadosController@destroy',
]);




Route::resource('usuarios', 'UsuariosController');

Route::get('usuarios/{id}/delete', [
    'as' => 'usuarios.delete',
    'uses' => 'UsuariosController@destroy',
]);


Route::resource('proyectos', 'ProyectosController');

Route::get('proyectos/{id}/delete', [
    'as' => 'proyectos.delete',
    'uses' => 'ProyectosController@destroy',
]);
