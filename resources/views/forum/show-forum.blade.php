@extends('layouts.forum')

@section('doc_title')
{{ $topic->name }} — Forums
@endsection

@section('forum_inner')
<p><a href="{{ route('forum.index') }}">&laquo; Back</a> @auth | <a href="{{ route('forum.create', ['t' => $topic->id]) }}">New thread</a> @endauth</p>
<h2 class="forumTitle">{{ $topic->group?->name }} / {{ $topic->name }}</h2>
<table cellpadding="2" cellspacing="1" border="0" width="100%" class="tableBorder"><tbody>
<tr>
<th class="tableHeaderText">Thread</th>
<th class="tableHeaderText" width="120">Author</th>
<th class="tableHeaderText" width="100">Replies</th>
<th class="tableHeaderText" width="140">Last post</th>
</tr>
@foreach($threads as $thread)
@php($replyCount = \App\Models\ForumPost::where('reply_to', $thread->id)->count())
<tr>
<td class="forumRow"><a href="{{ route('forum.showPost', ['id' => $thread->id]) }}">{{ $thread->title }}</a></td>
<td class="forumRow">{{ $thread->authorUser?->username ?? '—' }}</td>
<td class="forumRowHighlight" align="center">{{ $replyCount }}</td>
<td class="forumRowHighlight"><span class="normalTextSmaller">{{ \Carbon\Carbon::createFromTimestamp($thread->time_posted)->format('M j, Y') }}</span></td>
</tr>
@endforeach
</tbody></table>
<div style="margin-top:12px">{{ $threads->withQueryString()->links() }}</div>
@endsection
