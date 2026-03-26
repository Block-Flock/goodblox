<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" id="www-roblox-com">
<head>
<title>@hasSection('doc_title')@yield('doc_title')@else{{ $title ?? config('goodblox.name') }}@endif</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="/AllCSSnew.css"/>
<link rel="Shortcut Icon" type="image/ico" href="/favicon.ico"/>
<meta name="author" content="{{ config('goodblox.name') }} Corporation"/>
<meta name="keywords" content="game, video game, building game, construction game, online game, LEGO game, LEGO, MMO, MMORPG, virtual world, avatar chat"/>
<meta name="robots" content="all"/>
@stack('styles')
</head>
<body>
<div id="Container">
<div id="Header">
<div id="Banner">
<div id="Options">
<div id="Authentication">
@if(!auth()->check())
<a href="{{ route('login') }}">Login</a>
@else
Logged in as {{ auth()->user()->username }}&nbsp;<strong>|</strong>&nbsp;<a href="{{ route('logout') }}">Logout</a>
@endif
</div>
<div id="Settings">
@if(auth()->check())
Age 13+, Chat Mode: Filter
@endif
</div>
</div>
<div id="Logo"><a id="ctl00_rbxImage_Logo" title="{{ config('goodblox.name') }}" href="{{ url('/') }}" style="display:inline-block;cursor:pointer;"><img src="/images/goodblox_logo.png" border="0" id="img" alt="{{ config('goodblox.name') }}"/></a></div>
<div id="Alerts"><table style="width:100%;height:100%"><tr><td valign="middle">
@if(!auth()->check())
<a id="ctl00_rbxAlerts_SignupAndPlayHyperLink" class="SignUpAndPlay" href="{{ route('register') }}"><img src="/images/SignupBannerV2.png" alt="Sign-up and Play!" border="0"/></a>
@else
@php($u = auth()->user())
@php($unread = (int) ($unreadMessageCount ?? 0))
<table style="width:123%;height:101%;padding-right:20px;">
<tbody><tr><td valign="middle">
<div><div id="AlertSpace" style="background-opacity: 0.5"><div>
@if($unread > 0)
<div id="MessageAlert">
<a class="TicketsAlertIcon"><img src="{{ url('/images/Message.gif') }}" style="border-width:0px;" alt=""/></a>&nbsp;
<a href="/My/Inbox" class="TicketsAlertCaption">{{ $unread }} New Messages!</a>
</div>
@endif
@if((string) $u->robux !== '0')
<div id="RobuxAlert">
<a class="TicketsAlertIcon"><img src="{{ url('/images/Robux.png') }}" style="border-width:0px;" alt=""/></a>&nbsp;
<a href="/currency" class="TicketsAlertCaption">{{ $u->robux }} GOODBUX</a>
</div>
@endif
<div id="TicketsAlert">
<a class="TicketsAlertIcon"><img src="{{ url('/images/Tickets.png') }}" style="border-width:0px;" alt=""/></a>&nbsp;
<a href="/currency" class="TicketsAlertCaption">{{ $u->tix }} Tickets</a>
</div>
</div></div></div>
</td></tr></tbody></table>
@endif
</td></tr></table></div>
<div class="Navigation">
@if(auth()->check())
<span><a class="MenuItem" href="{{ route('my.home') }}">My {{ config('goodblox.name') }}</a></span>
<span class="Separator">&nbsp;|&nbsp;</span>
<span><a class="MenuItem" href="{{ route('games') }}">Games</a></span>
<span class="Separator">&nbsp;|&nbsp;</span>
<span><a class="MenuItem" href="{{ route('catalog') }}">Catalog</a></span>
<span class="Separator">&nbsp;|&nbsp;</span>
<span><a class="MenuItem" href="{{ route('browse') }}">People</a></span>
<span class="Separator">&nbsp;|&nbsp;</span>
<span><a class="MenuItem" href="/BuildersClub">Builders Club</a></span>
<span class="Separator">&nbsp;|&nbsp;</span>
@endif
<span><a class="MenuItem" href="{{ route('forum.index') }}">Forum</a></span>
<span class="Separator">&nbsp;|&nbsp;</span>
<span><a class="MenuItem" href="/ServerError" target="_blank">News</a>&nbsp;<a href="{{ config('goodblox.blog_url') }}"><img src="/images/feed-icon-14x14.png" border="0"/></a></span>
<span class="Separator">&nbsp;|&nbsp;</span>
<span><a class="MenuItem" href="/Help">Help</a></span>
@if(auth()->check() && auth()->user()->USER_PERMISSIONS == 'Administrator')
<span class="Separator">&nbsp;|&nbsp;</span>
<span><a class="MenuItem" href="/admin">Admin</a></span>
@endif
</div>
</div>
</div>

@yield('content')

</div>
</body>
</html>
