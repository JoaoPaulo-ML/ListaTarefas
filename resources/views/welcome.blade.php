<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Meu Kanban de Tarefas</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center">
                <main class="w-full max-w-2xl px-6 lg:max-w-7xl">
                    <div class="flex flex-col items-center justify-center text-center">
                        <h1 class="text-4xl md:text-5xl font-bold tracking-tighter text-gray-900 dark:text-white">
                            Visualize seu progresso, organize seu fluxo.
                        </h1>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a href="{{ route('register') }}"
                               class="rounded-md bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Crie seu quadro Kanban agora
                            </a>
                            <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">
                                Já tenho uma conta <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                </main>
                <footer class="py-16 text-center text-sm text-black dark:text-white/70 mt-auto">
                    Corumbá/MS 2025
                </footer>
            </div>
        </div>
    </body>
</html>