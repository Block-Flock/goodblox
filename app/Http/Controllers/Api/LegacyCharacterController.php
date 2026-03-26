<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LegacyCharacterController extends Controller
{
    public function appearanceByUsername(Request $request): JsonResponse
    {
        $username = (string) $request->query('username', '');
        if ($username === '') {
            return response()->json(['Error' => 'ID not set'], 400, [], JSON_UNESCAPED_SLASHES);
        }
        if (str_starts_with($username, 'Guest ')) {
            $username = 'DefaultGuest';
        }

        $user = User::where('username', $username)->first();
        if (! $user) {
            return response()->json(['Error' => 'Invalid ID'], 404, [], JSON_UNESCAPED_SLASHES);
        }

        return $this->jsonFromUser($user);
    }

    public function appearanceById(Request $request): JsonResponse
    {
        $id = (int) $request->query('id', 0);
        if ($id < 1) {
            return response()->json(['Error' => 'ID not set'], 400, [], JSON_UNESCAPED_SLASHES);
        }
        $user = User::find($id);
        if (! $user) {
            return response()->json(['Error' => 'Invalid ID'], 404, [], JSON_UNESCAPED_SLASHES);
        }

        $pick = fn (?string $v) => ($v !== null && $v !== '') ? $v : '1,1,1';

        return response()->json([
            'BodyColors' => [
                'head' => $pick($user->headcolor),
                'torso' => $pick($user->torsocolor),
                'leftarm' => $pick($user->leftarmcolor),
                'rightarm' => $pick($user->rightarmcolor),
                'leftleg' => $pick($user->leftlegcolor),
                'rightleg' => $pick($user->rightlegcolor),
            ],
        ], 200, [], JSON_UNESCAPED_SLASHES);
    }

    private function jsonFromUser(User $user): JsonResponse
    {
        $defaults = [
            'head_color' => '1,1,1', 'torso_color' => '1,1,1',
            'leftarm_color' => '1,1,1', 'rightarm_color' => '1,1,1',
            'leftleg_color' => '1,1,1', 'rightleg_color' => '1,1,1',
            'hatid1' => 0, 'hatid2' => 0, 'hatid3' => 0,
            'faceid' => 0, 'shirtid' => 0, 'pantsid' => 0,
        ];

        $row = null;
        if ($user->avatar_hash) {
            $row = (array) DB::table('avatar_cache')->where('hash', $user->avatar_hash)->first();
        }
        $d = array_merge($defaults, $row ?: []);

        $head = $this->colorToRgb($d['head_color']);
        $torso = $this->colorToRgb($d['torso_color']);
        $larm = $this->colorToRgb($d['leftarm_color']);
        $rarm = $this->colorToRgb($d['rightarm_color']);
        $lleg = $this->colorToRgb($d['leftleg_color']);
        $rleg = $this->colorToRgb($d['rightleg_color']);

        $hat1 = (int) ($d['hatid1'] ?? 0);
        $hat2 = (int) ($d['hatid2'] ?? 0);
        $hat3 = (int) ($d['hatid3'] ?? 0);
        $face = (int) ($d['faceid'] ?? 0);
        $shirt = (int) ($d['shirtid'] ?? 0);
        $pants = (int) ($d['pantsid'] ?? 0);

        $json = '{"BodyColors":{"head":"'.$head.'","torso":"'.$torso.'","leftarm":"'.$larm.'","rightarm":"'.$rarm.'","leftleg":"'.$lleg.'","rightleg":"'.$rleg.'"},"Wearables":{"hat1": '.$hat1.', "hat2": '.$hat2.', "hat3": '.$hat3.', "face": '.$face.', "tshirt":0,"shirt":'.$shirt.',"pants":'.$pants.'}}';

        return response()->json(json_decode($json, true), 200, [], JSON_UNESCAPED_SLASHES);
    }

    private function colorToRgb(?string $stored): string
    {
        if ($stored === null || $stored === '') {
            return '1,1,1';
        }
        if (preg_match('/^\d+,\d+,\d+$/', $stored)) {
            return $stored;
        }

        return '1,1,1';
    }
}
