<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

use Laracasts\Flash\Flash;

class PasswordController extends Controller {
	
	use ResetsPasswords;

	
	protected $redirectTo = '/';


	public function __construct(Guard $auth, PasswordBroker $passwords) {
		$this->auth      = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
	}

	  public function postEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = \Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case \Password::RESET_LINK_SENT:
            	Flash::success('Se ha enviado un correo a la dirección registrada con las instrucciones para restablecer la contraseña por favor verifique');
                return redirect()->back()->with('status', trans($response));
			break;
            case \Password::INVALID_USER:

                return redirect()->back()->withErrors(['email' => trans($response)]);
			break;
        }
    }


	protected function getEmailSubject()
    {
        return property_exists($this, 'subject') ? $this->subject : 'Enlace de reinicio de contraseña';
    }



}
