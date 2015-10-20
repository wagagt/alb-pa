<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Users;

class CreateUsersRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return Users::$rules;
	}
	
	public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'contact_fname.required' => 'Su primer nombre es requerido.',
            'contact_lname.required' => 'Su segundo nombre es requerido.',
            'email.required' => 'Su Email es requerido.',
            'email.email' => 'El formato de su Email es erróneo.',
            'id_rol.required' => 'Debe elegir un Cliente.',
            'id_cliente.required' => 'Debe elegir un Rol.',
            'password.required' => 'La clave es requerida.',
            'password.min' => 'La clave debe tener almenos 6 caracteres.',
            'password.confirmed' => 'Debe confirmar la clave.',
            'password_confirmation.required' => 'Debe confirmar la clave',
            'password_confirmation.min' => 'La confirmación de su Clave debe tener almenos 6 caracteres.',
            'password_confirmation.confirmed' => 'La confirmación de su Clave no es igual.',
        ];
    }

}
