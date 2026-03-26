<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Game;
use App\Models\User;
use App\Models\Wearing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RobloxApiController extends Controller
{
    public function charapp(Request $request): Response
    {
        $id = (int) $request->query('id');
        $user = User::find($id);
        if (! $user) {
            return response('', 404);
        }

        $prefix = rtrim(config('goodblox.asset_http_base'), '/');
        $parts = '';

        $rows = Wearing::query()->where('userid', $user->id)->get();
        foreach ($rows as $w) {
            $item = Asset::find($w->itemid);
            if (! $item) {
                continue;
            }
            $aid = $item->assetid ?? $item->id;
            $parts .= $prefix.'/asset?id='.$aid.';';
        }

        $parts .= $prefix.'/asset/BodyColors.ashx?userId='.$id;

        return response($parts, 200)->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    public function addPlayer(Request $request): Response
    {
        $gameId = (int) $request->query('gameid');
        if ($gameId > 0) {
            Game::where('id', $gameId)->increment('players');
        }

        return response('', 200);
    }

    public function removePlayer(Request $request): Response
    {
        $gameId = (int) $request->query('gameid');
        if ($gameId > 0) {
            Game::where('id', $gameId)->where('players', '>', 0)->decrement('players');
        }

        return response('', 200);
    }

    public function updatePlayers(Request $request): Response
    {
        $id = (int) $request->query('game');
        $players = (int) $request->query('players', 0);
        if ($id > 0) {
            Game::where('id', $id)->update(['players' => max(0, $players)]);
        }

        return response('', 200);
    }

    public function userThumbnail(Request $request): Response|\Illuminate\Http\RedirectResponse
    {
        $uid = (int) $request->query('id');
        $user = User::find($uid);
        if (! $user || ! $user->thumbnail) {
            return redirect('/images/AvatarPlaceholder.png');
        }
        $bin = base64_decode((string) $user->thumbnail, true);
        if ($bin === false) {
            return redirect('/images/AvatarPlaceholder.png');
        }

        return response($bin, 200, ['Content-Type' => 'image/png']);
    }
}
