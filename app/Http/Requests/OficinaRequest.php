<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OficinaRequest extends Request
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
      'nombre'        => 'min:6|max:120|required',
      'telefono'      => 'min:5|required',
      'direccion'     => 'min:4|required',
      'pais_id'       => 'required',

    ];
  }
}
