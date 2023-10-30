<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Events\UserSendEvent;
use App\Models\Message;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    private static function addMessage($chat_id, string $message){
        Message::create([
            "user_id" => auth()->user()->id,
            "chat_id" => $chat_id,
            "message" => $message
        ]);
    }
    public static function send(string $chatname,string $message){
        try{
            DB::beginTransaction();
                MessageSent::dispatch($chatname, $message);
                $chat_id = ChatController::getChatId($chatname);
                self::addMessage($chat_id,$message);
            DB::commit();
        }catch(\Exception $e){
            DB::rollBack();
            dd('error');
        }
    }
}
