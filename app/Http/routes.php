<?php
use Illuminate\Database\Eloquent\Model;
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
Route::get('/login/dash', [

  'uses'    =>  'FrontController@index',
  'as'     =>  'dash.init'
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

//Pai Resources
/*******************************************************/
Route::resource('pai','PaiController');
Route::post('pai/{id}/update','PaiController@update');
Route::get('pai/{id}/delete','PaiController@destroy');
Route::get('pai/{id}/deleteMsg','PaiController@DeleteMsg');
/********************************************************/

//Paise Resources
/*******************************************************/
Route::resource('paises','PaiseController');
Route::post('pais/{id}/update','PaiseController@update');
Route::get('pais/{id}/delete','PaiseController@destroy');
Route::get('pais/{id}/deleteMsg','PaiseController@DeleteMsg');
/********************************************************/
