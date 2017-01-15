<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\chat_docts;

class NotificationsController extends Controller
{
    public function getUnreadMessages($userId){
        
    $messagesUnRead = chat_docts::where('user_recibe_id',$userId)
                    ->where('status_id', 1)
                    ->orderBy('created_at', 'desc')
                    ->get();
    return $messagesUnRead;
    }
}
