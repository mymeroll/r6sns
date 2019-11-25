@extends('layouts.app')
 
@section('content')
<div class="profile-page sidebar-collapse text-center">
    <h2 class="title">Messages</h2>
    <p class="category">メッセージ履歴</p>
    @if (count($conversations) > 0)
    <div class="container marketing">
        <div class="row">
            @foreach ($conversations as $conversation)
                <div class="col-sm-6 col-lg-4 msgContent">
                    <a href="{{ url('conversations/'.$conversation->id.'/messages') }}" class="">
                        <h3 class="title">{{ $conversation->otherUser->name }}</h3>
                        <p class="description">{{ $conversation->messages[0]->content }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection