@extends('layouts.goodblox')

@section('doc_title')
{{ $title }}
@endsection

@section('content')
<div id="Body">
<div id="UserContainer" style="display:flex;flex-wrap:wrap;gap:16px;padding:12px;">
<div id="LeftBank" style="flex:1;min-width:280px;">
<div id="ProfilePane" style="background:lightsteelblue;padding:12px;">
<h1 class="Title">{{ $user->username }}</h1>
@if($online)
<span class="UserOnlineMessage">[ Online: Website ]</span>
@else
<span class="UserOfflineMessage">[ Offline ]</span>
@endif
<p><a href="{{ route('user.show', $user->id) }}">Profile link</a></p>
@if(filled($user->thumbnail))
<img height="220" width="220" src="data:image/png;base64,{{ $user->thumbnail }}" alt="">
@else
<img height="220" width="220" src="/images/NewFrontPageGuy.png" alt="">
@endif
<p>{{ $user->blurb }}</p>
@if($user->BC === 'BC')
<p>Builders Club until {{ $user->BCExpire }}</p>
@endif
</div>
<div id="UserStatisticsPane" style="margin-top:12px;">
<h4>Statistics</h4>
<ul style="list-style:none;padding:0;">
<li>Friends: {{ $friendCount }}</li>
<li>Profile views: {{ number_format($pageViews) }}</li>
</ul>
</div>
</div>
<div id="RightBank" style="flex:2;min-width:320px;">
<h4>Showcase</h4>
@if($showcaseGames->isEmpty())
<p>This user has no places yet.</p>
@else
@foreach($showcaseGames as $g)
<div style="border:1px solid #ccc;margin-bottom:12px;padding:8px;">
<h5><a href="{{ route('game', $g->id) }}">{{ $g->name }}</a></h5>
<a href="{{ route('game', $g->id) }}"><img src="/Thumbs/Games/show.php?id={{ $g->id }}" width="320" height="180" alt=""></a>
<p>{{ \Illuminate\Support\Str::limit($g->description ?? '', 200) }}</p>
</div>
@endforeach
@endif
</div>
</div>
</div>
@endsection
