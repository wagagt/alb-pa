<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\chat_docts;
use App\Models\documentos_chat;

class FileMessageController extends Controller
{
    
    public function store(Request $request)
    {
        $path = public_path().'/uploads/files_chat/';
        $files = $request->file('file');
        $chat = new chat_docts($request->all());
        $archivo = new documentos_chat($request->all());

        //dd($request->all());
        
        foreach($files as $file){
            $fileName = $file->getClientOriginalName();
            $file->move($path,$fileName);
            
            $chat->texto = '/uploads/files/'.$fileName;
            $chat->documento_id   = $request['docto_id'];
            $chat->status_id      = 1;
            $chat->user_send_id   = $request['user_send'];
            $chat->user_recibe_id = $request['chatActive'];
            $chat->mensaje_tipo   = "link";
            $chat->save();
            
                $archivo->nombre  = $fileName;
                $archivo->path    = $path;
                $archivo->archivo = $path.$fileName;
                $archivo->doc_id  = $chat->documento_id;
                $archivo->chat_id = $chat->id;
            
                $archivo->save();
            
        }
           
            

               
        
    }

   
}
