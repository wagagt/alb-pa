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
        $relative_path = '/uploads/files_chat/';
        $path = public_path().$relative_path;
        $files = $request->file('file');
        $chat = new chat_docts($request->all());
        $archivo = new documentos_chat($request->all());
        
        //dd($request->all());
        
        foreach($files as $file){
            $fileName = $file->getClientOriginalName();
            //dd($file->getClientOriginalExtension());
            switch($file->getClientOriginalExtension()){
                case 'txt':
                    $icon = '<img src="/ui/images/icon_text.png" height="40" width="40">';
                    break;
                    
                case 'jpg'; 
                case 'jpeg';
                case 'gif';
                case 'png';
                    $icon = '<img src="/ui/images/icon_image.png" height="40" width="40">';
                    break;
                    
                case 'doc': 
                    $icon = '<img src="/ui/images/icon_doc.png" height="40" width="40">';
                    break;
                    
                case 'xls': 
                    $icon = '<img src="/ui/images/icon_xls.png" height="40" width="40">';
                    break;
                    
                case 'pdf':
                    $icon = '<img src="/ui/images/icon_pdf.png" height="40" width="40">';
                    break;
                    
                default:
                    $icon = '<img src="/ui/images/icon_clip.png" height="40" width="40">';
                break;
                
            }
            $file->move($path,$fileName);
            
            $chat->texto = $icon.' -> <a href="'.$relative_path.$fileName.'" target="_blank">'.$fileName.'</a>';
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
