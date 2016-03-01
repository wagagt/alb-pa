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

// Authentication routes...

Route::get('/login', [

  'uses'    =>  'Auth\AuthController@getLogin',
  'as'     =>  'auth.login'
]);


Route::post('/login', [

  'uses'    =>  'Auth\AuthController@postLogin',
  'as'     =>  'auth.login'
]);

Route::get('/logout', [

  'uses'    =>  'Auth\AuthController@getLogout',
  'as'      =>  'auth.logout'
]);
// end Authentication routes .....


//  Dashboard
Route::get('login/dash', [

  'uses'    =>  'FrontController@index',
  'as'     =>  'dash.init'
]);




/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function ()
{
    Route::group(['prefix' => 'v1'], function ()
    {
        require config('infyom.laravel_generator.path.api_routes');
    });
});
