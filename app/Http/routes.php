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

Route::get('/',function(){
  return redirect()->route('admin.auth.login');
});

Route::get('admin/auth/login', [

  'uses'    =>  'Auth\AuthController@getLogin',
  'as'     =>  'admin.auth.login'
]);


Route::post('admin/auth/login', [

  'uses'    =>  'Auth\AuthController@postLogin',
  'as'     =>  'admin.auth.login'
]);

Route::get('admin/auth/logout', [

  'uses'    =>  'Auth\AuthController@getLogout',
  'as'      =>  'admin.auth.logout'
]);

Route::get('password/email','Auth\PasswordController@getEmail');
Route::post('password/email','Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
// end Authentication routes .....

Route::group(['prefix' => '/', 'middleware' => 'auth' ],function(){

  //  Dashboard
  Route::get('/dash', ['as' => 'admin.index', function(){
    return view('admin.index');
  } ]);

  Route::group(['middleware' => ['admin']], function(){

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
      return redirect()->route('admin.index');
    });


    ////////
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
    Route::get('oficina/{id}/destroy', [
      'uses'  => 'OficinaController@destroy',
      'as'    => 'oficina.destroy'

    ]);
    /********************************************************/

    //Torre Resources
    /*******************************************************/
    Route::resource('torre','TorreController');
    Route::get('torre/{id}/destroy', [
      'uses'  => 'TorreController@destroy',
      'as'    => 'torre.destroy'

    ]);
    /********************************************************/

    //Apartamento Resources
    /*******************************************************/
    Route::resource('apartamento','ApartamentoController');

    // Lista los apartamentos segun torre_id
    Route::get('apartamento/{id}/aptoTorres', [
      'uses'    =>  'ApartamentoController@aptoTorres',
      'as'      =>  'apartamento.Torres'
    ]);

    Route::get('apartamento/{id}/destroy', [
      'uses'  => 'ApartamentoController@destroy',
      'as'    => 'apartamento.destroy'

    ]);
    /********************************************************/
  });
});

// Restablecer la contraseña
//Route::resource('mail', 'MailController');



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
