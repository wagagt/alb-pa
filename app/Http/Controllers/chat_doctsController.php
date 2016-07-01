<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\Models\chat_docts;
use DB;

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

	public function getChat(Request $request){
		$input = Request::except('_token');
		$docId = $input['docId'];
		$inquilinoId = $input['inquilinoId'];
		$chats = chat_docts::select('id','texto', 'user_send_id', 'user_recibe_id', 'created_at')
				->where('documento_id', $docId)
				->whereRaw("(user_send_id = ? OR user_recibe_id = ? )", array($inquilinoId, $inquilinoId))
				->orderBy('created_at', 'ASC')
				->get();
        return $chats->toJson();
	}

	public function getNewMessages(Request $request){
		$input = Request::except('_token');
		$docId = $input['docId'];
		$msgs = chat_docts::selectRaw('user_send_id, count(user_send_id)  as total')
				->where('documento_id', $docId)
				->where('status_id', '=', 1)
				->groupBy('user_send_id')
				->get();
				//dd($msgs);
		return $msgs->toJson();
	}

	public function updateMessages(Request $request){
		$input = Request::except('_token');
		$data = $input['data'];
		foreach ($data as $msgId){
			$msg = chat_docts::findOrfail($msgId);
			$msg->status_id = "2";
			$msg->save();
		}
	}
}
