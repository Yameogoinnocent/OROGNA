<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $q = request('q');
        $role = request('role');

        $users = User::when($q, function ($query) use ($q) {
            $query->where(function ($w) use ($q) {
                $w->where('name', 'like', '%' . $q . '%')
                    ->orWhere('email', 'like', '%' . $q . '%');
            });
        })
        ->when($role, fn($query) => $query->where('role', $role))
        ->orderByDesc('created_at')
        ->paginate(20)
        ->withQueryString();

        return view('admin.users.index', compact('users', 'q', 'role'));
    }

    public function toggle(User $user)
    {
        abort_if($user->id === request()->user()->id, 422, 'Vous ne pouvez pas désactiver votre propre compte.');

        $user->update(['is_active' => !$user->is_active]);

        return back()->with('success', ($user->is_active ? 'Compte réactivé : ' : 'Compte désactivé : ') . $user->name);
    }
}
