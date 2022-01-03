@extends('layouts.app')

@section('content')
<h5 class="text-center">マッチしたユーザー一覧</h5>

<div class="p-match-index">
    <div class="container">
        <div class="row">
            @foreach ($matchedUsers as $matchedUser)
            <div class="col-md-12 mb-3">
                <img src="{{ $matchedUser->toUser->img_url }}" class="rounded-circle" style="height: 70px; width: 70px; object-fit: cover;">
                {{ $matchedUser->toUser->name }}
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection