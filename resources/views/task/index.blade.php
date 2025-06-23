<x-app-layout>
    <div class="p-4 sm:p-6 lg:p-8">
        {{-- Cabeçalho da página (Título e botão "Criar Nova Tarefa") --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-200">
                Tarefas do Board: <span class="text-blue-400">{{ $board->name }}</span>
            </h2>
            <a href="{{ route('boards.tasks.create', $board) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Criar Nova Tarefa</a>
        </div>
        
        {{-- 1. NOVO CONTAINER COM GRID --}}
        {{-- Em telas grandes (lg), cria 4 colunas. Em telas menores, os itens se empilham --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            {{-- 2. COLUNA DA ESQUERDA: COLABORADORES --}}
            {{-- Ocupa 1 coluna em telas grandes --}}
            <div class="lg:col-span-1 bg-gray-800 rounded-lg p-4 h-fit lg:border-r lg:border-gray-700 lg:pr-8">
    <h3 class="font-bold text-lg mb-4 text-white">Colaboradores</h3>

    {{-- Link para a página de adicionar novo colaborador --}}
    <a href="{{ route('boards.members.create', $board) }}" class="w-full block text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
        Novos
    </a>
    
    {{-- Lista de colaboradores existentes --}}
    <div class="mt-6 space-y-3">
            {{-- Dono do Board --}}
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-full bg-yellow-500 text-black flex items-center justify-center font-bold text-sm">
                    {{ substr($board->owner->name, 0, 1) }}
                </div>
                <span class="text-white font-medium">{{ $board->owner->name }} (Dono)</span>
            </div>

            {{-- Outros Membros --}}
            @forelse ($members as $member)
                <div class="flex items-center space-x-3">
                    <div class="w-8 h-8 rounded-full bg-gray-600 text-white flex items-center justify-center font-bold text-sm">
                        {{ substr($member->name, 0, 1) }}
                    </div>
                    <span class="text-gray-300">{{ $member->name }}</span>
                </div>
            @empty
                <p class="mt-4 text-sm text-gray-400">Nenhum outro colaborador neste board.</p>
            @endforelse
        </div>
    </div>
            {{-- 3. ÁREA DA DIREITA: TAREFAS --}}
            {{-- Ocupa 3 colunas em telas grandes --}}
            <div class="lg:col-span-3">
                {{-- Grid interno para as colunas de tarefas --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                    {{-- Coluna Pendente --}}
                    <div class="bg-gray-800 rounded-lg p-4">
                        <h3 class="font-bold text-lg mb-4 text-white border-b-2 border-red-400 pb-2">Pendente</h3>
                        <div class="space-y-4">
                            @forelse ($tarefasAgrupadas['pendente'] ?? [] as $tarefa)
                                {{-- Card da tarefa com accordion --}}
                                <div x-data="{ open: false }" class="tarefa-card bg-gray-700 p-4 rounded-md shadow text-white">
                                    <div @click="open = !open" class="flex justify-between items-center cursor-pointer">
                                        <h4 class="font-bold text-md">{{ $tarefa->titulo }}</h4>
                                        <svg :class="{'rotate-180': open}" class="w-5 h-5 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </div>
                                    <div x-show="open" x-transition class="mt-4 border-t border-gray-600 pt-4">
                                        {{-- Detalhes da tarefa... --}}
                                    </div>
                                </div>
                            @empty
                                <p class="text-sm text-gray-400">Nenhuma tarefa pendente.</p>
                            @endforelse
                        </div>
                    </div>

                    {{-- Coluna Em Andamento --}}
                    <div class="bg-gray-800 rounded-lg p-4">
                        <h3 class="font-bold text-lg mb-4 text-white border-b-2 border-yellow-400 pb-2">Em Andamento</h3>
                         {{-- A lógica para as tarefas "Em Andamento" vai aqui --}}
                    </div>

                    {{-- Coluna Concluída --}}
                    <div class="bg-gray-800 rounded-lg p-4">
                        <h3 class="font-bold text-lg mb-4 text-white border-b-2 border-green-400 pb-2">Concluída</h3>
                        {{-- A lógica para as tarefas "Concluídas" vai aqui --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>