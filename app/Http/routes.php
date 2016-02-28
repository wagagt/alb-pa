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
Route::get('admin2702/login', [

  'uses'    =>  'Auth\AuthController@getLogin',
  'as'     =>  'auth.login'
]);


Route::post('admin2702/login', [

  'uses'    =>  'Auth\AuthController@postLogin',
  'as'     =>  'auth.login'
]);

Route::get('admin2702/logout', [

  'uses'    =>  'Auth\AuthController@getLogout',
  'as'      =>  'auth.logout'
]);
// end Authentication routes .....



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
