@extends('layouts.goodblox')

@section('doc_title')
People — {{ config('goodblox.name') }}
@endsection

@section('content')
<div id="Body">
<div id="ctl00_cphRoblox_Panel1">
<div id="BrowseContainer" style="text-align:center">
<div>
<p><form method="get" action="{{ route('browse') }}" style="margin:8px 0;">
<label>Search: <input type="text" name="search" value="{{ $search }}" class="Text"></label>
<button type="submit" class="Button">Go</button>
</form></p>
<table class="Grid" cellspacing="0" cellpadding="4" border="0" style="border-collapse:collapse;">
<tbody>
<tr class="GridHeader">
<th scope="col">Avatar</th>
<th scope="col">Name</th>
<th scope="col">Status</th>
<th scope="col">Location / Last Seen</th>
</tr>
@foreach($users as $row)
<tr class="GridItem">
<td>
@if($row->thumbnail)
<img src="data:image/png;base64,{{ $row->thumbnail }}" title="{{ $row->username }}" width="60" alt="">
@else
<img src="/images/NewFrontPageGuy.png" width="60" alt="">
@endif
</td>
<td style="word-break:break-all;">
<a href="{{ route('user.show', $row->id) }}">{{ $row->username }}</a><br>
<span>{{ $row->blurb }}</span>
</td>
<td>
@if($row->lastseen && ($row->lastseen + 300 >= time()))
<span class="UserOnlineStatus">Online</span>
@else
<span class="UserOfflineStatus">Offline</span>
@endif
</td>
<td><span>Website</span></td>
</tr>
@endforeach
</tbody>
</table>
<div style="margin-top:12px;">{{ $users->links() }}</div>
</div>
</div>
</div>
</div>
@endsection
