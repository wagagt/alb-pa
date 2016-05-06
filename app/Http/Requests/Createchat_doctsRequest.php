<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\chat_docts;

class Createchat_doctsRequest extends Request
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
        return chat_docts::$rules;
    }
}