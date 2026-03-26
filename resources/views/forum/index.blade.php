@extends('layouts.forum')

@section('doc_title')
Forums — {{ config('goodblox.name') }}
@endsection

@section('forum_inner')
<table cellpadding="2" cellspacing="1" border="0" width="100%" class="tableBorder"><tbody>
<tr>
<th class="tableHeaderText" colspan="2" height="20">Forum</th>
<th class="tableHeaderText" width="50" nowrap="nowrap">&nbsp;&nbsp;Threads&nbsp;&nbsp;</th>
<th class="tableHeaderText" width="50" nowrap="nowrap">&nbsp;&nbsp;Posts&nbsp;&nbsp;</th>
<th class="tableHeaderText" width="135" nowrap="nowrap">&nbsp;Last Post&nbsp;</th>
</tr>
@foreach($groups as $group)
<tr><td class="forumHeaderBackgroundAlternate" colspan="5" height="20"><span class="forumTitle">{{ $group->name }}</span></td></tr>
@foreach($group->topics as $cat)
@php
$catthreads = \App\Models\ForumPost::where('category', $cat->id)->where('reply_to', 0)->count();
$catreplies = \App\Models\ForumPost::where('category', $cat->id)->count();
$lp = \App\Models\ForumPost::where('category', $cat->id)->orderByDesc('id')->first();
$lpUser = $lp?->authorUser;
@endphp
<tr>
<td class="forumRow" align="center" width="34">&nbsp;</td>
<td class="forumRow" width="80%"><a class="forumTitle" href="{{ route('forum.showForum', ['ForumID' => $cat->id]) }}">{{ $cat->name }}</a><span class="normalTextSmall"><br>{{ $cat->description }}</span></td>
<td class="forumRowHighlight" align="center"><span class="normalTextSmaller">{{ $catthreads }}</span></td>
<td class="forumRowHighlight" align="center"><span class="normalTextSmaller">{{ $catreplies }}</span></td>
<td class="forumRowHighlight" align="center"><span class="normalTextSmaller">
@if($lp && $lpUser)
{{ \Carbon\Carbon::createFromTimestamp($lp->time_posted)->diffForHumans() }}<br>by <a href="{{ route('user.show', $lpUser->id) }}">{{ $lpUser->username }}</a>
@else
—
@endif
</span></td>
</tr>
@endforeach
@endforeach
</tbody></table>
@endsection
