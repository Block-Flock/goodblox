<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UserProfileController extends Controller
{
    public function showLegacy(Request $request): View
    {
        $id = (int) $request->query('ID', $request->query('id', 0));
        abort_if($id < 1, 404);

        return $this->renderProfile(User::findOrFail($id));
    }

    public function show(int $id): View
    {
        return $this->renderProfile(User::findOrFail($id));
    }

    private function renderProfile(User $user): View
    {
        if ($user->is_banned) {
            abort(403);
        }

        $online = $user->lastseen && ($user->lastseen + 300 >= time());
        $pageViews = DB::table('pageviews')->where('userid', $user->id)->count();
        $friendCount = DB::table('friends')
            ->where('arefriends', '1')
            ->where(function ($q) use ($user) {
                $q->where('user_from', $user->id)->orWhere('user_to', $user->id);
            })
            ->count();

        $showcaseGames = Game::query()
            ->where('creator_id', $user->id)
            ->orderByDesc('id')
            ->limit(10)
            ->get();

        $title = $user->username."'s ".config('goodblox.name').' Home Page';

        return view('user.profile', compact('user', 'online', 'pageViews', 'friendCount', 'showcaseGames', 'title'));
    }
}
