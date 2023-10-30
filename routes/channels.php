<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('open.{data}', function ($data) {
    // $chat = new ChatController();
    // $user = new UserController();
    // return $user->isUserBelongToChat($chat->getChatId($chatname));
    return $data != null;
});


Broadcast::channel('send', function () {
    return 'true';
});

Broadcast::channel('post.{data}', function ($data) {
    echo $data;
    return 'true';
});





//----------------


Broadcast::channel('chat.{chatname}', function ($chatname) {
    // return GroupController::isUserBelongToChat(ChatController::getChatId($chatname));
    return true;
});
