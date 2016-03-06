<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TorreRequest extends Request
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
          'nombre'        => 'min:4|max:120|required',
          'direccion'     => 'min:7|required',
          'niveles'       => 'min:1|required',
          'oficina_id'    => 'required',

        ];
    }
}
