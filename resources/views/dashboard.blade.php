<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-200 leading-tight">
                Meus Boards
            </h2>
            <a href="{{ route('boards.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-semibold">
                Board +
            </a>
        </div>
    </x-slot>

    {{-- Bloco para exibir a mensagem de sucesso --}}
    @if (session('success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="p-4 bg-green-600 text-white rounded-lg shadow-md">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                
                {{-- O loop @forelse recebe a lista $boards (plural) --}}
                @forelse ($boards as $board) {{-- e cria uma variável $board (singular) para cada item --}}
                    
                    {{-- O link usa a variável $board, que está corretamente dentro do loop --}}
                    <a href="{{ route('boards.tasks.index', $board) }}" class="block">
                        <div class="bg-gray-800 p-6 rounded-lg shadow-lg hover:bg-gray-700 transition-transform transform hover:-translate-y-1">
                            <h3 class="font-bold text-lg text-white">{{ $board->name }}</h3>
                            <p class="text-sm text-gray-400 mt-2 h-10 overflow-hidden">
                                {{ $board->description ?? 'Este board não tem descrição.' }}
                            </p>
                        </div>
                    </a>
                @empty
                    {{-- Mensagem para quando não há nenhum board criado --}}
                    <div class="col-span-full text-center py-10">
                        <p class="text-gray-400">Você ainda não criou nenhum board.</p>
                        <a href="{{ route('boards.create') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                           Crie seu primeiro Board
                        </a>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>