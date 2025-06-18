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
        if ($board->user_id !== Auth::id()) {
            abort(403);
        }

        $tarefasAgrupadas = $board->tasks()->get()->groupBy('status');

        return view('task.index', [
            'board' => $board, 
            'tarefasAgrupadas' => $tarefasAgrupadas
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
        if ($task->user_id !== Auth::id()) {
            abort(403);
        }
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, Task $tarefa)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:pendente,em_andamento,concluida',
            'tempoLimite' => 'nullable|date',
        ]);

        $task->update($request->all());
        
        return redirect()->route('boards.tasks.index', $task->board)->with('success', 'Tarefa atualizada!');
    }

    public function destroy(Task $tarefa)
    {
        $board = $task->board; 
        $task->delete();
        return redirect()->route('boards.tasks.index', $board)->with('success', 'Tarefa excluída!');
    }
}
