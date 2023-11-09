<?php

namespace App\Actions;

use App\Http\Controllers\ChatController;
use App\Models\Chat;
use App\Models\Group;
use App\Models\Message;

class ChatAccessAction
{

    //*
    private string $chatname;
    //*
    public function handle(string $chatname):bool{
        dd($chatname);
        return Group::all()->where('chat_id', ChatController::getChatId($chatname))->where('user_id', auth()->user()->id) != null;
    }
}
