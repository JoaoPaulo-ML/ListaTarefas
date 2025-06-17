<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todasAsTarefas = Auth::user()->tasks()->get();

        $tarefasAgrupadas = $todasAsTarefas->groupBy('status');

        return view('task.index', [
            'tarefasAgrupadas' => $tarefasAgrupadas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:pendente,em_andamento,concluida',
            'tempoLimite' => 'nullable|date',
        ]);

        $tarefa = new Task();
        $tarefa->titulo = $validatedData['titulo'];
        $tarefa->descricao = $validatedData['descricao'];
        $tarefa->status = $validatedData['status'];
        $tarefa->tempoLimite = $validatedData['tempoLimite'];
        $tarefa->user_id = Auth::id(); 
        $tarefa->save();

        return redirect()->route('dashboard')->with('success', 'Tarefa criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $tarefa)
    {
        return view('task.edit', compact('tarefa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $tarefa)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'status' => 'required|in:pendente,em_andamento,concluida',
            'tempoLimite' => 'nullable|date',
        ]);

        $tarefa->update($validatedData);

        return redirect()->route('dashboard')->with('success', 'Tarefa atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $tarefa)
    {
        $tarefa->delete();

        return redirect()->route('dashboard')->with('success', 'Tarefa excluída com sucesso!');
    }
}
