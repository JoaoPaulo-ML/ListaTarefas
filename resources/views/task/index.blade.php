<x-app-layout>
 
    <div x-data="{ isModalOpen: false, selectedTask: {} }" class="p-4 sm:p-6 lg:p-8">
        
    
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold text-gray-200">
                Tarefas do Board: <span class="text-blue-400">{{ $board->name }}</span>
            </h2>
            <a href="{{ route('boards.tasks.create', $board) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Criar Nova Tarefa</a>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
    
            <div class="lg:col-span-1 bg-gray-800 rounded-lg p-4 h-fit lg:border-r lg:border-gray-700 lg:pr-8">
                <h3 class="font-bold text-lg mb-4 text-white">Colaboradores</h3>
                <a href="{{ route('boards.members.create', $board) }}" class="w-full block text-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Novos</a>
                <div class="mt-6 space-y-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-full bg-yellow-500 text-black flex items-center justify-center font-bold text-sm">{{ substr($board->owner->name, 0, 1) }}</div>
                        <span class="text-white font-medium">{{ $board->owner->name }} (Dono)</span>
                    </div>
                    @foreach ($members as $member)
                        <div class="flex items-center space-x-3">
                           <div class="w-8 h-8 rounded-full bg-gray-600 text-white flex items-center justify-center font-bold text-sm">{{ substr($member->name, 0, 1) }}</div>
                           <span class="text-gray-300">{{ $member->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="lg:col-span-3">
             
                <div x-data="kanban()" x-init="init()" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                        $statuses = [
                            'pendente' => ['label' => 'Pendente', 'color' => 'border-red-400'], 
                            'em_andamento' => ['label' => 'Em Andamento', 'color' => 'border-yellow-400'], 
                            'concluida' => ['label' => 'Concluída', 'color' => 'border-green-400']
                        ];
                    @endphp

                    @foreach ($statuses as $statusKey => $statusData)
                        <div class="bg-gray-800 rounded-lg p-4 flex flex-col">
                            <h3 class="font-bold text-lg mb-4 text-white border-b-2 {{ $statusData['color'] }} pb-2">{{ $statusData['label'] }}</h3>
                            
                            
                            <div class="task-list flex-grow min-h-[10rem] space-y-4" data-status="{{ $statusKey }}">
                                @forelse ($tarefasAgrupadas[$statusKey] ?? [] as $tarefa)
                                  
                                    <div data-task-id="{{ $tarefa->id }}" @click="selectedTask = {{ json_encode($tarefa) }}; isModalOpen = true" class="tarefa-card bg-gray-700 p-4 rounded-md shadow text-white hover:bg-gray-600 cursor-pointer transition-colors">
                                        <h4 class="font-bold text-md">{{ $tarefa->titulo }}</h4>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-400">Nenhuma tarefa {{ str_replace('_', ' ', $statusKey) }}.</p>
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div x-show="isModalOpen" 
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @keydown.escape.window="isModalOpen = false"
             class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50"
             style="display: none;">

            <div @click="isModalOpen = false" class="absolute inset-0"></div>

            <div class="bg-gray-800 rounded-lg shadow-xl w-full max-w-2xl mx-4 z-10 text-white p-6 md:p-8">
                
                <div class="flex justify-between items-center border-b border-gray-700 pb-3">
                    <h2 class="text-2xl font-bold" x-text="selectedTask.titulo"></h2>
                    <button @click="isModalOpen = false" class="text-gray-400 hover:text-white text-3xl">&times;</button>
                </div>

                <div class="mt-6">
                    <p class="text-gray-300" x-text="selectedTask.descricao || 'Esta tarefa não possui descrição.'"></p>
                    <div class="mt-6 grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="font-semibold text-gray-400">Status:</span>
                            <span class="capitalize ml-2 px-2 py-1 rounded-full text-xs" 
                                  :class="{ 'bg-red-500/50 text-red-300': selectedTask.status == 'pendente', 'bg-yellow-500/50 text-yellow-300': selectedTask.status == 'em_andamento', 'bg-green-500/50 text-green-300': selectedTask.status == 'concluida' }"
                                  x-text="selectedTask.status ? selectedTask.status.replace('_', ' ') : ''"></span>
                        </div>
                        <div>
                            <span class="font-semibold text-gray-400">Data Limite:</span>
                            <span class="ml-2" x-text="selectedTask.tempoLimite ? new Date(selectedTask.tempoLimite).toLocaleString('pt-BR') : 'Não definida'"></span>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a :href="`{{ route('tasks.edit', ['task' => 'TASK_ID_PLACEHOLDER']) }}`.replace('TASK_ID_PLACEHOLDER', selectedTask.id)" 
                       class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-500 text-sm">
                       Editar
                    </a>
                </div>
            </div>
        </div>

    </div>

    <script>
        function kanban() {
            return {
                init() {
                  
                    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    document.querySelectorAll('.task-list').forEach(list => {
                        Sortable.create(list, {
                            group: 'tasks',
                            animation: 150,
                            ghostClass: 'bg-blue-200/20',

                            onEnd: (evt) => {
                                const taskId = evt.item.dataset.taskId;
                                const newStatus = evt.to.dataset.status;
                                
                                axios.patch(`/tasks/${taskId}/status`, {
                                    status: newStatus
                                }).then(response => {
                                    console.log('Status atualizado!');
                                }).catch(error => {
                                    console.error('Erro ao atualizar status:', error);
                                    
                                });
                            }
                        });
                    });
                }
            }
        }
    </script>
</x-app-layout>