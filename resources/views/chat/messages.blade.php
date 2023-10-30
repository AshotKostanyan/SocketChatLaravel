@extends('chat.chat')
@section('messages')

    <style>
        .messages{
            height: 100%;
            width: 100%;
        }
        .head{
            height: 100px;
            display: flex;
        }
        .content{
            height: 100%;
        }
        .sender form{
            display: flex;
        }
    </style>
    <div class="messages">
        <div class="head">
            {{-- <div class="chat-img" style="background-image: {{$chat->image}}"></div>
            <div class="chat-name"><p>{{$chat->message}}</p></div> --}}
        </div>
        <div class="content" id="content">
            @foreach ($messages as $message)
                <div class="msg">
                    <p>{{$message->user_id}}</p>
                    <p>{{$message->message}}</p>
                </div>
            @endforeach
        </div>
        <div class="sender">
            <form action="{{route('send', $chatName)}}" method="get">
                {{ csrf_field() }}
                <input name="message" type='text' value="message">
                <button type="submit">SEND</button>
            </form>
        </div>
    </div>
    <script>
        window.onload = function() {

            let a = '{{$chatName}}';
            let chatname = a.replace(' ','');
            window.Echo.private(`chat.${chatname}`)
                .listen('MessageSent', function (e) {

                    const node_mgs  = document.createTextNode(e.message+'  ');
                    document.getElementById("content").appendChild(node_mgs)
                });
        }

    </script>
@endsection
