@extends('layouts.admin')

@section('content')
<div class="chat">

    <!-- Header -->
    <div class="top">
        <img src="{{ asset('assets/images/user.png') }}" alt="Avatar" width="200" height="200">
        <div>
            <p>{{$chat['name']}}</p>
            <small>Online</small>
        </div>
    </div>
    <!-- End Header -->

    <!-- Chat -->
    <div class="messages">
        @foreach($messages as $message)
            @if($message['role'] == 'user')
                <div class="left message">
                    <img src="{{ asset('assets/images/user.png') }}" alt="Avatar">
                    <p>{{$message['message']}}</p>
                </div>
            @elseif($message['role'] == 'assistant')
                <div class="right message">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Avatar"/>
                    <p>{{$message['message']}}</p>
                </div>
            @endif
        @endforeach
    </div>
    <!-- End Chat -->
</div>
@endsection
