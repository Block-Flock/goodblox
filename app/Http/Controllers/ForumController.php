<?php

namespace App\Http\Controllers;

use App\Models\ForumGroup;
use App\Models\ForumPost;
use App\Models\ForumTopic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ForumController extends Controller
{
    private function forumAccountOldEnough(?User $user): bool
    {
        if (! $user) {
            return false;
        }
        $t = $user->time_joined;
        if ($t === null || $t === 0) {
            $t = $user->created_at?->getTimestamp() ?? time();
        }

        return $t + 259_200 <= time();
    }

    public function index(): View
    {
        $forumnow = Carbon::now()->format('M j, g:i A');
        $groups = ForumGroup::query()->orderBy('sort_order')->orderBy('id')->with(['topics' => fn ($q) => $q->orderBy('id')])->get();

        return view('forum.index', compact('groups', 'forumnow'));
    }

    public function showForum(Request $request): View
    {
        $forumId = (int) $request->query('ForumID', 1);
        $topic = ForumTopic::with('group')->findOrFail($forumId);
        $threads = ForumPost::query()
            ->where('category', $forumId)
            ->where('reply_to', 0)
            ->orderByDesc('is_pinned')
            ->orderByDesc('time_posted')
            ->with('authorUser')
            ->paginate(20);

        return view('forum.show-forum', compact('topic', 'threads'));
    }

    public function showPost(Request $request): View|RedirectResponse
    {
        $id = (int) $request->query('id', 0);
        $post = ForumPost::with(['authorUser', 'topic.group'])->findOrFail($id);
        if ($post->reply_to != 0) {
            return redirect()->route('forum.showPost', ['id' => $post->reply_to]);
        }

        if ($request->isMethod('post') && auth()->check()) {
            if (! $this->forumAccountOldEnough(auth()->user())) {
                abort(403, 'Your account must be at least three days old to post.');
            }
            $request->validate(['content' => 'required|string|max:20000']);
            ForumPost::create([
                'author' => auth()->id(),
                'reply_to' => $post->id,
                'title' => 'reaction to post',
                'content' => e($request->input('content')),
                'time_posted' => time(),
                'category' => $post->category,
                'is_pinned' => false,
            ]);

            return redirect()->route('forum.showPost', ['id' => $id]);
        }

        $replies = ForumPost::query()
            ->where('reply_to', $id)
            ->orderBy('time_posted')
            ->with('authorUser')
            ->get();

        return view('forum.show-post', compact('post', 'replies'));
    }

    public function create(Request $request): View|RedirectResponse
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }
        if (! $this->forumAccountOldEnough(auth()->user())) {
            abort(403, 'Your account must be at least three days old to post.');
        }

        $t = (int) $request->query('t', 0);
        if ($t < 1 || $t > 64) {
            abort(404, 'Invalid forum category.');
        }
        $topic = ForumTopic::findOrFail($t);

        if ($request->isMethod('post')) {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string|max:20000',
            ]);
            $post = ForumPost::create([
                'author' => auth()->id(),
                'reply_to' => 0,
                'title' => $request->input('title'),
                'content' => e($request->input('content')),
                'time_posted' => time(),
                'category' => $topic->id,
                'is_pinned' => false,
            ]);

            return redirect()->route('forum.showPost', ['id' => $post->id]);
        }

        return view('forum.create', compact('topic'));
    }
}
