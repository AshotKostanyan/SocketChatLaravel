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
        $hashedChatName = hash('sha256',$chatName);
        $chats = GroupController::returnChats();
        $chat_id = self::getChatId($chatName);
        $messages =  Message::all()->where('chat_id', $chat_id);
        return view('chat.messages')->with(compact('messages', 'chats','hashedChatName','chatName'));
    }

    public function create(Request $request){
        try{
            Chat::create(['chat_name' => $request->input('chat_name')]);
            $chat = Chat::where('chat_name', $request->input('chat_name'))->latest();
            Group::create([
                'user_id' => auth()->user()->id,
                'chat_id' => $chat->id,
            ]);


            return view('chat.chat');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
}
