@extends('layouts.goodblox')

@section('doc_title')
Play — {{ $game->name }}
@endsection

@section('content')
<div id="Body" style="padding:16px;">
<h2>Join {{ $game->name }}</h2>
<p>Use your GoodBlox client with the join link from your account.</p>
@if(auth()->check() && auth()->user()->accountcode)
<p>Account code: <strong>{{ auth()->user()->accountcode }}</strong></p>
@endif
<p><a href="{{ route('game', $game->id) }}">Back to place page</a></p>
</div>
@endsection
