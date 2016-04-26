<?php
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

Route::get('/',
function () {
		return redirect()->route('admin.auth.login');
	});

Route::get('admin/auth/login', [

		'uses' => 'Auth\AuthController@getLogin',
		'as'   => 'admin.auth.login'
	]);

Route::post('admin/auth/login', [

		'uses' => 'Auth\AuthController@postLogin',
		'as'   => 'admin.auth.login'
	]);

Route::get('admin/auth/logout', [

		'uses' => 'Auth\AuthController@getLogout',
		'as'   => 'admin.auth.logout'
	]);

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
// end Authentication routes .....

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {

		//  Dashboard
		Route::get('dash', ['as' => 'admin.index', function () {
					return view('admin.index');
				}]);

		Route::group(['middleware' => ['admin']], function () {

				// Users Crud Route
				Route::resource('users', 'UsersController');
				Route::get('users/{id}/destroy', [
						'uses' => 'UsersController@destroy',
						'as'   => 'users.destroy'

					]);

				/////////

				Route::get('csv', function () {
						if (($handle = fopen(public_path().'/uploads/paises.csv', 'r')) !== FALSE) {
							while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
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
				Route::resource('pais', 'PaiseController');
				Route::get('pais/{id}/destroy', [
						'uses' => 'PaiseController@destroy',
						'as'   => 'pais.destroy'

					]);
				/********************************************************/

				//Oficina Resources
				/*******************************************************/
				Route::resource('oficina', 'OficinaController');
				Route::get('oficina/{id}/destroy', [
						'uses' => 'OficinaController@destroy',
						'as'   => 'oficina.destroy'

					]);
				/********************************************************/

				//Torre Resources
				/*******************************************************/
				Route::resource('torre', 'TorreController');
				Route::get('torre/{id}/destroy', [
						'uses' => 'TorreController@destroy',
						'as'   => 'torre.destroy'

					]);
				/********************************************************/

				//Apartamento Resources
				/*******************************************************/
				Route::resource('apartamento', 'ApartamentoController');

				// Lista los apartamentos segun torre_id
				Route::get('apartamento/{id}/aptoTorres', [
						'uses' => 'ApartamentoController@aptoTorres',
						'as'   => 'apartamento.Torres'
					]);

				Route::get('apartamento/{id}/destroy', [
						'uses' => 'ApartamentoController@destroy',
						'as'   => 'apartamento.destroy'

					]);
				/********************************************************/

				//Marca_vehiculo Resources
				/*******************************************************/
				Route::resource('marca-vehiculo', 'Marca_vehiculoController');
				Route::get('marca-vehiculo/{id}/destroy', [
						'uses' => 'Marca_vehiculoController@destroy',
						'as'   => 'marca-vehiculo.destroy'
					]);
				/********************************************************/

				//Parqueo Resources
				/*******************************************************/
				Route::resource('parqueo', 'ParqueoController');
				Route::get('parqueo/{id}/destroy', [
						'uses' => 'ParqueoController@destroy',
						'as'   => 'parqueo.destroy'
					]);
				/********************************************************/

				//Automoviles_apto Resources
				/*******************************************************/
				Route::resource('automoviles', 'Automoviles_aptoController');
				Route::get('automoviles/{id}/edits/{apto}', [
						'uses' => 'Automoviles_aptoController@edits',
						'as'   => 'automoviles.edits'
					]);
				Route::get('automoviles/{id}/destroy', [
						'uses' => 'Automoviles_aptoController@destroy',
						'as'   => 'automoviles.destroy'
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

Route::group(['prefix'   => 'api', 'namespace'   => 'API'], function () {
		Route::group(['prefix' => 'v1'], function () {
				require config('infyom.laravel_generator.path.api_routes');
			});
	});

//Tipo_documento Resources
/*******************************************************/
Route::resource('tipo_documento', 'Tipo_documentoController');
/*Route::post('tipo_documento/{id}/update','Tipo_documentoController@update');
Route::get('tipo_documento/{id}/delete','Tipo_documentoController@destroy');
Route::get('tipo_documento/{id}/deleteMsg','Tipo_documentoController@DeleteMsg');*/
Route::get('tipo_documento/{id}/destroy', [
		'uses' => 'Tipo_documentoController@destroy',
		'as'   => 'tipo_documento.destroy'
	]);
/********************************************************/

//Documento Resources
/*******************************************************/
Route::resource('documento', 'DocumentoController');
/*Route::post('documento/{id}/update','DocumentoController@update');
Route::get('documento/{id}/delete','DocumentoController@destroy');
Route::get('documento/{id}/deleteMsg','DocumentoController@DeleteMsg');*/
Route::get('documento/{id}/destroy', [
		'uses' => 'DocumentoController@destroy',
		'as'   => 'documento.destroy'
	]);
Route::get('documento/{id}/archivos_documento', [
		'uses' => 'Archivos_documentoController@archivosxDocumento',
		'as'   => 'documento.archivos'
	]);
/********************************************************/

//Archivos_documento Resources
/*******************************************************/
Route::resource('archivos_documento', 'Archivos_documentoController');
Route::post('archivos_documento/{id}/update', 'Archivos_documentoController@update');
Route::get('archivos_documento/{id}/delete', 'Archivos_documentoController@destroy');
Route::get('archivos_documento/{id}/deleteMsg', 'Archivos_documentoController@DeleteMsg');
Route::get('archivos_documento/{id}/destroy', [
		'uses' => 'Archivos_documentoController@destroy',
		'as'   => 'archivos_documento.destroy'
	]);
/********************************************************/
