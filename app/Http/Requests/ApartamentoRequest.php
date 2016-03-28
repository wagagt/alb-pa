<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ApartamentoRequest extends Request
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
          'numero' => 'min:3|required',
          'nivel' => 'min:3|required',
          'torre_id' => 'required',
          'user_id' => 'required'
        ];
    }
}
