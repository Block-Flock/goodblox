@extends('layouts.goodblox')

@section('doc_title')
{{ config('goodblox.name') }}
@endsection

@section('content')
<div id="Body">
<script>
function pF() {
 return false;
}
</script>
<div id="SplashContainer">
<div id="SignInPane">
<div id="LoginViewContainer">
<div id="LoginView">
@if(!auth()->check())
<h5>Member Login</h5>
<form method="POST" action="{{ route('login') }}">
@csrf
<div class="AspNet-Login-UserPanel">
<label class="Label">Character Name</label>
<input name="username" type="text" class="Text">
</div>
<div class="AspNet-Login-PasswordPanel">
<label class="Label">Password</label>
<input name="password" type="password" class="Text">
</div>
<div class="AspNet-Login-SubmitPanel">
<button type="submit" class="Button">Login</button>
</div>
<div class="AspNet-Login-SubmitPanel">
<a class="Button" href="{{ route('register') }}">Register</a>
</div>
<div class="AspNet-Login-PasswordRecoveryPanel">
<a href="/Login/ResetPasswordRequest">Forgot your password?</a>
</div>
</form>
@else
<h5>Logged In</h5>
<div id="AlreadySignedIn">
<a title="{{ auth()->user()->username }}" href="{{ route('my.home') }}" style="display:inline-block;height:190px;width:152px;cursor:pointer;">
@if(filled(optional(auth()->user())->thumbnail))
<img src="data:image/png;base64,{{ auth()->user()->thumbnail }}" style="display:inline-block;width:145px;margin-top:15px;" border="0" alt="{{ auth()->user()->username }}">
@else
<img src="/images/NewFrontPageGuy.png" style="display:inline-block;width:145px;margin-top:15px;" border="0" alt="{{ auth()->user()->username }}">
@endif
</a>
</div>
@endif
</div>
</div>
</div>

@if(!auth()->check())
<div id="ctl00_cphRoblox_LoginView1_pFigure">
<div id="Figure"><img src="/images/NewFrontPageGuy.png" alt="Figure" border="0"></div>
</div>
@else
<div style="text-align:center; background-color:#eeeeee; border:1px solid black;">
<br>
<h3>GoodBlox News</h3>
<a href="/Default">GoodBlox news added</a><br><br>
<a href="/Default">Hats Added!</a><br><br>
<a href="">24/7 Servers soon.</a><br><br>
</div>
@endif
</div>

<div id="RobloxAtAGlance">
<h2>GoodBlox Virtual Playworld</h2>
<h3>GoodBlox is Free!</h3>
<ul id="ThingsToDo">
<li id="Point1">
<h3>Build your personal Place</h3>
<div>Create buildings, vehicles, scenery, and traps with thousands of virtual bricks.</div>
</li>
<li id="Point2">
<h3>Meet new friends online</h3>
<div>Visit your friend's place, chat in 3D, and build together.</div>
</li>
<li id="Point3">
<h3>Battle in the Brick Arenas</h3>
<div>Play with the slingshot, rocket, or other brick battle tools. Be careful not to get "bloxxed".</div>
</li>
</ul>
<div id="Showcase">
<iframe width="400" height="326" src="https://www.bitview.net/embed.php?v=LYkKRQuT7_5" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
<br><br>
</div>
<div id="Install">
<div id="CompatibilityNote">
Works with your<br>Windows PC!
</div>
<div id="DownloadAndPlay"><a href="/download/GoodBlox.7z"><img src="/images/PlayNowGreenFader.gif" alt="FREE - Download and Play!" border="0"></a></div>
</div>
<div id="ctl00_cphRoblox_pForParents">
<div id="ForParents">
@endsection