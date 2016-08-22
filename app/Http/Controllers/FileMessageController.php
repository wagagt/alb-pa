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
        
        //add fillables
           
            $chat->message = '<a href="/uploads/files/'.$fileName.">File Upload: ".$fileName." </a>";
            $chat->user_id = 1;
            $chat->save();

                $archivo->archivo = $fileName;
                $archivo->path    = $path;
                $archivo->chat_id = $chat->id;
                $archivo->save();
        
    }

   
}
