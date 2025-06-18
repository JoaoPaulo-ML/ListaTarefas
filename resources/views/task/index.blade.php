<x-app-layout>
    <div class="p-4 sm:p-6 lg:p-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-200">
                Tarefas do Board: <span class="text-blue-400">{{ $board->name }}</span>
            </h2>
            <a href="{{ route('boards.tasks.create', $board) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Criar Nova Tarefa</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          
            <div class="bg-gray-800 rounded-lg p-4">
                <h3 class="font-bold text-lg mb-4 text-white border-b-2 border-red-400 pb-2">Pendente</h3>
                <div class="space-y-4">
                    @forelse ($tarefasAgrupadas['pendente'] ?? [] as $tarefa)
               
                        <div x-data="{ open: false }" class="tarefa-card bg-gray-700 p-4 rounded-md shadow text-white">
                         
                            <div @click="open = !open" class="flex justify-between items-center cursor-pointer">
                                <h4 class="font-bold text-md">{{ $tarefa->titulo }}</h4>
                                
                                <svg :class="{'rotate-180': open}" class="w-5 h-5 transform transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>

                            <div x-show="open" x-transition class="mt-4 border-t border-gray-600 pt-4">
                                <p class="text-sm text-gray-300 mb-3">{{ $tarefa->descricao ?? 'Sem descrição.' }}</p>
                                
                                <p class="text-xs text-gray-400">
                                    <strong>Limite:</strong> 
                                </p>

                                <div class="flex items-center space-x-4 mt-4">
                                    <a href="{{ route('tasks.edit', $tarefa->id) }}" class="text-sm text-blue-400 hover:text-blue-300 font-semibold">Editar</a>
                                    
                                    <form method="POST" action="{{ route('tasks.destroy', $tarefa->id) }}" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-400 hover:text-red-300 font-semibold">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-gray-400">Nenhuma tarefa pendente.</p>
                    @endforelse
                </div>
            </div>

            {{-- Coluna Em Andamento (APLIQUE A MESMA LÓGICA ACIMA) --}}
            <div class="bg-gray-800 rounded-lg p-4">
                <h3 class="font-bold text-lg mb-4 text-white border-b-2 border-yellow-400 pb-2">Em Andamento</h3>
                <div class="space-y-4">
                    @forelse ($tarefasAgrupadas['em_andamento'] ?? [] as $tarefa)
                        {{-- COPIE E COLE A ESTRUTURA DO CARD DE TAREFA AQUI --}}
                    @empty
                         <p class="text-sm text-gray-400">Nenhuma tarefa em andamento.</p>
                    @endforelse
                </div>
            </div>

            {{-- Coluna Concluída (APLIQUE A MESMA LÓGICA ACIMA) --}}
            <div class="bg-gray-800 rounded-lg p-4">
                <h3 class="font-bold text-lg mb-4 text-white border-b-2 border-green-400 pb-2">Concluída</h3>
                <div class="space-y-4">
                     @forelse ($tarefasAgrupadas['concluida'] ?? [] as $tarefa)
                        {{-- COPIE E COLE A ESTRUTURA DO CARD DE TAREFA AQUI --}}
                    @empty
                         <p class="text-sm text-gray-400">Nenhuma tarefa concluída.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>