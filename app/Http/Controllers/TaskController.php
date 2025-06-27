<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Board $board)
    {
        if ($board->user_id !== Auth::id() && !$board->members->contains(Auth::user())) {
            abort(403);
        }

        $tarefasAgrupadas = $board->tasks()->get()->groupBy('status');

        $members = $board->members;

        return view('task.index', [
            'board' => $board,
            'tarefasAgrupadas' => $tarefasAgrupadas,
            'members' => $members,
        ]);
    }

    public function create(Board $board)
    {
        return view('task.create', compact('board')); 
    }

    public function store(Request $request, Board $board)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:pendente,em_andamento,concluida',
            'tempoLimite' => 'nullable|date',
        ]);

        $task = new Task($validatedData);
        $task->user_id = Auth::id();
        $task->board_id = $board->id;
        $task->save();

        return redirect()->route('boards.tasks.index', $board)->with('success', 'Tarefa criada com sucesso!');
    }

    public function edit(Task $task)
    {

        if (Auth::id() !== $task->user_id && !$task->board->members->contains(Auth::user())) {
            abort(403);
        }
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {

        if (Auth::id() !== $task->user_id && !$task->board->members->contains(Auth::user())) {
            abort(403);
        }

        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:pendente,em_andamento,concluida',
            'tempoLimite' => 'nullable|date',
        ]);

        $task->update($validatedData);
     
        return redirect()->route('boards.tasks.index', $task->board)->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy(Task $tarefa)
    {
        $board = $task->board; 
        $task->delete();
        return redirect()->route('boards.tasks.index', $board)->with('success', 'Tarefa excluída!');
    }

    public function updateStatus(Request $request, Task $task)
    {
 
        if (Auth::id() !== $task->user_id && !$task->board->members->contains(Auth::user())) {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:pendente,em_andamento,concluida',
        ]);

        $task->update(['status' => $request->status]);

        return response()->json(['success' => true]);
    }
}
