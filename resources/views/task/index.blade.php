<x-app-layout>
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="flex justify-between items-center mb-6">
            {{-- Mostra o nome do Board atual --}}
            <h2 class="text-2xl font-semibold text-gray-200">
                Tarefas do Board: <span class="text-blue-400">{{ $board->name }}</span>
            </h2>
            {{-- O botão agora aponta para a rota de criação da tarefa DENTRO do board --}}
            <a href="{{ route('boards.tasks.create', $board) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Criar Nova Tarefa</a>
        </div>
        
        {{-- Restante da sua view do Kanban... --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Coluna Pendente --}}
            <div class="bg-gray-800 rounded-lg p-4">
                <h3 class="font-bold text-lg mb-4 text-white border-b-2 border-red-400 pb-2">Pendente</h3>
                <div class="space-y-4">
                    @forelse ($tarefasAgrupadas['pendente'] ?? [] as $tarefa)
                        <div class="tarefa-card bg-gray-700 p-4 rounded-md shadow text-white">
                           <h4 class="font-bold text-md">{{ $tarefa->titulo }}</h4>
                           {{-- ... resto do card ... --}}
                        </div>
                    @empty
                        <p class="text-sm text-gray-400">Nenhuma tarefa pendente.</p>
                    @endforelse
                </div>
            </div>

             {{-- Coluna Em Andamento (adapte o estilo como na coluna pendente) --}}
            <div class="bg-gray-800 rounded-lg p-4">
                <h3 class="font-bold text-lg mb-4 text-white border-b-2 border-yellow-400 pb-2">Em Andamento</h3>
                 {{-- ... loop para tarefas em andamento ... --}}
            </div>

             {{-- Coluna Concluída (adapte o estilo como na coluna pendente) --}}
            <div class="bg-gray-800 rounded-lg p-4">
                 <h3 class="font-bold text-lg mb-4 text-white border-b-2 border-green-400 pb-2">Concluída</h3>
                 {{-- ... loop para tarefas concluídas ... --}}
            </div>
        </div>
    </div>
</x-app-layout>