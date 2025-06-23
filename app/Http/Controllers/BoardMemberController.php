<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;

class BoardMemberController extends Controller
{
    public function create(Board $board)
    {
        return view('members.create', compact('board'));
    }

    public function store(Request $request, Board $board)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($board->members()->where('user_id', $user->id)->exists()) {
            return back()->withErrors(['email' => 'Este usuário já é um colaborador deste board.']);
        }
        
        if ($board->user_id === $user->id) {
            return back()->withErrors(['email' => 'Você não pode adicionar o dono do board como colaborador.']);
        }

        $board->members()->attach($user->id);

        return redirect()->route('boards.tasks.index', $board)->with('success', 'Colaborador adicionado com sucesso!');
    }
}
