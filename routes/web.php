<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetDeliveryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\GoodbloxController;
use App\Http\Controllers\JoinCharacterController;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return redirect('/Default');
});

Route::get('/Thumbs/Games/show.php', [GoodbloxController::class, 'gameThumb']);

Route::get('/Default', [GoodbloxController::class, 'index'])->name('home');
Route::redirect('/default', '/Default', 301);
Route::get('/Browse', [GoodbloxController::class, 'browse'])->name('browse');
Route::redirect('/browse', '/Browse', 301);
Route::get('/Catalog', [GoodbloxController::class, 'catalog'])->name('catalog');
Route::redirect('/catalog', '/Catalog', 301);
Route::get('/Games', [GoodbloxController::class, 'games'])->name('games');
Route::redirect('/games', '/Games', 301);
Route::get('/Games/{id}', [GoodbloxController::class, 'game'])->whereNumber('id')->name('game');
Route::get('/Catalog/Item/{id}', [GoodbloxController::class, 'item'])->whereNumber('id')->name('item');
Route::get('/Play/Place/{id}', [GoodbloxController::class, 'play'])->whereNumber('id')->name('play');
Route::get('/My/Home', [GoodbloxController::class, 'myHome'])->middleware('auth')->name('my.home');

Route::get('/User', [UserProfileController::class, 'showLegacy'])->name('user.legacy');
Route::get('/User/{id}', [UserProfileController::class, 'show'])->whereNumber('id')->name('user.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::permanentRedirect('/Default.aspx', '/Default');
Route::permanentRedirect('/Browse.aspx', '/Browse');
Route::permanentRedirect('/Catalog.aspx', '/Catalog');
Route::permanentRedirect('/Games.aspx', '/Games');
Route::get('/PlaceItem', function (Request $request) {
    $id = (int) $request->query('ID', 0);

    return $id > 0 ? redirect("/Games/{$id}", 301) : redirect('/Games', 301);
});
Route::get('/PlaceItem.aspx', function (Request $request) {
    $id = (int) $request->query('ID', 0);

    return $id > 0 ? redirect("/Games/{$id}", 301) : redirect('/Games', 301);
});
Route::get('/Item', function (Request $request) {
    $id = (int) $request->query('id', 0);

    return $id > 0 ? redirect("/Catalog/Item/{$id}", 301) : redirect('/Catalog', 301);
});
Route::get('/User.aspx', function (Request $request) {
    $id = (int) $request->query('ID', $request->query('id', 0));

    return $id > 0 ? redirect('/User?ID='.$id, 301) : redirect('/Browse', 301);
});

Route::get('/Forum/Default', [ForumController::class, 'index'])->name('forum.index');
Route::permanentRedirect('/Forum/Default.aspx', '/Forum/Default');
Route::get('/Forum/ShowForum', [ForumController::class, 'showForum'])->name('forum.showForum');
Route::match(['get', 'post'], '/Forum/ShowPost', [ForumController::class, 'showPost'])->name('forum.showPost');
Route::match(['get', 'post'], '/Forum/CreatePost', [ForumController::class, 'create'])->name('forum.create');

Route::get('/join/character.php', [JoinCharacterController::class, 'script']);

Route::get('/asset', [AssetDeliveryController::class, 'proxyRoblox']);
Route::get('/asset/', [AssetDeliveryController::class, 'proxyRoblox']);
Route::get('/asset/BodyColors.ashx', [AssetDeliveryController::class, 'bodyColors']);
Route::get('/asset/GetScriptState.php', [AssetDeliveryController::class, 'scriptState']);
