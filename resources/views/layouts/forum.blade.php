@extends('layouts.goodblox')

@push('styles')
<link rel="stylesheet" href="/forumsapi/skins/default/style/default.css" type="text/css"/>
@endpush

@section('content')
@php($forumnow = $forumnow ?? now()->format('M j, g:i A'))
<div id="Body">
<table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody>
<tr valign="bottom"><td>
<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr valign="top">
<td class="LeftColumn">&nbsp;&nbsp;&nbsp;</td>
<td nowrap="nowrap" width="180" class="LeftColumn">
<table class="tableBorder" cellspacing="1" cellpadding="3" width="100%">
<tbody><tr><th class="tableHeaderText" align="left" colspan="2">&nbsp;{{ config('goodblox.name') }} Forums</th></tr>
<tr><td class="forumRow" colspan="2"><a href="{{ route('forum.index') }}">Forum home</a></td></tr></tbody></table>
<br><br>
</td>
<td class="LeftColumn">&nbsp;&nbsp;&nbsp;</td>
<td width="95%" class="CenterColumn">
<table width="100%" cellspacing="1" cellpadding="0"><tbody><tr><td align="right" valign="middle">
<a class="menuTextLink" href="{{ route('forum.index') }}">Home</a>
@if(auth()->check()) &nbsp;|&nbsp; <a class="menuTextLink" href="{{ route('user.show', auth()->id()) }}">Profile</a> @endif
</td></tr></tbody></table>
<br>
<table cellpadding="0" cellspacing="2" width="100%"><tbody><tr>
<td align="left"><span class="normalTextSmallBold">Current time: </span><span class="normalTextSmall">{{ $forumnow }}</span></td>
</tr></tbody></table>
@yield('forum_inner')
</td>
<td class="RightColumn">&nbsp;&nbsp;&nbsp;</td>
</tr></tbody></table></td></tr></tbody></table>
</div>
@endsection
