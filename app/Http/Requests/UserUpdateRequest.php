<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
{
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
      return [
          'name'         => 'min:6|max:120|required',
          'usuario'      => 'min:5|required|unique:users',
          'email'        => 'min:4|required|unique:users',
          'pasaporte'    => 'min:5|unique:users',
          'cedula'       => 'min:5|unique:users'
        ];
    }
}
