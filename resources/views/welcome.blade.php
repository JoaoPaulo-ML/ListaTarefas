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
    
    <div class="bg-black text-white min-h-screen flex flex-col">

        <header class="w-full p-6">
            <div class="max-w-7xl mx-auto">
                <nav class="flex items-center justify-end gap-x-6">
                    <a href="{{ route('register') }}" class="text-sm font-semibold leading-6 hover:underline">
                        Cadastrar
                    </a>
                    <a href="{{ route('login') }}" class="rounded-md bg-indigo-600 px-5 py-2 text-sm font-semibold shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Login
                    </a>
                </nav>
            </div>
        </header>

        <main class="flex-grow flex items-center">
            <div class="w-full max-w-7xl mx-auto px-6">
             
                <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

                    <div class="text-left">
                        <h1 class="text-5xl md:text-6xl font-bold tracking-tighter">
                            Organize seu fluxo de trabalho, com métodos Kanban
                        </h1>
                    </div>

                    <div class="flex justify-around gap-4 p-8 bg-gray-900/50 rounded-lg">
                      
                        <div class="flex flex-col items-center w-1/3">
                            <div class="w-2/3 h-1 bg-gray-700 mb-3 rounded-full"></div>
                            <div class="w-full h-32 bg-indigo-600 rounded-lg"></div>
                        </div>
                        
                        <div class="flex flex-col items-center w-1/3">
                            <div class="w-2/3 h-1 bg-gray-700 mb-3 rounded-full"></div>
                            <div class="w-full h-32 bg-indigo-600 rounded-lg"></div>
                        </div>
                       
                        <div class="flex flex-col items-center w-1/3">
                            <div class="w-2/3 h-1 bg-gray-700 mb-3 rounded-full"></div>
                            <div class="w-full h-32 bg-indigo-600 rounded-lg"></div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        <footer class="py-8 text-center text-sm text-white/70">
            Corumbá/MS {{ date('Y') }}
        </footer>
    </div>
</body>
</html>