@extends('layouts.goodblox')

@section('content')
<div id="Item" style="font-family: Verdana, Sans-Serif; padding: 10px;">
<div id="ItemContainer" style="background-color:#eee;border:solid 1px #555;margin:0 auto;width:620px;">
<h2>{{ $item->name }}</h2>
<div class="PlayGames" style="background-color:#ccc;border:dashed 1px Green;color:Green;float:right;margin-top:10px;padding:10px 5px;text-align:right;width:325px;">
<p>Type: {{ ucfirst($item->type) }}</p>
@if($item->creator)
<p>Creator: <a href="{{ route('user.show', $item->creator->id) }}">{{ $item->creator->username }}</a></p>
@endif
<p>Price: {{ $item->price }} tix / robux</p>
</div>
<div style="clear:both;padding:10px;">
@if($item->thumbnail)
<img src="{{ $item->thumbnail }}" width="120" height="120" alt="">
@endif
<p>{{ $item->description }}</p>
</div>
</div>
</div>
@endsection
