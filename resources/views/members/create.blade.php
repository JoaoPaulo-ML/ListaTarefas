<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Adicionar Colaborador ao Board: <span class="text-blue-400">{{ $board->name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    
                    <form method="POST" action="{{ route('boards.members.store', $board) }}">
                        @csrf
                        <div>
                            <x-input-label for="email" value="E-mail do Colaborador" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="email@exemplo.com" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('boards.tasks.index', $board) }}" class="text-sm text-gray-400 hover:text-white underline mr-4">
                                Cancelar
                            </a>
                            <x-primary-button>
                                Adicionar Colaborador
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>