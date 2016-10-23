<?php
use App\Paise;


Route::group(['middleware' => 'admin'], function ()
{
	Route::get('admin/home', ['as' => 'admin.home', function () {
		return view('admin.index');
	}]);

	Route::get('profile', 'UsersController@profile');
	Route::post('profile', 'UsersController@updateAvatar');
	Route::post('/sendMessage', 'chat_doctsController@sendMessage');	

	// Integrate Routes for chats
	Route::resource('documentosChats', 'documentos_chatController');
	Route::resource('statusComents', 'status_comentsController');
	Route::resource('chatDocts', 'chat_doctsController');
	Route::post('/escribir', 'chat_doctsController@escribir');
	Route::get('/getchat', 'chat_doctsController@getChat');
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

	Route::resource('file','FileMessageController');

	// Route DataTables Api
	// Data Table Apartamentos
	Route::get('api/apartamentos', 'ApartamentoController@getDataTable');
	// Data Table Usuarios
	Route::get('api/users', 'UsersController@getDataTable');


});

/********************************************************/
//Route::group(['prefix' => '/', 'middleware' => ['auth', 'propietario']], function () {

Route::group(['middleware' => 'propietario'], function () {

	Route::resource('propietario','PropietarioController');
	Route::get('/getNewMessages', 'chat_doctsController@getNewMessages');
	Route::post('/sendMessage', 'chat_doctsController@sendMessage');
	Route::get('/updateMessages', 'chat_doctsController@updateMessages');
	Route::get('/getchat', 'chat_doctsController@getChat');

	Route::get('propietario/documentos',[
		'uses'	=> 'PropietarioController@documentos',
		'as'	=> 'propietario.documentos'
	]);


	Route::post('propietario/profile', 'UsersController@updateAvatar');

	Route::get('propietario/home', ['as' => 'propietario.home',
		function () {
			return view('propietario.index');
		}
	]);
	
	Route::get('propietario/documento/{id}/archivos_documento', [
		'uses' => 'Archivos_documentoController@archivosxDocumento',
		'as'   => 'propietario.documento.archivos'
	]);
	
});


/**************************  Routes without Authentication **********************/



Route::get('propietario/profile', [
	'uses' => 'UsersController@profile',
	'as' => 'propietario.profile'
]);


Route::get('propietario/torre/{id}/{tipo}/documentos', [
	'uses' => 'TorreController@documento',
	'as'   => 'propietario.torre.documento'
]);


Route::get('propietario/torre/{id}/documentos', [
	'uses' => 'TorreController@documentos',
	'as'   => 'propietario.torre.documentos'
]);

Route::post('profile', 'UsersController@updateAvatar');

Route::get('/', function () {
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
Route::group(['prefix'   => 'api', 'namespace'   => 'API'], function () {
	Route::group(['prefix' => 'v1'], function () {
		require config('infyom.laravel_generator.path.api_routes');
	});
});
/***************** Route redirect user by 'tipo' ***********/
Route::get
('user/login',
	['as' => 'user.login', function ()
	{
		if (\Auth::user()->isAdmin()){
			return redirect()->route('admin.home');
		}
		$hashType='$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi';
		$userId = Auth::user()->id;

		if ((\Auth::user()->tipo == 'propietario') && (\Auth::user()->password === $hashType)){
			return redirect('propietario/'.$userId.'/edit');

		}else{
			return view('propietario.dash');
		}

	}]
);