<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Criar Nova Tarefa para o Board: <span class="text-blue-400">{{ $board->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8 border-b border-gray-700">
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-900/50 border border-red-500 text-red-300 rounded-md">
                            <p class="font-bold">Opa! Algo deu errado.</p>
                            <ul class="mt-2 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('boards.tasks.store', $board) }}">
                        @csrf

                        <div class="mb-6">
                            <label for="titulo" class="block text-sm font-medium text-gray-300 mb-1">Título</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg>
                                </div>
                                <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" required
                                       class="block w-full rounded-md border-transparent bg-gray-900 pl-10 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="descricao" class="block text-sm font-medium text-gray-300 mb-1">Descrição</label>
                            <textarea name="descricao" id="descricao" rows="4"
                                      class="block w-full rounded-md border-transparent bg-gray-900 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                      placeholder="Adicione mais detalhes sobre a tarefa...">{{ old('descricao') }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- STATUS --}}
                            <div class="mb-6">
                                <label for="status" class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                                <select name="status" id="status" required
                                        class="block w-full rounded-md border-transparent bg-gray-900 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="pendente" {{ old('status', 'pendente') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                                    <option value="em_andamento" {{ old('status') == 'em_andamento' ? 'selected' : '' }}>Em Andamento</option>
                                    <option value="concluida" {{ old('status') == 'concluida' ? 'selected' : '' }}>Concluída</option>
                                </select>
                            </div>

                            <div class="mb-6">
                                <label for="tempoLimite" class="block text-sm font-medium text-gray-300 mb-1">Data Limite</label>
                                <input type="datetime-local" name="tempoLimite" id="tempoLimite" value="{{ old('tempoLimite') }}"
                                       class="block w-full rounded-md border-transparent bg-gray-900 text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8 border-t border-gray-700 pt-6 space-x-4">
                            <a href="{{ route('boards.tasks.index', $board) }}" class="text-sm font-medium text-gray-400 hover:text-white">
                                Cancelar
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center px-6 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Salvar Tarefa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>