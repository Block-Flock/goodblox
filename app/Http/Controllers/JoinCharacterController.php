<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JoinCharacterController extends Controller
{
    /**
     * Legacy: GET /join/character.php?accountcode=&placeid=
     */
    public function script(Request $request): Response
    {
        $user = User::where('accountcode', (string) $request->query('accountcode'))->first();
        if (! $user) {
            return response('-- missing user', 404, ['Content-Type' => 'text/plain']);
        }
        $game = Game::find((int) $request->query('placeid'));
        if (! $game) {
            return response('-- missing place', 404, ['Content-Type' => 'text/plain']);
        }

        $head = $user->headcolor ?: 'White';
        $torso = $user->torsocolor ?: 'White';
        $rl = $user->rightlegcolor ?: 'White';
        $ra = $user->rightarmcolor ?: 'White';
        $ll = $user->leftlegcolor ?: 'White';
        $la = $user->leftarmcolor ?: 'White';

        $body = view('roblox.character_script', [
            'username' => str_replace(['"', "\n", "\r"], ['\\"', '', ''], $user->username),
            'headcolor' => $head,
            'torsocolor' => $torso,
            'rightlegcolor' => $rl,
            'rightarmcolor' => $ra,
            'leftlegcolor' => $ll,
            'leftarmcolor' => $la,
            'hatthing' => '',
            'hatthing2' => '',
            'hatthing3' => '',
            'shirtthing' => '',
            'facething' => '',
            'pantthing' => '',
            'echothing' => '',
        ])->render();

        return response($body, 200, ['Content-Type' => 'text/plain; charset=UTF-8']);
    }
}
