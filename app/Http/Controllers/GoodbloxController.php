<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class GoodbloxController extends Controller
{
    public function index(): View
    {
        return view('default');
    }

    public function browse(Request $request): View
    {
        $search = $request->string('search', '')->trim();
        $q = User::query()->orderByDesc('lastseen');
        if ($search !== '') {
            $q->where('username', 'like', '%'.$search.'%');
        }
        $users = $q->paginate(10)->withQueryString();

        return view('browse', compact('users', 'search'));
    }

    public function catalog(Request $request): View
    {
        $type = $request->get('type', 'hat');
        $valid = ['hat', 'pants', 'tshirt', 'shirt', 'face', 'head'];
        if (! in_array($type, $valid, true)) {
            $type = 'hat';
        }
        $typeLabels = [
            'hat' => 'Hats', 'pants' => 'Pants', 'tshirt' => 'T-Shirts',
            'shirt' => 'Shirts', 'face' => 'Faces', 'head' => 'Heads',
        ];
        $sname = $typeLabels[$type];
        $assets = Asset::where('type', $type)->paginate(24)->withQueryString();

        return view('catalog', compact('assets', 'type', 'sname'));
    }

    public function games(): View
    {
        $games = Game::query()->orderByDesc('players')->paginate(12);

        return view('games', compact('games'));
    }

    public function game(int $id): View
    {
        $game = Game::with('creator')->findOrFail($id);
        $title = $game->name.' — '.config('goodblox.name');

        return view('game', compact('game', 'title'));
    }

    public function item(int $id): View
    {
        $item = Asset::with('creator')->findOrFail($id);
        $title = $item->name.' — Catalog';

        return view('item', compact('item', 'title'));
    }

    public function myHome(): View
    {
        return view('my.home', ['user' => auth()->user()]);
    }

    public function play(int $id): View
    {
        $game = Game::findOrFail($id);
        $title = 'Play — '.$game->name;

        return view('play', compact('game', 'title'));
    }

    public function gameThumb(Request $request): RedirectResponse|Response
    {
        $id = (int) $request->query('id');
        $game = Game::find($id);
        if (! $game || ! $game->thumbnail) {
            return redirect('/images/AvatarPlaceholder.png');
        }
        $raw = base64_decode((string) $game->thumbnail, true);
        if ($raw === false) {
            return redirect('/images/AvatarPlaceholder.png');
        }

        return response($raw, 200, ['Content-Type' => 'image/png']);
    }
}
