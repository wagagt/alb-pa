<?php

namespace App\Http\Controllers;
use Flash;
use App\Http\Controllers\Controller;
use Request;
use App\Models\chat_docts;
use Carbon\Carbon;
use App\User;

class chat_doctsController extends Controller {
	
	
	public function escribir(Request $request){
		$input = Request::except('_token');

		$registro = new chat_docts();
		$registro->texto = $input['chat'];
		$registro->user_send_id = $input['user_send'];
		$registro->user_recibe_id = $input['user_recibe'];
		$registro->documento_id = $input['docto_id'];
		$registro->status_id = $input['status'];
		$registro->save();

	}

	public function llamando(){
		$chats =  chat_docts::select('texto', 'user_send_id', 'user_recibe_id', 'documento_id')				
				->where('user_send_id',  2)
				->Where('user_recibe_id', '<>', 2 )
				->where('documento_id', 3)
				->get();
		$chats->each(function($texto){
				$info = $texto->texto;
		});
	}

	
}
