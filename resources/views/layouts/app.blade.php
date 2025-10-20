<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-[#f9fafb]">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation-admin')

        <!-- Page Heading -->
        @isset($header)
            <header
                class="flex justify-between bg-white border-b border-gray-200 py-2 pr-4 fixed top-0 w-full z-20">
                <div
                    class="w-full h-full px-4 flex items-center justify-between gap-4">
                    <button
                        @click="sidebarOpen = !sidebarOpen"
                        class="lg:hidden p-2 hover:bg-slate-100 rounded-lg">
                            <i class="fas fa-bars text-slate-600"></i>
                    </button>

                    <div class="flex items-center gap-3">
                        <div
                            class="w-8 h-8 bg-gradient-to-br from-blue-600 to-blue-700 rounded-lg flex items-center justify-center">
                            <i class="fa fa-book text-white text-sm"></i>
                        </div>
                        <span class="font-semibold text-lg hidden sm:block">Dex Documentations</span>
                    </div>
                    <div class="flex-1 max-w-2xl">
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="text" placeholder="Pesquisar na documentação..."
                                class="w-full pl-10 pr-4 py-2 bg-slate-100 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white"
                                x-on:focus="searchOpen = true" x-on:blur="setTimeout(() => searchOpen = false, 200)">

                            <!--                Resultados da pesquisa-->
                            <div x-show="searchOpen" x-transition
                                class="absolute top-full mt-2 left-0 right-0 bg-white rounded-lg shadow-xl border border-slate-200 max-h-96 overflow-y-auto hidden">
                                <div class="p-2">
                                    <a href="#" class="block p-3 hover:bg-slate-50 rounded-lg">
                                        <div class="font-medium text-sm">Como instalar o sistema</div>
                                        <div class="text-xs text-slate-500 mt-1">Guia de Instalação > Primeiros Passos</div>
                                    </a>
                                    <a href="#" class="block p-3 hover:bg-slate-50 rounded-lg">
                                        <div class="font-medium text-sm">Configuração do banco de dados</div>
                                        <div class="text-xs text-slate-500 mt-1">Configuração > Banco de Dados</div>
                                    </a>
                                    <a href="#" class="block p-3 hover:bg-slate-50 rounded-lg">
                                        <div class="font-medium text-sm">API de autenticação</div>
                                        <div class="text-xs text-slate-500 mt-1">API > Autenticação</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-3 items-center">
                        <div
                            class="uppercase p-1 bg-slate-300 rounded-full text-gray-500 h-10 w-10 font-semibold text-xl flex items-center justify-center">
                            {{ auth()->user()->name[0] ?? 'G' }}
                        </div>
                        <div>
                            <p class="font-medium">
                                {{ auth()->user()->name ?? 'Guest' }}
                            </p>
                            <p class="text-sm text-gray-500 mt-[-3px]">
                                {{ auth()->user()->email ?? 'guest@example.com' }}
                            </p>
                        </div>
                    </div>
                </div>
            </header>
            <div class="h-20"></div>
        @endisset

        <!-- Page Content -->
        <main class="flex w-full px-2">
            <div class="w-[300px] opacity-0">espaço horizontal para preencher logo a baixo do menu lateral</div>
            {{ $slot }}
        </main>
    </div>

    <x-popup-messages />
    <x-loading-spinner />
</body>

</html>
