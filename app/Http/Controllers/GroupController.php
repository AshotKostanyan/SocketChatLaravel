<?php

namespace App\Http\Controllers;

use App\Events\GroupEvent;
use App\Models\Chat;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public static function returnChats(){
            $chats = array();
            $chats_id = Group::all()->where('user_id', auth()->user()->id);
            foreach ($chats_id as $chat_id){
                array_push($chats, Chat::all()->where('id', $chat_id->chat_id));
            }
            return $chats;
    }

    public function getUserChats(){
        if(auth()->user()){
            $chats = self::returnChats();
            return view('chat.chat')->with(compact('chats'));
        }else{
            return redirect('login');
        }
    }
}
