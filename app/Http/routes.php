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



// TODO: organize propietario routes ( under middlawares: auth and propietario)

// end Authentication routes .....

// Route::group (['middleware' => ['propietario']], function()
// {
// 	Route::get('propietario/documentos', function(){
// 		dd('ruta propietario/documentos bajo middleware');
// 	});
	
// 	Route::get ('propietario/edit', function(){
// 		dd('ruta propietario/edit');
// 	});

// });

		Route::group(['middleware' => ['admin']], function () {

				Route::resource('users', 'UsersController');
				Route::get('users/{id}/destroy', [
						'uses' => 'UsersController@destroy',
						'as'   => 'users.destroy'

					]);

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
				//Paise Resources
				/*******************************************************/
				Route::resource('pais', 'PaiseController');
				Route::get('pais/{id}/destroy', [
						'uses' => 'PaiseController@destroy',
						'as'   => 'pais.destroy'

					]);
				//Oficina Resources
				/*******************************************************/
				Route::resource('oficina', 'OficinaController');
				Route::get('oficina/{id}/destroy', [
						'uses' => 'OficinaController@destroy',
						'as'   => 'oficina.destroy'

					]);
				//Torre Resources
				/*******************************************************/
				Route::resource('torre', 'TorreController');
				Route::get('torre/{id}/destroy', [
						'uses' => 'TorreController@destroy',
						'as'   => 'torre.destroy'

					]);
				Route::get('torre/{id}/documentos', [
						'uses' => 'TorreController@documentos',
						'as'   => 'torre.documentos'
					]);
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
				//Marca_vehiculo Resources
				/*******************************************************/
				Route::resource('marca-vehiculo', 'Marca_vehiculoController');
				Route::get('marca-vehiculo/{id}/destroy', [
						'uses' => 'Marca_vehiculoController@destroy',
						'as'   => 'marca-vehiculo.destroy'
					]);
				//Parqueo Resources
				/*******************************************************/
				Route::resource('parqueo', 'ParqueoController');
				Route::get('parqueo/{id}/destroy', [
						'uses' => 'ParqueoController@destroy',
						'as'   => 'parqueo.destroy'
					]);
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
				//Documento Resources
				/*******************************************************/
				Route::resource('documento', 'DocumentoController');
				Route::get('documento/{id}/destroy', [
						'uses' => 'DocumentoController@destroy',
						'as'   => 'documento.destroy'
					]);
				Route::get('documento/{id}/archivos_documento', [
						'uses' => 'Archivos_documentoController@archivosxDocumento',
						'as'   => 'documento.archivos'
					]);
				//Tipo_documento Resources
				/*******************************************************/
				Route::resource('tipo_documento', 'Tipo_documentoController');
				Route::get('tipo_documento/{id}/destroy', [
						'uses' => 'Tipo_documentoController@destroy',
						'as'   => 'tipo_documento.destroy'
					]);
		});

Route::group(['prefix' => '/', 'middleware' => ['auth', 'propietario']], function () {
// };

		//  Dashboard
		Route::get('dash', ['as' => 'admin.index', function () {
			//dd($this->)
			return view('admin.index');
		}]);



		// Integrate Routes for chats
		Route::resource('documentosChats', 'documentos_chatController');

		Route::resource('statusComents', 'status_comentsController');

		Route::resource('chatDocts', 'chat_doctsController');
		
		Route::post('/escribir', 'chat_doctsController@escribir');
		Route::get('/getchat', 'chat_doctsController@getChat');
		// Route::get('/getchat', function(){
		// 	$input = Request::except('_token');
		// dd($input);
		// });
		Route::get('/getNewMessages', 'chat_doctsController@getNewMessages');
		Route::get('/updateMessages', 'chat_doctsController@updateMessages');

		Route::resource('notificaionesChats', 'notificaionesChatController');

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

		Route::get ('propietario/edit/{id}',[
		'uses' 	=> 'PropietarioController@edit',
		'as'	=> 'propietario.edit'
		]);

		Route::post('propietario/update/{id}', [
		'uses' 	=> 'PropietarioController@update',
		'as'	=> 'propietario.update'
		]);

		Route::get('propietario.dash', ['as' => 'propietario.dash', function () {
		return view('propietario.dash');
		}]);

		Route::get('propietario/documentos', [
					'uses' => 'PropietarioController@documentos',
					'as'   => 'propietario.documentos'
				]);
		Route::get('propietario/documento/{id}/archivos', [
		'uses' => 'Archivos_documentoController@PropArchivosxDocumento',
		'as'   => 'propDocumento.archivos'
		]);

	});

Route::group(['prefix'   => 'api', 'namespace'   => 'API'], function () {
		Route::group(['prefix' => 'v1'], function () {
				require config('infyom.laravel_generator.path.api_routes');
			});
	});

/********************************************************/

/********************************************************/

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

