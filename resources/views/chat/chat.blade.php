@extends('index')
@section('chat')
    <style>
        .chats{
            width: 400px;
        }
        .chats .chat{
            height: 100px;
            width: 100%;
            display: flex;
        }
        .chats .chat .chat-img{
            width: 55px;
            margin: 10px;
        }
        .main{
            display: flex;
        }
    </style>
    <div class="main">
        <div class="chats">
            @foreach ($chats as $chat)
                <a href="/{{$chat[0]->chat_name}}">
                    <div class="chat">
                        <div class="chat-img" style="background-image: {{$chat[0]->image}}"></div>
                        <div class="chat-name"><p>{{$chat[0]->message}}</p></div>
                    </div>
                </a>
            @endforeach
        </div>
        @yield('messages')
    </div>

@endsection

