@extends('layouts.goodblox')

@section('doc_title')
Catalog — {{ config('goodblox.name') }}
@endsection

@section('content')
<div id="CatalogContainer" style="margin-top: 5px">
<div id="SearchBar" class="SearchBar">
<span class="SearchBox"><input type="text" maxlength="100" class="TextBox" disabled placeholder="Search (coming soon)"/></span>
<span class="SearchButton"><input type="submit" value="Search" class="Button" disabled/></span>
</div>
<div class="DisplayFilters">
<h2>Catalog</h2>
<div id="Category">
<h4>Category</h4>
<ul>
<li>@if($type === 'head')<img class="GamesBullet" src="https://web.archive.org/web/20070914235314im_/http://www.roblox.com/images/games_bullet.png" border="0" alt=""/>@endif <a href="{{ route('catalog', ['type' => 'head']) }}">Heads</a></li>
<li>@if($type === 'face')<img class="GamesBullet" src="https://web.archive.org/web/20070914235314im_/http://www.roblox.com/images/games_bullet.png" border="0" alt=""/>@endif <a href="{{ route('catalog', ['type' => 'face']) }}">Faces</a></li>
<li>@if($type === 'hat')<img class="GamesBullet" src="https://web.archive.org/web/20070914235314im_/http://www.roblox.com/images/games_bullet.png" border="0" alt=""/>@endif <a href="{{ route('catalog', ['type' => 'hat']) }}">Hats</a></li>
<li>@if($type === 'shirt')<img class="GamesBullet" src="https://web.archive.org/web/20070914235314im_/http://www.roblox.com/images/games_bullet.png" border="0" alt=""/>@endif <a href="{{ route('catalog', ['type' => 'shirt']) }}">Shirts</a></li>
<li>@if($type === 'pants')<img class="GamesBullet" src="https://web.archive.org/web/20070914235314im_/http://www.roblox.com/images/games_bullet.png" border="0" alt=""/>@endif <a href="{{ route('catalog', ['type' => 'pants']) }}">Pants</a></li>
<li>@if($type === 'tshirt')<img class="GamesBullet" src="https://web.archive.org/web/20070914235314im_/http://www.roblox.com/images/games_bullet.png" border="0" alt=""/>@endif <a href="{{ route('catalog', ['type' => 'tshirt']) }}">T-Shirts</a></li>
</ul>
</div>
</div>
<div class="Assets">
<span class="AssetsDisplaySet">Featured {{ $sname }}</span>
<div class="HeaderPager">
<span>Page {{ $assets->currentPage() }} of {{ $assets->lastPage() ?: 1 }}</span>
</div>
<table cellspacing="0" align="Center" border="0" width="735">
@foreach($assets as $row)
<tr><td valign="top" style="display:inline-block;">
<div class="Asset">
<div class="AssetThumbnail">
<a href="{{ route('item', $row->id) }}"><img src="{{ $row->thumbnail }}" width="120" height="120" border="0" alt=""/></a>
</div>
<div class="AssetDetails">
<div class="AssetName"><a href="{{ route('item', $row->id) }}">{{ $row->name }}</a></div>
</div>
</div>
</td></tr>
@endforeach
</table>
<div style="margin:12px 0;">{{ $assets->withQueryString()->links() }}</div>
</div>
</div>
@endsection
