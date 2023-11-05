<?php

namespace App\Actions;

use App\Http\Controllers\ChatController;
use App\Models\Chat;
use App\Models\Group;
use App\Models\Message;

class ChatAccessAction
{
    public function handle($chat_name){
        return Group::all()->where('chat_id', ChatController::getChatId($chat_name))->where('user_id', auth()->user()->id) != null;
    }
}
