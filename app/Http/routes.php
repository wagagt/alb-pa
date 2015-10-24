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

\Event::subscribe('App\Subscriber\Auth');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function() { 

    Route::resource('clientes', 'ClientesController');
    
    Route::get('clientes/{id}/delete', [
        'as' => 'clientes.delete',
        'uses' => 'ClientesController@destroy',
    ]);


    Route::resource('roles', 'RolesController');
    
    Route::get('roles/{id}/delete', [
        'as' => 'roles.delete',
        'uses' => 'RolesController@destroy',
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
    
    Route::resource('users', 'UsersController');
    
    Route::get('users/{id}/delete', [
        'as' => 'users.delete',
        'uses' => 'UsersController@destroy',
    ]);
    
    
    Route::resource('proyectos', 'ProyectosController');
    
    Route::get('proyectos/{id}/delete', [
        'as' => 'proyectos.delete',
        'uses' => 'ProyectosController@destroy',
    ]);
    
    
    Route::resource('comentarios', 'ComentariosController');
    
    Route::get('comentarios/{id}/delete', [
        'as' => 'comentarios.delete',
        'uses' => 'ComentariosController@destroy',
    ]);
    
    
    Route::resource('bitacoras', 'BitacoraController');
    
    Route::get('bitacoras/{id}/delete', [
        'as' => 'bitacoras.delete',
        'uses' => 'BitacoraController@destroy',
    ]);
}); //middleware auth    
