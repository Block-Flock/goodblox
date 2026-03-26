@extends('layouts.goodblox')

@section('content')
<div id="Body">
<h1>Register</h1>
<form method="POST" action="{{ route('register') }}">
@csrf
<label>Username:</label>
<input type="text" name="username" required>
<br>
<label>Email:</label>
<input type="email" name="email" required>
<br>
<label>Password:</label>
<input type="password" name="password" required>
<br>
<button type="submit">Register</button>
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