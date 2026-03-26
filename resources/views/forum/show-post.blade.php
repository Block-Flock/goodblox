@extends('layouts.forum')

@section('doc_title')
{{ $post->title }} — Forums
@endsection

@section('forum_inner')
<p><a href="{{ route('forum.showForum', ['ForumID' => $post->category]) }}">&laquo; Back to {{ $post->topic?->name ?? 'forum' }}</a></p>
<table class="tableBorder" width="100%" cellspacing="1" cellpadding="4"><tbody>
<tr><th class="tableHeaderText" align="left">{{ $post->title }}</th></tr>
<tr><td class="forumRow">
<strong>{{ $post->authorUser?->username }}</strong>
<span class="normalTextSmall"> — {{ \Carbon\Carbon::createFromTimestamp($post->time_posted)->format('M j, Y g:i A') }}</span>
<hr>
<div class="forumContent">{!! nl2br($post->content) !!}</div>
</td></tr>
</tbody></table>

<h4 class="forumTitle" style="margin-top:16px;">Replies</h4>
@foreach($replies as $r)
<table class="tableBorder" width="100%" cellspacing="1" cellpadding="4" style="margin-bottom:8px;"><tbody>
<tr><td class="forumRow">
<strong>{{ $r->authorUser?->username }}</strong>
<span class="normalTextSmall"> — {{ \Carbon\Carbon::createFromTimestamp($r->time_posted)->format('M j, Y g:i A') }}</span>
<hr>{!! nl2br($r->content) !!}
</td></tr>
</tbody></table>
@endforeach

@auth
<hr>
<form method="post" action="{{ route('forum.showPost', ['id' => $post->id]) }}">
@csrf
<p><label>Reply<br><textarea name="content" rows="6" cols="70" class="Text"></textarea></label></p>
<button type="submit" class="Button">Post reply</button>
</form>
@endauth
@endsection
