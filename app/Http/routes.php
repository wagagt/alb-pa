<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Console\RouteListCommand;
use App\Paise;
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

Route::post('login/dash', [

  'uses'    =>  'FrontController@index',
  'as'     =>  'dash.init'
]);

// Users Crud Route
Route::resource('users','UsersController');
Route::get('users/{id}/destroy', [
      'uses'  => 'UsersController@destroy',
      'as'    => 'users.destroy'

    ]);




/////////

Route::get('csv',function(){
  if(($handle = fopen(public_path().'/uploads/paises.csv','r')) !== FALSE)
  {
    while(($data = fgetcsv($handle, 1000, ',')) !== FALSE)
    {
      $pais = new Paise();
      $pais->pais = $data[0];
      $pais->ciudad = $data[1];
      $pais->save();
    }
    fclose($handle);
  }
  return Paise::all();
});


////////




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


//Paise Resources
/*******************************************************/
Route::resource('pais','PaiseController');
Route::get('pais/{id}/destroy', [
      'uses'  => 'PaiseController@destroy',
      'as'    => 'pais.destroy'

    ]);

/********************************************************/

//Oficina Resources
/*******************************************************/
Route::resource('oficina','OficinaController');
Route::post('oficina/{id}/update','OficinaController@update');
Route::get('oficina/{id}/delete','OficinaController@destroy');
Route::get('oficina/{id}/deleteMsg','OficinaController@DeleteMsg');
/********************************************************/

//Torre Resources
/*******************************************************/
Route::resource('torre','TorreController');
Route::post('torre/{id}/update','TorreController@update');
Route::get('torre/{id}/delete','TorreController@destroy');
Route::get('torre/{id}/deleteMsg','TorreController@DeleteMsg');
/********************************************************/

//Apartamento Resources
/*******************************************************/
Route::resource('apartamento','ApartamentoController');
Route::post('apartamento/{id}/update','ApartamentoController@update');
Route::get('apartamento/{id}/delete','ApartamentoController@destroy');
Route::get('apartamento/{id}/deleteMsg','ApartamentoController@DeleteMsg');
/********************************************************/
