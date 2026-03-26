@extends('layouts.goodblox')

@section('doc_title')
{{ config('goodblox.name') }} Games
@endsection

@section('content')
<br>
<div id="GamesContainer">
<div id="ctl00_cphRoblox_rbxGames_GamesContainerPanel">
<div class="DisplayFilters">
<h2>Games <img src="/images/feed-icon-14x14.png" border="0" alt=""/></h2>
</div>
<div id="Games">
<span class="GamesDisplaySet">Most Popular</span>
<table cellspacing="0" align="Left" border="0" width="550">
@foreach($games as $row)
@php($creator = $row->creator)
<tr><td class="Game" valign="top">
<div style="display:inline-block;cursor:pointer;">
<div class="GameThumbnail">
<a href="{{ route('game', $row->id) }}" title="{{ $row->name }}"><img src="/Thumbs/Games/show.php?id={{ $row->id }}" width="160" height="100" border="0" alt="{{ $row->name }}"/></a>
</div>
<div class="GameDetails">
<div class="GameName"><a href="{{ route('game', $row->id) }}">{{ $row->name }}</a></div>
<div class="GameLastUpdate"><span class="Label">Updated:</span> <span class="Detail">{{ $row->updated_at?->format('Y-m-d') ?? '—' }}</span></div>
<div class="GameCreator"><span class="Label">Creator:</span> <span class="Detail">
@if($creator)<a href="{{ route('user.show', $creator->id) }}">{{ $creator->username }}</a>@else — @endif
</span></div>
@if($row->players > 0)
<div class="GameCurrentPlayers"><span class="DetailHighlighted">{{ $row->players }} players online</span></div>
@endif
</div>
</div>
</td></tr>
@endforeach
</table>
<div style="margin:12px 0;">{{ $games->links() }}</div>
</div>
</div>
</div>
@endsection
