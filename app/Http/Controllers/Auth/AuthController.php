<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Validator;

use Illuminate\Http\Request;
use App\Apartamento;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class AuthController extends Controller {

	protected $username = 'usuario';
	use AuthenticatesAndRegistersUsers, ThrottlesLogins;


	public function __construct() {
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	protected function maxLoginAttempts()
	{
		return property_exists($this, 'maxLoginAttempts') ? $this->maxLoginAttempts : 3;
	}

	protected function lockoutTime()
	{
		return property_exists($this, 'lockoutTime') ? $this->lockoutTime : 240;
	}

	protected $redirectTo = 'user/login';
	protected $loginPath  = '/admin/auth/login';


	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => 'required|max:255',
			//'email' => 'required|email|max:255|unique:users',
			'usuario'  => 'min:6|required',
			'password' => 'required|confirmed|min:6',
		]);
	}


	protected function create(array $data) {
		return User::create([
			'name' => $data['name'],
			//'email'   => $data['email'],
			'password' => bcrypt($data['password']),
			'usuario'  => $data['usuario'],
		]);
	}
	public function getLogin() {
		return view('auth.login');
	}



	// postLogin function add, to validate if exists user_id in to apartamentos

	public function postLogin(Request $request)
	{
		$user = User::select('id','tipo')->where('usuario', '=', $request->usuario)->get();
		if($user[0]['tipo'] == 'propietario') {
			$apto = Apartamento::select('id')->where('user_id', '=', $user[0]['id'])->get();
			$hasApto = isset($apto[0]) ? $apto : false;

			if($hasApto == false)
			{
				Flash::error('Lo sentimos no es posible ingresar al sistema por que el usuario no tiene asignado un apartamento, 
								por favor comuníquese con el administrador del sistema. ');
				return view('auth.login');
			}
		}

		$this->validate($request, [
			$this->loginUsername() => 'required', 'password' => 'required',
		]);

		// If the class is using the ThrottlesLogins trait, we can automatically throttle
		// the login attempts for this application. We'll key this by the username and
		// the IP address of the client making these requests into this application.
		$throttles = $this->isUsingThrottlesLoginsTrait();

		if ($throttles && $this->hasTooManyLoginAttempts($request)) {
			return $this->sendLockoutResponse($request);
		}

		$credentials = $this->getCredentials($request);

		if (Auth::attempt($credentials, $request->has('remember'))) {
			return $this->handleUserWasAuthenticated($request, $throttles);
		}

		// If the login attempt was unsuccessful we will increment the number of attempts
		// to login and redirect the user back to the login form. Of course, when this
		// user surpasses their maximum number of attempts they will get locked out.
		if ($throttles) {
			$this->incrementLoginAttempts($request);
		}

		return redirect($this->loginPath())
			->withInput($request->only($this->loginUsername(), 'remember'))
			->withErrors([
				$this->loginUsername() => $this->getFailedLoginMessage(),
			]);





	}

}
