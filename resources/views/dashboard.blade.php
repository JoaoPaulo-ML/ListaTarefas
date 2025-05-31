<x-app-layout>

    <div class="mt-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-700">Minhas Tarefas</h2>
            <a href="{{ route('tarefa.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Criar Nova Tarefa</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <div class="bg-gray-100 rounded-lg p-4">
                <h3 class="font-bold text-lg mb-4 text-gray-800 border-b-2 border-red-400 pb-2">Pendente</h3>
                <div class="space-y-4">
                   
                    @forelse ($tarefasAgrupadas['pendente'] ?? [] as $tarefa)
                        <div class="tarefa-card bg-white p-4 rounded-md shadow">
                            <h4 class="font-bold text-md">{{ $tarefa->titulo }}</h4>
                            <p class="text-sm text-gray-600 mt-1">{{ $tarefa->descricao }}</p>
                            <p class="text-xs text-gray-500 mt-3">
                            Limite: {{ $tarefa->tempoLimite ? \Carbon\Carbon::parse($tarefa->tempoLimite)->format('d/m/Y H:i') : 'Não definido' }}
                            </p>
                            <a href="{{ route('tarefa.edit', $tarefa->id) }}" class="text-sm text-blue-600 hover:text-blue-800 font-semibold">Editar</a>
                            <form method="POST" action="{{ route('tarefa.destroy', $tarefa->id) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-sm text-red-600 hover:text-red-800 font-semibold"
                                        onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">Nenhuma tarefa pendente.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-gray-100 rounded-lg p-4">
                <h3 class="font-bold text-lg mb-4 text-gray-800 border-b-2 border-yellow-400 pb-2">Em Andamento</h3>
                <div class="space-y-4">
                    @forelse ($tarefasAgrupadas['em_andamento'] ?? [] as $tarefa)
                        <div class="tarefa-card bg-white p-4 rounded-md shadow">
                            <h4 class="font-bold text-md">{{ $tarefa->titulo }}</h4>
                            <p class="text-sm text-gray-600 mt-1">{{ $tarefa->descricao }}</p>
                            <p class="text-xs text-gray-500 mt-3">
                            Limite: {{ $tarefa->tempoLimite ? \Carbon\Carbon::parse($tarefa->tempoLimite)->format('d/m/Y H:i') : 'Não definido' }}
                            </p>
                            <a href="{{ route('tarefa.edit', $tarefa->id) }}" class="text-sm text-blue-600 hover:text-blue-800 font-semibold">Editar</a>
                            <form method="POST" action="{{ route('tarefa.destroy', $tarefa->id) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-sm text-red-600 hover:text-red-800 font-semibold"
                                        onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">Nenhuma tarefa em andamento.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-gray-100 rounded-lg p-4">
                <h3 class="font-bold text-lg mb-4 text-gray-800 border-b-2 border-green-400 pb-2">Concluída</h3>
                <div class="space-y-4">
                    @forelse ($tarefasAgrupadas['concluida'] ?? [] as $tarefa)
                        <div class="tarefa-card bg-white p-4 rounded-md shadow">
                            <h4 class="font-bold text-md">{{ $tarefa->titulo }}</h4>
                            <p class="text-sm text-gray-600 mt-1">{{ $tarefa->descricao }}</p>
                            <p class="text-xs text-gray-500 mt-3">
                            Limite: {{ $tarefa->tempoLimite ? \Carbon\Carbon::parse($tarefa->tempoLimite)->format('d/m/Y H:i') : 'Não definido' }}
                            </p>
                            <a href="{{ route('tarefa.edit', $tarefa->id) }}" class="text-sm text-blue-600 hover:text-blue-800 font-semibold">Editar</a>
                            <form method="POST" action="{{ route('tarefa.destroy', $tarefa->id) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-sm text-red-600 hover:text-red-800 font-semibold"
                                        onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                    Excluir
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">Nenhuma tarefa concluída.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
