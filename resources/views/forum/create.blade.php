@extends('layouts.forum')

@section('doc_title')
New thread — {{ $topic->name }}
@endsection

@section('forum_inner')
<p><a href="{{ route('forum.showForum', ['ForumID' => $topic->id]) }}">&laquo; Back</a></p>
<h2>New thread in {{ $topic->name }}</h2>
<form method="post" action="{{ route('forum.create', ['t' => $topic->id]) }}">
@csrf
<p><label>Title<br><input type="text" name="title" class="Text" style="width:100%;max-width:480px" required value="{{ old('title') }}"></label></p>
<p><label>Body<br><textarea name="content" rows="10" cols="70" class="Text" required>{{ old('content') }}</textarea></label></p>
<button type="submit" class="Button">Create thread</button>
</form>
@endsection
