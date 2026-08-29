<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderByDesc('created_at')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function toggle(User $user)
    {
        abort_if($user->id === request()->user()->id, 422, 'Vous ne pouvez pas désactiver votre propre compte.');

        $user->update(['is_active' => !$user->is_active]);

        return back()->with('success', ($user->is_active ? 'Compte réactivé : ' : 'Compte désactivé : ') . $user->name);
    }
}
