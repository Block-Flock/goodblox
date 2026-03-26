@extends('layouts.goodblox')

@section('content')
<div id="Body">
<h1>Login</h1>
<form method="POST" action="{{ route('login') }}">
@csrf
<label>Username:</label>
<input type="text" name="username" required>
<br>
<label>Password:</label>
<input type="password" name="password" required>
<br>
<button type="submit">Login</button>
</form>
@if($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif
</div>
@endsection