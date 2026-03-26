@extends('layouts.goodblox')

@section('doc_title')
My {{ config('goodblox.name') }}
@endsection

@section('content')
<div id="Body" style="padding:16px;">
<h2>Hello, {{ $user->username }}</h2>
<p><a href="{{ route('user.show', $user->id) }}">View public profile</a></p>
<p>Tickets: {{ $user->tix }} | Goodbux: {{ $user->robux }}</p>
<ul>
<li><a href="{{ route('games') }}">Games</a></li>
<li><a href="{{ route('catalog') }}">Catalog</a></li>
<li><a href="{{ route('browse') }}">People</a></li>
</ul>
</div>
@endsection
