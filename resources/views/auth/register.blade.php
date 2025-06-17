<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-white">Criar sua conta</h1>
        <p class="text-gray-400">Comece a organizar suas tarefas hoje mesmo</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" value="Nome completo" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Seu nome"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" value="E-mail" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="seu@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" value="Senha" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="********" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Confirmar senha" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="********" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        <div class="block mt-4">
            <label for="terms" class="inline-flex items-center">
                <input id="terms" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="terms" required>
                <span class="ms-2 text-sm text-gray-400">
                    Aceito os 
                    <a href="#" class="underline text-sm text-blue-400 hover:text-blue-500">termos de uso</a> e 
                    <a href="#" class="underline text-sm text-blue-400 hover:text-blue-500">política de privacidade</a>
                </span>
            </label>
        </div>


        <div class="mt-6">
            <x-primary-button class="w-full justify-center">
                {{ __('Criar conta') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>