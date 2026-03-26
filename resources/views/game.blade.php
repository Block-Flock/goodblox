@extends('layouts.goodblox')

@section('content')
<div id="Body" style="padding:12px;">
<h2>{{ $game->name }}</h2>
@if($game->creator)
<p>Creator: <a href="{{ route('user.show', $game->creator->id) }}">{{ $game->creator->username }}</a></p>
@endif
<p>Updated: {{ $game->datecreated?->format('Y-m-d') ?? $game->updated_at?->format('Y-m-d') ?? '—' }}</p>
<div style="margin:12px 0;">
<img src="/Thumbs/Games/show.php?id={{ $game->id }}" width="418" height="228" style="border:1px solid black" alt="{{ $game->name }}">
</div>
<div id="Description">{!! nl2br(e($game->description)) !!}</div>
@if(auth()->check())
<p><a class="Button" href="{{ route('play', $game->id) }}">Play</a></p>
@else
<p><a href="{{ route('login') }}">Log in to play</a></p>
@endif
</div>
@endsection
