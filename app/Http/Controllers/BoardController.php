<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    public function index()
    {
   
        $ownedBoards = Auth::user()->boards;

        $memberBoards = Auth::user()->memberships;

        $boards = $ownedBoards->merge($memberBoards)->unique('id');

        return view('dashboard', compact('boards'));
    }

    public function create()
    {
        return view('board.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $validatedData['user_id'] = Auth::id();

        Board::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Board criado com sucesso!');
    }
}