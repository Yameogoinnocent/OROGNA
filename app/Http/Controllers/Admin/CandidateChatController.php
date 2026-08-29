<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CandidateMessage;
use App\Models\User;
use Illuminate\Http\Request;

class CandidateChatController extends Controller
{
    public function index()
    {
        $candidates = User::where('role', 'candidat')
            ->whereHas('candidateMessages')
            ->withCount(['candidateMessages as unread_chat_count' => function ($q) {
                $q->where('sender_type', 'candidate')->whereNull('read_at');
            }])
            ->orderByDesc('unread_chat_count')
            ->orderBy('name')
            ->get();

        $selected = request('candidate');
        $candidate = $selected ? User::where('role', 'candidat')->findOrFail($selected) : $candidates->first();

        $messages = $candidate ? $candidate->candidateMessages()->with('admin')->oldest()->get() : collect();

        if ($candidate) {
            CandidateMessage::where('candidate_id', $candidate->id)
                ->where('sender_type', 'candidate')
                ->whereNull('read_at')
                ->update(['read_at' => now()]);
        }

        return view('admin.chats.index', compact('candidates', 'candidate', 'messages'));
    }

    public function reply(Request $request, User $candidate)
    {
        abort_unless($candidate->isCandidate(), 404);

        $data = $request->validate([
            'body' => 'required|string|max:5000',
        ]);

        CandidateMessage::create([
            'candidate_id' => $candidate->id,
            'admin_id' => $request->user()->id,
            'sender_type' => 'admin',
            'body' => $data['body'],
        ]);

        return redirect()->route('admin.chats', ['candidate' => $candidate->id])
            ->with('success', 'Réponse envoyée au candidat.');
    }
}
