<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function sendMessage(Request $request,$chatname){
        MessageController::send($chatname, $request->input("message"));
        return ChatController::getChatMessages($chatname);
    }
}
