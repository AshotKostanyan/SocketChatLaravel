<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Group;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public static function getChatId(string $chatName):int {
        return Chat::where('chat_name', $chatName)->first()->id;
    }
    public static function getChatMessages(string $chatName){
        $chats = GroupController::returnChats();
        $chat_id = self::getChatId($chatName);
        $messages =  Message::all()->where('chat_id', $chat_id);
        return view('chat.messages')->with(compact('messages', 'chats','chatName'));
    }
}
