<?php

namespace App\Events;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSend implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    // **
    public string $message;
    public string $chatname;
    public string $hashedChatName;
    //*


    public function __construct(string $chatname, string $message)
    {
        $this->hashedChatName = hash('sha256',$chatname);
        $this->message = $message;
        $this->chatname = $chatname;
        $this->user_id = auth()->user()->id;
    }


    public function broadcastOn(): array
    {
        return [
            new Channel('chat.'.$this->hashedChatName),
        ];
    }
}
