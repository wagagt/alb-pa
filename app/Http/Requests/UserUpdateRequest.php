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
          'usuario'      => 'min:2|required',
          'email'        => 'min:4|required',
          'pasaporte'    => 'min:5|required',
          'cedula'       => 'min:5|required'
        ];
    }
}
