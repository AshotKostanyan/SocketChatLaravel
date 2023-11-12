<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Models\Message;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    private static function addMessage($chat_id, string $message):void{
        Message::create([
            "user_id" => auth()->user()->id,
            "chat_id" => $chat_id,
            "message" => $message
        ]);
    }
    public static function send(string $chatname,string $message):void{
        try{
            DB::beginTransaction();
                broadcast(new MessageSend($chatname, $message))->toOthers();
                $chat_id = ChatController::getChatId($chatname);
                self::addMessage($chat_id,$message);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            dd($e);
        }
    }
}
